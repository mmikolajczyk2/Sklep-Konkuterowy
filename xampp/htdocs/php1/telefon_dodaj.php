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
		$phone = $_POST["phone"];
		$id = $_SESSION["ID"];
		if(empty($phone))
		{
			header('Location: profil.php');
		}
		else
		{
			$sql = "INSERT INTO telefon (ID_Telefon, Telefon) VALUES ('$id','$phone')";
			if (mysqli_query($polaczenie, $sql)) 
			{
				header('Location: profil.php');
			}
		}
		$polaczenie->close();
	}
	
?>