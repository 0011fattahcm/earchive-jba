<?php

session_start();
unset($_SESSION['id_user']);
unset($_SESSION['username']);

session_destroy();
echo "<script> 
alert('Youre already logout');
document.location='index.php';
    </script>";
