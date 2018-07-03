<?php

session_start();
if(!isset($_SESSION['zalogowany']))
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
    <link href="style-student.css" rel="stylesheet">
</head>

<body>
<?
$_SESSION['zalogowany'] = true;
?>

    <div id="calosc">
	<a href="pisanie.php"> <div id="wyebaneokno">egzamin</div></a>
        <div id="prawa">
            <a href="co.html"> <div id="tajmer">Tajmer</div></a>
			<a href="logout.php"> <div id="tajmer">wyloguj</div></a>
             <div id="nrabumu">Twoje ID: </b> <?php echo $_SESSION['user']; ?></div>
			<a href="oceny.php"> <div id="tajmer">Oceny</div></a>
        </div>
    </div>


</body>

</html>