<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $title ?? 'App' }}</title>
  @vite('resources/css/app.css')
</head>
<body class="flex bg-gray-100 min-h-screen">
  @include('components.sidebar')

  <main class="flex-1 p-6">
    @yield('content')
  </main>
</body>
</html>
