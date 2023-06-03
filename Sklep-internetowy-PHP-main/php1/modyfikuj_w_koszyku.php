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
		if(isset($_POST["usun"]))
		{
			$sql = "DELETE FROM koszyk WHERE unique_ID="."'".$_POST["uniqueID"]."'";
			
			if (mysqli_query($polaczenie, $sql))
			{
				header('Location: koszyk.php');
			}
			else
			{
				echo 'Problem';
			}
		}
		if(isset($_POST["modyfikuj"]))
		{
			$ilosc_new = $_POST["ilosc"];
			if(!empty($ilosc_new))
			{
				$id = $_POST["uniqueID"];
				$sql = 'UPDATE koszyk SET IloscSztuk='.$ilosc_new.' WHERE unique_ID='.$id;
				if (mysqli_query($polaczenie, $sql))
				{
					header('Location: koszyk.php');
				}
				else
				{
					echo 'Problem';
				}
			}
			else
			{
				header('Location: koszyk.php');
			}
			
		}
		$polaczenie->close();
	}
	
?>