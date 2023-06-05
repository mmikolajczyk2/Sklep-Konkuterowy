<?php
	session_start();

	require_once "connect.php";
	
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

	if($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		
		$forename = $_POST['forename']; 
		$surname = $_POST['surname'];
		$login = $_POST['login'];
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		$crypt_haslo1 = crypt($_POST['haslo1'], 'rl');
		$crypt_haslo2 = crypt($_POST['haslo2'], 'rl');
		
	
		if(empty($forename)||empty($surname)||empty($login)||
			empty($haslo1)||empty($haslo2)) 
		{
			$_SESSION['blad1'] = '<span style="color:red">Któreś pole jest puste!</span>';
			header('Location: rejestracja.php');
		}
		else if(!ctype_alpha($forename) || !ctype_alpha($surname))
		{
			$_SESSION['blad1'] = '<span style="color:red">Imię i nazwisko nie są literami!</span>';
			header('Location: rejestracja.php');
		}
		else if(strcmp($haslo1,$haslo2))
		{
			$_SESSION['blad1'] = '<span style="color:red">Hasła są różne!</span>';
			header('Location: rejestracja.php');			
		}
		else if(strlen($haslo1)<7)
		{
			$_SESSION['blad1'] = '<span style="color:red">Hasło jest za krótkie!</span>';
			header('Location: rejestracja.php');
			
		}
		else if(strlen($login)<5)
		{
			$_SESSION['blad1'] = '<span style="color:red">Login jest za krótki!</span>';
			header('Location: rejestracja.php');			
		}
		else
		{
			$sql = "SELECT * FROM danelogowania WHERE login='$login'";
			if($rezultat = @$polaczenie->query($sql))
			{
				$ilu_userow = $rezultat->num_rows;
				if($ilu_userow==0)
				{
					$sql = "INSERT INTO danelogowania (login, password, Imie, Nazwisko, admin) VALUES ('$login','$crypt_haslo1','$forename','$surname', 0)";
					if (mysqli_query($polaczenie, $sql)) {
						$_SESSION['blad'] = '<span style="color:green">Zarejestrowano pomyślnie!</span>';
						unset($_SESSION['blad1']);
						
						header('Location: index.php');
					}
					else
					{
						$_SESSION['blad1'] = '<span style="color:red">Coś jest nie tak!</span>';
						header('Location: rejestracja.php');	
					}
				}
				else
				{
					$_SESSION['blad1'] = '<span style="color:red">Podany login jest zajęty!</span>';
					header('Location: rejestracja.php');		
				}
			}
			else
			{
				echo "Coś poszło nie tak!";
			}
		}
		
		
		
		
		$polaczenie->close();
	}
	
?>