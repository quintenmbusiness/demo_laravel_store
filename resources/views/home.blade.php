@extends('layouts.store')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Welcome to My E-Commerce</h1>
        <p class="text-gray-700">Find the best products at unbeatable prices.</p>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($products as $product)
                <div class="bg-white p-4 shadow rounded">
                    <h2 class="text-xl font-bold">{{ $product->name }}</h2>
                    <p class="text-gray-600">${{ $product->price }}</p>
                    <a href="{{ url('/products/' . $product->id) }}" class="text-blue-500 hover:underline">View Product</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
