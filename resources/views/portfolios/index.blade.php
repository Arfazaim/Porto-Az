<!-- resources/views/portfolios/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <h1 class="mb-4">Daftar Portfolio</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('portfolios.create') }}" class="btn btn-primary mb-3">+ Tambah Project</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Link</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolios as $portfolio)
                <tr>
                    <td>{{ $portfolio->title }}</td>
                    <td>{{ Str::limit($portfolio->description, 50) }}</td>
                    <td>
                        @if($portfolio->link)
                            <a href="{{ $portfolio->link }}" target="_blank">Lihat</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if($portfolio->image)
                            <img src="{{ asset('storage/' . $portfolio->image) }}" width="100">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('portfolios.edit', $portfolio) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('portfolios.show', $portfolio) }}" class="btn btn-sm btn-info">Detail</a>

                        <form action="{{ route('portfolios.destroy', $portfolio) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin mau hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if($portfolios->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">Belum ada data portfolio.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
</body>
</html>
