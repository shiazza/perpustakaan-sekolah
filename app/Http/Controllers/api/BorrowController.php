<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use App\Models\ReturnTransaction;
use App\Models\BookChild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $user = Auth::user();

        // Check if the book child exists and is available
        $bookChild = BookChild::find($bc_id);
        if (!$bookChild) {
            return response()->json(['message' => 'Book child not found'], 404);
        }

        if ($bookChild->status !== 'available') {
            return response()->json(['message' => 'Book is not available for borrowing'], 400);
        }

        // Check if the user already has this book borrowed
        $existingBorrow = Borrow::where('user_id', $user->id)
            ->where('bc_id', $bc_id)
            ->where('status', 'borrowed')
            ->first();
        if ($existingBorrow) {
            return response()->json(['message' => 'You have already borrowed this book'], 400);
        }

        DB::transaction(function () use ($bookChild, $user, $bc_id) {
            // Update book child status
            $bookChild->status = 'borrowed';
            $bookChild->save();

            // Create borrow record
            $borrow = new Borrow();
            $borrow->user_id = $user->id;
            $borrow->bc_id = $bc_id;
            $borrow->start_date = Carbon::now();
            $borrow->end_date = Carbon::now()->addDays(14); // Assuming 14 days borrow period
            $borrow->status = 'borrowed';
            $borrow->save();
        });

        return response()->json(['message' => 'Book borrowed successfully'], 201);
    }

    public function returnBook(Request $request, $borrow_id)
    {
        $user = Auth::user();

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
            'fine_value' => 'nullable|numeric|min:0',
            'fine_status' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        DB::transaction(function () use ($borrow, $request) {
            // Update borrow status
            $borrow->status = 'returned';
            $borrow->save();

            // Create return transaction
            $returnTransaction = new ReturnTransaction();
            $returnTransaction->borrow_id = $borrow->id_borrow;
            $returnTransaction->bc_id = $borrow->bc_id;
            $returnTransaction->date = Carbon::now();
            $returnTransaction->condition = $request->condition;
            $returnTransaction->fine_value = $request->fine_value ?? 0;
            $returnTransaction->fine_status = $request->fine_status ?? 'paid';
            $returnTransaction->description = $request->description ?? '';
            $returnTransaction->save();
        });

        return response()->json(['message' => 'Book returned successfully'], 200);
    }
}
