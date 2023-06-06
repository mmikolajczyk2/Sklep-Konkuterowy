
<?php
	session_start();

	require_once "connect.php";
	
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

	if($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	unset($_SESSION['blad_item']);
	unset($_SESSION['blad_item2']);
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="style/adminstyle.css">
	<link rel="stylesheet" href="style/informacje_o_zamowieniu.css">
	
	
</head>
<body>
	<div class="menu-bar"> 
	<ul>
		<?php
			echo "Witaj, ".$_SESSION['Imie']."!";
		?>
		<li class="active">Wybierz opcję admina</li>
		<li><a href="zamowienia.php">Zamówienia</a></li>
		<li><a href="nowy_przedmiot.php">Nowy przedmiot</a></li>
		<li><a href="usun_przedmiot.php">Usuń przedmiot</a></li>
		<li><a href="nowy_admin.php">Nowy admin</a></li>
		<li><a href="index.php">Wyloguj się </a>
	</ul>
	</div>

	<div class="profile-main-container">
		<div class="text">
			Informacje o zamówieniu!
		</div>
		<div class="but">
			<a href="zamowienia.php"><input type="submit" name="back" value="Powrót!"></a>
		</div>
	</div>
	<?php
		$basic_height=200;
		if(isset($_POST["ID_zam"])) $_SESSION["ID_zam"]=$_POST["ID_zam"];
		$sql = "SELECT * FROM zamowienia WHERE ID_Zamowienia='".$_SESSION["ID_zam"]."'";
		$rezultat = @$polaczenie->query($sql);
		$id_user="";
		$date = "";
		$status_id = 0;
		while($row = $rezultat->fetch_assoc()) 
		{
			$date = $row["DataDostarczeniaPrzewidywana"];
			$sql_status = "SELECT * FROM statusy WHERE ID_Status='".$row["ID_Status"]."'";
			$rezultat_status = @$polaczenie->query($sql_status);
			$status_row = $rezultat_status->fetch_assoc();
			$status_id = $status_row["ID_Status"];
			$sql2 = "SELECT * FROM produktyzamowienia WHERE ID_Zamowienia='".$row["ID_Zamowienia"]."'";
			$rezultat2 = @$polaczenie->query($sql2);
			$ile = $rezultat2->num_rows;
			$id_user = $row["ID_Klient"];
			$sql_user = "SELECT * FROM danelogowania WHERE ID_Klient='".$row["ID_Klient"]."'";
			$rezultat_user = @$polaczenie->query($sql_user);
			$row_user = $rezultat_user->fetch_assoc();
			
			$sql_adr = "SELECT * FROM daneadresowe WHERE unique_ID='".$row["Adres_unique_id"]."'";
			$rezultat_adr = @$polaczenie->query($sql_adr);
			$row_adr = $rezultat_adr->fetch_assoc();
		
					
	
			$kod_lewo=intval($row_adr["KodPocztowy"]/1000);
			$kod_prawo=$row_adr["KodPocztowy"]-$kod_lewo*1000;
			$adres_caly = $row_adr["Miasto"]." ".$kod_lewo."-".$kod_prawo." ".$row_adr["Adres"];
			if($row_adr["NrLokalu"]!=NULL)
			{
				$adres_caly=$adres_caly." m. ".$row_adr["NrLokalu"]; 
			}
			
			$odbiorca = "Nadano przez: ".$row_user["Imie"]." ".$row_user["Nazwisko"];
			//zwiekszamy $basic_height bo za malo miejsca bedzie
			if($ile>10)
			{
				$ile_zwiekszyc = 0;
				while($row2=$rezultat2->fetch_assoc()) $ile_zwiekszyc=$ile_zwiekszyc+1;
				$rozmiar_new = $ile_zwiekszyc - 10;
				$rozmiar_new = $rozmiar_new * 15 + 200; //15 pixeli na kazde nowe pole//200 to podstawowy rozmiar
				echo '<form action="informacje_o_zamowieniu.php" method="post">';
				echo '<div class="container-for-goods" style="height:'.$rozmiar_new.'px">';
				echo '	<div class="list">';
				$rezultat2 = @$polaczenie->query($sql2);
				$sql_products = "SELECT * FROM produkt";
				while($row2=$rezultat2->fetch_assoc())
				{
					
					$sql_get_name = "SELECT Nazwa FROM produkt WHERE ID_Produktu='".$row2["ID_Produktu"]."'";
					$rezultat_get_name = @$polaczenie->query($sql_get_name);
					$row_name = $rezultat_get_name->fetch_assoc();
					echo $row2["Sztuki"]."x ".$row_name["Nazwa"]."<br>";
				}
				echo '	</div>';
				echo '	<div class="date">';
				echo ' 	Numer kontrolny zamówienia: '.$row["ID_Zamowienia"]."<br>";
				echo '	Dostawa na adres: '.$adres_caly."<br>";
				echo 	$odbiorca."<br>";
				echo '	Email kontaktowy: '.$row_adr["Email"]."<br>";
				echo '<br>';
				echo '	Status: '.$status_row["Nazwa_Statusu"]."<br>";
				echo '	Przewidywana data dostarczenia: '.$row["DataDostarczeniaPrzewidywana"];
				echo '	</div>';
				echo '</div>';
				echo '</form>';
			}
			
			else 
			{
				echo '<form action="informacje_o_zamowieniu.php" method="post">';
				echo '<div class="container-for-goods" style="height:200px">';
				echo '	<div class="list">';
				
				$sql_products = "SELECT * FROM produkt";
				while($row2=$rezultat2->fetch_assoc())
				{
					
					$sql_get_name = "SELECT Nazwa FROM produkt WHERE ID_Produktu='".$row2["ID_Produktu"]."'";
					$rezultat_get_name = @$polaczenie->query($sql_get_name);
					$row_name = $rezultat_get_name->fetch_assoc();
					echo $row2["Sztuki"]."x ".$row_name["Nazwa"]."<br>";
				}
				echo '	</div>';
				echo '	<div class="date">';
				echo ' 	Numer kontrolny zamówienia: '.$row["ID_Zamowienia"]."<br>";
				echo '	Dostawa na adres: '.$adres_caly."<br>";
				echo 	$odbiorca."<br>";
				echo '	Email kontaktowy: '.$row_adr["Email"]."<br>";
				echo '<br>';
				echo '	Status: '.$status_row["Nazwa_Statusu"]."<br>";
				echo '	Przewidywana data dostarczenia: '.$row["DataDostarczeniaPrzewidywana"];
				echo '	</div>';
				echo '</div>';
				echo '</form>';
			}
		}
		
	?>
	
	<div class="modify-container">
		<form action="zmien_date.php" method="post">
			<p>Modyfikuj zmień datę: 
			<input type="date" name="new_date" value="<?php echo $date;  ?>">
			<input type="submit" value="Zaakceptuj zmianę!">
			</p>
		</form>
	</div>
	
	<div class="modify-container">
		<form action="zmien_status.php" method="post">
			<p>Modyfikuj status:  
			<select name="statusy">
			<?php
				$sql="SELECT * FROM statusy";
				$rezultat = @$polaczenie->query($sql);
				while($row = $rezultat->fetch_assoc())
				{
					if($status_id==$row["ID_Status"]) echo '<option value="'.$row["ID_Status"].'"selected>'.$row["Nazwa_Statusu"].'</option>';
					else echo '<option value="'.$row["ID_Status"].'">'.$row["Nazwa_Statusu"].'</option>';
					
				}
			?>
			</select>
			<input type="submit" value="Zaakceptuj zmianę!">
			</p>
		</form>
	</div>
	
	
	<div class="last-container">
		<form action="usun_zamowienie.php" method="post">
			<input type="submit" value="Usuń zamówienie z bazy danych!">
		</form>
	</div>

</body>
</html>
