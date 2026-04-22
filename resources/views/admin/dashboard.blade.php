@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Charts and Tables Row -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- Revenue Chart -->
    <x-card title="Revenue Overview" description="Monthly revenue breakdown" class="lg:col-span-2">
        <div class="h-64 flex items-end justify-between gap-2 px-4">
            @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $month)
                <div class="flex flex-col items-center flex-1">
                    <div class="w-full bg-indigo-500 rounded-t-md hover:bg-indigo-600 transition-colors" style="height: {{ rand(30, 100) }}%"></div>
                    <span class="text-xs text-gray-500 mt-2">{{ $month }}</span>
                </div>
            @endforeach
        </div>
    </x-card>

    <!-- Traffic Sources -->
    <x-card title="Traffic Sources" description="Where your visitors come from">
        <div class="space-y-4">
            @foreach([
                ['name' => 'Direct', 'percent' => 45, 'color' => 'indigo'],
                ['name' => 'Organic Search', 'percent' => 30, 'color' => 'emerald'],
                ['name' => 'Referral', 'percent' => 15, 'color' => 'amber'],
                ['name' => 'Social', 'percent' => 10, 'color' => 'rose'],
            ] as $source)
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-sm font-medium text-gray-700">{{ $source['name'] }}</span>
                        <span class="text-sm text-gray-500">{{ $source['percent'] }}%</span>
                    </div>
                    <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-{{ $source['color'] }}-500 rounded-full transition-all duration-500" style="width: {{ $source['percent'] }}%"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</div>

<!-- Recent Orders Table -->
<x-card title="Recent Orders" description="Latest customer orders">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-6 py-3">Order ID</th>
                    <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-6 py-3">Customer</th>
                    <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-6 py-3">Product</th>
                    <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-6 py-3">Amount</th>
                    <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-6 py-3">Status</th>
                    <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-6 py-3">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach([
                    ['id' => '#ORD-001', 'customer' => 'John Doe', 'product' => 'Premium Plan', 'amount' => '$299', 'status' => 'Completed', 'color' => 'emerald'],
                    ['id' => '#ORD-002', 'customer' => 'Jane Smith', 'product' => 'Basic Plan', 'amount' => '$99', 'status' => 'Pending', 'color' => 'amber'],
                    ['id' => '#ORD-003', 'customer' => 'Mike Johnson', 'product' => 'Enterprise', 'amount' => '$999', 'status' => 'Completed', 'color' => 'emerald'],
                    ['id' => '#ORD-004', 'customer' => 'Sarah Williams', 'product' => 'Premium Plan', 'amount' => '$299', 'status' => 'Processing', 'color' => 'indigo'],
                    ['id' => '#ORD-005', 'customer' => 'Tom Brown', 'product' => 'Basic Plan', 'amount' => '$99', 'status' => 'Failed', 'color' => 'red'],
                ] as $order)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order['id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $order['customer'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $order['product'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order['amount'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-badge color="{{ $order['color'] }}">{{ $order['status'] }}</x-badge>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Apr 15, 2026</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-card>
@endsection
