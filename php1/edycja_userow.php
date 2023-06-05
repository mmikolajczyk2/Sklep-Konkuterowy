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
		<li class="active"><a href="edycja_userow.php">Edycja userów</a></li>
		<li><a href="index.php">Wyloguj się </a>
	</ul>
	</div>

		<h2>Użytkownicy</h2>
	<div>
		<table class = "tabela">
			<thead>
				<th>ID_Klient</th>
				<th>login</th>
				<th>Imie</th>
				<th>Nazwisko</th>
				<th>admin</th>
			</thead>
			<tbody>
				<?php

				$sql = "SELECT * FROM danelogowania";
				$rezultat = $polaczenie->query($sql);

				if(!$rezultat)
				{
					die("Coś poszło nie tak." . $polaczenie->error);
				}

				while($wiersz = $rezultat->fetch_assoc())
				{
					echo "
					<tr>
						<td>$wiersz[ID_Klient]</td>
						<td>$wiersz[login]</td>
						<td>$wiersz[Imie]</td>
						<td>$wiersz[Nazwisko]</td>
						<td>$wiersz[admin]</td>
						<td>
							<a href='edytuj.php?ID_Klient=$wiersz[ID_Klient]'>Edit</a>
							<a href='usun.php?ID_Klient=$wiersz[ID_Klient]'>Usuń</a>
						</td>
					</tr>
					";
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>