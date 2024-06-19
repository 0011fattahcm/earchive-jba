<?php
session_start();
if (empty($_SESSION['id_user']) or empty($_SESSION['username'])) {
    echo "<script> alert('Please Sign In!');
    document.location='index.php';
    </script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>E-Archive | Japan Bridge Academy</title>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">E-Archive</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?halaman=departemen">Data Departemen</a>
                    </li>
                    <a class="nav-link text-white" href="?halaman=pengirim">Data Pengirim/Penerima</a>
                    </li>
                    <a class="nav-link text-white" href="?halaman=arsip">Data Arsip Masuk</a>
                    </li>
                    </li>
                    <a class="nav-link text-white" href="?halaman=arsip_keluar">Data Arsip Keluar</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success text-white" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Start Container -->
    <div class="container">