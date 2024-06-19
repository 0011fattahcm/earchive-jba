<?php

//persiapan function upload file
function upload()
{
    //deklarasi variabel
    $namafile = $_FILES['file']['name'];
    $ukuranfile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tempname = $_FILES['file']['tmp_name'];

    //cek validasi format file/gambar
    $eksfilevalid = ['jpg', 'jpeg', 'png', 'pdf'];
    $eksfile = explode('.', $namafile);
    $eksfile = strtolower(end($eksfile));
    if (!in_array($eksfile, $eksfilevalid)) {
        echo "<script> alert('Yang Anda upload bukan Gambar atau File PDF!')</script>";
        return false;
    }

    //cek size file
    if ($ukuranfile > 1000000) {
        echo "<script> alert('Ukuran file terlalu besar!')</script>";
        return false;
    }

    //true file generate new file
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $eksfile;

    move_uploaded_file($tempname, 'file/' . $namafilebaru);
    return $namafilebaru;
}
