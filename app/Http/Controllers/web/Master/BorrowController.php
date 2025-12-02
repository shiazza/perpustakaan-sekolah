<?php

namespace App\Http\Controllers\web\Master;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use App\Models\ReturnTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with(['user', 'bookChild.bookParent'])->paginate(10);
        return view('master.borrow.index', compact('borrows'));
    }

    public function show($id)
    {
        $borrow = Borrow::with(['user', 'bookChild.bookParent', 'returnTransaction'])
            ->where('id_borrow', $id)
            ->firstOrFail();
        return view('master.borrow.show', compact('borrow'));
    }

    public function returnBook(Request $request, $borrow_id)
    {
        $request->validate([
            'condition' => 'required|string',
            'fine_value' => 'nullable|numeric|min:0',
            'fine_status' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $borrow = Borrow::where('id_borrow', $borrow_id)
            ->where('status', 'borrowed')
            ->firstOrFail();

        DB::transaction(function () use ($borrow, $request) {
            // Update borrow status
            $borrow->status = 'returned';
            $borrow->save();

            // Update book child status back to available
            $borrow->bookChild->status = 'available';
            $borrow->bookChild->save();

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

        return redirect()->route('borrow.index')->with('success', 'Book returned successfully');
    }
}
