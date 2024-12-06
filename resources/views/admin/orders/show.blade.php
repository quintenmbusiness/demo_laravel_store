@extends('admin.layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">
            @if(isset($edit))
                Edit Order #{{ $order->id }}
            @else
                View Order #{{ $order->id }}
            @endif
        </h1>

        <div class="mb-4">
            <strong>Total:</strong> ${{ number_format($order->total, 2) }}<br>
            <strong>Status:</strong> {{ ucfirst($order->status) }}<br>
        </div>

        @if(isset($edit))
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="mt-6">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="status" class="block text-gray-700">Status</label>
                    <select id="status" name="status" class="w-full border px-4 py-2 rounded" required>
                        @foreach($statuses as $status)
                            <option value="{{ $status }}" @if($order->status === $status) selected @endif>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="total" class="block text-gray-700">Total</label>
                    <input type="number" id="total" name="total" value="{{ $order->total }}" class="w-full border px-4 py-2 rounded" step="0.01" required>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('orders.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        @else
            <h2 class="text-xl font-bold mt-6">Order Items</h2>
            <table class="table-auto w-full bg-white shadow-md rounded">
                <thead class="bg-gray-200">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-6">
                <a href="{{ route('admin.orders.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back to Orders</a>
            </div>
        @endif
    </div>
@endsection
