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
		$id = $_POST["id_produktu"];
		echo $id;
		
			$sql = "DELETE FROM produkt WHERE ID_Produktu="."'".$id."'";
			if (mysqli_query($polaczenie, $sql)) 
			{
				unset($_SESSION['item_blad2']);
				header('Location: usun_przedmiot.php');
			}
			else
			{
				echo 'cos poszlo nie tak';
			}
		
		$polaczenie->close();
	}
	
?>