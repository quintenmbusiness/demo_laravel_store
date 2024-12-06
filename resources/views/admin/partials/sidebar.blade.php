<aside class="w-64 bg-gray-800 text-white h-full">
    <div class="p-6">
        <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold text-white">Admin Panel</a>
    </div>
    <nav class="mt-6">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">
                    <span class="material-icons-outlined">dashboard</span>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">
                    <span class="material-icons-outlined">shopping_bag</span>
                    <span class="ml-4">Categories</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.products') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">
                    <span class="material-icons-outlined">shopping_bag</span>
                    <span class="ml-4">Products</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.orders.index') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">
                    <span class="material-icons-outlined">receipt</span>
                    <span class="ml-4">Orders</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">
                    <span class="material-icons-outlined">people</span>
                    <span class="ml-4">Users</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
