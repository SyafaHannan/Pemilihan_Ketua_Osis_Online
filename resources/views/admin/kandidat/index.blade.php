@extends('template.sidebar')
@section('title','Admin | Dashboard')
@section('content')

<body>
    <div class="container mt-4">
        <h2>Data Calon</h2>
        <a href="{{ route('kandidat.tambah') }}" class="btn btn-primary mb-3">Tambah Kandidat</a>

        <table id="kandidatTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Calon Ketua</th>
                    <th>Calon Wakil Ketua</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kandidats as $index => $kandidat)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kandidat->calon_ketua }}</td>
                    <td>{{ $kandidat->calon_wakil_ketua }}</td>
                    <td>{{ $kandidat->visi }}</td>
                    <td>{{ $kandidat->misi }}</td>
                    <td><img src="{{ asset($kandidat->foto) }}" width="100"></td>
                    <td>
                        <a href="{{ route('kandidat.edit', $kandidat->id_kandidat) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kandidat.hapus', $kandidat->id_kandidat) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#kandidatTable').DataTable();
        });
    </script>
</body>

@endsection