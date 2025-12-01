@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">User Details</h1>
            <div>
                <a href="{{ route('user.edit', $user) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Edit
                </a>
                <a href="{{ route('user.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">{{ $user->name }}</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">User Information</h3>
                        <dl class="space-y-3">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">ID</dt>
                                <dd class="text-sm text-gray-900">{{ $user->id }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Name</dt>
                                <dd class="text-sm text-gray-900">{{ $user->name }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                <dd class="text-sm text-gray-900">{{ $user->email }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Role</dt>
                                <dd class="text-sm text-gray-900">{{ $user->roleData->role ?? 'N/A' }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Gender</dt>
                                <dd class="text-sm text-gray-900">{{ ucfirst($user->gender ?? 'N/A') }}</dd>
                            </div>
                        </dl>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Additional Information</h3>
                        <dl class="space-y-3">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">NISN</dt>
                                <dd class="text-sm text-gray-900">{{ $user->NISN ?? 'N/A' }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Phone Number</dt>
                                <dd class="text-sm text-gray-900">{{ $user->number ?? 'N/A' }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">NIK</dt>
                                <dd class="text-sm text-gray-900">{{ $user->NIK ?? 'N/A' }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Address</dt>
                                <dd class="text-sm text-gray-900">{{ $user->address ?? 'N/A' }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Photo</dt>
                                <dd class="text-sm text-gray-900">
                                    @if($user->photo)
                                        <img src="{{ asset('storage/' . $user->photo) }}" alt="User Photo" class="w-32 h-32 object-cover rounded">
                                    @else
                                        No photo available
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
