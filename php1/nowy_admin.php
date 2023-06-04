<?php

	session_start();
	unset($_SESSION['blad']);
	unset($_SESSION['blad_item']);
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style/adminstyle.css">
	<link rel="stylesheet" href="style/nowy_admin.css">

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