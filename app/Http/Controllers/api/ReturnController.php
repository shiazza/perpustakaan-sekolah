<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnController extends Controller
{
    // History Buku yang sudah dikembalikan (Status 'returned')
    public function index()
    {
        $user = Auth::user();

        // Ambil data Borrow yang punya relasi ReturnTransaction
        // Atau yang statusnya 'returned'
        $returnedBooks = Borrow::with(['bookChild.bookParent', 'returnTransaction'])
            ->where('user_id', $user->id)
            ->where('status', 'returned')
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->json([
            'message' => 'History pengembalian berhasil diambil',
            'data' => $returnedBooks
        ]);
    }

    // Detail Pengembalian (Cek Denda, Kondisi, dll)
    public function show($borrow_id)
    {
        $user = Auth::user();

        $returnDetail = Borrow::with(['bookChild.bookParent', 'returnTransaction'])
            ->where('user_id', $user->id)
            ->where('id_borrow', $borrow_id)
            ->first();

        if (!$returnDetail) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json([
            'message' => 'Detail pengembalian berhasil diambil',
            'data' => $returnDetail
        ]);
    }
}