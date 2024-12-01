@extends('layouts.store')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Shop Products</h1>

        @if ($products->isEmpty())
            <p class="text-gray-600">No products available at the moment.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white p-4 shadow-md rounded">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded mb-4">
                        <h2 class="text-lg font-bold">{{ $product->name }}</h2>
                        <p class="text-gray-600 mb-4">${{ number_format($product->price, 2) }}</p>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="flex items-center space-x-2 mb-4">
                                <input type="hidden" name="product_id" value="{{ $product->id }}" class="w-16 border rounded text-center px-2 py-1" min="1">
                                <input type="number" name="quantity" value="1" class="w-16 border rounded text-center px-2 py-1" min="1">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                    Add to Cart
                                </button>
                            </div>
                        </form>

                        @if ($cartItems->contains('product_id', $product->id))
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $cartItems->where('product_id', $product->id)->first()->product_id }}">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm">In Cart: {{ $cartItems->where('product_id', $product->id)->first()->quantity }}</p>
                                    <button type="submit" name="quantity" value="0" class="text-red-500 hover:underline">
                                        Remove
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
