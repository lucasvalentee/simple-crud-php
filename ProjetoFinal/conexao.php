<?php
$username = 'root';
$password = 'root';
$banco    = 'northwind';

try {
    $conn = new PDO('mysql:host=localhost;dbname='.$banco, $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}