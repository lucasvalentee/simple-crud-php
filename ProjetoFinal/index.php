<?php
session_start();

if(isset($_POST['acesso']) && isset($_POST['login']) && isset($_POST['senha'])) {
    if($_POST['login'] == 'admin' && $_POST['senha'] == 'admin') {
        $_SESSION['login'] = 'admin';
    }
}

if(isset($_SESSION['login'])) {
    include 'inicio.php';
}
else {
    include 'login.php';
}