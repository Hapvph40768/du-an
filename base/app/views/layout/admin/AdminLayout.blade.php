<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ BASE_URL . 'public/css/dashboard.css' }}">
    
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        @include('layout.admin.blocks.aside')
        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Header -->
            @include('layout.admin.blocks.header')
            <!-- Page Content -->
            <div class="content-body">
                @yield('content-main')
            </div>
        </main>
    </div>
</body>
</html>
