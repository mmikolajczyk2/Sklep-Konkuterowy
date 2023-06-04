<?php

	session_start();
	require_once "connect.php";
	
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

	if($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	unset($_SESSION['blad_item']);
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="adminstyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	
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
		<li><a href="index.php">Wyloguj się </a></li>
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
		Usuń przedmiot!
	</div>
	<style>
	.item-area
	{
		width: 800px;
		height: 225px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border: 5px solid green;
		margin: 0 auto;
		margin-top: 25px;
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
	.datas input[name="cenaOd"]
	{
		height: 40px;
		width: 200px;
		margin-left: 20px;
		margin-right: 20px;
		text-align: center;
		
	}
	.datas input[name="cenaDo"]
	{
		height: 40px;
		width: 200px;
		margin-left: 20px;
		margin-right: 20px;
		text-align: center;
	}
	.button-area input[type="submit"]
	{
		margin-top: 20px;
		border: none;
		outline: none;
		height: 40px;
		width: 240px;
		margin-right: 75px;
		background: #fb2525;
		color: #fff;
		font-size: 15px;
		border-radius: 20px;
	}
	.button-area input[type="submit"]:hover
	{
		curson: pointer;
		background: #ffc107;
		color: #000;
	}
	</style>
	<div class="item-area">
			<form action="usun_przedmiot_ze_sklepu.php" method="post">
				<div class="item_name">
					Podaj nazwę przedmiotu (nie musi być pełna nazwa): 
					<input type="text" name="item"> 
				</div>
				<div class="datas">
					lub podaj cenę od 
					<input type="text" name="cenaOd" >
					 do 
					<input type="text" name="cenaDo" > 
				</div>
				

				<div class="button-area">
					<input type="submit" value="Znajdź pasujące przedmioty!" />
				</div>
			</form>
				
			
			
			<?php
				if(isset($_SESSION['blad_item2'])) echo $_SESSION['blad_item2'];
			?>
			
		</div>
	</div>

</body>
</html>