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
		<li  class="active"><a href="profil.php">Profil</a><i class="fas fa-user"></i></li>
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