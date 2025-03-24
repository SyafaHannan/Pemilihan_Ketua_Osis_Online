@extends('template.sidebar')
@section('title','Admin | Data Akun')
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
                <div class="col-sm-6 d-flex">
                    <h3 class="mb-0">Forum Pemilihan </h3>
                    <btn class="btn btn-success  ModalTrigger ms-2" id="addButton" data-title="Tambah Akun User" data-bs-target='#modalForm' data-bs-toggle="modal" attr-href="{{url('/admin/form')}}"><i class='bi bi-plus-circle'></i> Tambah Forum</btn>
                    <btn class="btn btn-success ModalTrigger ms-2 d-none" id="addButtonAdmin" data-title="Tambah Akun Admin" data-bs-target='#modalForm' data-bs-toggle="modal" attr-href="{{url('/admin/form')}}"><i class='bi bi-plus-circle'></i> Tambah Admin</btn>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/dashboard">Admin</a></li>
                        <li class="breadcrumb-item"><a >Forum Pemilihan</a></li>
                        <!-- <li class="breadcrumb-item active" id="page-name" aria-current="page">
                            
                        </li> -->

                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div id="content1">
                <table class="table AkunTable table-bordered table-striped w-100">
                    <thead>
                        <tr>
                            <td class="text-center">No</td>
                            <td class="text-center">Judul</td>
                            <td class="text-center">Tanggal Mulai</td>
                            <td class="text-center">Tanggal Berakhir</td>
                            <td class="text-center">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($forum as $data)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$data->judul}}</td>
                            <td class="text-center">{{$data->tanggal_mulai}}</td>
                            <td class="text-center">{{$data->tanggal_akhir}}</td>
                            <td class="text-center">
                                <btn class="btn btn-primary  ModalTrigger" data-title="Edit Akun User" data-bs-target='#modalForm' data-bs-toggle="modal" attr-href="{{url('/admin/modif',$data->id_forum)}}"><i class='bi bi-pencil-square'></i></btn>
                                <form action="{{url('/admin/user/hapus',$data->id_forum)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data {{$data->username}} ?')"><i class='bi bi-trash'></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
<script>
    document.getElementById('toggleButton').addEventListener('click', function() {
        let content1 = document.getElementById('content1');
        let content2 = document.getElementById('content2');
        let button = document.getElementById('toggleButton');
        let addButton = document.getElementById('addButton');
        let page = document.getElementById('page-name');

        if (content1.classList.contains('d-none')) {
            content1.classList.remove('d-none');
            addButton.classList.remove('d-none');
            content2.classList.add('d-none');
            button.textContent = " Admin";
            page.textContent = "User";
        } else {
            content1.classList.add('d-none');
            addButton.classList.add('d-none');
            content2.classList.remove('d-none');
            button.textContent = " User";
            page.textContent = "Admin";

        }
    });
</script>


@endsection