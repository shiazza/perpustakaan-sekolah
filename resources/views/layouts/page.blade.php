<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $title ?? 'Landing page' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite('resources/css/app.css')
</head>

<body class="flex">

    {{-- Si Navbar --}}

    @include('components.navbar')

    {{-- Konten utama --}}

<div class="h-screen w-screen bg-[url('/assets/image3.jpg')] bg-cover bg-center brightness-60 relative font-sans">
    <div class="items-center h-full bg-black/30 px-10">
        <div class=" max-w-[1400px] mx-auto flex justify-start pl-10">

        </div>
    </div>
</div>
    <div class="">
        @yield('contents')
         <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </div>

</body>
</html>