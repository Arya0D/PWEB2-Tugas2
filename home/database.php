<?php
class Koneksi
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "pwebTugas2";

    public function connect()
    {
        $db = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        return $db;
    }

}

abstract class Operasi extends Koneksi
{
    public function selectAll()
    {
        $query = "select * from mahasiswa";
        return $this->connect()->query($query);
    }
    public function selectByName($nama)
    {
        $query = "select * from mahasiswa where nama_mhs='$nama'";
        return $this->connect()->query($query);
    }

    abstract function tblMahasiswa();
}


class Mahasiswa extends Operasi
{
    public function tblMahasiswa()
    {
        if (isset($_GET['nama'])) {
            $data = $this->selectByName($_GET['nama']);
            $i = $data->fetch_assoc();
        }
        ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Cari Data Mahasiswa
        </button>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <form action="search.php" method="POST">
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
            if (isset($_GET['nama'])) {
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
}

class Dosen extends Operasi
{
    public function tblMahasiswa()
    {
        $data = $this->selectAll();
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
}



