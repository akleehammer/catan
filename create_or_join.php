<!DOCTYPE html>
<?php
    require_once 'php/force_authentication.php';
?>
<head>
	<title>TEST</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel = "stylesheet" type = "text/css" href = "newTest.css" media = "all">
	<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic'
			rel='stylesheet' type='text/css'>
    
</head>

<body>
	<div id="main-container">
		<nav>
			<h1><a href="#">eCatan</a></h1>
			<ul>
				<li><a href="#">Link1</a></li>
				<li><a href="php/signout.php">Sign out</a></li>
			</ul>
		</nav>
		<div id="start-join">
            <?php
                if (isset($_SESSION['ERROR'])) {
                    echo htmlentities($_SESSION['ERROR']);
                    unset($_SESSION['ERROR']);
                }
                
                echo "Welcome, " . $_SESSION['username'] . "!";
            ?>
			<table border="0">
                <tr>
                    <td>
                        Start a game<br />
                        <form method="post" action="php/create_game.php">
                            Game name:&nbsp;
                            <input type="text" name="gameName" maxlength="30" />&nbsp;<br />
                            <input type="submit" value="Start Game" name="create">
                        </form>
                    </td>
                    <td>
                        Join a game<br />
                        <form method="post" action="">
                            LIST OF AVAILABLE GAMES<br />
                            <input type="submit" value="Join Game" name="join">
                        </form>
                    </td>
                </tr>
            </table>
		</div>
	</div>

</body>

