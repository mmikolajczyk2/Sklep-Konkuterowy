
<?php include "dbconnect.php"; ?> 

<!DOCTYPE HTML>
  
<html lang="pl"> 
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="style/adminstyle.css">
</head>
<body>

<?php include "dbadmin.php"; ?>

	<div class="menu-bar"> 
	<ul>
		<?php
			echo "Witaj, ".$wiersz['login']."!";  // wyglad strony po zalogowaniu sie na admina
		?>
		<li class="active">Wybierz opcję Edycji</li>
		<li><a href="zamowienia.php">Zamówienia</a></li>
		<li><a href="nowy_przedmiot.php">Nowy przedmiot</a></li>
		<li><a href="usun_przedmiot.php">Usuń przedmiot</a></li> 

		<?php if($wiersz['admin'] == 1): ?> 
			<li><a href="nowy_admin.php">Nowy user</a></li> 
			<li><a href="edycja_userow.php">Edycja userów</a></li>
        <?php endif; ?>
		
		<li><a href="index.php">Wyloguj się </a>
	</ul>
	</div>
</body>
</html>
