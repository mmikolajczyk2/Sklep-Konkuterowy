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
		$uni_id = $_POST["uniqueID"];
		$id = $_SESSION["ID"];
		$oplata = $_SESSION["oplata"];
		$id_zam = 1;
		while(true)
		{
			$sql_check_number = "SELECT * FROM zamowienia WHERE ID_Zamowienia='".$id_zam."'";
			$rezultat = @$polaczenie->query($sql_check_number);
			$ile = $rezultat->num_rows;
			if($ile==0) break;
			$id_zam = $id_zam + 1;
		}
		$start_date = date("Y-m-d");
		$date_2weeks = date('Y-m-d', strtotime('+2 week', strtotime($start_date)));
		
		$sql = "INSERT INTO zamowienia (ID_Zamowienia,ID_Klient, Adres_unique_id, ID_Status, Opłata, DataDostarczeniaPrzewidywana) 
				VALUES ('$id_zam','$id','$uni_id','1','$oplata','$date_2weeks')";
		if (mysqli_query($polaczenie, $sql));
		else
		{
			echo 'coś poszło nie tak';
		}
		$sql = "SELECT * from koszyk WHERE ID_Klient='".$id."'";
		$rezultat = @$polaczenie->query($sql);
		while($row = $rezultat->fetch_assoc()) 
		{
			
			$sql2 = "INSERT INTO produktyzamowienia (ID_Zamowienia, ID_Produktu, Sztuki) values ('$id_zam','".$row["ID_Produktu"]."','".$row["IloscSztuk"]."')";
			if (mysqli_query($polaczenie, $sql2));
			else
			{
				echo 'coś poszło nie tak';
			}
		}
		$sql = "DELETE FROM koszyk WHERE ID_Klient='".$id."'";
		if (mysqli_query($polaczenie, $sql))
		{
			header("Location: sklep.php");
		}
		else
		{
			echo 'coś poszło nie tak';
		}
		$polaczenie->close();
	}
	
?>