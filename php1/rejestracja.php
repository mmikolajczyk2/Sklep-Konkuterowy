<?php

	session_start();
	unset($_SESSION['blad']);
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="rejestracja.css">
</head>
<body>
	<div class="loginbox">
	<img src="avatar.png" class="avatar">
		<h1>Zarejestruj się tu!</h1>
		<form action="zarejestruj.php" method="post">
			<p>Imię</p>
			<input type="text" name="forename" placeholder="Podaj swoje imię: "> 
			<p>Nazwisko</p>
			<input type="text" name="surname" placeholder="Podaj swoje nazwisko: ">
			<p>Nazwa użytkownika</p>
			<input type="text" name="login" placeholder="Podaj login: "> 
			<p>Hasło</p>
			<input type="password" name="haslo1" placeholder="Podaj hasło: "> 
			<p>Potwierdź hasło</p>
			<input type="password" name="haslo2" placeholder="Potwierdź hasło: "> 
			<input type="submit" value="Zarejestruj się!" />
		</form>
		<a href="index.php"><input type="submit" value="Cofnij się do logowania!" /></a>
		
		<?php
			if(isset($_SESSION['blad1'])) echo $_SESSION['blad1'];
		?>
	</div>
</body>
</html>