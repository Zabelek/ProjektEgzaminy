<?php

session_start();
require_once "connect.php";
if(!isset($_SESSION['zalogowany2']))
{
	header('Location: index.html');
	exit();
}
else
{
$_SESSION['zalogowany2'] = true;
}


if(isset($_POST['Pytanie']))
{
	$czyok = true;
	$Pytanie = $_POST['Pytanie'];
	
	if($czyok = true)
	{
		$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
		if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
		$nr = $_POST['nr'];
		$abcd = $_POST['ABCD'];
		$tytul = $_POST['tytul'];
		$A = $_POST['A'];
		$B = $_POST['B'];
		$C = $_POST['C'];
		$D = $_POST['D'];
		$nau = $_SESSION['naucz'];
		
		if($polaczenie->query("INSERT INTO egzaminy VALUES('$tytul','$Pytanie','$abcd','$A','$B','$C','$D','$nau','$nr')"))
		
		unset($_POST['nr']);
		unset($_POST['Pytanie']);
		unset($_POST['ABCD']);
		unset($_POST['A']);
		unset($_POST['B']);
		unset($_POST['C']);
		unset($_POST['D']);
	}
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
echo "Tworzysz Egzamin: ".$_SESSION['egzamin'];
?>
</br></br></br>

	<form method = "post">
		Nr Pytania: <input type="int" name = "nr"/></br>
		Tytuł Egzaminu: <input type="text" name = "tytul"/></br>
		Treść Pytania: <input type="text" name = "Pytanie"/></br>
		<?php
		if(isset($_SESSION['E_pyt']))
		{
			echo $_SESSION['E_pyt'];
			unset($_SESSION['E_pyt']);
		}
		?>
		Czy A,B,C,D?: <input type="text" name = "ABCD"/></br>
		ODP A?(można zostawić puste): <input type="text" name = "A"/></br>
		ODP B?(można zostawić puste): <input type="text" name = "B"/></br>
		ODP C?(można zostawić puste): <input type="text" name = "C"/></br>
		ODP D?(można zostawić puste): <input type="text" name = "D"/></br>
		<input type="submit" value="Potwierdz dodanie takiego pytania" />
	</form>

</body>

</html>