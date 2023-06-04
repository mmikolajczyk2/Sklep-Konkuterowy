<?php include "dbconnect.php"; ?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="categoriesstyle.css">

	
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
	.adrs 
	{
		margin-top: 10px;
		text-align: center;
	}
	
	.adrs input[type="submit"]
	{
		border: none;
		outline: none;
		height: 75px;
		width: 500px;
		margin-top: 15px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border: 5px solid green;
		color: black;
		font-size: 16px;
		border-radius: 50px;
	}
	.adrs input[type="submit"]:hover
	{
		curson: pointer;
		background: #ffc107;
		color: #000;
	}
	.new_adrs
	{
		margin-top: 40px;
		text-align: center;	
	}
	.new_adrs input[value="DODAJ NOWY ADRES!"]
	{
		border: none;
		outline: none;
		height: 75px;
		width: 500px;
		margin-top: 15px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border: 5px solid green;
		color: black;
		font-size: 25px;
		font-style: italic;
		font-weight: bold;
		border-radius: 50px;
	}
	.new_adrs input[value="DODAJ NOWY ADRES!"]:hover
	{
		curson: pointer;
		background: #ffc107;
		color: #000;	
	}
	</style>
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