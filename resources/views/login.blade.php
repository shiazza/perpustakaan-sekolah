<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen w-screen bg-[url('/assets/image.png')] bg-cover bg-center relative font-sans">

            <div class="flex items-center h-full bg-black/30 px-10">
            <div class="w-full max-w-sm h-[550px] ml-20 bg-white/10 backdrop-blur-lg p-10 rounded-xl text-white shadow-lg">
                <h2 class="text-2xl font-bold mb-2 text-center">Silahkan Login</h2>
                <p class="text-sm mb-10 text-gray-200 text-center">Masukkan email dan sandi untuk melanjutkan</p>

                <form>

                <label class="block mb-2 text-sm font-semibold">Nama pengguna</label>
                <div class="relative mb-4">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">@</span>
                    <input type="text" placeholder="contohnama" class="pl-8 pr-3 py-2 text-black w-full rounded-full bg-white placeholder-gray-500 placeholder-opacity-70 focus:outline-none focus:ring-2 focus:ring-orange-400 ">
                </div>

            <label class="block mb-2 text-sm font-semibold">Password</label>
            <div class="relative mb-4">
            <input id="passwordInput" type="password" placeholder="12345678" class="pl-4 pr-10 py-2 text-black w-full rounded-full bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-400">
            
            <svg onclick="togglePassword()" xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-gray-500"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            </div>

                <button type="submit" class="w-full py-2 mt-10 mb-8 bg-gradient-to-r from-orange-400 to-yellow-500 text-white rounded-full font-semibold hover:opacity-90 transition">Login</button>
                </form>
            </div>
        </div>

        <div class="absolute bottom-[50px] right-[40px] flex items-center space-x-5">
            <img src="/assets/logo.png" alt="Logo" class="w-10 h-10" />
            <span class="text-white font-medium text-xl">T-Book</span>
        </div>


        <script>
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
        </script>
</body>
</html>
