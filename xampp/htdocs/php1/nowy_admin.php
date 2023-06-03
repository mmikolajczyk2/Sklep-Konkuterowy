<?php

	session_start();
	unset($_SESSION['blad']);
	unset($_SESSION['blad_item']);
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
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
		<li><a href="index.php">Wyloguj się </a><i class="fas fa-sign-out-alt"></i></li>
	</ul>
	</div>
	<style>
	.loginbox
	{
		width: 400px;
		height: 480px;
		background: #000;
		color: #fff;
		top: 20%;
		left: 37%;
		position: absolute;
		transform: trasnlate(-50%,-50%);
		box-sizing: border-box;
		padding: 70px 30px;
		border-style: solid;
	}


	h1
	{
		margin: 0;
		padding: 0 0 30px;
		text-align: center;
		font-size: 30px;
	}

	.loginbox p
	{
		margin: 0;
		padding: 0;
		font-weight: bold;
	}

	.loginbox input
	{
		width: 100%;
		margin-bottom: 20px;
	}

	.loginbox input[type="text"], input[type="password"]
	{
		border: none;
		border-bottom: 1px solid #fff;
		background: transparent;
		outline: none;
		height: 40px;
		color: #fff;
		font-size: 16px;	
	}
	.loginbox input[type="submit"]
	{
		border: none;
		outline: none;
		height: 40px;
		background: #fb2525;
		color: #fff;
		font-size: 18px;
		border-radius: 20px;
	}
	.loginbox input[type="submit"]:hover
	{
		curson: pointer;
		background: #ffc107;
		color: #000;
	}




	</style>
	<div class="loginbox">
		<h1>Stwórz nowego admina</h1>
		<form action="zarejestruj_admina.php" method="post">
			<p>Nazwa użytkownika</p>
			<input type="text" name="login" placeholder="Podaj login: "> 
			<p>Hasło</p>
			<input type="password" name="haslo1" placeholder="Podaj hasło: "> 
			<p>Potwierdź hasło</p>
			<input type="password" name="haslo2" placeholder="Potwierdź hasło: "> 
			<input type="submit" value="Zarejestruj admina!" />
		</form>
		<?php
			if(isset($_SESSION['blad1'])) echo $_SESSION['blad1'];
		?>
	</div>
</body>
</html>