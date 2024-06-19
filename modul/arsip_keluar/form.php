<?php

//function upload file
include "config/function.php";

//Klik tombol edit / hapus
if (isset($_GET['hal'])) {

    if ($_GET['hal'] == "edit") {
        //tampil data
        $tampil = mysqli_query($koneksi, "SELECT 
        tbl_keluar.*, 
        tbl_departemen.nama_departemen, 
        tbl_pengirim.nama_pengirim, 
        tbl_pengirim.no_telp
        FROM
        tbl_keluar,
        tbl_departemen,
        tbl_pengirim
        WHERE
        tbl_arsip.id_departemen = tbl_departemen.id_departemen
        and tbl_keluar.id_pengirim = tbl_pengirim.id_pengirim 
        and tbl_keluar.id_arsip='$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            //tampung data
            $vno_surat = $data['no_surat'];
            $vtgl_surat = $data['tgl_surat'];
            $vtgl_keluar = $data['tgl_keluar'];
            $vperihal = $data['perihal'];
            $vid_departemen = $data['id_departemen'];
            $vnama_departemen = $data['nama_departemen'];
            $vid_pengirim = $data['id_pengirim'];
            $vnama_pengirim = $data['nama_pengirim'];
            $vfile = $data['file'];
        }
    } elseif ($_GET['hal'] == 'hapus') {
        $hapus = mysqli_query($koneksi, "DELETE FROM tbl_keluar where id_arsip='$_GET[id]'");
        if ($hapus) {
            echo "<script>
        alert('Hapus Data Sukses');
        document.location='?halaman=arsip_keluar';
        </script>";
        }
    }
}

if (isset($_POST['bsimpan'])) {
    //simpan baru
    if (@$_GET['hal'] == "edit") {
        if ($_FILES['file']['error'] === 4) {
            $file = $vfile;
        } else {
            $file = upload();
        }

        $ubah = mysqli_query($koneksi, "UPDATE tbl_keluar SET 
        no_surat = '$_POST[no_surat]',
        tgl_surat = '$_POST[tgl_surat]',
        tgl_keluar = '$_POST[tgl_keluar]',
        perihal = '$_POST[perihal]',
        id_departemen = '$_POST[id_departemen]',
        id_pengirim = '$_POST[id_pengirim]',
        file = '$file'  
        where id_keluar = '$_GET[id]'");

        if ($ubah) {
            echo "<script>
        alert('Ubah Data Sukses');
        document.location='?halaman=arsip_keluar';
        </script>";
        } else {
            echo "<script>
        alert('Ubah Data Gagal!');
        document.location='?halaman=arsip_keluar';
        </script>";
        }
    } else {
        //simpan data
        $file = upload();
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_keluar
        VALUES ('',
    '$_POST[no_surat]',
    '$_POST[tgl_surat]',
    '$_POST[tgl_keluar]',
    '$_POST[perihal]',
    '$_POST[id_departemen]',
    '$_POST[id_pengirim]',
    '$file' 
    ) ");

        if ($simpan) {
            echo "<script>
        alert('Simpan Data Sukses');
        document.location='?halaman=arsip_keluar';
        </script>";
        } else {
            echo "<script>
        alert('Simpan Data Gagal');
        document.location='?halaman=arsip_keluar';
        </script>";
        }
    }
}



?>

<div class="card mt-4">
    <div class="card-header bg-info text-white">Form Data Arsip Keluar</div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label for="no_surat">No. Surat</label>
                <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= @$vno_surat ?>">
            </div>
            <div class="form-group mb-2">
                <label for="tgl_surat">Tanggal Surat</label>
                <input type="date" class="form-control" id="tgl_surat" name="tgl_surat" value="<?= @$vtgl_surat ?>">
            </div>
            <div class="form-group mb-2">
                <label for="tgl_keluar">Tanggal Keluar</label>
                <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar" value="<?= @$vtgl_keluar ?>">
            </div>
            <div class="form-group mb-2">
                <label for="perihal">Perihal</label>
                <input type="text" class="form-control" id="perihal" name="perihal" value="<?= @$vperihal ?>">
            </div>
            <div class="form-group mb-2">
                <label for="id_departemen">Departemen</label>
                <select class="form-control" name="id_departemen">
                    <option value="<?= @$vid_departemen ?>"><?= @$vnama_departemen ?></option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * from tbl_departemen order by nama_departemen asc");
                    while ($data = mysqli_fetch_array($tampil)) {
                        echo "<option value = '$data[id_departemen]'>$data[nama_departemen]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="id_pengirim">Penerima</label>
                <select class="form-control" name="id_pengirim">
                    <option value="<?= @$vid_pengirim ?>"><?= @$vnama_pengirim ?></option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * from tbl_pengirim order by nama_pengirim asc");
                    while ($data = mysqli_fetch_array($tampil)) {
                        echo "<option value = '$data[id_pengirim]'>$data[nama_pengirim]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="file">Pilih File</label>
                <input type="file" class="form-control" id="file" name="file" value="<?= @$vfile ?>">
            </div>
            <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
            <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
        </form>

    </div>
</div>