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
		$ilosc = $_POST["ilosc"];
		
		if($ilosc<=0 || empty($ilosc))
		{
			header('Location: '.$_POST["kategoria"].'.php');
		}
		else
		{
			$sql = "SELECT * from koszyk WHERE ID_Produktu='".$_POST["id_produktu"]."' AND ID_Klient='".$_SESSION["ID"]."'" ;
			if($rezultat = @$polaczenie->query($sql))
			{
				
				$num_of_rows = $rezultat->num_rows;
				$row = $rezultat->fetch_assoc();
				if($num_of_rows>0)
				{
					$last_num_of_product = $row["IloscSztuk"];
					$new_num = $last_num_of_product + $ilosc;
					$sql2 = 'UPDATE koszyk SET IloscSztuk='.$new_num." WHERE ID_Produktu='".$_POST["id_produktu"]."' AND ID_Klient='".$_SESSION["ID"]."'";
					if (mysqli_query($polaczenie, $sql2))
					{
						header('Location: '.$_POST["kategoria"].'.php');
					}
					else
					{
						echo 'Problem';
					}
				}
				else
				{
					$id = $_SESSION["ID"];
					$produkt = $_POST["id_produktu"];
					$sql = "INSERT INTO koszyk (ID_Klient, ID_Produktu, IloscSztuk) VALUES ('$id','$produkt','$ilosc')";
					if (mysqli_query($polaczenie, $sql)) 
					{
						header('Location: '.$_POST["kategoria"].'.php');
					}
					else
					{
						echo 'Problem';
					}
				}
			}
			else		
			{
				echo "coś poszło nie tak";
			}
		}
		$polaczenie->close();
	}
	/*
	$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');*/
?>