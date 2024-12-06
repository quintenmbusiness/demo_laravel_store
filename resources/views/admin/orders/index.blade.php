@extends('admin.layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">My Orders</h1>
        <table class="table-auto w-full bg-white shadow-md rounded">
            <thead class="bg-gray-200">
            <tr>
                <th>ID</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td class="flex space-x-2">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">View</a>
                        <a href="{{ route('admin.orders.edit', $order->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('admin.orders.delete', $order->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
