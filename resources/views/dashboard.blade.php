<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Dashboard</h2>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <div class="alert alert-success">
        Halo, <strong>{{ Auth::user()->name }}</strong>! Selamat datang di dashboard ARFAZAIM.
    </div>

    <a href="{{ route('portfolio.index') }}" class="btn btn-primary">Kelola Portfolio</a>
</div>
</body>
</html>
