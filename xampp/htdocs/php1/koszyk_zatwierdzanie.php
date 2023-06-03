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
		if(isset($_POST["wyczysc"]))
		{
			echo 'Wyczysc';
			$sql = "DELETE FROM koszyk WHERE ID_Klient="."'".$_SESSION["ID"]."'";
			if (mysqli_query($polaczenie, $sql))
			{
				header('Location: koszyk.php');
			}
			else
			{
				echo 'Problem';
			}
		}
		if(isset($_POST["akceptuj"]))
		{
			header('Location: wybierz_adres_dostawy.php');
		}
		$polaczenie->close();
	}
	
?>