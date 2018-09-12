<?php

session_start();
require_once "connect.php";
if(!isset($_SESSION['zalogowany']))
{
	header('Location: index.html');
	exit();
}
$_SESSION['zalogowany'] = true;


$polaczenie2 = @new mysqli($host, $db_user, $db_password, $db_name);
$id = $_SESSION['user'];


$sql2 = "SELECT * FROM aktualny WHERE ID_Ucznia = '$id'";

$wynik2 = @$polaczenie2-> query($sql2);

$r2 = $wynik2->fetch_assoc();
$pyt1 = $r2['pytanie'];
$egs = $r2['ID_egzaminu']; 
$id2 = $r2['ID_Ucznia']; 

$sql = "SELECT Pytanie, CzyABCD, A, B, C, D FROM egzaminy WHERE ID_Egzaminu='NWM' AND Nr_pytania = '$pyt1'";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$wynik = @$polaczenie-> query($sql);
$r = $wynik->fetch_assoc();
$pyt1 = $pyt1+1;
$polaczenie3 = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie3->query("UPDATE aktualny SET pytanie = '$pyt1' WHERE ID_Ucznia = '$id'");
if(isset($_POST['A']))
{
$A2 = $_POST['A']; 
$polaczenie4 = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie4->query("INSERT INTO odpowiedzi VALUES('$id2','$pyt1','$A2','$egs')");
unset($_POST['A']);
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


	<?php
	if($r['CzyABCD'] == 'tak')
{
	echo $r['Pytanie'].'</br>';
	echo '<label>'."A) ".$r['A'];
	echo '<label>'."B) ".$r['B'];
	if(strlen($r['C'])>0)
	{
		echo '<label>'."C) ".$r['C'];
	}
	if(strlen($r['D'])>0)
	{
		echo '<label>'."D) ".$r['D'];
	}

}
else
{
	echo $r['Pytanie'].'</br>';
}
	?>
	<form method = "post">
	Odpowiedź: <input type="text" name = "A"/></br>
<input type="submit" value="Potwierdź swoją odpowiedź" />
	</form>
	<a href="student.php"> <div id="wylogu">zakoncz</div></a>
</body>

</html>