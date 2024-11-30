@extends('admin.layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Products</h1>
        <div class="mb-4">
            <button onclick="openCreateModal()" class="bg-blue-500 text-white px-4 py-2 rounded">Create New Product</button>
        </div>

        <table class="table-auto w-full bg-white shadow-md rounded">
            <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Stock</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $user->id }}</td>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">${{ $user->price }}</td>
                    <td class="px-4 py-2">{{ $user->stock }}</td>
                    <td class="px-4 py-2">{{ $user->category_id }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <button onclick="openEditModal({{ $user->id }})" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</button>
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Create/Edit Modal -->
    <div id="createEditModal" class="hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg w-1/2">
            <h2 id="modalTitle" class="text-xl font-bold mb-4">Create Product</h2>
            <form id="createEditForm" action="{{ route('admin.users.create') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="POST" id="formMethod">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="w-full border px-4 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700">Price</label>
                    <input type="number" id="price" name="price" class="w-full border px-4 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="stock" class="block text-gray-700">Stock</label>
                    <input type="number" id="stock" name="stock" class="w-full border px-4 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700">category_id</label>
                    <input type="number" id="category_id" name="category_id" class="w-full border px-4 py-2 rounded" required>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openCreateModal() {
            document.getElementById('modalTitle').innerText = 'Create Product';
            document.getElementById('createEditForm').action = '{{ route('admin.users.create') }}';
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('createEditModal').classList.remove('hidden');
        }

        function openEditModal(id) {
            document.getElementById('modalTitle').innerText = 'Edit Product';
            document.getElementById('createEditForm').action = `/admin/users/update/${id}`;
            document.getElementById('formMethod').value = 'PUT';
            document.getElementById('createEditModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('createEditModal').classList.add('hidden');
        }
    </script>
@endsection
