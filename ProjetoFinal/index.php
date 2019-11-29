<?php
session_start();

require_once 'estrutura/autoload.php';

if(isset($_SESSION['login'])) {
    include 'inicio.php';
}
else {
    include 'login.php';
}