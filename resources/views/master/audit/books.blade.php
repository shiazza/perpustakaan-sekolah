@extends('layouts.app')

@section('title', 'Books Audit Log')

@section('content')
<div class="w-full px-4 sm:px-6 lg:px-8 mt-6">
    <div class="bg-white shadow-lg rounded-xl p-6">
        <h3 class="text-xl font-semibold mb-4">Books Audit Log</h3>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Date</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">User</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Action</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Model</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Changes</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">IP Address</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($auditLogs as $log)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->created_at->format('Y-m-d H:i:s') }}
                        </td>

                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->user ? $log->user->name : 'System' }}
                        </td>

                        <td class="px-4 py-2">
                            @php
                                $badgeColor = match($log->action) {
                                    'create' => 'bg-green-100 text-green-700',
                                    'update' => 'bg-yellow-100 text-yellow-700',
                                    'delete' => 'bg-red-100 text-red-700',
                                    default => 'bg-gray-100 text-gray-700'
                                };
                            @endphp
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $badgeColor }}">
                                {{ ucfirst($log->action) }}
                            </span>
                        </td>

                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ class_basename($log->model_type) }} #{{ $log->model_id }}
                        </td>

                        <td class="px-4 py-2">
                            @if($log->old_values || $log->new_values)
                                <button 
                                    onclick="showChanges({{ $log->id }})"
                                    class="px-3 py-1 bg-blue-600 text-white text-xs rounded-lg hover:bg-blue-700 transition">
                                    View Changes
                                </button>
                            @else
                                <span class="text-gray-500 text-sm">No changes recorded</span>
                            @endif
                        </td>

                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->ip_address ?: 'N/A' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                            No audit logs found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $auditLogs->links() }}
        </div>
    </div>
</div>


{{-- Modal Tailwind --}}
<div id="changesModal"
    class="fixed inset-0 bg-black bg-opacity-40 items-center justify-center hidden z-50">
    <div class="bg-white w-11/12 md:w-2/3 lg:w-1/2 rounded-xl shadow-xl p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Audit Log Changes</h2>
            <button class="text-gray-500 hover:text-gray-700" onclick="closeModal()">
                ✖
            </button>
        </div>

        <div id="changesContent" class="text-sm text-gray-700">
            <!-- Filled by JS -->
        </div>
    </div>
</div>

<script>
function showChanges(id) {
    // Simpan contohdata untuk demo
    document.getElementById('changesContent').innerHTML = `
        <p class="text-gray-600">Changes data would be displayed here.</p>
    `;

    document.getElementById('changesModal').classList.remove('hidden');
    document.getElementById('changesModal').classList.add('flex');
}

function closeModal() {
    document.getElementById('changesModal').classList.add('hidden');
    document.getElementById('changesModal').classList.remove('flex');
}
</script>

@endsection
