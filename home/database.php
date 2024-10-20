<?php
class Koneksi
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "pwebTugas2";

    public function __construct()
    {
        $db = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        return $db;
    }

}

abstract class Operasi extends Koneksi
{
    public function selectAll($table)
    {
        $query = "select * from $table";
        return parent::__construct()->query($query);
    }

    public function selectAllJoin()
    {
        $query = "select * from mahasiswa join nilai_perbaikan on mahasiswa.mahasiswa_id=nilai_perbaikan.mahasiswa_id";
        return parent::__construct()->query($query);
    }

    public function selectByNamaJoin($nama)
    {
        $query = "select * from mahasiswa join nilai_perbaikan on mahasiswa.mahasiswa_id=nilai_perbaikan.mahasiswa_id where nama_mhs='$nama'";
        return parent::__construct()->query($query);
    }
    public function selectByName($table, $nama)
    {
        $query = "select * from $table where nama_mhs='$nama'";
        return parent::__construct()->query($query);
    }

    abstract function tblMahasiswa();
    abstract function tblNilaiPerbaikan();
}


class Mahasiswa extends Operasi
{
    public function tblMahasiswa()
    {
        if (isset($_GET['nama'])) {
            $data = $this->selectByName("mahasiswa", $_GET['nama']);
            $i = $data->fetch_assoc();
        }
        ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Cari Data Mahasiswa
        </button>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <form action="search.php?menu=mahasiswa" method="POST">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cari Mahasiswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <input type="text" class="w-100" name="nama">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <table class="table w-80">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No.Telp</th>
            </tr>
            <?php
            if (isset($_GET['nama']) && $data->num_rows != 0) {
                ?>
                <tr>
                    <td>
                        <?= $i['nim'] ?>
                    </td>
                    <td>
                        <?= $i['nama_mhs'] ?>
                    </td>
                    <td>
                        <?= $i['email'] ?>
                    </td>
                    <td>
                        <?= $i['no_telp'] ?>
                    </td>
                </tr>
                <?php
            } else {
                ?>
                <tr>
                    <td colspan="4">CARI DATA/ DATA TIDAK DITEMUKAN </td>
                </tr><?php
            }
            ?>
        </table><?php
    }

    public function tblNilaiPerbaikan()
    {
        if (isset($_GET['nama'])) {
            $data = $this->selectByNamaJoin($_GET['nama']);
            $i = $data->fetch_assoc();
        }
        ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Cari Data Mahasiswa
        </button>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <form action="search.php?menu=perbaikanNilai" method="POST">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cari Mahasiswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <input type="text" class="w-100" name="nama">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <table class="table w-80">
            <tr>
                <th>Tanggal Perbaikan</th>
                <th>Keterangan</th>
                <th>Nama Mahasiswa</th>
                <th>Matkul</th>
                <th>Semester</th>
                <th>Nilai</th>
                <th>Dosen</th>
            </tr>
            <?php
            if (isset($_GET['nama']) && $data->num_rows != 0) {
                ?>
                <tr>
                    <td>
                        <?= $i['tgl_perbaikan'] ?>
                    </td>
                    <td>
                        <?= $i['keterangan'] ?>
                    </td>
                    <td>
                        <?= $i['nama_mhs'] ?>
                    </td>
                    <td>
                        <?= $i['matkul'] ?>
                    </td>
                    <td>
                        <?= $i['semester'] ?>
                    </td>
                    <td>
                        <?= $i['nilai'] ?>
                    </td>
                    <td>
                        <?= $i['dosen'] ?>
                    </td>
                </tr>
                <?php
            } else {
                ?>
                <tr>
                    <td colspan="4">CARI DATA/ DATA TIDAK DITEMUKAN </td>
                </tr><?php
            }
            ?>
        </table><?php
    }
}

class Dosen extends Operasi
{
    public function tblMahasiswa()
    {
        $data = $this->selectAll("mahasiswa");
        ?>
        <table class="table w-80">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No.Telp</th>
            </tr>
            <?php
            foreach ($data as $i) {
                ?>
                <tr>
                    <td>
                        <?= $i['nim'] ?>
                    </td>
                    <td>
                        <?= $i['nama_mhs'] ?>
                    </td>
                    <td>
                        <?= $i['email'] ?>
                    </td>
                    <td>
                        <?= $i['no_telp'] ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }

    public function tblNilaiPerbaikan()
    {
        $data = $this->selectAllJoin();
        ?>
        <table class="table w-80">
            <tr>
                <th>Tanggal Perbaikan</th>
                <th>Keterangan</th>
                <th>Nama Mahasiswa</th>
                <th>Matkul</th>
                <th>Semester</th>
                <th>Nilai</th>
                <th>Dosen</th>
            </tr>
            <?php
            foreach ($data as $i) {
                ?>
                <tr>
                    <td>
                        <?= $i['tgl_perbaikan'] ?>
                    </td>
                    <td>
                        <?= $i['keterangan'] ?>
                    </td>
                    <td>
                        <?= $i['nama_mhs'] ?>
                    </td>
                    <td>
                        <?= $i['matkul'] ?>
                    </td>
                    <td>
                        <?= $i['semester'] ?>
                    </td>
                    <td>
                        <?= $i['nilai'] ?>
                    </td>
                    <td>
                        <?= $i['dosen'] ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php

    }
}



