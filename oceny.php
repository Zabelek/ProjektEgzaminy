<?php

session_start();
if(!isset($_SESSION['zalogowany']))
{
	header('Location: index.html');
	exit();
}

require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$id = $_SESSION['user'];
$sql = "SELECT * FROM oceny WHERE ID_Ucznia='$id'";
$wynik = @$polaczenie-> query($sql);

if(mysqli_num_rows($wynik) > 0) {
	
    echo "<table cellpadding=\"2\" border=1>";
    while($r = $wynik->fetch_assoc()) {
        echo "<tr>";
		 echo "<td>".$r['ID_Ucznia']."</td>";
        echo "<td>".$r['Ocena']."</td>";
        echo "<td>".$r['Egzamin']."</td>";
        echo "</tr>";
    }
    echo "</table>";
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

</body>

</html>