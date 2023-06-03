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
		
		$sql = "DELETE FROM zamowienia WHERE ID_Zamowienia='$id'";
		if (mysqli_query($polaczenie, $sql));
		else
		{
			echo 'cos poszlo nie tak';
		}
		$sql = "DELETE FROM produktyzamowienia WHERE ID_Zamowienia='$id'";
		if (mysqli_query($polaczenie, $sql))
		{
			unset($_SESSION["ID_zam"]);
			header("Location: zamowienia.php");
		}
		else
		{
			echo 'cos poszlo nie tak';
		}
		$polaczenie->close();
	}
	
?>