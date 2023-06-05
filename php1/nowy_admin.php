<?php include "dbconnect.php"; ?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style/adminstyle.css">
	<link rel="stylesheet" href="style/nowy_admin.css">

</head>
<body>

<?php include "dbadmin.php"; ?>

	<div class="menu-bar"> 
	<ul>
		<?php
			echo "Witaj, ".$wiersz['login']."!";
		?>
		<li>Wybierz opcję Edycji</li>
		<li><a href="zamowienia.php">Zamówienia</a></li>
		<li><a href="nowy_przedmiot.php">Nowy przedmiot</a></li>
		<li><a href="usun_przedmiot.php">Usuń przedmiot</a></li>
		<li class="active"><a href="nowy_admin.php">Nowy user</a></li>
		<li><a href="edycja_userow.php">Edycja userów</a></li>
		<li><a href="index.php">Wyloguj się </a>
	</ul>
	</div>

	<div class="loginbox">
				<h1>Stwórz nowego usera</h1>
				<form action="zarejestruj_admina.php" method="post">
					<p>Nazwa użytkownika</p>
					<input type="text" name="login" placeholder="Podaj login: "> 
					<p>Hasło</p>
					<input type="password" name="haslo1" placeholder="Podaj hasło: "> 
					<p>Potwierdź hasło</p>
					<input type="password" name="haslo2" placeholder="Potwierdź hasło: "> 
					<p>Poziom uprawnien<br>(0-user, 1-admin, 2-moderator)</p>
					<input type="setadmin" name="setadmin" placeholder="Wprowadź poziom uprawnień: "> 
					<input type="submit" value="Zarejestruj usera!" />
				</form>
				<?php
				if(isset($_SESSION['blad1'])) echo $_SESSION['blad1'];
				?>
		</div>
</body>
</html>