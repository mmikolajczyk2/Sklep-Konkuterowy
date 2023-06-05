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
		<li><a href="nowy_admin.php">Nowy user</a></li>
		<li class="active"><a href="edycaj_userow.php">Edycja userów</a></li>
		<li><a href="index.php">Wyloguj się </a>
	</ul>
	</div>
</body>
</html>