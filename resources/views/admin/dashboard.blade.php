@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <x-stat-card
        title="Total Revenue"
        value="$45,231"
        change="+12.5%"
        :change-positive="true"
        icon-bg-class="bg-indigo-100"
        icon='<svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
    />

    <x-stat-card
        title="Active Users"
        value="2,456"
        change="+8.2%"
        :change-positive="true"
        icon-bg-class="bg-emerald-100"
        icon='<svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>'
    />

    <x-stat-card
        title="New Orders"
        value="345"
        change="+3.1%"
        :change-positive="true"
        icon-bg-class="bg-amber-100"
        icon='<svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>'
    />

    <x-stat-card
        title="Conversion Rate"
        value="3.24%"
        change="-0.5%"
        :change-positive="false"
        icon-bg-class="bg-rose-100"
        icon='<svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>'
    />
</div>

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