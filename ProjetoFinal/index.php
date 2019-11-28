<?php

if(isset($_SESSION['login']) && isset($_SESSION['senha'])) {
    include 'index.php';
}
else {
    include 'login.php';
}