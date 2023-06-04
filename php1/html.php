<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="categoriesstyle.css">
	
	
</head>
<body>

	<div class="menu-bar"> 
		<ul>
			<?php
				echo "Witaj, ".$_SESSION['Imie']."!";
			?>
			<li><a href=sklep.php>Strona Główna </a>
			<li><a href="sluchawki.php">Sluchawki </a>
			<li><a href="laptop.php">Laptopy </a>
			<li><a href="konsola.php">Konsole </a>
			<li><a href="koszyk.php">Koszyk</a>
			<li><a href="profil.php">Profil</a>
			<li><a href="index.php">Wyloguj się</a>
		</ul>
	
	</div>
	<style>
	.profile-main-container{
		width: 800px;
		height: 75px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border: 5px solid green;
		margin: 0 auto;
		margin-top: 50px;
		font-size: 50px;
		text-align: center;
	}
	.container {
		width: 700px;
		height: 150px;
		background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
		border: 5px solid green;
		margin: 0 auto;
		margin-top: 5px;
	}
	.image {
		height: 140px;
		width: 190px;
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
		margin-top: 15px;
	}
	.options {
		margin-top: 50px;
		font-size: 12px;
	}
	.purchase {
		margin-top: 10px;
		float: left;
		margin-left: 20px;
	}
	.purchase input {
		width: 110px;
		border: solid 2px green;
	}
	.okbutton {
		margin-top: 10px;
		
	}
	.okbutton input[type="submit"]
	{
		border: none;
		outline: none;
		height: 30px;
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
	.modify
	{
		margin-top:30px;
	}
	.modify input[type="submit"]
	{
		margin-top: 10px;
		border: none;
		outline: none;
		height: 30px;
		width: 120px;
		background: #fb2525;
		color: #fff;
		font-size: 12px;
		border-radius: 10px;
	}
	.modify input[name="modyfikuj"]
	{
		margin-top: 10px;
		border: none;
		outline: none;
		height: 30px;
		width: 100px;
		background: #fb2525;
		color: #fff;
		font-size: 12px;
		border-radius: 10px;
	}
	.modify input[type="submit"]:hover
	{
		cursor: pointer;
		background: #ffc107;
		color: #000;
	}
	</style>