<!-- resources/views/portfolios/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <h1 class="mb-4">Edit Project</h1>

    <a href="{{ route('portfolios.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul Project</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $portfolio->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $portfolio->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link (opsional)</label>
            <input type="url" name="link" class="form-control" value="{{ old('link', $portfolio->link) }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload Gambar (opsional)</label>
            <input type="file" name="image" class="form-control">
            @if ($portfolio->image)
                <p class="mt-2">Gambar saat ini:</p>
                <img src="{{ asset('storage/' . $portfolio->image) }}" width="150">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
