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
		
		$login = $_POST['login']; 
		$haslo = crypt($_POST['haslo'], 'rl');
		
		$sql = "SELECT * FROM danelogowania WHERE login='$login' AND password='$haslo'";

		if($rezultat = @$polaczenie->query($sql))
		{
			$ilu_userow = $rezultat->num_rows;
			$wiersz = $rezultat->fetch_assoc();

			if($ilu_userow>0 && $wiersz["admin"] == 0)
			{
				
				$_SESSION['Imie'] = $wiersz['Imie'];
				$_SESSION['ID'] = $wiersz['ID_Klient'];
				
				unset($_SESSION['blad']);
				unset($_SESSION['blad1']);
				
				$rezultat->free_result();
				header('Location: sklep.php');
			}
			else if($ilu_userow>0 && $wiersz["admin"] == 1)
			{
				
				$_SESSION['Imie'] = $wiersz['Imie'];
				$_SESSION['ID'] = $wiersz['ID_Klient'];
				
				unset($_SESSION['blad']);
				unset($_SESSION['blad1']);
				
				$rezultat->free_result();
				header('Location: admin.php');
			}
			else if($ilu_userow>0 && $wiersz["admin"] == 2)
			{
				$_SESSION['Imie'] = "adminie";
				$_SESSION['ID'] = $wiersz['ID_Klient'];

				unset($_SESSION['blad']);
				unset($_SESSION['blad1']);
				
				$rezultat->free_result();
				header('Location: moderator.php');
			}		
			else
			{
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
			}
		}
		else
		{
			echo "Cos poszlo nie tak";
		}
		
		$polaczenie->close();
	}
	
	
	
?>