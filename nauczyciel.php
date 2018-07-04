<?php

session_start();

if(!isset($_SESSION['zalogowany2']))
{
	header('Location: index.html');
	exit();
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
    <link href="Style-nauczyciel.css" rel="stylesheet">
</head>

<body>

	<div id="naglowek">
        <div id="nag1">Projekt Narzedzia Programistyczne: Egzaminy</div>

        <div id="nag2"></div><img src="logo.png" height=200px /></div>
    </div>

	<div id="gora">
	.
		<div id="napis">
			<?php
			echo "Twój klucz to: ".$_SESSION['naucz'];
			$_SESSION['zalogowany2'] = true;
			?>
		</div>
		<a href="logout.php"> <div id="wylogu">wyloguj</div></a>
	</div>
    <div id="dol">
        <a href="kreator.php"> <div id="guzik">Kreator</div></a>
        <a href="co.html"> <div id="guzik">Wgląd</div></a>
        <a href="ocenyn.php"> <div id="guzik">Oceny</div></a>
    </div>


</body>

</html>