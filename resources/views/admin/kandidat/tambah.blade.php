<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kandidat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Tambah Kandidat</h2>
    <form action="{{ route('kandidat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Calon Ketua</label>
            <input type="text" name="calon_ketua" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Calon Wakil Ketua</label>
            <input type="text" name="calon_wakil_ketua" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Visi</label>
            <textarea name="visi" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Misi</label>
            <textarea name="misi" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
</body>
</html>
