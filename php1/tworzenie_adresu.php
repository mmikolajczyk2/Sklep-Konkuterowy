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
		<li><a href="sluchawki.php">Sluchawki</a>
		<li><a href="laptop.php">Laptopy </a>
		<li><a href="konsola.php">Konsole </a>
		<li><a href="koszyk.php">Koszyk</a>
		<li><a href="profil.php">Profil</a>
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
	.email-area
	{
		width: 800px;
		height: 300px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border: 5px solid green;
		margin: 0 auto;
		margin-top: 50px;
		font-size: 20px;
		text-align: center;
	}
	.buttons input[type="submit"]
	{
		margin-top: 30px;
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
	.buttons input[type="submit"]:hover
	{
		curson: pointer;
		background: #ffc107;
		color: #000;	
	}
	.email
	{
		text-align: left;
		margin-top: 20px;
		margin-left: 15px;
		font-size: 15px;
	}
	.email input[type="text"]
	{
		height: 40px;
		width: 300px;
		margin-left: 20px;
		text-align: center;
	}
	.city
	{
		text-align: left;
		margin-top: 20px;
		margin-left: 15px;	
		font-size: 15px;
	}
	.city input[type="text"]
	{
		height: 40px;
		width: 200px;
		margin-left: 20px;
		text-align: center;
		
	}
	.city input[name="kod1"]
	{
		height: 40px;
		width: 40px;
		margin-left: 20px;
		text-align: center;
	}
	.city input[name="kod2"]
	{
		height: 40px;
		width: 75px;
		text-align: center;
		margin-left: 2px;
	}
	.addr
	{
		text-align: left;
		margin-top: 20px;
		margin-left: 15px;	
		font-size: 14px;	
		
	}
	.addr input[name="ulica"]
	{
		height: 40px;
		width: 200px;
		margin-left: 20px;
		text-align: center;
	}
	.addr input[name="nrulicy"]
	{
		height: 40px;
		width: 50px;
		margin-left: 5px;	
		text-align: center;
	}
	.addr input[name="lokal"]
	{
		height: 40px;
		width: 50px;
		margin-left: 5px;	
		text-align: center;
	}
	.buttons button
	{
		margin-top: 30px;
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
	.buttons button:hover
	{
		curson: pointer;
		background: #ffc107;
		color: #000;
	}
	</style>
	<div class="profile-main-container">
		Tworzenie nowego adresu.
	</div>
	<div class="email-area">
			<form action="adres_dodaj.php" method="post">
				<div class="email">
					Podaj adres email: 
					<input type="text" name="email"> 
				</div>
				<div class="city">
					Podaj nazwę miasta, kod pocztowy: 
					<input type="text" name="miasto" >
					<input type="text" name="kod1" > 
					-
					<input type="text" name="kod2" >
				</div>
				<div class="addr">
					Podaj nazwę ulicy, jej numer i numer lokalu (opcjonalnie): 
					<input type="text" name="ulica"> 
					<input type="text" name="nrulicy"> 
					m.
					<input type="text" name="lokal"> 
				</div>
				

				<div class="buttons">
					<input type="submit" value="Dodaj podane dane!" />
			</form>
					<a href="profil.php"><button type="button">Cofnij się do profilu!</button></a>
				</div>
			
			
			<?php
				if(isset($_SESSION['blad2'])) echo $_SESSION['blad2'];
			?>
			
		</div>
	</div>
	