<header class="bg-gray-800 text-white">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-2xl font-bold">My E-Commerce</a>
        <nav>
            <ul class="flex space-x-6">
                <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
                <li><a href="{{ url('/products') }}" class="hover:underline">Shop</a></li>
                <li><a href="{{ url('/about') }}" class="hover:underline">About Us</a></li>
                <li><a href="{{ url('/contact') }}" class="hover:underline">Contact</a></li>
            </ul>
        </nav>
        <div class="flex items-center space-x-4">
            <a href="{{ url('/cart') }}" class="hover:underline">
                Cart ({{ $cartItems->count() }}) - ${{ number_format($cartTotal, 2) }}
            </a>

            @if(Auth::check())
                <div class="relative group">
                    <button class="hover:underline focus:outline-none">{{ Auth::user()->name }}</button>
                    <div class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded shadow-lg hidden group-hover:block">
                        <a href="{{ url('/profile') }}" class="block px-4 py-2 hover:bg-gray-200">Profile</a>
                        <form action="{{ url('/logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-200">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ url('/login') }}" class="hover:underline">Login</a>
            @endif
        </div>
    </div>
</header>
