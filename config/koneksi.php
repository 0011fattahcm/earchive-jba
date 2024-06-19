<?php

$server = "localhost"; //server name
$user = "root"; //username db server
$pass = ""; //password
$database = "dbarsip"; //databasename

// connection
$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));
