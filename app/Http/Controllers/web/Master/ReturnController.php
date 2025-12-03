<?php

namespace App\Http\Controllers\web\Master;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB;

class ReturnController extends Controller
{
    public function index()
    {
        $returns = Borrow::with(['user', 'bookChild.bookParent', 'returnTransaction'])
            ->where('status', 'returned')
            ->paginate(10);
        return view('master.return.index', compact('returns'));
    }

    public function show($id)
    {
        $return = Borrow::with(['user', 'bookChild.bookParent', 'returnTransaction'])
            ->where('id_borrow', $id)
            ->where('status', 'returned')
            ->firstOrFail();
        return view('master.return.show', compact('return'));
    }

    public function approveReturn($borrow_id)
    {
        $borrow = Borrow::where('id_borrow', $borrow_id)
            ->where('status', 'waiting')
            ->firstOrFail();

        DB::transaction(function () use ($borrow) {
            // Update borrow status
            $borrow->status = 'returned';
            $borrow->save();

            // Update book child status back to available
            $borrow->bookChild->status = 'available';
            $borrow->bookChild->save();
        });

        return redirect()->route('borrow.index')->with('success', 'Return request approved successfully');
    }
}
