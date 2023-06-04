<?php include "dbconnect.php"; ?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="style/categories.css">
	<link rel="stylesheet" href="style/moje_zamowienia.css">
	
</head>
<body>

	<div class="menu-bar"> 
	<ul>
		<?php
			echo "Witaj, ".$_SESSION['Imie']."!";
		?>
		<li><a href=sklep.php>Strona Główna </a>
		<li><a href="sluchawki.php">Sluchawki </a>
		<li><a href="laptop.php">Laptopy </a>
		<li><a href="konsola.php">Konsole </a>
		<li><a href="koszyk.php">Koszyk</a>
		<li><a href="profil.php">Profil</a>
		<li><a href="index.php">Wyloguj się</a>
	</ul>
	
	</div>
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