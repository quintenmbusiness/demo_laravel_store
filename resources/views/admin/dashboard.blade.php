@extends('admin.layouts.admin')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold text-gray-700">Total Users</h2>
            <p class="text-3xl font-bold text-gray-800">{{ $stats['users'] }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold text-gray-700">Total Orders</h2>
            <p class="text-3xl font-bold text-gray-800">{{ $stats['orders'] }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold text-gray-700">Total Products</h2>
            <p class="text-3xl font-bold text-gray-800">{{ $stats['products'] }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold text-gray-700">Revenue</h2>
            <p class="text-3xl font-bold text-gray-800">${{ number_format($stats['revenue'], 2) }}</p>
        </div>
    </div>
@endsection
