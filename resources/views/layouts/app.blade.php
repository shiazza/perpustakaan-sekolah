<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $title ?? ' Dashboard' }}</title>
  @vite('resources/css/app.css')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="flex">

    {{-- Sidebar --}}
    @include('components.sidebar')

    {{-- Konten utama --}}
    <div class="ml-74 w-full min-h-screen bg-white p-6">
        @yield('content')
         <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </div>

</body>
</html>