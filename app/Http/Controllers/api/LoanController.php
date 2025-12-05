<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use App\Models\BookChild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoanController extends Controller
{
    // History Peminjaman Saya
    public function index()
    {
        $user = Auth::user();
        
        // Mengambil peminjaman yang statusnya aktif / waiting / borrowed
        // Tidak termasuk yang sudah returned atau cancelled (opsional)
        $loans = Borrow::with(['bookChild.bookParent'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'message' => 'History peminjaman berhasil diambil',
            'data' => $loans
        ]);
    }

    // Ajukan Peminjaman Baru
    public function store(Request $request)
    {
        $request->validate([
            'bc_id' => 'required|exists:book_children,id_bc',
            'duration_days' => 'required|integer|min:1|max:14', // Contoh max 14 hari
        ]);

        // Cek status buku apakah available
        $bookChild = BookChild::find($request->bc_id);
        if ($bookChild->status !== 'available') {
            return response()->json(['message' => 'Buku sedang tidak tersedia'], 400);
        }

        $user = Auth::user();
        $startDate = Carbon::now();
        $endDate = Carbon::now()->addDays($request->duration_days);

        $borrow = Borrow::create([
            'user_id' => $user->id,
            'bc_id' => $request->bc_id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 'waiting', // Default nunggu approval admin
        ]);

        return response()->json([
            'message' => 'Pengajuan peminjaman berhasil dibuat',
            'data' => $borrow
        ], 201);
    }
}