<!-- resources/views/portfolios/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <h1 class="mb-4">{{ $portfolio->title }}</h1>

    <a href="{{ route('portfolios.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    @if ($portfolio->image)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $portfolio->image) }}" class="img-fluid" alt="gambar">
        </div>
    @endif

    <div class="mb-3">
        <strong>Deskripsi:</strong>
        <p>{{ $portfolio->description }}</p>
    </div>

    <div class="mb-3">
        <strong>Link:</strong>
        @if($portfolio->link)
            <a href="{{ $portfolio->link }}" target="_blank">{{ $portfolio->link }}</a>
        @else
            <span>-</span>
        @endif
    </div>
</div>
</body>
</html>
