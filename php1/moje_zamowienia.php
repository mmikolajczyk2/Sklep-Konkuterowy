<?php

	session_start();

	require_once "connect.php";
	unset($_SESSION['blad2']);
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

	if($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="categoriesstyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	
</head>
<body>

	<div class="menu-bar"> 
	<ul>
		<?php
			echo "Witaj, ".$_SESSION['Imie']."!";
		?>
		<li>Wybierz kategorię</li>
		<li><a href="elektronika.php">Sluchawki </a><i class="fas fa-tv"></i></li>
		<li><a href="sport.php">Laptopy </a><i class="fa fa-volleyball-ball"></i></li>
		<li><a href="jedzenie.php">Konsole </a><i class="fas fa-utensils"></i></li>
		<li><a href="koszyk.php">Koszyk</a><i class="fas fa-shopping-cart"></i></li>
		<li><a href="profil.php">Profil</a><i class="fas fa-user"></i></li>
		<li><a href="index.php">Wyloguj się</a><i class="fas fa-sign-out-alt"></i></li>
	</ul>
	
	</div>
	<style>
	.profile-main-container{
		width: 800px;
		height: 75px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border: 5px solid green;
		margin: 0 auto;
		margin-top: 50px;
		font-size: 50px;
		text-align: center;
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
		Twoje zamówienia.
	</div>
	<?php
		$basic_height=100;
		$sql = "SELECT * FROM zamowienia WHERE ID_Klient='".$_SESSION["ID"]."'";
		$rezultat = @$polaczenie->query($sql);
		while($row = $rezultat->fetch_assoc()) 
		{
			$sql_status = "SELECT * FROM statusy WHERE ID_Status='".$row["ID_Status"]."'";
			$rezultat_status = @$polaczenie->query($sql_status);
			$status_row = $rezultat_status->fetch_assoc();
			$sql2 = "SELECT * FROM produktyzamowienia WHERE ID_Zamowienia='".$row["ID_Zamowienia"]."'";
			$rezultat2 = @$polaczenie->query($sql2);
			$ile = $rezultat2->num_rows;
			//zwiekszamy $basic_height bo za malo miejsca bedzie
			if($ile>5)
			{
				$ile_zwiekszyc = 0;
				while($row2=$rezultat2->fetch_assoc()) $ile_zwiekszyc=$ile_zwiekszyc+1;
				$rozmiar_new = $ile_zwiekszyc - 5;
				$rozmiar_new = $rozmiar_new * 15 + 100; //15 pixeli na kazde nowe pole//100 to podstawowy rozmiar
				echo '<div class="container-for-goods" style="height:'.$rozmiar_new.'px">';
				echo '	<div class="list">';
				$rezultat2 = @$polaczenie->query($sql2);
				$sql_products = "SELECT * FROM produkt WHERE";
				while($row2=$rezultat2->fetch_assoc())
				{
					
					$sql_get_name = "SELECT Nazwa FROM produkt WHERE ID_Produktu='".$row2["ID_Produktu"]."'";
					$rezultat_get_name = @$polaczenie->query($sql_get_name);
					$row_name = $rezultat_get_name->fetch_assoc();
					echo $row2["Sztuki"]."x ".$row_name["Nazwa"]."<br>";
				}
				echo '	</div>';
				echo '	<div class="date">';
				echo '	Status: '.$status_row["Nazwa_Statusu"]."<br>";
				echo '	Przewidywana data dostarczenia: '.$row["DataDostarczeniaPrzewidywana"];
				echo '	</div>';
				echo '</div>';
			}
			
			else //jest wystarczajaco duzo miejsca na 5 produktow
			{
				echo '<div class="container-for-goods" style="height:100px">';
				echo '	<div class="list">';
				
				$sql_products = "SELECT * FROM produkt WHERE";
				while($row2=$rezultat2->fetch_assoc())
				{
					
					$sql_get_name = "SELECT Nazwa FROM produkt WHERE ID_Produktu='".$row2["ID_Produktu"]."'";
					$rezultat_get_name = @$polaczenie->query($sql_get_name);
					$row_name = $rezultat_get_name->fetch_assoc();
					echo $row2["Sztuki"]."x ".$row_name["Nazwa"]."<br>";
				}
				echo '	</div>';
				echo '	<div class="date">';
				echo '	Status: '.$status_row["Nazwa_Statusu"]."<br>";
				echo '	Przewidywana data dostarczenia: '.$row["DataDostarczeniaPrzewidywana"];
				echo '	</div>';
				echo '</div>';
			}
		}
	?>
	
</body>
</html>