<?php
    session_start();
    $_SESSION = array();  // Destroy session variables
    session_destroy();    // Destroy the session itself
    setcookie('PHPSESSID', '', time()-300, '/', '', 0); // Destroy cookie

    $url = "http://localhost:20191/catan/index.php";
    header("Location: $url");
    exit;
?>