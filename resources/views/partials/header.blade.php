<header class="bg-gray-800 text-white">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-2xl font-bold">My E-Commerce</a>
        <nav>
            <ul class="flex space-x-6">
                <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
                <li><a href="{{ url('/shop') }}" class="hover:underline">Shop</a></li>
                <li><a href="{{ url('/about') }}" class="hover:underline">About Us</a></li>
                <li><a href="{{ url('/contact') }}" class="hover:underline">Contact</a></li>
            </ul>
        </nav>
        <div class="flex items-center space-x-4">
            <a href="{{ url('/cart') }}" class="hover:underline">Cart</a>
            <a href="{{ url('/login') }}" class="hover:underline">Login</a>
        </div>
    </div>
</header>
