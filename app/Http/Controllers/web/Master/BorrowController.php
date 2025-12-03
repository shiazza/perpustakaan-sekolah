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

    public function approveBorrow($borrow_id)
    {
        $borrow = Borrow::where('id_borrow', $borrow_id)
            ->where('status', 'waiting')
            ->firstOrFail();

        DB::transaction(function () use ($borrow) {
            // Update borrow status
            $borrow->status = 'borrowed';
            $borrow->save();

            // Update book child status to borrowed
            $borrow->bookChild->status = 'borrowed';
            $borrow->bookChild->save();
        });

        return redirect()->route('borrow.index')->with('success', 'Borrow request approved successfully');
    }

    public function cancelBorrow($borrow_id)
    {
        $borrow = Borrow::where('id_borrow', $borrow_id)
            ->where('status', 'waiting')
            ->firstOrFail();

        DB::transaction(function () use ($borrow) {
            // Update borrow status to cancelled
            $borrow->status = 'cancelled';
            $borrow->save();

            // Book remains available, no need to change bookChild status
        });

        return redirect()->route('borrow.index')->with('success', 'Borrow request cancelled successfully');
    }
}
