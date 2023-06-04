<?php include "dbconnect.php"; ?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="style/categories.css">
	<link rel="stylesheet" href="style/tworzenie_adresu.css">

	
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
	