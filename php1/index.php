<?php

	session_start();
	unset($_SESSION['blad1']);
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style/index.css">
</head>
<body>
	<div class="loginbox">
	<img src="avatar.png" class="avatar">
		<h1>Zaloguj się tu!</h1>
		<form action="zaloguj.php" method="post">
		
			<p>Nazwa użytkownika</p>
			<input type="text" name="login" placeholder="Podaj nazwę użytkownika: "> 
			<p>Hasło</p>
			<input type="password" name="haslo" placeholder="Podaj hasło: "> 
			<input type="submit" value="Zaloguj się!" />
		</form>
		<a href="rejestracja.php"><input type="submit" value="Zarejestruj się!" /></a>
		
		<?php
			if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
		?>
	</div>
</body>
</html>