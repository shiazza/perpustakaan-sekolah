<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use App\Models\ReturnTransaction;
use App\Models\BookChild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BorrowController extends Controller
{
    public function showForm()
    {
        $user = Auth::user();
        // validation
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $bookChilds = BookChild::where('status', 'available')->get();
        if ($bookChilds->isEmpty()) {
            return response()->json(['message' => 'No available books to borrow'], 404);
        }
        else if (!$bookChilds) {
            return response()->json(['message' => 'Book Childs not found'], 404);
        }

        return response()->json([
            'user' => $user,
            'bookChilds' => $bookChilds,
        ]);
    }
    public function borrowBook(Request $request, $bc_id)
    {
        $user = $request->user('sanctum');

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $bookChild = BookChild::find($bc_id);
        if (!$bookChild) {
            return response()->json(['message' => 'Book child not found'], 404);
        }

        if ($bookChild->status !== 'available') {
            return response()->json(['message' => 'Book not available'], 400);
        }

        $existingBorrow = Borrow::where('user_id', $user->id)
            ->where('bc_id', $bc_id)
            ->whereIn('status', ['borrowed', 'waiting'])
            ->first();

        if ($existingBorrow) {
            return response()->json(['message' => 'Already borrowed'], 400);
        }

        DB::transaction(function () use ($user, $bc_id) {
            Borrow::create([
                'user_id' => $user->id,
                'bc_id' => $bc_id,
                'start_date' => now(),
                'end_date' => now()->addDays(14),
                'status' => 'waiting',
            ]);
        });

        return response()->json(['message' => 'Borrow request created'], 201);
    }


    public function returnBook(Request $request, $borrow_id)
    {
        $user = $request->user('sanctum');

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Find the borrow record
        $borrow = Borrow::where('id_borrow', $borrow_id)
            ->where('user_id', $user->id)
            ->where('status', 'borrowed')
            ->first();

        if (!$borrow) {
            return response()->json(['message' => 'Borrow record not found or already returned'], 404);
        }

        // Validate request data
        $request->validate([
            'condition' => 'required|string',
            'description' => 'nullable|string',
            'proof_image' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        DB::transaction(function () use ($borrow, $request) {

            // Handle Image Upload
            $proofImagePath = null;
            if ($request->hasFile('proof_image')) {
                $proofImagePath = $request->file('proof_image')->store('return_proofs', 'public');
            }

            // Update borrow status to waiting
            $borrow->status = 'waiting';
            $borrow->save();

            // Create return transaction
            $returnTransaction = new ReturnTransaction();
            $returnTransaction->borrow_id = $borrow->id_borrow;
            $returnTransaction->bc_id = $borrow->bc_id;
            $returnTransaction->date = Carbon::now();
            $returnTransaction->condition = $request->condition;
            $returnTransaction->fine_value = 0;
            $returnTransaction->fine_status = null;
            $returnTransaction->description = $request->description ?? '';

            // Simpan path gambar jika ada
            $returnTransaction->proof_image = $proofImagePath;

            $returnTransaction->save();
        });

        return response()->json(['message' => 'Book returned successfully'], 200);
    }
}
