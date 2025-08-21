<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $title ?? 'Landing page' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite('resources/css/app.css')
</head>

<body class="flex-safe">

    {{-- Si Navbar --}}

    @include('components.navbar')

    @yield('contents')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <!-- ===== HERO (GAMBAR + GRADIENT DI BAWAH) ===== -->
<div class="relative w-full h-screen">

  <!-- background image (full) -->
  <div class="absolute inset-0 bg-[url('/assets/image3.jpg')] bg-cover bg-center"></div>

  <!-- overlay gelap tipis agar teks terbaca -->
  <div class="absolute inset-0 bg-black/35"></div>

  <!-- gradasi oranye di bagian bawah hero -->
  <div class="absolute left-0 right-0 -bottom-30 h-[300px] z-20 pointer-events-none
              bg-gradient-to-t from-yellow-600/90 via-yellow-600/60 to-transparent">
  </div>

  <!-- konten hero (di atas semua overlay) -->
  <div class="relative z-30 flex items-center justify-center h-screen text-center px-4">
    <div>
      <h1 class="text-white text-6xl font-bold">T-BOOK</h1>
      <p class="text-white mt-4 text-lg">A digital library application schools.</p>
    </div>
  </div>
</div>

<!-- ===== SECTION ORANYE SOLID (di bawah hero) ===== -->
<div class="w-full h-100 bg-yellow-700"></div>


</body>
</html>