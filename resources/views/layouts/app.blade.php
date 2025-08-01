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
    </div>

</body>
</html>
