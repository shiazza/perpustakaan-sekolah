<?php

namespace App\Http\Controllers\web\Master;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnController extends Controller
{
    public function index()
    {
        $returns = Borrow::with(['user', 'bookChild.bookParent', 'returnTransaction'])
            ->where('status', 'returned')
            ->whereHas('returnTransaction')
            ->paginate(10);
        return view('master.return.index', compact('returns'));
    }

    public function show($id)
    {
        $return = Borrow::with(['user', 'bookChild.bookParent', 'returnTransaction'])
            ->where('id_borrow', $id)
            ->where('status', 'returned')
            ->whereHas('returnTransaction')
            ->firstOrFail();
        return view('master.return.show', compact('return'));
    }

    public function updateFine(Request $request, $borrow_id)
    {
        $request->validate([
            'fine_value' => 'required|numeric|min:0',
            'fine_status' => 'required|in:paid,pending',
        ]);

        $borrow = Borrow::where('id_borrow', $borrow_id)
            ->where('status', 'waiting')
            ->whereHas('returnTransaction')
            ->firstOrFail();

        $borrow->returnTransaction->update([
            'fine_value' => $request->fine_value,
            'fine_status' => $request->fine_status,
        ]);

        return redirect()->back()->with('success', 'Fine updated successfully');
    }
}
