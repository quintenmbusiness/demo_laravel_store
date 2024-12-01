@extends('layouts.store')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Product Image -->
            <div>
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-auto rounded shadow">
            </div>

            <!-- Product Details -->
            <div>
                <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                <p class="text-2xl font-bold text-green-600 mb-6">${{ number_format($product->price, 2) }}</p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <div class="flex items-center space-x-4 mb-6">
                        <label for="quantity" class="block text-gray-700 font-medium">Quantity</label>
                        <input type="number" id="quantity" name="quantity" value="1" class="w-16 border rounded px-2 py-1 text-center" min="1">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                        Add to Cart
                    </button>
                </form>

                <div class="mt-6">
                    <p><strong>Category:</strong> {{ $product->category->name ?? 'Uncategorized' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
