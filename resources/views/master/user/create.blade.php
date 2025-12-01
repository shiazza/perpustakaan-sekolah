@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Create User</h1>
            <a href="{{ route('user.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to List
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Add New User(s)</h2>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <button type="button" id="add-user-btn" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Add Another User
                    </button>
                </div>

                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" id="user-form">
                    @csrf

                    <div id="users-container">
                        <div class="user-entry bg-gray-50 p-4 rounded mb-4">
                            <h3 class="text-lg font-medium mb-2">User 1</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="name_0" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" id="name_0" name="users[0][name]" value="{{ old('users.0.name') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                                    @error('users.0.name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email_0" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email_0" name="users[0][email]" value="{{ old('users.0.email') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                                    @error('users.0.email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="password_0" class="block text-sm font-medium text-gray-700">Password</label>
                                    <input type="password" id="password_0" name="users[0][password]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                                    @error('users.0.password')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="id_role_0" class="block text-sm font-medium text-gray-700">Role</label>
                                    <select id="id_role_0" name="users[0][id_role]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id_role }}" {{ old('users.0.id_role') == $role->id_role ? 'selected' : '' }}>
                                            {{ $role->role }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('users.0.id_role')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="NISN_0" class="block text-sm font-medium text-gray-700">NISN</label>
                                    <input type="number" id="NISN_0" name="users[0][NISN]" value="{{ old('users.0.NISN') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    @error('users.0.NISN')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="number_0" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                    <input type="text" id="number_0" name="users[0][number]" value="{{ old('users.0.number') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    @error('users.0.number')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="NIK_0" class="block text-sm font-medium text-gray-700">NIK</label>
                                    <input type="number" id="NIK_0" name="users[0][NIK]" value="{{ old('users.0.NIK') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    @error('users.0.NIK')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="gender_0" class="block text-sm font-medium text-gray-700">Gender</label>
                                    <select id="gender_0" name="users[0][gender]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('users.0.gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('users.0.gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('users.0.gender')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="address_0" class="block text-sm font-medium text-gray-700">Address</label>
                                    <textarea id="address_0" name="users[0][address]" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('users.0.address') }}</textarea>
                                    @error('users.0.address')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="photo_0" class="block text-sm font-medium text-gray-700">Photo</label>
                                    <input type="file" id="photo_0" name="users[0][photo]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    @error('users.0.photo')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 cursor-pointer rounded">
                            Create User(s)
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let userCount = 1;

    document.getElementById('add-user-btn').addEventListener('click', function() {
        const container = document.getElementById('users-container');
        const userEntry = document.createElement('div');
        userEntry.className = 'user-entry bg-gray-50 p-4 rounded mb-4';
        userEntry.innerHTML = `
            <h3 class="text-lg font-medium mb-2">User ${userCount + 1}</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name_${userCount}" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name_${userCount}" name="users[${userCount}][name]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div>
                    <label for="email_${userCount}" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email_${userCount}" name="users[${userCount}][email]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div>
                    <label for="password_${userCount}" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password_${userCount}" name="users[${userCount}][password]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div>
                    <label for="role_${userCount}" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role_${userCount}" name="users[${userCount}][role]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach($roles as $role)
                        <option value="{{ $role->id_role }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="NISN_${userCount}" class="block text-sm font-medium text-gray-700">NISN</label>
                    <input type="number" id="NISN_${userCount}" name="users[${userCount}][NISN]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="number_${userCount}" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" id="number_${userCount}" name="users[${userCount}][number]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="NIK_${userCount}" class="block text-sm font-medium text-gray-700">NIK</label>
                    <input type="number" id="NIK_${userCount}" name="users[${userCount}][NIK]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="gender_${userCount}" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select id="gender_${userCount}" name="users[${userCount}][gender]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label for="address_${userCount}" class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea id="address_${userCount}" name="users[${userCount}][address]" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                </div>

                <div class="md:col-span-2">
                    <label for="photo_${userCount}" class="block text-sm font-medium text-gray-700">Photo</label>
                    <input type="file" id="photo_${userCount}" name="users[${userCount}][photo]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
        `;
        container.appendChild(userEntry);
        userCount++;
    });
});
</script>
@endsection
