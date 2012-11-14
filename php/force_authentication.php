<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        $url = "http://localhost:20191/catan/index.php";
        header("Location: $url");
        exit;
    }
?>