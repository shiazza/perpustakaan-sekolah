@extends('layouts.app')

@section('content')

<div class="flex items-center justify-between px-4 py-2 bg-white rounded-xl">
    <div>
        <h1 class="font-normal text-base">Welcome, Admin</h1>
        <h1 class="font-bold text-xl">Dashboard</h1>
    </div>

    <form class="flex items-center">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full pl-10 p-2.5" placeholder="Search for books, users..." required />
        </div>
    </form>
</div>

<div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-7">
    <div class="block rounded-3xl bg-yellow-400 p-6 text-surface shadow-md flex flex-col justify-between h-40">
        <div>
            <h5 class="text-xl font-bold mb-2">Total Users</h5>
            <p class="text-3xl font-extrabold">{{ $totalUsers }}</p>
        </div>
        <p class="text-sm">Total number of registered users.</p>
    </div>
    <div class="block rounded-3xl bg-orange-300 p-6 text-surface shadow-md flex flex-col justify-between h-40">
        <div>
            <h5 class="text-xl font-bold mb-2">Total Books</h5>
            <p class="text-3xl font-extrabold">{{ $totalBooks }}</p>
        </div>
        <p class="text-sm">Total number of books available.</p>
    </div>
    <div class="block rounded-3xl bg-orange-400 p-6 text-surface shadow-md flex flex-col justify-between h-40">
        <div>
            <h5 class="text-xl font-bold mb-2">Books on Loan</h5>
            <p class="text-3xl font-extrabold">{{ $booksOnLoan }}</p>
        </div>
        <p class="text-sm">Books currently borrowed by users.</p>
    </div>
    <div class="block rounded-3xl bg-orange-500 p-6 text-surface shadow-md flex flex-col justify-between h-40">
        <div>
            <h5 class="text-xl font-bold mb-2">New Users</h5>
            <p class="text-3xl font-extrabold">{{ $newUsersThisMonth }}</p>
        </div>
        <p class="text-sm">New members this month.</p>
    </div>
</div>

<div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-7">
    <div class="bg-white rounded-3xl shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h5 class="text-xl font-bold text-gray-900 pb-2">Monthly Borrow Trend</h5>
            <div class="flex items-center">
                <button id="dropdownDefaultButton" data-dropdown-toggle="borrowDropdown" class="text-sm font-medium text-gray-500 hover:text-gray-900 px-2.5 py-0.5 rounded-lg inline-flex items-center" type="button">
                    This Year
                    <svg class="w-2.5 h-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="borrowDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Last 7 days</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Last month</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">This year</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="borrow-trend-chart"></div>
    </div>

    <div class="bg-white rounded-3xl shadow-md p-6">
        <h5 class="text-xl font-bold text-gray-900 pb-2">Popular Book Categories</h5>
        <p class="text-base font-normal text-gray-500 mb-4">Distribution of loans by category.</p>
        <div id="popular-categories-chart"></div>
    </div>
</div>

<div class="mt-8 bg-white rounded-3xl shadow-md p-6">
    <h5 class="text-xl font-bold text-gray-900 pb-2">Top 5 Most Borrowed Books</h5>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Book Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Borrows</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($mostBorrowedBooks as $index => $book)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $book->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $book->total_borrows }} times</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

<script>
    // Data from controller
    const borrowMonths = {!! json_encode($months) !!};
    const borrowCounts = {!! json_encode($borrowCounts) !!};
    const categoriesData = {!! json_encode($categoriesData) !!};

    // Monthly Borrow Trend Chart (Area Chart)
    const borrowTrendChartOptions = {
        series: [{
            name: "Books Borrowed",
            data: borrowCounts
        }],
        chart: {
            height: 350,
            type: 'area',
            fontFamily: 'Inter, sans-serif',
            toolbar: { show: false }
        },
        tooltip: {
            enabled: true,
            x: { show: true },
            y: {
                formatter: function(val) { return val + " books" }
            },
        },
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth' },
        grid: { show: true },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        xaxis: { categories: borrowMonths },
        yaxis: {
            labels: {
                formatter: function (val) { return val.toFixed(0); }
            }
        }
    };
    if (document.querySelector("#borrow-trend-chart")) {
        new ApexCharts(document.querySelector("#borrow-trend-chart"), borrowTrendChartOptions).render();
    }

    // Popular Book Categories Chart (Donut Chart)
    const popularCategoriesChartOptions = {
        series: Object.values(categoriesData),
        labels: Object.keys(categoriesData),
        colors: ["#3b82f6", "#ef4444", "#f97316", "#10b981", "#6366f1"],
        chart: {
            type: 'donut',
            height: 350,
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) { return val.toFixed(0) + "%" }
        },
        legend: { position: 'bottom' },
        tooltip: {
            y: {
                formatter: function(val) { return val + " loans" }
            },
        },
        plotOptions: {
            pie: {
                donut: {
                    labels: {
                        show: true,
                        total: {
                            show: true,
                            label: 'Total',
                            formatter: function (w) { return w.globals.series.reduce((a, b) => a + b, 0); }
                        }
                    }
                }
            }
        }
    };
    if (document.querySelector("#popular-categories-chart")) {
        new ApexCharts(document.querySelector("#popular-categories-chart"), popularCategoriesChartOptions).render();
    }
</script>
@endpush