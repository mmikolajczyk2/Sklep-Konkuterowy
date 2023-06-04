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
		$item = $_POST["item"];
		$obrazek = $_POST["obrazek"];
		$cena = $_POST["cena"];
		$kategoria = $_POST["kategoria"];
		$opis = $_POST["opis"];
		$text=" SluchawkiLaptopKonsola";
		$pos = strpos($text,$kategoria);
		echo $pos;

		if(empty($item) || empty($obrazek) || empty($cena) || empty($kategoria) || empty($opis))
		{
			$_SESSION['blad_item'] = '<span style="color:red">Któreś pole jest puste!</span>';
			header('Location: nowy_przedmiot.php');
		}
		
		else if(!is_float(floatval($cena)))
		{
			$_SESSION['blad_item'] = '<span style="color:red">Cena jest błędna!</span>';
			header('Location: nowy_przedmiot.php');
		}
		else if(floatval($cena)<=0)
		{
			$_SESSION['blad_item'] = '<span style="color:red">Cena to zero lub jest ujemna!</span>';
			header('Location: nowy_przedmiot.php');
		}
		
		else if(strpos($text,$kategoria)<=0)
		{
			$_SESSION['blad_item'] = '<span style="color:red">Kategoria jest zła!</span>';
			header('Location: nowy_przedmiot.php');
		}
		
		else
		{ 
			$sql = "INSERT INTO produkt (Nazwa,Kategoria,CenaZaSztuke,nazwaObrazku,opis) VALUES ('$item','$kategoria','$cena','$obrazek','$opis')";
			if (mysqli_query($polaczenie, $sql)) 
			{
				$_SESSION['blad_item'] = '<span style="color:green">Dodano przedmiot!</span>';
				header('Location: nowy_przedmiot.php');
			}
			else
			{
				echo 'cos poszlo nie tak';
			}
		
		}
		$polaczenie->close();
	}
	
?>