<?php
@$halaman = $_GET['halaman'];

if ($halaman == "departemen") {
    //tampilkan halaman Departemen
    //echo "Tampil Halmaman Modul Departemen";
    include "modul/departemen/departemen.php";
} elseif ($halaman == "pengirim") {
    //tampilkan halaman pengirim
    //echo "Tampil Halaman Modul Pengirim";
    include "modul/pengirim/pengirim.php";
} elseif ($halaman == "arsip") {
    //echo "Tampil Halaman Modul Arsip";
    if (@$_GET['hal'] == "tambahdata" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus") {
        include "modul/arsip/form.php";
    } else {
        include "modul/arsip/data.php";
    }
} elseif ($halaman == "arsip_keluar") {
    //echo "Tampil Halaman Modul Arsip";
    if (@$_GET['hal'] == "tambahdata" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus") {
        include "modul/arsip_keluar/form.php";
    } else {
        include "modul/arsip_keluar/data.php";
    }
} else {
    //echo "Tampil Halaman Home";
    include "modul/home.php";
}
