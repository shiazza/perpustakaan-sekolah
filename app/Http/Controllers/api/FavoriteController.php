<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    // List Favorit User Login
    public function index()
    {
        $user = Auth::user();
        
        $favorites = Wishlist::with(['bookChild.bookParent']) // Relasi ke buku
            ->where('user_id', $user->id)
            ->get();

        return response()->json([
            'message' => 'List favorit berhasil diambil',
            'data' => $favorites
        ]);
    }

    // Tambah ke Favorit
    public function store(Request $request)
    {
        $request->validate([
            'bc_id' => 'required|exists:book_children,id_bc', // ID Book Child
        ]);

        $user = Auth::user();

        // Cek duplikat
        $exists = Wishlist::where('user_id', $user->id)
            ->where('bc_id', $request->bc_id)
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Buku sudah ada di favorit'], 400);
        }

        $wishlist = Wishlist::create([
            'user_id' => $user->id,
            'bc_id' => $request->bc_id,
        ]);

        return response()->json([
            'message' => 'Berhasil ditambahkan ke favorit',
            'data' => $wishlist
        ], 201);
    }

    // Hapus dari Favorit
    public function destroy($id)
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)->where('id_wishlists', $id)->first();

        if (!$wishlist) {
            return response()->json(['message' => 'Item favorit tidak ditemukan'], 404);
        }

        $wishlist->delete();

        return response()->json(['message' => 'Berhasil dihapus dari favorit']);
    }
}