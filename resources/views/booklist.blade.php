<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white p-6 font-sans">

    <div class="flex justify-between items-center mb-6">
        <input type="text" placeholder="Search" 
            class="w-2/3 border-2 border-black rounded-xl px-4 py-2 text-black focus:outline-none">
    <button onclick="window.location='{{ route('addbook') }}'" class="bg-orange-600 text-white px-6 py-2 rounded-xl hover:bg-orange-700">
        Add Book
    </button>

    </div>

 
<div class="grid grid-cols-3 gap-6 mb-6">
    <div class="bg-gradient-to-r from-orange-400 to-orange-500 text-white rounded-lg p-6 flex justify-between items-center shadow-md 
                transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:brightness-110">
        <span class="text-lg font-semibold">Total Book</span>
        <span class="text-xl font-bold">25</span>
    </div>

    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg p-6 flex justify-between items-center shadow-md 
                transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:brightness-110">
        <span class="text-lg font-semibold">Total Book</span>
        <span class="text-xl font-bold">25</span>
    </div>

    <div class="bg-gradient-to-r from-orange-600 to-red-600 text-white rounded-lg p-6 flex justify-between items-center shadow-md 
                transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:brightness-110">
        <span class="text-lg font-semibold">Total Book</span>
        <span class="text-xl font-bold">25</span>
    </div>
</div>


    <div class="bg-orange-500 rounded-xl shadow-md overflow-hidden">
        <table class="w-full text-white text-left border-collapse">
            <thead>
                <tr class="bg-orange-600">
                    <th class="py-3 px-4 border">No</th>
                    <th class="py-3 px-4 border">Name</th>
                    <th class="py-3 px-4 border">Author</th>
                    <th class="py-3 px-4 border">Stok</th>
                    <th class="py-3 px-4 border">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border text-black">1</td>
                    <td class="py-2 px-4 border text-black">1945 mdpl</td>
                    <td class="py-2 px-4 border text-black">Parel</td>
                    <td class="py-2 px-4 border text-black">3</td> 
                    <td class="py-2 px-4 border text-black">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
