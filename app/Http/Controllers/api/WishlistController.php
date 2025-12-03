<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\BookChild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request, $bc_id)
    {
        $user = Auth::user();

        // Check if the book child exists
        $bookChild = BookChild::find($bc_id);
        if (!$bookChild) {
            return response()->json(['message' => 'Book child not found'], 404);
        }

        // Check if the book is already in the user's wishlist
        $existingWishlist = Wishlist::where('user_id', $user->id)
            ->where('bc_id', $bc_id)
            ->first();
        if ($existingWishlist) {
            return response()->json(['message' => 'Book is already in your wishlist'], 400);
        }

        // Add to wishlist
        $wishlist = new Wishlist();
        $wishlist->user_id = $user->id;
        $wishlist->bc_id = $bc_id;
        $wishlist->save();

        return response()->json(['message' => 'Book added to wishlist successfully'], 201);
    }

    public function removeFromWishlist(Request $request, $bc_id)
    {
        $user = Auth::user();

        // Find and delete the wishlist item
        $wishlist = Wishlist::where('user_id', $user->id)
            ->where('bc_id', $bc_id)
            ->first();
        if (!$wishlist) {
            return response()->json(['message' => 'Book not found in your wishlist'], 404);
        }

        $wishlist->delete();

        return response()->json(['message' => 'Book removed from wishlist successfully'], 200);
    }

    public function getWishlist(Request $request)
    {
        $user = Auth::user();

        $wishlist = Wishlist::where('user_id', $user->id)
            ->with('bookChild.bookParent') // Assuming BookChild has a relationship to BookParent
            ->get();

        return response()->json(['wishlist' => $wishlist], 200);
    }
}
