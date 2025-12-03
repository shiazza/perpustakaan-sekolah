@extends('layouts.app')

@section('title', 'Returns Audit Log')

@section('content')
<div class="w-full px-4 sm:px-6 lg:px-8 mt-6">
    <div class="bg-white shadow-lg rounded-xl p-6">
        <h3 class="text-xl font-semibold mb-4">Returns Audit Log</h3>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Date</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">User</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Action</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Return ID</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Borrow ID</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Book Details</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Condition</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Fine</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">IP Address</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($auditLogs as $log)
                    @php
                        $actionColor = $log->action === 'approve'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-blue-100 text-blue-700';
                    @endphp

                    <tr>
                        {{-- DATE --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->created_at->format('Y-m-d H:i:s') }}
                        </td>

                        {{-- USER --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->user?->name ?? 'System' }}
                        </td>

                        {{-- ACTION --}}
                        <td class="px-4 py-2">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $actionColor }}">
                                {{ ucfirst($log->action) }}
                            </span>
                        </td>

                        {{-- RETURN ID --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->model_id }}
                        </td>

                        {{-- BORROW ID --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->new_values['borrow_id'] ?? 'N/A' }}
                        </td>

                        {{-- BOOK DETAILS --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            @if(isset($log->new_values['bc_id']))
                                Book Child #{{ $log->new_values['bc_id'] }}
                            @else
                                N/A
                            @endif
                        </td>

                        {{-- CONDITION --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->new_values['condition'] ?? 'N/A' }}
                        </td>

                        {{-- FINE --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            @if(isset($log->new_values['fine_value']))
                                ${{ $log->new_values['fine_value'] }}
                                <span class="text-gray-500 text-xs">
                                    ({{ $log->new_values['fine_status'] ?? 'N/A' }})
                                </span>
                            @else
                                N/A
                            @endif
                        </td>

                        {{-- IP ADDRESS --}}
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $log->ip_address ?: 'N/A' }}
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="9" class="px-4 py-6 text-center text-gray-500">
                            No return audit logs found
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
