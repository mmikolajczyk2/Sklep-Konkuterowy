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
		<li><a href="koszyk.php">Koszyk</a>
		<li  class="active"><a href="profil.php">Profil</a>
		<li><a href="index.php">Wyloguj się</a>
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
	.profile-number-container{
		width: 600px;
		height: 75px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border: 5px solid green;
		margin: 0 auto;
		margin-top: 20px;
		font-size: 25px;
		text-align: center;
	}
	.number-area{
		margin-top: 17px;
		margin-left: 75px;
		float: left;
	}
	.button-area{
		text-align: right;
		float: right;
	}
	
	.button-area input[type="submit"]
	{
		margin-top: 11px;
		border: none;
		outline: none;
		height: 40px;
		width: 150px;
		margin-right: 75px;
		background: #fb2525;
		color: #fff;
		font-size: 15px;
		border-radius: 20px;
	}
	.button-area input[type="submit"]:hover
	{
		cursor: pointer;
		background: #ffc107;
		color: #000;
	}
	.container-for-orders
	{
		width: 800px;
		height: 75px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border: 5px solid green;
		margin: 0 auto;
		margin-top: 50px;
		font-size: 42px;
		text-align: center;	
	}
	.container-for-orders input[type="submit"]
	{
		border: none;
		outline: none;
		height: 65px;
		font-style: italic;
		font-weight: bold;
		width: 790px;
		margin-right: 75px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		color: black;
		font-size: 40px;
	}
	.container-for-orders input[type="submit"]:hover
	{
		cursor: pointer;
		background: #ffc107;
		color: #000;
	}
	</style>
	<div class="container-for-orders">
		<a href="moje_zamowienia.php"><input type="submit" name="submit" value="Zobacz swoje zamówienia [TUTAJ]"/></a>
	</div>
	
	<style>
	.adress
	{
		margin-top: 25px;
		float: left;
		font-size: 18px;
		margin-left: 15px;
	}
	.profile-adress-container{
		width: 600px;
		height: 125px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border: 5px solid green;
		margin: 0 auto;
		margin-top: 25px;
		font-size: 25px;
		text-align: center;
	}
	.button-area-adress{
		text-align: right;
		float: right;
	}
	
	.button-area-adress input[type="submit"]
	{
		margin-top: 33px;
		border: none;
		outline: none;
		height: 40px;
		width: 150px;
		margin-right: 75px;
		background: #fb2525;
		color: #fff;
		font-size: 15px;
		border-radius: 20px;
	}
	.button-area-adress input[type="submit"]:hover
	{
		cursor: pointer;
		background: #ffc107;
		color: #000;
	}
	.button_new_adrr
	{
		float: right;
	}
	.button_new_adrr input[type="submit"]
	{
		margin-top: 10px;
		border: none;
		outline: none;
		height: 40px;
		width: 150px;
		margin-right: 75px;
		background: #fb2525;
		color: #fff;
		font-size: 15px;
		border-radius: 20px;
	}
	.button_new_adrr input[type="submit"]:hover
	{
		cursor: pointer;
		background: #ffc107;
		color: #000;	
	}
	.text
	{
		float: left;
		margin-left: 10px;
	}
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