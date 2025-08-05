<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $title ?? 'App' }}</title>
  @vite('resources/css/app.css')
</head>

<body class="flex">

    {{-- Sidebar tetap --}}
    @include('components.sidebar')

    {{-- Konten utama --}}
    <div class="ml-74 w-full min-h-screen bg-white p-6">
        @yield('content')
         <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </div>

</body>
</html>
