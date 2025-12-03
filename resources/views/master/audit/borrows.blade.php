@extends('layouts.app')

@section('title', 'Borrows Audit Log')

@section('content')
<div class="w-full px-4 sm:px-6 lg:px-8 mt-6">
    <div class="bg-white shadow-lg rounded-xl p-6">
        <h3 class="text-xl font-semibold mb-4">Borrows Audit Log</h3>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Date</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">User</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Action</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Borrow ID</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Book Child</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Status</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Start Date</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">End Date</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">IP Address</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($auditLogs as $log)
                    <tr>
                        {{-- DATE --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->created_at->format('Y-m-d H:i:s') }}
                        </td>

                        {{-- USER --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->user ? $log->user->name : 'System' }}
                        </td>

                        {{-- ACTION --}}
                        @php
                            $actionColor = match($log->action) {
                                'approve' => 'bg-green-100 text-green-700',
                                'cancel'  => 'bg-red-100 text-red-700',
                                default   => 'bg-blue-100 text-blue-700',
                            };
                        @endphp
                        <td class="px-4 py-2">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $actionColor }}">
                                {{ ucfirst($log->action) }}
                            </span>
                        </td>

                        {{-- BORROW ID --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->model_id }}
                        </td>

                        {{-- BOOK CHILD --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->new_values['bc_id'] ?? 'N/A' }}
                        </td>

                        {{-- STATUS --}}
                        @php
                            $status = $log->new_values['status'] ?? 'N/A';
                            $statusColor = match($status) {
                                'waiting'  => 'bg-yellow-100 text-yellow-700',
                                'borrowed' => 'bg-blue-100 text-blue-700',
                                default    => 'bg-gray-200 text-gray-700',
                            };
                        @endphp
                        <td class="px-4 py-2">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusColor }}">
                                {{ ucfirst($status) }}
                            </span>
                        </td>

                        {{-- START DATE --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->new_values['start_date'] ?? 'N/A' }}
                        </td>

                        {{-- END DATE --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->new_values['end_date'] ?? 'N/A' }}
                        </td>

                        {{-- IP --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->ip_address ?: 'N/A' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-4 py-6 text-center text-gray-500">
                            No borrow audit logs found
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
@endsection
