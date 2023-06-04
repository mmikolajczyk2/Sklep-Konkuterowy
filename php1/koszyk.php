<?php

	session_start();

	require_once "connect.php";
	
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
			<li  class="active"><a href="koszyk.php">Koszyk</a><i class="fas fa-shopping-cart"></i></li>
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
	.container {
		width: 700px;
		height: 150px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border: 5px solid green;
		margin: 0 auto;
		margin-top: 5px;
	}
	.image {
		height: 140px;
		width: 190px;
		border-right: 5px solid green;
		float:left;
	}

	.containerForText {
		float:center;
		text-align: center;
		margin: 15px;
	}
	.containerForPrice {
		background-color: yellow;
		float: center;
	}
	.price {
		float: right;
		margin-top: 15px;
	}
	.options {
		margin-top: 50px;
		font-size: 12px;
	}
	.purchase {
		margin-top: 10px;
		float: left;
		margin-left: 20px;
	}
	.purchase input {
		width: 110px;
		border: solid 2px green;
	}
	.okbutton {
		margin-top: 10px;
		
	}
	.okbutton input[type="submit"]
	{
		border: none;
		outline: none;
		height: 30px;
		background: #fb2525;
		color: #fff;
		font-size: 12px;
		border-radius: 10px;
	}
	.okbutton input[type="submit"]:hover
	{
		curson: pointer;
		background: #ffc107;
		color: #000;
	}
	.modify
	{
		margin-top:30px;
	}
	.modify input[type="submit"]
	{
		margin-top: 10px;
		border: none;
		outline: none;
		height: 30px;
		width: 120px;
		background: #fb2525;
		color: #fff;
		font-size: 12px;
		border-radius: 10px;
	}
	.modify input[name="modyfikuj"]
	{
		margin-top: 10px;
		border: none;
		outline: none;
		height: 30px;
		width: 100px;
		background: #fb2525;
		color: #fff;
		font-size: 12px;
		border-radius: 10px;
	}
	.modify input[type="submit"]:hover
	{
		curson: pointer;
		background: #ffc107;
		color: #000;
	}
	</style>

	
	<?php
	
		$sql = "SELECT * FROM koszyk WHERE ID_Klient='".$_SESSION["ID"]."'";
		$rezultat = @$polaczenie->query($sql);
		$count = $rezultat->num_rows;
		if($count==0)
		{
			?>
				<div class="profile-main-container">
					Twój koszyk jest pusty.
				</div>
			<?php
		}
		else
		{
			?>
				<div class="profile-main-container">
					Przedmioty w Twoim koszyku.
				</div>		
			<?php
			
			$total_value_of_items = 0;
			while($row = $rezultat->fetch_assoc())
			{
				$sql2 = "SELECT * FROM produkt WHERE ID_Produktu='".$row["ID_Produktu"]."'";
				$rezultat2 = @$polaczenie->query($sql2);
				while($row2 = $rezultat2->fetch_assoc())
				{
					$value = $row["IloscSztuk"] * $row2["CenaZaSztuke"];
					$total_value_of_items = $total_value_of_items + $value;
					echo '<form action="modyfikuj_w_koszyku.php" method="post">';
					echo '<div class="container">';
					echo '	<div class="containerForImage">';
					echo '		<img src="'.$row2["nazwaObrazku"].'" class="image">';
					echo '	</div>';
					echo '	<div class="containerForText">';
					echo '		<p><b><u>'.$row2["Nazwa"].'</u></b></p>';
					echo '		<div class="price"><p><b>Koszt: '.number_format((float)$value, 2, '.', '').'zł '.'('.$row2["CenaZaSztuke"].'zł/szt)</b></p></div>';
					echo '		<div class="options">';
					echo '			<div class="purchase">';
					echo '				Zmień ilośc tutaj:';
					echo '				<input type="number" min="1" step="1" name="ilosc" id="ilosc" value="'.$row["IloscSztuk"].'"> ';
					echo '			</div>';
					echo '		</div>';
					echo '		<div class="buttons">';
					echo '			<div class="modify">';
					echo '				<input type="submit" name="modyfikuj" value="MODYFIKUJ!"/>';
					echo '				<input type="submit" name="usun" value="USUŃ Z KOSZYKA!"/>';
					echo '				<input type="hidden" name="uniqueID" value="'.$row["unique_ID"].'" />';
					echo '			</div>';
					echo '		</div>';
					echo '	</div>';
					echo '</div>';
					echo '</form>';
				}
			}
			?>
			<style>
			.pay-container
			{
				width: 800px;
				height: 150px;
				background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
				border: 5px solid green;
				margin: 0 auto;
				margin-top: 50px;
				font-size: 50px;
				text-align: center;
			}
			.pay-container input[type="submit"]
			{
				margin-top: 10px;
				border: none;
				font-weight: bold;
				outline: none;
				height: 50px;
				width: 250px;
				background: #fb2525;
				color: #fff;
				font-size: 16px;
				border-radius: 30px;		
			}
			.pay-container input[type="submit"]:hover
			{
				curson: pointer;
				background: #ffc107;
				color: #000;
			}
			</style>
			<div class="pay-container">
				Do zapłaty łącznie: 
				<?php
					$_SESSION["oplata"]=$total_value_of_items;
					echo number_format((float)$total_value_of_items, 2, '.', '').' zł';
				?>
				<form action="koszyk_zatwierdzanie.php" method="post">
					<input type="submit" name="akceptuj" value="ZAAKCEPTUJ TRANSAKCJĘ!"/>
					<input type="submit" name="wyczysc" value="WYCZYŚĆ KOSZYK!"/>
				</form>
			</div>
			<?php
		}
			?>

	
	
</body>
</html>