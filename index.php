<?php
session_start();

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas2</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: monospace;
    }

    html,
    body {
        height: 100%;
    }

    .header-container {
        padding: 1rem;
        position: fixed;

    }

    .main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 12px;
        align-items: center;
        height: 200px;
        width: 100%;
        /* background: #f3f3f3; */
    }



    .btn-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 2rem;
    }

    .butn {
        width: 200px;
        height: 85px;
        font-size: 2rem;
    }
</style>

<body>
    <!-- Header -->
    <header class="header-container">
        <h1 class="logo">PWEB2</h1>
    </header>
    <!-- Header -->

    <!-- content -->
    <main class="d-flex justify-content-center align-items-center" style="height:100%">
        <div class="main">
            <h1>Selamat datang di tugas PWEB2 saya</h1>
            <p>Pilih Mode User:</p>
            <div class="btn-container">
                <a href="./home/?role=dosen"><button class="butn ">DOSEN</button></a>
                <a href="./home/?role=mahasiswa"><button class="butn ">MAHASISWA</button></a>
            </div>
        </div>
    </main>
    <!-- content -->


    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>