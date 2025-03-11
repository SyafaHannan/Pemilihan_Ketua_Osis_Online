<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kandidat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Edit Kandidat</h2>
    <form action="{{ route('kandidat.update', $kandidat->id_kandidat) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Calon Ketua</label>
            <input type="text" name="calon_ketua" class="form-control" value="{{ $kandidat->calon_ketua }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Calon Wakil Ketua</label>
            <input type="text" name="calon_wakil_ketua" class="form-control" value="{{ $kandidat->calon_wakil_ketua }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Visi</label>
            <textarea name="visi" class="form-control" required>{{ $kandidat->visi }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Misi</label>
            <textarea name="misi" class="form-control" required>{{ $kandidat->misi }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control">
            @if($kandidat->foto)
                <img src="{{ asset('storage/' . $kandidat->foto) }}" width="100" class="mt-2" alt="Foto Kandidat">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('kandidat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
