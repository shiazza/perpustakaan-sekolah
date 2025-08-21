<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Book</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center min-h-screen flex items-center justify-center" style="background-image: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f');">
  <!-- Card Form -->
  <div class="bg-white/90 backdrop-blur-sm shadow-lg rounded-2xl w-full max-w-lg p-8">
    <h1 class="text-2xl font-bold text-center mb-6">Add Book</h1>
    
    <form class="space-y-4">
      <!-- Title -->
      <div>
        <label class="block text-gray-700 mb-1 font-medium">Title</label>
        <input type="text" placeholder="Title.." class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
      </div>

      <!-- Writers -->
      <div>
        <label class="block text-gray-700 mb-1 font-medium">Writers</label>
        <input type="text" placeholder="Writers.." class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
      </div>

      <!-- Sinopsis -->
      <div>
        <label class="block text-gray-700 mb-1 font-medium">Sinopsis</label>
        <textarea placeholder="Sinopsis.." rows="3" class="w-full border border-gray-300 rounded-2xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400"></textarea>
      </div>

      <!-- Image -->
      <div>
        <label class="block text-gray-700 mb-1 font-medium">Image</label>
        <input type="file" class="w-full border border-gray-300 rounded-full px-4 py-2 file:mr-3 file:px-3 file:py-1 file:rounded-full file:border-0 file:bg-orange-500 file:text-white hover:file:bg-orange-600">
      </div>

      <!-- Publisher -->
      <div>
        <label class="block text-gray-700 mb-1 font-medium">Publisher</label>
        <input type="text" placeholder="Publisher.." class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
      </div>

      <!-- Add Button -->
      <div class="text-center">
        <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition">
          Add
        </button>
      </div>
    </form>

    <!-- Back Button -->
    <div class="mt-6">
      <a href="{{route ('booklist') }}" class="inline-block text-orange-500 border border-orange-500 px-4 py-2 rounded-full hover:bg-orange-500 hover:text-white transition">
        Back
      </a>
    </div>
  </div>

</body>
</html>
