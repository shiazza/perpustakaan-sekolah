@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Borrow Details</h3>
                </div>
                <div class="px-6 py-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Borrow Information -->
                        <div>
                            <h5 class="text-md font-medium text-gray-900 mb-4">Borrow Information</h5>
                            <dl class="space-y-3">
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Borrow ID:</dt>
                                    <dd class="text-sm text-gray-900">{{ $borrow->id_borrow }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">User:</dt>
                                    <dd class="text-sm text-gray-900">{{ $borrow->user->name }} ({{ $borrow->user->email }})</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Book:</dt>
                                    <dd class="text-sm text-gray-900">{{ $borrow->bookChild->bookParent->title }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">ISBN:</dt>
                                    <dd class="text-sm text-gray-900">{{ $borrow->bookChild->ISBN }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Start Date:</dt>
                                    <dd class="text-sm text-gray-900">{{ $borrow->start_date->format('Y-m-d') }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">End Date:</dt>
                                    <dd class="text-sm text-gray-900">{{ $borrow->end_date->format('Y-m-d') }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Status:</dt>
                                    <dd>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if($borrow->status === 'borrowed') bg-blue-100 text-blue-800
                                            @elseif($borrow->status === 'returned') bg-green-100 text-green-800
                                            @else bg-yellow-100 text-yellow-800 @endif">
                                            {{ ucfirst($borrow->status) }}
                                        </span>
                                    </dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Book Details -->
                        <div>
                            <h5 class="text-md font-medium text-gray-900 mb-4">Book Details</h5>
                            <dl class="space-y-3">
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Author:</dt>
                                    <dd class="text-sm text-gray-900">{{ $borrow->bookChild->bookParent->author ?? 'N/A' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Publisher:</dt>
                                    <dd class="text-sm text-gray-900">{{ $borrow->bookChild->bookParent->publisher ?? 'N/A' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Year:</dt>
                                    <dd class="text-sm text-gray-900">{{ $borrow->bookChild->bookParent->year ?? 'N/A' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Condition:</dt>
                                    <dd class="text-sm text-gray-900">{{ $borrow->bookChild->Condition }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Book Status:</dt>
                                    <dd>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if($borrow->bookChild->status === 'available') bg-green-100 text-green-800
                                            @elseif($borrow->bookChild->status === 'borrowed') bg-blue-100 text-blue-800
                                            @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($borrow->bookChild->status) }}
                                        </span>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    @if($borrow->status === 'borrowed')
                    {{-- <div class="mt-6">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" onclick="openReturnModal()">
                            Return Book
                        </button>
                    </div> --}}
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            @if($borrow->returnTransaction)
            <div class="bg-white shadow rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h5 class="text-lg font-medium text-gray-900">Return Information</h5>
                </div>
                <div class="px-6 py-4">
                    <dl class="space-y-3">
                        <div class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Return Date:</dt>
                            <dd class="text-sm text-gray-900">{{ $borrow->returnTransaction->date->format('Y-m-d H:i') }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Condition:</dt>
                            <dd class="text-sm text-gray-900">{{ ucfirst($borrow->returnTransaction->condition) }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Fine Value:</dt>
                            <dd class="text-sm text-gray-900">Rp {{ number_format($borrow->returnTransaction->fine_value, 0, ',', '.') }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Fine Status:</dt>
                            <dd>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($borrow->returnTransaction->fine_status === 'paid') bg-green-100 text-green-800
                                    @else bg-yellow-100 text-yellow-800 @endif">
                                    {{ ucfirst($borrow->returnTransaction->fine_status) }}
                                </span>
                            </dd>
                        </div>
                        @if($borrow->returnTransaction->description)
                        <div class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Description:</dt>
                            <dd class="text-sm text-gray-900">{{ $borrow->returnTransaction->description }}</dd>
                        </div>
                        @endif
                    </dl>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="mt-8">
        <a href="{{ route('borrow.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Back to List
        </a>
    </div>
</div>

<!-- Return Modal -->
<div id="returnModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Return Book</h3>
                        <form method="POST" action="{{ route('borrow.return', $borrow->id_borrow) }}" class="space-y-4">
                            @csrf
                            <div>
                                <label for="condition" class="block text-sm font-medium text-gray-700">Condition</label>
                                <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="condition" name="condition" required>
                                    <option value="good">Good</option>
                                    <option value="damaged">Damaged</option>
                                    <option value="lost">Lost</option>
                                </select>
                            </div>
                            <div>
                                <label for="fine_value" class="block text-sm font-medium text-gray-700">Fine Value</label>
                                <input type="number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="fine_value" name="fine_value" step="0.01" min="0" placeholder="0.00">
                            </div>
                            <div>
                                <label for="fine_status" class="block text-sm font-medium text-gray-700">Fine Status</label>
                                <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="fine_status" name="fine_status">
                                    <option value="paid">Paid</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="description" name="description" rows="3" placeholder="Optional notes about the return"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit" form="returnForm" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Return Book
                </button>
                <button type="button" onclick="closeReturnModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function openReturnModal() {
    document.getElementById('returnModal').classList.remove('hidden');
}

function closeReturnModal() {
    document.getElementById('returnModal').classList.add('hidden');
}
</script>
@endsection
