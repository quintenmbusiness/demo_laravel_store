@extends('admin.layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Users</h1>
        <div class="mb-4">
            <button onclick="openCreateModal()" class="bg-blue-500 text-white px-4 py-2 rounded">Create New User</button>
        </div>

        <table class="table-auto w-full bg-white shadow-md rounded">
            <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Orders</th>
                <th class="px-4 py-2">Total Spend</th>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $user->id }}</td>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">{{ $user->orders()->count() }}</td>
                    <td class="px-4 py-2">${{ number_format($user->orders()->sum('total'), 2) }}</td>
                    <td class="px-4 py-2">{{ $user->roles->pluck('name')->join(', ') }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <button onclick="openEditModal({{ $user->id }})" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</button>
                        <button onclick="openChangePasswordModal({{ $user->id }})" class="bg-purple-500 text-white px-4 py-2 rounded">Change Password</button>
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
            <h2 id="modalTitle" class="text-xl font-bold mb-4">Create User</h2>
            <form id="createEditForm" action="{{ route('admin.users.create') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="POST" id="formMethod">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="w-full border px-4 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full border px-4 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-gray-700">Role</label>
                    <select id="role" name="role[]" class="w-full border px-4 py-2 rounded" multiple>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div id="changePasswordModal" class="hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg w-1/2">
            <h2 class="text-xl font-bold mb-4">Change Password</h2>
            <form id="changePasswordForm" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">New Password</label>
                    <input type="password" id="password" name="password" class="w-full border px-4 py-2 rounded" required>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeChangePasswordModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openCreateModal() {
            document.getElementById('modalTitle').innerText = 'Create User';
            document.getElementById('createEditForm').action = '{{ route('admin.users.create') }}';
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('createEditModal').classList.remove('hidden');
        }

        function openEditModal(id) {
            document.getElementById('modalTitle').innerText = 'Edit User';
            document.getElementById('createEditForm').action = `/admin/users/update/${id}`;
            document.getElementById('formMethod').value = 'PUT';
            document.getElementById('createEditModal').classList.remove('hidden');
        }

        function openChangePasswordModal(id) {
            document.getElementById('changePasswordForm').action = `/admin/users/change-password/${id}`;
            document.getElementById('changePasswordModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('createEditModal').classList.add('hidden');
        }

        function closeChangePasswordModal() {
            document.getElementById('changePasswordModal').classList.add('hidden');
        }
    </script>
@endsection
