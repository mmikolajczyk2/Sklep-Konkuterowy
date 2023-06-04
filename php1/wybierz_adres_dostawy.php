<?php include "dbconnect.php"; ?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="style/categories.css">
	<link rel="stylesheet" href="style/adres_dostawy.css">

	
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
		<li><a href="index.php">Wyloguj się</a>
		<li><a href="koszyk.php">Koszyk</a>
		<li><a href="profil.php">Profil</a>
	</ul>
	</div>

	<div class="profile-main-container">
		Wybierz adres dostawy.
	</div>
	
	<?php
		$sql = "SELECT * FROM daneadresowe WHERE ID_Klient='".$_SESSION["ID"]."'";
		$rezultat = @$polaczenie->query($sql);
		while($row = $rezultat->fetch_assoc())
		{
			$kod_lewo=intval($row["KodPocztowy"]/1000);
			$kod_prawo=$row["KodPocztowy"]-$kod_lewo*1000;
			$value = "";
			if($row["NrLokalu"]==NULL) $value = $row["Miasto"].' '.$kod_lewo.'-'.$kod_prawo.', '.$row["Adres"];
			else $value = $row["Miasto"].' '.$kod_lewo.'-'.$kod_prawo.', '.$row["Adres"].' m. '.$row["NrLokalu"];
			
			echo '<div class="adrs">';
			echo '	<form action="wysylanie_zamowienia.php" method="post">';
			echo '		<input type="submit" value="'.$value.'"/>';
			echo '		<input type="hidden" name="uniqueID" value="'.$row["unique_ID"].'" />';
			echo '  </form>';
			echo '</div>';
		}
	?>
	
	<div class="new_adrs">
		<a href="tworzenie_adresu.php"><input type="submit" value="DODAJ NOWY ADRES!"/></a>
	</div>


</body>
</html>