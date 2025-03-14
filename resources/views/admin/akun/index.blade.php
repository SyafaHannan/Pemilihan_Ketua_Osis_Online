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
                <div class="col-sm-6 d-flex">
                    <h3 class="mb-0">Data Akun </h3>
                    <button id="toggleButton" class="btn btn-primary ms-2 bi bi-arrow-repeat"> Admin</button>
                    <btn class="btn btn-success  ModalTrigger ms-2" id="addButton" data-title="Tambah Akun User" data-bs-target='#modalForm' data-bs-toggle="modal" attr-href="{{url('/admin/form')}}"><i class='bi bi-plus-circle'></i> Tambah Akun</btn>
                    <btn class="btn btn-success ModalTrigger ms-2 d-none" id="addButtonAdmin" data-title="Tambah Akun Admin" data-bs-target='#modalForm' data-bs-toggle="modal" attr-href="{{url('/admin/form')}}"><i class='bi bi-plus-circle'></i> Tambah Admin</btn>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/dashboard">Admin</a></li>
                        <li class="breadcrumb-item"><a href="/nidhacenter">Data Akun</a></li>
                        <li class="breadcrumb-item active" id="page-name" aria-current="page">
                            User
                        </li>

                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div id="content1">
                <table class="table AkunTable table-bordered table-hovered table-striped w-100">
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
                                <btn class="btn btn-primary  ModalTrigger" data-title="Edit Akun User" data-bs-target='#modalForm' data-bs-toggle="modal" attr-href="{{url('/admin/modif',$data->id_user)}}"><i class='bi bi-pencil-square'></i></btn>
                                <form action="{{url('/admin/user/hapus',$data->id_user)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data {{$data->username}} ?')"><i class='bi bi-trash'></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="content2" class="d-none">
                <table class="table AkunTable table-bordered table-hovered table-striped w-100">
                    <thead>
                        <tr>
                            <td class="text-center col-md-4">No</td>
                            <td class="text-center">Username</td>
                            <td class="text-center">Email</td>
                            <td class="text-center">Role</td>
                            @if(Auth::guard('admin')->user()->role == 'Super Admin')
                            <td class="text-center">Aksi</td>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admin as $data)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$data->username}}</td>
                            <td class="text-center">{{$data->email}}</td>
                            <td class="text-center">{{$data->role}}</td>
                            @if(Auth::guard('admin')->user()->role == 'Super Admin')
                            <td class="text-center">
                                <btn class="btn btn-primary  ModalTrigger" data-title="Edit Akun Admin" data-bs-target='#modalForm' data-bs-toggle="modal" attr-href="{{url('/admin/modif-admin',$data->id_admin)}}"><i class='bi bi-pencil-square'></i></btn>
                                <form action="{{url('/admin/admin/hapus',$data->id_admin)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data {{$data->username}} ?')"><i class='bi bi-trash'></i></button>
                                </form>
                            </td>
                            @endif
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