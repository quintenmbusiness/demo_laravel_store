@extends('layouts.store')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Checkout</h1>

        <div class="bg-white p-6 shadow-md rounded mb-6">
            <h2 class="text-2xl font-bold mb-4">Order Summary</h2>
            <table class="w-full bg-white shadow-md rounded">
                <thead class="bg-gray-200">
                <tr>
                    <th class="text-left px-4 py-2">Product</th>
                    <th class="text-left px-4 py-2">Quantity</th>
                    <th class="text-left px-4 py-2">Price</th>
                    <th class="text-left px-4 py-2">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cartItems as $item)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $item->product->name }}</td>
                        <td class="px-4 py-2">{{ $item->quantity }}</td>
                        <td class="px-4 py-2">${{ number_format($item->product->price, 2) }}</td>
                        <td class="px-4 py-2">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-4 text-right">
                <p class="text-xl font-bold">Total: ${{ number_format($cartTotal, 2) }}</p>
            </div>
        </div>

        <form action="{{ route('checkout.process') }}" method="POST" class="bg-white p-6 shadow-md rounded">
            @csrf
            <h2 class="text-2xl font-bold mb-4">Shipping & Payment</h2>

            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-medium">Shipping Address</label>
                <input type="text" id="address" name="address" class="w-full border px-4 py-2 rounded focus:ring focus:ring-blue-200" required>
            </div>

            <div class="mb-4">
                <label for="payment_method" class="block text-gray-700 font-medium">Payment Method</label>
                <select id="payment_method" name="payment_method" class="w-full border px-4 py-2 rounded focus:ring focus:ring-blue-200" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="bank_transfer">Bank Transfer</option>
                </select>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Place Order</button>
        </form>
    </div>
@endsection
