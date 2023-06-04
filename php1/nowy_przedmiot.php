<?php include "dbconnect.php"; ?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="adminstyle.css">
	
</head>
<body>
	<div class="menu-bar"> 
	<ul>
		<?php
			echo "Witaj, ".$_SESSION['Imie']."!";
		?>
		<li class="active">Wybierz opcję admina</li>
		<li><a href="zamowienia.php">Zamówienia</a></li>
		<li><a href="nowy_przedmiot.php">Nowy przedmiot</a></li>
		<li><a href="usun_przedmiot.php">Usuń przedmiot</a></li>
		<li><a href="nowy_admin.php">Nowy admin</a></li>
		<li><a href="index.php">Wyloguj się </a>
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
	</style>
	<div class="profile-main-container">
		Dodaj nowy przedmiot!
	</div>
	<style>
	.item-area
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
	.item_name
	{
		text-align: left;
		margin-top: 20px;
		margin-left: 15px;
		font-size: 15px;
	}
	.item_name input[type="text"]
	{
		height: 40px;
		width: 300px;
		margin-left: 20px;
		text-align: center;
	}
	.datas
	{
		text-align: left;
		margin-top: 20px;
		margin-left: 15px;	
		font-size: 15px;
	}
	.datas input[type="text"]
	{
		height: 40px;
		width: 200px;
		margin-left: 20px;
		text-align: center;
		
	}
	.datas input[name="cena"]
	{
		height: 40px;
		width: 75px;
		margin-left: 20px;
		text-align: center;
	}
	.datas input[name="kategoria"]
	{
		height: 40px;
		width: 125px;
		text-align: center;
		margin-left: 10px;
	}
	.desc
	{
		text-align: left;
		margin-top: 20px;
		margin-left: 15px;	
		font-size: 14px;	
		
	}
	.desc input[name="opis"]
	{
		height: 40px;
		width: 600px;
		margin-left: 20px;
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
	<div class="item-area">
			<form action="dodaj_przedmiot.php" method="post">
				<div class="item_name">
					Podaj nazwę przedmiotu: 
					<input type="text" name="item"> 
				</div>
				<div class="datas">
					Podaj nazwę obrazka, cenę oraz kategorię:
					<input type="text" name="obrazek" >
					<input type="text" name="cena" > 
					<input type="text" name="kategoria" >
				</div>
				<div class="desc">
					Podaj opis:
					<input type="text" name="opis"> 
				</div>
				

				<div class="buttons">
					<input type="submit" value="Dodaj ten przedmiot!" />
				</div>
			</form>
				
			
			
			<?php
				if(isset($_SESSION['blad_item'])) echo $_SESSION['blad_item'];
			?>
			
		</div>
	</div>

</body>
</html>