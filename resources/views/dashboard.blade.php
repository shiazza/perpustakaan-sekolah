@extends('layouts.app')

@section('content')

<!-- Header bar -->
<div class="flex items-center justify-between px-4 py-2 bg-white rounded-xl">

    <!-- Welcome -->
    <div>
        <h1 class="font-normal text-base">Welcome, Admin</h1>
        <h1 class="font-bold text-xl">Dashboard</h1>
    </div>

    <!-- Search bar -->
    <div class="flex items-center rounded-xl px-3 py-1 bg-white border-gray-200 border-t shadow-lg">
        <input type="search" placeholder="Search"
            class="bg-white px-2 text-sm focus:outline-none" />
        <img src="" alt="" class="w-4 h-4 ml-2" />
    </div>

    <!-- Profile -->
    <div class="flex items-center gap-2 px-3 py-1 bg-white shadow-md rounded-full">
        <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
        <img src="{{ asset('assets/profile.jpg') }}" alt="Profile"
            class="w-10 h-10 rounded-full object-cover">
    </div>

</div>

  <!-- Card -->
<div class="flex mt-8 justify-center space-x-7 items-center">
    <div class="block rounded-3xl bg-yellow-400 p-20 text-surface shadow-1 dark:bg-surface-dark dark:text-white"></div>
    <div class="block rounded-3xl bg-orange-300 p-20 text-surface shadow-1 dark:bg-surface-dark dark:text-white"></div>
    <div class="block rounded-3xl bg-orange-400 p-20 text-surface shadow-1 dark:bg-surface-dark dark:text-white"></div>
    <div class="block rounded-3xl bg-orange-500 p-20 text-surface shadow-1 dark:bg-surface-dark dark:text-white"></div>
</div>

  <!-- Diagram -->
<div class="flex rounded-3xl mt-8 bg-yellow p-20 shadow-2xl justify-between items-center">   
<div class="max-w-sm w-full bg-white rounded-lg shadow-sm dark:bg-white p-4 md:p-6">
  <div class="flex justify-between">
    <div>
      <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-black pb-2">32.4k</h5>
      <p class="text-base font-normal text-gray-500 dark:text-gray-400">Users this week</p>
    </div>
    <div
      class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
      12%
      <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
      </svg>
    </div>
  </div>
  <div id="area-chart"></div>
  <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
    <div class="flex justify-between items-center pt-5">
      <!-- Button -->
      <button
        id="dropdownDefaultButton"
        data-dropdown-toggle="lastDaysdropdown"
        data-dropdown-placement="bottom"
        class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
        type="button">
        Last 7 days
        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
      </button>
      <!-- Dropdown menu -->
      <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
            </li>
          </ul>
      </div>
      <a
        href="#"
        class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
        Users Report
        <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
      </a>
    </div>
  </div>
</div>

</div>



@endsection
