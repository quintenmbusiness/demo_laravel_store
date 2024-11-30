<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{'Admin Dashboard'}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

</head>
<body class="flex h-screen bg-gray-100">

<!-- Sidebar -->
@include('admin.partials.sidebar')

<!-- Main Content -->
<div class="flex flex-col w-full">
    <!-- Header -->
    @include('admin.partials.header')

    <!-- Page Content -->
    <main class="flex-grow p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('admin.partials.footer')
</div>

</body>
</html>
