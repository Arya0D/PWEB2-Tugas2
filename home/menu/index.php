<?php
session_start();
include "../database.php";

$menu = $_GET['menu'];
$role = $_SESSION['role'];

if ($_SESSION['role'] == "dosen") {
    $test = new Dosen;
} else if ($_SESSION['role'] == "mahasiswa") {
    $test = new Mahasiswa;
}
?>
<style>
    * {
        font-family: monospace;
    }

    body,
    html {
        height: 100%;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

</head>
<style>

</style>

<body>
    <!-- Header -->
    <header class="p-2">
        <nav class="d-flex justify-content-between p-2 align-items-center">
            <h1 class="logo">PWEB2</h1>
            <div>
                <h4>mode <?= $role ?></h4>
            </div>
        </nav>
    </header>
    <!-- Header -->



    <!-- Main -->
    <main style="height:100%;">

        <table border="1" class="table m-auto text-center" style="width:80%;">
            <?php
            if ($menu == "mahasiswa") {
                $test->tblMahasiswa();
            } else if ($menu == "perbaikanNilai") {
                $test->tblNilaiPerbaikan();
            }
            ?>
        </table>
    </main>
    <!-- Main -->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>