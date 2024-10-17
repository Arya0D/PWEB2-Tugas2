<?php
session_start();
$role = $_GET['role'];
$_SESSION['role'] = $role;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<style>
    * {
        font-family: monospace;
    }

    body,
    html {
        height: 100%;
    }
</style>

<body>
    <!-- Header -->
    <header style="position:fixed;width:100%;" class="p-2">
        <nav class="d-flex justify-content-between p-2 align-items-center">
            <h1 class="logo">PWEB2</h1>
            <div>
                <h4>mode <?= $role ?></h4>
            </div>
        </nav>
    </header>

    <!-- Header -->

    <main class="d-flex flex-column align-items-center justify-content-center" style="height:100%;">
        <div class="text-center">
            <h1>MENU</h1>
            <p>Pilih menu di bawah ini:</p>
        </div>
        <div class="d-flex flex-column align-items-center gap-3">
            <a href="menu?menu=mahasiswa"><button style="width: 400px;height: 60px;">DATA MAHASISWA</button></a>
            <a href="menu?menu=perbaikanNilai"><button style="width: 400px;height: 60px;">DATA PERBAIKAN
                    NILAI</button></a>
        </div>
    </main>
</body>

</html>