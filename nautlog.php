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
</head>

<body>
	
	
	<form action="zalogujn.php" method="post">
	
		Klucz: <br /> <input type="text" name="login2" /> <br />
		Hasło: <br /> <input type="password" name="haslo2" /> <br /><br />
		<input type="submit" value="Zaloguj się" />
	
	</form>
	
<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>

</body>
</html>