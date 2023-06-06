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
		
		$id = $_POST["uniqueID"];
		
		$sql = "DELETE FROM daneadresowe WHERE unique_ID="."'".$id."'";
		
		if (mysqli_query($polaczenie, $sql))
		{
			header('Location: profil.php');
		}
		else
		{
			echo 'Problem';
		}
		
		$polaczenie->close();
	}
	
?>