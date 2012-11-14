<!DOCTYPE html>
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
				<li><a href="#">Link2</a></li>
			</ul>
		</nav>
		<div id="start-join">
            <?php
                session_start();

                if (isset($_SESSION['ERROR'])) {
                    echo htmlentities($_SESSION['ERROR']);
                    unset($_SESSION['ERROR']);
                }
            ?>
			<table border="0">
                <tr>
                    <td>
                        Register to Play!<br />
                        <form method="post" action="php/register.php">
                            Username:&nbsp;
                            <input type="text" name="register_username" maxlength="30" />&nbsp;<br />
                            Password:&nbsp;
                            <input type="password" name="password1" maxlength="30" /><br />
                            Confirm Password:&nbsp;
                            <input type="password" name="password2" maxlength="30" /><br />
                            <input type="submit" value="Register" name="register">
                        </form>
                    </td>
                    <td>
                        Login!<br />
                        <form method="post" action="php/login.php">
                            Username:&nbsp;<input type="text" name="login_username"  maxlength="30" /><br />
                            Password:&nbsp;
                            <input type="password" name="password" maxlength="30" /><br />
                            <input type="submit" value="Login" name="login">
                        </form>
                    </td>
                </tr>
            </table>
		</div>
	</div>

</body>

