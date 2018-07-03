<?php

session_start();
if(!isset($_SESSION['zalogowany']))
{
	header('Location: index.html');
	exit();
}
$_SESSION['zalogowany'] = true;

require_once "connect.php";

$polaczenie2 = @new mysqli($host, $db_user, $db_password, $db_name);
$id = $_SESSION['user'];


$sql2 = "SELECT * FROM aktualny WHERE ID_Ucznia = '$id'";


$wynik2 = @$polaczenie2-> query($sql2);

$r2 = $wynik2->fetch_assoc();
$pyt1 = $r2['pytanie'];

$sql = "SELECT Pytanie, CzyABCD, A, B, C, D FROM egzaminy WHERE ID_Egzaminu='NWM' AND Nr_pytania = '$pyt1'";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$wynik = @$polaczenie-> query($sql);
$r = $wynik->fetch_assoc();

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

<form>
	<?php
	if($r['CzyABCD'] == 'tak')
{
	echo $r['Pytanie'].'</br>';
	echo '<label>'."A) ".$r['A'].'<input type="checkbox" name = "A"/>'.'</label>'.'</br>';
	echo '<label>'."B) ".$r['B'].'<input type="checkbox" name = "B"/>'.'</label>'.'</br>';
	if(strlen($r['C'])>0)
	{
		echo '<label>'."C) ".$r['C'].'<input type="checkbox" name = "C"/>'.'</label>'.'</br>';
	}
	if(strlen($r['D'])>0)
	{
		echo '<label>'."D) ".$r['D'].'<input type="checkbox" name = "D"/>'.'</label>'.'</br>';
	}
	$polaczenie3 = @new mysqli($host, $db_user, $db_password, $db_name);
	$polaczenie3->query("UPDATE aktualny SET pytanie = '$pyt1 + 1' WHERE ID_Ucznia = '$id'");
}
else
{
	echo $r['Pytanie'].'</br>';
	'<form method = "post">';
	echo 'Odpowiedź'.'<input type="text" name = "odp"/>'.'</br>';
	'</form>';
	$polaczenie3 = @new mysqli($host, $db_user, $db_password, $db_name);
	$polaczenie3->query("UPDATE aktualny SET pytanie = '$pyt1 + 1' WHERE ID_Ucznia = '$id'");
}
	?>
<input type="submit" value="Potwierdź swoją odpowiedź" />
</form>

</body>

</html>