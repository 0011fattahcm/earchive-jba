<div class="card mt-4">
    <h5 class="card-header bg-info text-white">Data Arsip Masuk</h5>
    <div class="card-body">
        <a href="?halaman=arsip&hal=tambahdata" class="btn btn-info mb-3 text-white">Tambah Data</a>
        <table class="table table-bordered table-hovered table-striped">
            <tr>
                <th>No</th>
                <th>No Surat</th>
                <th>Tanggal Surat</th>
                <th>Tanggal Diterima</th>
                <th>Perihal</th>
                <th>Departemen</th>
                <th>Pengirim</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
            <?php

            $tampil = mysqli_query($koneksi, "SELECT 
            tbl_arsip.*, 
            tbl_departemen.nama_departemen, 
            tbl_pengirim.nama_pengirim, 
            tbl_pengirim.no_telp
            FROM
            tbl_arsip,
            tbl_departemen,
            tbl_pengirim
            WHERE
            tbl_arsip.id_departemen = tbl_departemen.id_departemen
            and tbl_arsip.id_pengirim = tbl_pengirim.id_pengirim
            ");
            $no = 1;
            while ($data = mysqli_fetch_array($tampil)) :

            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['no_surat'] ?></td>
                    <td><?= $data['tgl_surat'] ?></td>
                    <td><?= $data['tgl_diterima'] ?></td>
                    <td><?= $data['perihal'] ?></td>
                    <td><?= $data['nama_departemen'] ?></td>
                    <td><?= $data['nama_pengirim'] ?> / <?= $data['no_telp'] ?></td>
                    <td>
                        <?php
                        if (empty($data['file'])) {
                            echo " - ";
                        } else {
                        ?>
                            <a href="file/<?= $data['file'] ?>" target="$_blank">Lihat File</a>
                        <?php
                        }
                        ?>
                    </td>

                    <td>
                        <a href="?halaman=arsip&hal=edit&id=<?= $data['id_arsip'] ?>" class="btn btn-success">Edit</a>
                        <a href="?halaman=arsip&hal=hapus&id=<?= $data['id_arsip'] ?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>