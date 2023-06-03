<?php

	session_start();

	require_once "connect.php";
	
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

	if($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="categoriesstyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	
</head>
<body>

	<div class="menu-bar"> 
	<ul>
		<?php
			echo "Witaj, ".$_SESSION['Imie']."!";
		?>
		<li class="active">Wybierz kategorię</li>
		<li><a href="elektronika.php">Elektronika </a><i class="fas fa-tv"></i></li>
		<li><a href="sport.php">Sport </a><i class="fa fa-volleyball-ball"></i></li>
		<li><a href="jedzenie.php">Jedzenie </a><i class="fas fa-utensils"></i></li>
		<li><a href="ogrod.php">Ogród </a><i class="fas fa-seedling"></i></li>
		<li><a href="rozrywka.php">Rozrywka i gaming  </a><i class="fas fa-mouse"></i></li>
		<li><a href="index.php">Wyloguj się</a><i class="fas fa-sign-out-alt"></i></li>
		<li><a href="koszyk.php">Koszyk</a><i class="fas fa-shopping-cart"></i></li>
		<li><a href="profil.php">Profil</a><i class="fas fa-user"></i></li>
	</ul>
	
	</div>

	<style>
	.container {
		width: 800px;
		height: 200px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border: 5px solid green;
		margin: 0 auto;
		margin-top: 5px;
	}
	.image {
		height: 190px;
		width: 250px;
		border-right: 5px solid green;
		float:left;
	}

	.containerForText {
		float:center;
		text-align: center;
		margin: 15px;
	}
	.containerForPrice {
		background-color: yellow;
		float: center;
	}
	.price {
		float: right;
	}
	.description {
		margin-top: 50px;
		font-size: 12px;
	}
	.purchase {
		margin-top: 10px;
	}
	.purchase input {
		width: 110px;
		border: solid 2px green;
	}
	.okbutton {
		margin-top:3px;
	}
	.okbutton input[type="submit"]
	{
		border: none;
		outline: none;
		height: 30px;
		width: 135px;
		margin-top: 15px;
		background: #fb2525;
		color: #fff;
		font-size: 12px;
		border-radius: 10px;
	}
	.okbutton input[type="submit"]:hover
	{
		curson: pointer;
		background: #ffc107;
		color: #000;
	}
	</style>
	
		
	<?php
		$sql = "SELECT * FROM produkt WHERE Kategoria='Rozrywka i Gaming'";
		$rezultat = @$polaczenie->query($sql);
		while($row = $rezultat->fetch_assoc()) 
		{
			echo '<form action="dodanie_do_koszyka.php" method="post">';
			echo '<div class="container">';
			echo '	<div class="containerForImage">';
			echo '		<img src="'.$row["nazwaObrazku"].'" class="image">';
			echo '	</div>';
			echo '	<div class="containerForText">';
			echo '		<p><b><u>'.$row["Nazwa"].'</u></b></p>';
			echo '		<div class="price"><p><b>Cena: '.$row["CenaZaSztuke"].'zł</b></p></div>';
			echo '		<div class="description">'.$row["opis"].'</div>';
			echo '		<div class="purchase">';
			echo '			<input type="number" min="0" step="1" value="0" name="ilosc" id="ilosc" placeholder="0"> ';
			echo '		</div>';
			echo '		<div class="okbutton">';
			echo '			<input type="submit" value="DODAJ DO KOSZYKA!"/>';
			echo '			<input type="hidden" name="kategoria" value="rozrywka"/>';
			echo '			<input type="hidden" name="id_produktu" value="'.$row["ID_Produktu"].'"/>';
			echo '		</div>';		
			echo '	</div>';
			echo '</div>';
			echo '</form>';
		}
		
	?>
	
	


</body>
</html>