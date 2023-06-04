<?php include "dbconnect.php"; ?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="style/categories.css">
	<link rel="stylesheet" href="style/profil_1.css">
	<link rel="stylesheet" href="style/profil_2.css">

	
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
		<li  class="active"><a href="profil.php">Profil</a>
		<li><a href="index.php">Wyloguj się</a>
	</ul>
	
	</div>
	<div class="container-for-orders">
		<a href="moje_zamowienia.php"><input type="submit" name="submit" value="Zobacz swoje zamówienia [TUTAJ]"/></a>
	</div>
	
	<style>
	
	</style>
	<div class="profile-main-container">
		<div class="text">
			Twoje istniejące adresy.
		</div>
		<div class="button_new_adrr">
			<a href="tworzenie_adresu.php"><input type="submit" value="DODAJ ADRES!"/></a>
		</div>
	</div>
	<?php
	
		$sql = "SELECT * FROM daneadresowe WHERE ID_Klient="."'".$_SESSION["ID"]."'";
		$rezultat = @$polaczenie->query($sql);
		while($row = $rezultat->fetch_assoc()) 
		{
			$kod_lewo=intval($row["KodPocztowy"]/1000);
			$kod_prawo=$row["KodPocztowy"]-$kod_lewo*1000;
			echo '<form action="adres_usun.php" method="post">';
			echo '	<div class="profile-adress-container">';
			echo '		<div class="adress">';
			echo ' 			Email: '.$row["Email"];
			echo '			<p>Zamieszkany/a: '.$row["Miasto"].' '.$kod_lewo."-".$kod_prawo.'</p>';
			if($row["NrLokalu"]==NULL)
			{
				echo '		<p>Adres: '.$row["Adres"].'</p>';
			}
			else
			{
				echo '		<p>Adres: '.$row["Adres"].' m.'.$row["NrLokalu"].'</p>';
			}
			echo '		</div>';
			echo '		<div class="button-area-adress">';
			echo ' 			<input type="submit" value="USUŃ ADRES!"/>';
			echo '			<input type="hidden" name="uniqueID" value="'.$row["unique_ID"].'" />';
			echo '		</div>';
			echo '	</div>';
			echo '</form>';
		}
	?>
	
	
</body>
</html>