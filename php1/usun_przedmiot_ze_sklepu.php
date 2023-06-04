<?php include "dbconnect.php"; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep internetowy</title>
	<link rel="stylesheet" href="style/adminstyle.css">
	<link rel="stylesheet" href="style/usun_przedmiot_ze_sklepu1.css">
	<link rel="stylesheet" href="style/usun_przedmiot_ze_sklepu2.css">
	
</head>
<body>
	<div class="menu-bar"> 
	<ul>
		<?php
			echo "Witaj, ".$_SESSION['Imie']."!";
		?>
		<li class="active">Wybierz opcję admina</li>
		<li><a href="zamowienia.php">Zamówienia</a></li>
		<li><a href="nowy_przedmiot.php">Nowy przedmiot</a></li>
		<li><a href="usun_przedmiot.php">Usuń przedmiot</a></li>
		<li><a href="nowy_admin.php">Nowy admin</a></li>
		<li><a href="index.php">Wyloguj się </a>
	</ul>
	</div>
	<div class="profile-main-container">
		<div class="text">
			Przedmioty znalezione!
		</div>
		<div class="but">
			<a href="usun_przedmiot.php"><input type="submit" name="back" value="Powrót!"></a>
		</div>
		
	</div>

<?php
		$item = $_POST["item"];
		$cenaOd = $_POST["cenaOd"];
		$cenaDo = $_POST["cenaDo"];

		if(empty($item)&&empty($cenaOd)&&empty($cenaDo))
		{
			$_SESSION['blad_item2'] = '<span style="color:red">Wszystkie pola są puste!</span>';
			header('Location: usun_przedmiot.php');
		}
		//bazujemy na cenach
		else if(empty($item))
		{
			$f1 = floatval($cenaOd); 
			$f2 = floatval($cenaDo);
			if($f1>$f2)
			{
				$_SESSION['blad_item2'] = '<span style="color:red">CenaOd jest większa od CenyDo!</span>';
				header('Location: usun_przedmiot.php');
			}
			else if($f1<0 || $f2<0)
			{
				$_SESSION['blad_item2'] = '<span style="color:red">Ceny są mniejsze od zera!</span>';
				header('Location: usun_przedmiot.php');				
			}
			else
			{
				$sql = "SELECT * FROM produkt";
				$rezultat = @$polaczenie->query($sql);
				while($row = $rezultat->fetch_assoc())
				{
					$current_price = $row["CenaZaSztuke"];
					$float_price_current = floatval($current_price);
					if($cenaOd<=$float_price_current && $cenaDo>=$float_price_current)
					{
									
				
							echo '<form action="usuwanie_przedmiotu.php" method="post">';
							echo '<div class="container">';
							echo '	<div class="containerForImage">';
							echo '		<img src="'.$row["nazwaObrazku"].'" class="image">';
							echo '	</div>';
							echo '	<div class="containerForText">';
							echo '		<p><b><u>'.$row["Nazwa"].'</u></b></p>';
							echo '		<div class="price"><p><b>Cena: '.$row["CenaZaSztuke"].'zł</b></p></div>';
							echo '		<div class="description">'.$row["opis"].'</div>';
							echo '		<div class="okbutton">';
							echo '			<input type="submit" value="USUŃ Z BAZY DANYCH!"/>';
							echo '			<input type="hidden" name="id_produktu" value="'.$row["ID_Produktu"].'"/>';
							echo '		</div>';		
							echo '	</div>';
							echo '</div>';
							echo '</form>';
				
					}
					
				}
				unset($_SESSION['item_blad2']);
			}
		}
		else if(empty($cenaOd)&&empty($cenaDo))//ogarniamy pomiedzy cenami itemki
		{
			$sql = "SELECT * FROM produkt";
			$rezultat = @$polaczenie->query($sql);
			while($row = $rezultat->fetch_assoc())
			{		
				
				if( stripos($row["Nazwa"],$item)!==false)
				{
					echo '<form action="usuwanie_przedmiotu.php" method="post">';
					echo '<div class="container">';
					echo '	<div class="containerForImage">';
					echo '		<img src="'.$row["nazwaObrazku"].'" class="image">';
					echo '	</div>';
					echo '	<div class="containerForText">';
					echo '		<p><b><u>'.$row["Nazwa"].'</u></b></p>';
					echo '		<div class="price"><p><b>Cena: '.$row["CenaZaSztuke"].'zł</b></p></div>';
					echo '		<div class="description">'.$row["opis"].'</div>';
					echo '		<div class="okbutton">';
					echo '			<input type="submit" value="USUŃ Z BAZY DANYCH!"/>';
					echo '			<input type="hidden" name="id_produktu" value="'.$row["ID_Produktu"].'"/>';
					echo '		</div>';		
					echo '	</div>';
					echo '</div>';
					echo '</form>';
				}
			}
			unset($_SESSION['item_blad2']);
			
		}
		else
		{
			$_SESSION['blad_item2'] = '<span style="color:red">Coś jest nie tak!</span>';
			header('Location: usun_przedmiot.php');	
		}
		$polaczenie->close();
	
?>

</body>
</html>
