<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="style/categories.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	
	
</head>
<body>

	<div class="menu-bar"> 
		<ul>
			<?php
				echo "Witaj, ".$_SESSION['Imie']."!";
			?>
			<li><a href=sklep.php>Strona Główna </a>
			<li><a href="sluchawki.php">Słuchawki </a>
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
		background-image: linear-gradient(to left,#5459eb,#7386ff,#7386ff,#5459eb);
		border: 5px solid white;
		border-radius: 50px;
		margin: 0 auto;
		margin-top: 50px;
		font-size: 50px;
		text-align: center;
		text-shadow: 2px -3px 5px rgba(212, 175, 55, 1);
		opacity: 0;
  		animation: fadeIn 1s forwards;
	}
	.container {
		width: 700px;
		height: 150px;
		background: linear-gradient(to right,#5459eb,#7386ff,#7386ff,#5459eb);
		border: 5px solid gold;
		margin: 0 auto;
		margin-top: 5px;
		font-size: 17px;
		text-shadow: 1px 1px 8px rgba(0, 0, 0, 0.4);
		border-radius: 40px;
		opacity: 0;
  		animation: fadeIn 1s forwards;
		
		
	}
	@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
	.image {
		height: 140px;
		width: 190px;
		border-right: 5px solid black;
		float:left;
		border-radius: 40px;
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
		padding: 7px;
		outline: none;
		height: 30px;
		background: #fb2525;
		color: #fff;
		font-size: 13px;
		border-radius: 10px;
		transition: background-color 0.3s ease;
	}
	.okbutton input[type="submit"]:hover
	{
		cursor: pointer;
		background: #ffc107;
		color: #000;
		transition: background-color 0.3s ease;
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
		transition: background-color 0.3s ease;
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
		transition: background-color 0.3s ease;
	}
	.modify input[type="submit"]:hover
	{
		cursor: pointer;
		background: #ffc107;
		color: #000;
	}
	</style>