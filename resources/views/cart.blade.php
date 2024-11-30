@extends('layouts.store')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

        @if ($cartItems->isEmpty())
            <p class="text-gray-600">Your cart is currently empty.</p>
            <a href="{{ route('products') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                Continue Shopping
            </a>
        @else
            <table class="w-full bg-white shadow-md rounded">
                <thead class="bg-gray-200">
                <tr>
                    <th class="text-left px-4 py-2">Product</th>
                    <th class="text-left px-4 py-2">Price</th>
                    <th class="text-left px-4 py-2">Quantity</th>
                    <th class="text-left px-4 py-2">Total</th>
                    <th class="text-left px-4 py-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cartItems as $item)
                    <tr class="border-b">
                        <td class="px-4 py-2 flex items-center space-x-4">
                            <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-16 h-16 rounded object-cover">
                            <span>{{ $item->product->name }}</span>
                        </td>
                        <td class="px-4 py-2">${{ number_format($item->product->price, 2) }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-16 border rounded text-center px-2 py-1" min="1">
                                <button type="submit" class="text-blue-500 hover:underline ml-2">Update</button>
                            </form>
                        </td>
                        <td class="px-4 py-2">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-6 flex justify-between items-center">
                <p class="text-xl font-bold">Total: ${{ number_format($cartTotal, 2) }}</p>
                <a href="{{ route('checkout') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                    Proceed to Checkout
                </a>
            </div>
        @endif
    </div>
@endsection
