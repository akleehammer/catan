<?php
    session_start();
    require_once 'User.php';
    
    $url = "http://localhost/catan/index.php";
    if (isset($_POST['login'])) {
        try {
            $user = new User();
            $user->setUsername($_POST['login_username']);
            $user->checkPassword($_POST['password']);
            
            $url = "http://localhost/catan/create_or_join.php";
            $_SESSION['username'] = $_POST['login_username'];
            header("Location: $url");
            exit;
        }
        catch (Exception $e) {
            $_SESSION['ERROR'] = $e->getMessage();
            header("Location: $url");
            exit;
        }
    }
    else {
        $_SESSION['ERROR'] = "INVALID SCRIPT ENTRY";
        header("Location: $url");
        exit;
    }
?>