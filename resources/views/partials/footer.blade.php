<footer class="bg-gray-800 text-gray-400">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div>
                <h4 class="text-white font-bold mb-4">About Us</h4>
                <p>We are a leading online store offering the best products at great prices.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
                    <li><a href="{{ url('/products') }}" class="hover:underline">Shop</a></li>
                    <li><a href="{{ url('/about') }}" class="hover:underline">About Us</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:underline">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4">Customer Service</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/faq') }}" class="hover:underline">FAQs</a></li>
                    <li><a href="{{ url('/returns') }}" class="hover:underline">Returns</a></li>
                    <li><a href="{{ url('/shipping') }}" class="hover:underline">Shipping</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4">Contact Us</h4>
                <p>Email: support@ecommerce.com</p>
                <p>Phone: +123-456-7890</p>
            </div>
        </div>
        <div class="text-center mt-8">
            <p>&copy; {{ date('Y') }} My E-Commerce. All rights reserved.</p>
        </div>
    </div>
</footer>
