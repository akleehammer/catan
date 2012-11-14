<?php
    session_start();
    require_once 'gameManager.php';
    
    $url = "http://localhost:20191/catan/index.php";
    if (isset($_POST['create'])) {
        try {
            //$game = new Game($_POST['playerName'], $_POST['gameName']);
            $manager = new GameManager();
            $manager->createEmptyGame($_SESSION['username']);
            $url = "http://localhost:20191/catan/main.php";
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