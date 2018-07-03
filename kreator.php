<?php

session_start();

if(!isset($_SESSION['zalogowany2']))
{
	header('Location: index.html');
	exit();
}
else
{
$_SESSION['zalogowany2'] = true;
}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Strona Egzaminacyjna</title>
    <meta name="description" content="Strona egzaminacyjna, projekt na narzedzaia programistyczne" />
    <meta name="keywords" content="Strona egzaminacyjna, UTP, Narzedzia programistyczne" />
    <meta http-equiv="X-UA-Compatible" content="IE=egdge,chrome=1" />
    <link href="style-student.css" rel="stylesheet">
</head>

<body>

	<form action="kreator2.php" method = "post">
		Nazwa Egzaminu: <input type="text" name = "tytul"/>
		<input type="submit" value="Potwierdz dodanie takiego egzaminu" />
	</form>


</body>

</html>