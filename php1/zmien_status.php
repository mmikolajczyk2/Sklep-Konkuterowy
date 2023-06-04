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
	
		$stat = $_POST["statusy"];
		$id = $_SESSION["ID_zam"];
		
		$sql = "UPDATE zamowienia SET ID_Status='$stat' WHERE ID_Zamowienia='$id'";
		if (mysqli_query($polaczenie, $sql)) 
		{
			header("Location: informacje_o_zamowieniu.php");
		}
		else
		{
			echo 'cos poszlo nie tak';
		}
		//header("Location: informacje_o_zamowieniu.php");
		$polaczenie->close();
	}
	
?>