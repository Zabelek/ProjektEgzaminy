<?php

	session_start();
	if(!isset($_POST['login']) || !isset($_POST['haslo']))
	{
		header('Location: index.html');
		exit;
	}
	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie -> connect_errno != 0)
	{
		echo "Error: ".$polaczenie -> connect_errno;
	}

	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
		$sql = "SELECT * FROM studentlogowanie WHERE ID='$login' AND haslo = '$haslo'";
		if($rezultat = @$polaczenie->query($sql))
		{
			$ilu = $rezultat->num_rows;
			if($ilu > 0 )
			{
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['user'] = $wiersz['ID'];
				$_SESSION['zalogowany'] = true;
				$rezultat->free_result();
				unset($_SESSION['blad']);
				header('Location: student.php');
			}
			else
			{
				$_SESSION['blad'] = "Niepoprawny Login lub Hasło!";
				header('Location: studentlog.php');
			}
		}

		$polaczenie->close();
	}

?>