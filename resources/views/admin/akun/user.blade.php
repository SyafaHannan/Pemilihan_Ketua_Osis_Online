@extends('template.sidebar')
@section('title','Admin | Dashboard')
@section('content')
<main class="app-main">
    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil',
            text: '{{session("success")}}',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false
        })
    </script>
    @elseif(session('error'))
    <script>
        Swal.fire({
            title: 'Gagal',
            text: '{{session("error")}}',
            icon: 'error',
            timer: 3000,
            showConfirmButton: false
        })
    </script>

    @endif

    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Akun </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/dashboard">Admin</a></li>
                        <li class="breadcrumb-item"><a href="/nidhacenter">Data Akun</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            User
                        </li>

                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <table class="table AkunTable table-hovered table-striped w-100">
                <thead>
                    <tr>
                        <td class="text-center">No</td>
                        <td class="text-center">Nama</td>
                        <td class="text-center">Kelas</td>
                        <td class="text-center">Tanggal Lahir</td>
                        <td class="text-center">Nomor Induk</td>
                        <td class="text-center">Keterangan</td>
                        <td class="text-center">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $data)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$data->username}}</td>
                        <td class="text-center">{{$data->kelas}}</td>
                        <td class="text-center">{{$data->tanggal_lahir}}</td>
                        <td class="text-center">{{$data->no_induk}}</td>
                        <td class="text-center">{{$data->status}}</td>
                        <td class="text-center">
                            <a href="/nidhacenter/event/{{$data->id}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</main>
<script>
    $(document).ready(function() {
        $('.AkunTable').DataTable();
        console.log(jQuery.fn.jquery);
        console.log(typeof $.fn.DataTable !== 'undefined' ? 'DataTables Loaded' : 'DataTables NOT Loaded');
        console.log(typeof $.fn.DataTable);

    });
</script>

@endsection