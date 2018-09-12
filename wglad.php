<?php

session_start();
require_once "connect.php";
if(!isset($_SESSION['zalogowany2']))
{
	header('Location: index.html');
	exit();
}
$_SESSION['zalogowany2'] = true;

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

$sql = "SELECT * FROM odpowiedzi ORDER BY ID_Ucznia, egzamin";
$wynik = @$polaczenie-> query($sql);

if(mysqli_num_rows($wynik) > 0) {
 echo "<div id='tab'>";
    echo "<table id='tabela' cellpadding=\"2\" border=1>";
    while($r = $wynik->fetch_assoc()) {
        echo "<tr>";
  echo "<td>".$r['ID_Ucznia']."</td>";
        echo "<td>".$r['egzamin']."</td>";
        echo "<td>".$r['odp']."</td>";
        echo "</tr>";
    }
    echo "</table>";
 echo "</div>";
}

if(isset($_POST['IDE']))
{
$ID = $_POST['IDE'];
$Ocena = $_POST['OcenaE'];
$Zaco = $_POST['ZacoE'];
$polaczenie4 = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie4->query("INSERT INTO oceny VALUES('$ID','$Ocena','$Zaco')");
unset($_POST['IDE']);
unset($_POST['OcenaE']);
unset($_POST['ZacoE']);
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
    <link href="Style-student.css" rel="stylesheet">
</head>
<body>

	<form method = "post">
	ID Ucznia: <input type="text" name = "IDE"/></br>
	Ocena: <input type="text" name = "OcenaE"/></br>
	Za co: <input type="text" name = "ZacoE"/></br>
<input type="submit" value="Zatwierdź" />
	</form>
<a href="nauczyciel.php"> <div id="wylogu">zakoncz</div></a>
</body>

</html>