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
            <table class="table AkunTable table-hovered table-striped">
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
    <div class="modal fade" id="modalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdroplabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>

    </div>

</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#example').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        console.log(jQuery.fn.jquery);
        console.log(typeof $.fn.DataTable !== 'undefined' ? 'DataTables Loaded' : 'DataTables NOT Loaded');
        console.log(typeof $.fn.DataTable);

    });
</script>

@endsection