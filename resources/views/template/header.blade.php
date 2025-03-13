<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<style>
    body {
        margin: 0;
        padding: 0;
    }

    .header {
        background-color: #FFF100;
        padding: 15px;
        display: flex;
        /* justify-content: space-between; */
        /* align-items: center; */
        font-family: Arial, sans-serif;
    }

    .user-info {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    /* .user-details {
        color: black;
    } */

    .role {
        font-size: 14px;
        color: gray;
    }

    .logout {
        display: flex;
        flex-direction: column; /* Menjadikan icon di atas tulisan */
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .logout-link {
        color: gray;
        text-decoration: none;
        /* font-weight: bold; */
    }
    
    .logout i {
        font-size: 20px; /* Ukuran ikon */
    }

    .content {
        text-align: center;
        font-family: Arial, sans-serif;
    }

</style>

<body>
    <!-- header menu -->
    <div class="header">
        <div class="user-info">
            <div class="user-detail">
                <strong>Nama</strong>
                <br>
                <span class="role">Kelas</span>
            </div>
            <div class="logout">
                <i class="bi bi-box-arrow-right"></i>
                <a href="{{ route('logout') }}" class="logout-link">Log out</a>
            </div>
        </div>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>

</html>
