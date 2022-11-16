<?php
    session_start();
    unset($_SESSION['id_usuario']);
    unset($_SESSION['nome']);
    header('Location: ../Login/login.php');
?>