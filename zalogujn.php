<?php

	session_start();
	if(!isset($_POST['login2']) || !isset($_POST['haslo2']))
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
		$login2 = $_POST['login2'];
		$haslo2 = $_POST['haslo2'];
		$login2 = htmlentities($login2, ENT_QUOTES, "UTF-8");
		$haslo2 = htmlentities($haslo2, ENT_QUOTES, "UTF-8");
		$sql = "SELECT * FROM nauczyciellogowanie WHERE klucz = '$login2' AND haslo = '$haslo2'";
		
		if($rezultat = @$polaczenie->query($sql))
		{
			$ilu = $rezultat->num_rows;
			if($ilu > 0 )
			{
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['naucz'] = $wiersz['klucz'];
				$_SESSION['zalogowany2'] = true;
				$rezultat->free_result();
				unset($_SESSION['blad']);
				header('Location: nauczyciel.php');
			}
			else
			{
				$_SESSION['blad'] = "Niepoprawny Login lub Hasło!";
				header('Location: nautlog.php');
			}
		}

		$polaczenie->close();
	}

?>