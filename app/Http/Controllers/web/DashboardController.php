<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\BookChild;
use App\Models\BookList;
use App\Models\BookParent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard
     * @return \Illuminate\View\View
     */
    public function showDashboard()
    {
        // Get all necessary data for the dashboard view (summary stats, borrow trend, popular categories, most borrowed books)
        // Don't complain about the method names, I know they are long, but I want to be clear about what each method does
        $summaryStats = $this->getSummaryStats();
        $borrowTrend = $this->getMonthlyBorrowTrend();
        $popularCategories = $this->getPopularBookCategories();
        $mostBorrowedBooks = $this->getMostBorrowedBooks();

        // Merge all data into a single array for the view
        $data = array_merge($summaryStats, $borrowTrend, $popularCategories, $mostBorrowedBooks);

        return view('dashboard', $data);
    }

    /**
     * Get summary statistics for dashboard cards.
     * @return array
     */
    private function getSummaryStats()
    {
        return [
            'totalUsers'       => User::count(),
            'totalBooks'       => BookChild::count(),
            'booksOnLoan'      => BookList::whereNull('borrow_duration_end')->count(),
            'newUsersThisMonth'=> User::whereMonth('created_at', Carbon::now()->month)->count(),
        ];
    }

    /**
     * Get data for the monthly borrowing trend chart.
     * @return array
     */
    private function getMonthlyBorrowTrend()
    {
        // Yknow, I don't like to use raw queries, but sometimes it's necessary for performance
        $monthlyData = BookList::select(
            DB::raw('COUNT(*) as count'),
            DB::raw('MONTH(borrow_duration_start) as month')
        )
        ->whereYear('borrow_duration_start', Carbon::now()->year)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $months = [];
        $borrowCounts = [];
        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        foreach ($monthlyData as $data) {
            $months[] = $monthNames[$data->month - 1];
            $borrowCounts[] = $data->count;
        }

        return compact('months', 'borrowCounts');
    }

    /**
     * Get data for the popular book categories chart.
     * @return array
     */
    private function getPopularBookCategories()
    {
        // I remember about my figma mockup called "Mangatopia", but nvm it's not relevant here
        $categoriesData = BookParent::select('category', DB::raw('COUNT(DISTINCT book_parents.id_bp) as count'))
            ->join('book_children', 'book_parents.id_bp', '=', 'book_children.bp_id')
            ->join('book_lists', 'book_children.id_bc', '=', 'book_lists.bc_id')
            ->groupBy('book_parents.category')
            ->orderBy('count', 'desc')
            ->pluck('count', 'category')
            ->toArray();

        return compact('categoriesData');
    }

    /**
     * Get the list of 5 most borrowed books.
     * @return array
     */
    private function getMostBorrowedBooks()
    {
        // Delete this IF USELESS
        $mostBorrowedBooks = BookParent::select('title', DB::raw('COUNT(book_lists.id_list) as total_borrows'))
            ->join('book_children', 'book_parents.id_bp', '=', 'book_children.bp_id')
            ->join('book_lists', 'book_children.id_bc', '=', 'book_lists.bc_id')
            ->groupBy('book_parents.id_bp', 'book_parents.title')
            ->orderBy('total_borrows', 'desc')
            ->limit(5)
            ->get();

        return compact('mostBorrowedBooks');
    }
}