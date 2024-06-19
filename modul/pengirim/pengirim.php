<?php

if (isset($_POST['bsimpan'])) {
    //simpan baru
    if (@$_GET['hal'] == "edit") {
        $ubah = mysqli_query($koneksi, "UPDATE tbl_pengirim 
        SET nama_pengirim = '$_POST[nama_pengirim]',
        alamat = '$_POST[alamat]',
        no_telp = '$_POST[no_telp]',
        email = '$_POST[email]' 
        where id_pengirim = '$_GET[id]'");

        if ($ubah) {
            echo "<script>
        alert('Ubah Data Sukses');
        document.location='?halaman=pengirim';
        </script>";
        } else {
            echo "<script>
        alert('Ubah Data Gagal!');
        document.location='?halaman=pengirim';
        </script>";
        }
    } else {
        //simpan data
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_pengirim 
    VALUES ('',
    '$_POST[nama_pengirim]',
    '$_POST[alamat]',
    '$_POST[no_telp]',
    '$_POST[email]' 
    ) ");

        if ($simpan) {
            echo "<script>
        alert('Simpan Data Sukses');
        document.location='?halaman=pengirim';
        </script>";
        } else {
            echo "<script>
        alert('Simpan Data Gagal');
        document.location='?halaman=pengirim';
        </script>";
        }
    }
}

//Klik tombol edit / hapus
if (isset($_GET['hal'])) {

    if ($_GET['hal'] == "edit") {
        //tampil data
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengirim where id_pengirim='$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            //tampung data
            $vnama_pengirim = $data['nama_pengirim'];
            $valamat = $data['alamat'];
            $vno_telp = $data['no_telp'];
            $vemail = $data['email'];
        }
    } else {
        $hapus = mysqli_query($koneksi, "DELETE FROM tbl_pengirim where id_pengirim='$_GET[id]'");
        if ($hapus) {
            echo "<script>
        alert('Hapus Data Sukses');
        document.location='?halaman=pengirim';
        </script>";
        }
    }
}

?>

<div class="card mt-4">
    <div class="card-header bg-info text-white">Form Data Pengirim/Penerima</div>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group mb-2">
                <label for="nama_pengirim">Nama Pengirim</label>
                <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" value="<?= @$vnama_pengirim ?>">
            </div>
            <div class="form-group mb-2">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= @$valamat ?>">
            </div>
            <div class="form-group mb-2">
                <label for="no_telp">Nomor Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= @$vno_telp ?>">
            </div>
            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= @$vemail ?>">
            </div>
            <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
            <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
        </form>

    </div>
</div>

<div class="card mt-4">
    <h5 class="card-header bg-info text-white">Data Pengirim/Penerima</h5>
    <div class="card-body">
        <table class="table table-bordered table-hovered table-striped">
            <tr>
                <th>No</th>
                <th>Nama Pengirim</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            <?php

            $tampil = mysqli_query($koneksi, "SELECT * from tbl_pengirim order by
            id_pengirim desc");
            $no = 1;
            while ($data = mysqli_fetch_array($tampil)) :

            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_pengirim'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['no_telp'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td>
                        <a href="?halaman=pengirim&hal=edit&id=<?= $data['id_pengirim'] ?>" class="btn btn-success">Edit</a>
                        <a href="?halaman=pengirim&hal=hapus&id=<?= $data['id_pengirim'] ?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>