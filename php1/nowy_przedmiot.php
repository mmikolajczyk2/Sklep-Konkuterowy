<?php include "dbconnect.php"; ?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="style/adminstyle.css">
	<link rel="stylesheet" href="style/nowy_przedmiot.css">
	
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
		<li class="active"><a href="nowy_przedmiot.php">Nowy przedmiot</a></li>
		<li><a href="usun_przedmiot.php">Usuń przedmiot</a></li>

		<?php if($wiersz['admin'] == 1): ?>
			<li><a href="nowy_admin.php">Nowy user</a></li>
			<li><a href="edycja_userow.php">Edycja userów</a></li>
        <?php endif; ?>

		<li><a href="index.php">Wyloguj się </a>
	</ul>
	</div>

	</ul>
	</div>
	<style>
	.profile-main-container{
		width: 800px;
		height: 75px;
		background-image: linear-gradient(to left,#5459eb,#7386ff,#7386ff,#5459eb);
        border: 5px solid gold;
        border-radius: 50px;
		margin: 0 auto;
		margin-top: 50px;
		font-size: 50px;
		text-align: center;
	}
	</style>
	<div class="profile-main-container">
		Dodaj nowy przedmiot!
	</div>
	
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