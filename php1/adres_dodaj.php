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
		$id = $_SESSION["ID"];
		$email = $_POST["email"];
		$miasto = $_POST["miasto"];
		$kod1 = $_POST["kod1"];
		$kod2 = $_POST["kod2"];
		$ulica = $_POST["ulica"];
		$nrulicy = $_POST["nrulicy"];
		$lokal = $_POST["lokal"];
		
		if(empty($email) || empty($miasto) || empty($kod1) || empty($kod2) || empty($ulica) || empty($nrulicy))
		{
			$_SESSION['blad2'] = '<span style="color:red">Któreś pole jest puste!</span>';
			header('Location: tworzenie_adresu.php');
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$_SESSION['blad2'] = '<span style="color:red">Email jest niepoprawny!</span>';
			header('Location: tworzenie_adresu.php');
		}
		else if(!ctype_alpha($miasto))
		{
			$_SESSION['blad2'] = '<span style="color:red">Miasto jest niepoprawne!</span>';
			header('Location: tworzenie_adresu.php');			
		}
		//echo gettype('$kod1');
		else if(ctype_alpha($kod1) || ctype_alpha($kod2))
		{
			$_SESSION['blad2'] = '<span style="color:red">Kody zawierają litery lub coś innego!</span>';
			header('Location: tworzenie_adresu.php');		
		}
		else
		{
			$adres = $ulica." ".$nrulicy;
			$kod = intval($kod1)*1000+intval($kod2);
			echo $kod;
			$sql = "INSERT INTO daneadresowe (ID_Klient,Adres,Email,KodPocztowy,Miasto,NrLokalu) VALUES ('$id','$adres','$email','$kod','$miasto','$lokal')";
			if (mysqli_query($polaczenie, $sql)) 
			{
				header('Location: profil.php');
			}
		
		}
		$polaczenie->close();
	}
	
?>
