<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Hannan | Daftar</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE 4 | Register Page">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"><!--end::Primary Meta Tags--><!--begin::Fonts-->
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../../adminlte/dist/css/adminlte.css"><!--end::Required Plugin(AdminLTE)-->
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            place-items: center;
        }
    </style>
</head> <!--end::Head--> <!--begin::Body-->

<body class="register-page bg-body-secondary">
    <div class="register-box">
        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">Mendaftar sebagai anggota baru</p>
                <form enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3"> <input type="text" class="form-control" id="Username" placeholder="Full Name">
                        <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="number" class="form-control" id="nomorTelpon" placeholder="Nomor Telpon">
                        <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                    </div>
                    <div class="input-group mb-3">
                        <span></span>
                        <select class="form-select" id="Kelas">
                            <option selected disabled>Kelas</option>
                            <option value="X PENGEMBANGAN PERANGKAT LUNAK DAN GIM A">X PPLG A</option>
                            <option value="X PENGEMBANGAN PERANGKAT LUNAK DAN GIM B">X PPLG B</option>
                            <option value="XI PENGEMBANGAN PERANGKAT LUNAK DAN GIM A">XI PPLG A</option>
                            <option value="XI PENGEMBANGAN PERANGKAT LUNAK DAN GIM B">XI PPLG B</option>
                            <option value="XII PENGEMBANGAN PERANGKAT LUNAK DAN GIM A">XII PPLG A</option>
                            <option value="XII PENGEMBANGAN PERANGKAT LUNAK DAN GIM B">XII PPLG B</option>
                            <option value="XII TEKNIK KENDARAAN RINGAN A">XII TKR A</option>
                            <option value="XII TEKNIK KENDARAAN RINGAN B">XII TKR B</option>
                            <option value="XII TEKNIK PERMESINAN B">XII TP B</option>
                        </select>
                    </div>

                    @if(Auth::check() && Auth::user()->role == 'Admin')
                    <div class="input-group mb-3">
                        <span></span>
                        <select class="form-select" id="Role">
                            <option selected disabled>Role</option>
                            <option value="Pustakawan">Pustakawan</option>
                            <option value="Admin">Admin</option>
                            <option value="Anggota">Anggota</option>
                        </select>
                    </div>
                    @endif
                    <div class="input-group mb-3"> <input type="email" class="form-control" id="Email" placeholder="Email">
                        <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="password" class="form-control" id="Password" placeholder="Password">
                        <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                    </div>
                    <p class="text-center"><b>Tanda Pengenal</b>
                        <br>
                        <small>(ktp,sim,atau kartu identitas lainnya)</small>
                    </p>
                    <div class="input-group mb-3">
                        <input type="file" name="identitas" id="Identitas" class="form-control">
                        <div class="input-group-text">
                            <span class="bi bi-folder"></span>
                        </div>
                    </div>
                    <!--begin::Row-->
                    <div class="row">
                        <div class="float-sm-end">
                            <div class="d-grid gap-2"> <button type="submit" class="btn btn-primary btnMendaftar">Sign In</button> </div>
                        </div> <!-- /.col -->
                    </div> <!--end::Row-->
                </form>
                <br>
                @if(!Auth::check())
                <p class="text-center">- OR -</p>
                <p class="text-center mb-0"> <a href="/auth" class="text-center">
                        I already have a membership
                    </a> </p>
                @else
                <p class="text-center mb-0"> <a href="/admin/dashboard" class="text-center">
                        Kembali ke dashboard
                    </a> </p>

                @endif
            </div> <!-- /.register-card-body -->
        </div>
    </div> <!-- /.register-box --> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.3/axios.min.js" integrity="sha512-zJXKBryKlsiDaWcWQ9fuvy50SG03/Qc5SqfLXxHmk9XiUUbcD9lXYjHDBxLFOuZSU6ULXaJ69bd7blSMEgxXNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../adminlte/dist/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script type="module">
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
        $('.btnMendaftar').on('click', function(simpan) {
            simpan.preventDefault();
            simpan.stopImmediatePropagation();
            let formData = new FormData();
            formData.append('username', $('#Username').val());
            formData.append('email', $('#Email').val());
            formData.append('kelas', $('#Kelas').val());
            formData.append('nomor_telpon', $('#nomorTelpon').val());
            formData.append('password', $('#Password').val());
            formData.append('identitas', document.getElementById('Identitas').files[0]); // Ambil file yang di-upload
            formData.append('_token', "{{csrf_token()}}");

            if ($('#Username').val() !== '' && $('#Email').val() !== '' && $('#Password').val() !== '' && $('#Identitas').val() !== '') {
                axios.post("{{url('/mendaftar')}}", formData).then(function(response) {
                    if (response.data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Akun Berhasil  Dibuat'
                        }).then(() => {

                            window.location.href = response.data.redirect_url;
                        });
                    }
                }).catch(function(error) {
                    if (error.response && error.response.data.errors) {
                        let errorMessages = '';
                        let errors = error.response.data.errors;

                        // Loop melalui error dan gabungkan pesan ke dalam satu string
                        for (let key in errors) {
                            errorMessages += errors[key][0] + '\n'; // Ambil pesan pertama dari setiap error
                        }

                        // Tampilkan pesan error di SweetAlert
                        Swal.fire({
                            title: 'Error!',
                            text: errorMessages,
                            icon: 'error',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan saat menghubungi server.',
                        });
                    }
                });
            } else {
                Swal.fire({
                    title: 'Ooopps gagal',
                    text: 'Form harus terisi semua',
                    icon: 'error'
                });
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!--end::Script-->
</body><!--end::Body-->

</html>