<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $title ?? 'Landing page' }}</title>
  @vite('resources/css/app.css')
</head>

<body class="flex">

    {{-- Si Navbar --}}

    @include('components.navbar')

    {{-- Konten utama --}}
    <div class="flex-safe w-full min-h-screen bg-gray-900 p-6">
        @yield('contents')
         <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </div>

</body>
</html>