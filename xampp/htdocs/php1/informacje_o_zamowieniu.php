

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
	<link rel="stylesheet" href="adminstyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	
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
		<li><a href="index.php">Wyloguj się </a><i class="fas fa-sign-out-alt"></i></li>
	</ul>
	</div>
	<style>
	.profile-main-container{
		width: 800px;
		height: 95px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border: 5px solid green;
		margin: 0 auto;
		margin-top: 50px;
		font-size: 50px;
		text-align: left;
	}
	.text
	{
		float: left;
		font-size: 40px;
		margin-left: 20px;
		margin-top: 17px;
	}
	.but
	{
		float: right;
		
	}
	.but input[type="submit"]
	{
		margin-top: 20px;
		border: none;
		outline: none;
		height: 40px;
		width: 240px;
		margin-right: 75px;
		background: #fb2525;
		color: #fff;
		font-size: 15px;
		border-radius: 20px;
	}
	.but input[type="submit"]:hover
	{
		curson: pointer;
		background: #ffc107;
		color: #000;
	}
	.container-for-goods{
		width: 800px;
		height: 75px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border: 5px solid green;
		margin: 0 auto;
		margin-top: 25px;
		font-size: 50px;
		text-align: center;
	}
	.list {
		float: left;
		font-size: 12px;
		text-align: left;
		margin-top: 10px;
		margin-left: 10px;
	}
	.date {
		font-size: 18px;
		margin-top: 20px;
		text-align: center;
		float: right;
		margin-right: 40px;
	}
	</style>
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
			
			$sql_phone = "SELECT * FROM telefon WHERE ID_Telefon='".$row["ID_Klient"]."'";
			$rezultat_phone = @$polaczenie->query($sql_phone);
					
			/*
			echo $row_user["Imie"];
			echo $row_adr["Adres"];
			echo $row_phone["Telefon"].'<br>';
			$row_phone = $rezultat_phone->fetch_assoc();	
			echo $row_phone["Telefon"].'<br>';
			*/
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
			
			else //jest wystarczajaco duzo miejsca na 5 produktow
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
	<style>
	.phones
	{
		width: 800px;
		height: 95px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border-left: 5px solid green;
		border-bottom: 5px solid green;
		border-right: 5px solid green;
		margin: 0 auto;
		margin-top: 0px;
		font-size: 50px;
		text-align: left;
	}
	.text_phones 
	{
		margin-left: 25px;
		font-size: 40px;
		padding-top: 20px;
		float: left;
	}
	.list_of_phones
	{
		float: right;
		font-size: 20px;
		padding-right: 100px;
		padding-top: 15px;
	}
	.modify-container
	{
		width: 800px;
		height: 95px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border-left: 5px solid green;
		border-bottom: 5px solid green;
		border-right: 5px solid green;
		margin: 0 auto;
		margin-top: 0px;
		font-size: 50px;
		text-align: left;	
	}
	.modify-container p 
	{
		font-size: 20px;
		padding-top: 30px;
		padding-left: 30px;
	}
	</style>
	<?php
		$ile_telefonow = 0;
		while($row_phone = $rezultat_phone->fetch_assoc()) $ile_telefonow = $ile_telefonow + 1;
		$basic_height = 95;
		if($ile_telefonow<=3);
		else
		{
			$how_many_more = $ile_telefonow - 3;
			$extra_size = $how_many_more * 25;
			$basic_height=$basic_height+$extra_size;
		}
echo '<div class="phones" style="height:'.$basic_height.'px">'
	?>
	
	
		<div class="text_phones">
			Telefony klienta:
		</div>
		<div class="list_of_phones">
			
			<?php
			$sql_phone = "SELECT * FROM telefon WHERE ID_Telefon='".$id_user."'";
			$rezultat_phone = @$polaczenie->query($sql_phone);
			while($row_phone = $rezultat_phone->fetch_assoc())
			{
				
				echo $row_phone["Telefon"].'<br>';
			}
			?>
		</div>
	</div>
	<style>
	.modify-container input[type="submit"]
	{
		border: none;
		outline: none;
		height: 40px;
		width: 240px;
		margin-right: 75px;
		background: #fb2525;
		color: #fff;
		font-size: 15px;
		border-radius: 20px;	
		float: right;
	}
	.modify-container input[type="submit"]:hover
	{
		curson: pointer;
		background: #ffc107;
		color: #000;
	}
	</style>
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
	
	<style>
	.last-container
	{
		width: 800px;
		height: 95px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border-left: 5px solid green;
		border-bottom: 5px solid green;
		border-right: 5px solid green;
		margin: 0 auto;
		margin-top: 0px;
		font-size: 50px;
		text-align: left;	
	}
	.last-container input[type="submit"]
	{
		border: none;
		outline: none;
		height: 50px;
		width: 300px;
		margin-right: 75px;
		background: #fb2525;
		color: #fff;
		font-size: 15px;
		margin-left: 250px;
		border-radius: 30px;	
	}
	.last-container input[type="submit"]:hover
	{
		curson: pointer;
		background: #ffc107;
		color: #000;
	}
	</style>
	<div class="last-container">
		<form action="usun_zamowienie.php" method="post">
			<input type="submit" value="Usuń zamówienie z bazy danych!">
		</form>
	</div>
	
	
	

</body>
</html>
