<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\BookParent;
use App\Models\BookChild;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Show the dashboard with statistics
     * @return \Illuminate\View\View
     */
    public function showDashboard()
    {
        try {
            // Basic statistics
            $totalUsers = User::count();
            $totalBooks = BookChild::count();
            $booksOnLoan = DB::table('borrow')
                ->where('status', 'active')
                ->count();
            $newUsersThisMonth = User::whereMonth('created_at', Carbon::now()->month)->count();

            // Monthly borrow trend data
            $months = [];
            $borrowCounts = [];
            for ($i = 0; $i < 12; $i++) {
                $date = Carbon::now()->subMonths($i);
                $months[] = $date->format('M');
                $borrowCounts[] = DB::table('borrow')
                    ->whereMonth('date', $date->month)
                    ->whereYear('date', $date->year)
                    ->count();
            }
            $months = array_reverse($months);
            $borrowCounts = array_reverse($borrowCounts);

            // Category distribution data
            $categoriesData = DB::table('categories')
                ->join('book_parents', 'categories.id_cate', '=', 'book_parents.category_id')
                ->join('book_children', 'book_parents.id_bp', '=', 'book_children.bp_id')
                ->join('borrow', 'book_children.id_bc', '=', 'borrow.book_id')
                ->select('categories.name', DB::raw('count(*) as count'))
                ->groupBy('categories.name')
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->name => $item->count];
                })
                ->toArray();

            // Most borrowed books
            $mostBorrowedBooks = BookParent::select([
                'book_parents.id_bp',
                'book_parents.title',
                DB::raw('COUNT(borrow.id_borrow) as total_borrows')
            ])
                ->join('book_children', 'book_parents.id_bp', '=', 'book_children.bp_id')
                ->join('borrow', 'book_children.id_bc', '=', 'borrow.book_id')
                ->groupBy(['book_parents.id_bp', 'book_parents.title'])
                ->orderByDesc('total_borrows')
                ->limit(5)
                ->get();

            return view('master.dashboard', compact(
                'totalUsers',
                'totalBooks',
                'booksOnLoan',
                'newUsersThisMonth',
                'months',
                'borrowCounts',
                'categoriesData',
                'mostBorrowedBooks'
            ));

        } catch (\Exception $e) {
            \Log::error('Dashboard Error: ' . $e->getMessage());
            
            // Return view with error and empty data
            return view('master.dashboard', [
                'totalUsers' => 0,
                'totalBooks' => 0,
                'booksOnLoan' => 0,
                'newUsersThisMonth' => 0,
                'months' => [],
                'borrowCounts' => [],
                'categoriesData' => [],
                'mostBorrowedBooks' => collect([])
            ])->with('error', 'Error loading dashboard data');
        }
    }
}