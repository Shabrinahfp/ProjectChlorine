<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            background: #343a40;
            color: white;
        }
        .sidebar a {
            color: white;
            padding: 10px;
            display: block;
            text-decoration: none;
            border-radius: 5px;
        }
        .sidebar a.active,
        .sidebar a:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 sidebar p-3">
            <h5 class="mb-4">Admin Panel</h5>

            <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">👤 Profile</a>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">📊 Dashboard</a>
            <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">📂 Category</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-sm btn-light mt-4">Logout</button>
            </form>
        </div>

        <div class="col-md-10 p-4">
            <h3 class="mb-4">@yield('title')</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
