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
    <link href="style-nauczyciel.css" rel="stylesheet">
</head>

<body>
<?php
echo "Twój klucz to: ".$_SESSION['naucz'];
$_SESSION['zalogowany2'] = true;
?>
    <div id="calosc">
        <div id="Lewa">
            <a href="kreator.php"> <div id="kreator">kreator</div></a>
            <a href="co.html"> <div id="wglad">wglad</div></a>
        </div>
        <a href="ocenyn.php"> <div id="oceny">oceny</div></a>
		<a href="logout.php"> <div id="oceny">wyloguj</div></a>
    </div>


</body>

</html>