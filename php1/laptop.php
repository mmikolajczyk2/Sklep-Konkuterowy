<?php include "dbconnect.php"; ?>
<?php include "html.php"; ?>
	
		
	<?php
		$sql = "SELECT * FROM produkt WHERE Kategoria='Laptop'";
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
			echo '			<input type="hidden" name="kategoria" value="Laptop"/>';
			echo '			<input type="hidden" name="id_produktu" value="'.$row["ID_Produktu"].'"/>';
			echo '		</div>';		
			echo '	</div>';
			echo '</div>';
			echo '</form>';
		}
		
	?>
	

