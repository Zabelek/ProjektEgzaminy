<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany2'])) && ($_SESSION['zalogowany2']==true))
	{
		header('Location: nauczyciel.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Logowanie Egzaminy</title>
	<link href="style.css" rel="stylesheet">
</head>

<body>
	
	<div id="naglowek">
        <div id="nag1">Projekt Narzedzia Programistyczne: Egzaminy</div>

        <div id="nag2"></div><img src="logo.png" height=200px /></div>
    </div>

	<div id="log">
	<form action="zalogujn.php" method="post">
		<label for="login2">Klucz:</label> 
		<input id="login" type="text" name="login2" />
		<label for="password2">Hasło:</label> 
		<input id="password" type="password" name="haslo2" /></br>
		<input type="submit" value="Zaloguj się" />
	
	</form>
	</div>
	
<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>

</body>
</html>