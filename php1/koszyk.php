<?php include "dbconnect.php"; ?>
<?php include "html.php"; ?>

	
	<?php
	
		$sql = "SELECT * FROM koszyk WHERE ID_Klient='".$_SESSION["ID"]."'";
		$rezultat = @$polaczenie->query($sql);
		$count = $rezultat->num_rows;
		if($count==0)
		{
			?>
				<div class="profile-main-container">
					Twój koszyk jest pusty.
				</div>
			<?php
		}
		else
		{
			?>
				<div class="profile-main-container">
					Przedmioty w Twoim koszyku.
				</div>		
			<?php
			
			$total_value_of_items = 0;
			while($row = $rezultat->fetch_assoc())
			{
				$sql2 = "SELECT * FROM produkt WHERE ID_Produktu='".$row["ID_Produktu"]."'";
				$rezultat2 = @$polaczenie->query($sql2);
				while($row2 = $rezultat2->fetch_assoc())
				{
					$value = $row["IloscSztuk"] * $row2["CenaZaSztuke"];
					$total_value_of_items = $total_value_of_items + $value;
					echo '<form action="modyfikuj_w_koszyku.php" method="post">';
					echo '<div class="container">';
					echo '	<div class="containerForImage">';
					echo '		<img src="'.$row2["nazwaObrazku"].'" class="image">';
					echo '	</div>';
					echo '	<div class="containerForText">';
					echo '		<p><b><u>'.$row2["Nazwa"].'</u></b></p>';
					echo '		<div class="price"><p><b>Koszt: '.number_format((float)$value, 2, '.', '').'zł '.'('.$row2["CenaZaSztuke"].'zł/szt)</b></p></div>';
					echo '		<div class="options">';
					echo '			<div class="purchase">';
					echo '				Zmień ilośc tutaj:';
					echo '				<input type="number" min="1" step="1" name="ilosc" id="ilosc" value="'.$row["IloscSztuk"].'"> ';
					echo '			</div>';
					echo '		</div>';
					echo '		<div class="buttons">';
					echo '			<div class="modify">';
					echo '				<input type="submit" name="modyfikuj" value="MODYFIKUJ!"/>';
					echo '				<input type="submit" name="usun" value="USUŃ Z KOSZYKA!"/>';
					echo '				<input type="hidden" name="uniqueID" value="'.$row["unique_ID"].'" />';
					echo '			</div>';
					echo '		</div>';
					echo '	</div>';
					echo '</div>';
					echo '</form>';
				}
			}
			?>
			<style>
			.pay-container
			{
				width: 800px;
				height: 150px;
				background-image: linear-gradient(to right,#deeaee,#FFFECF,#C3EBF9,#C2F5CF,#FFFECF);
				border: 5px solid green;
				margin: 0 auto;
				margin-top: 50px;
				font-size: 50px;
				text-align: center;
			}
			.pay-container input[type="submit"]
			{
				margin-top: 10px;
				border: none;
				font-weight: bold;
				outline: none;
				height: 50px;
				width: 250px;
				background: #fb2525;
				color: #fff;
				font-size: 16px;
				border-radius: 30px;		
			}
			.pay-container input[type="submit"]:hover
			{
				cursor: pointer;
				background: #ffc107;
				color: #000;
			}
			</style>
			<div class="pay-container">
				Do zapłaty łącznie: 
				<?php
					$_SESSION["oplata"]=$total_value_of_items;
					echo number_format((float)$total_value_of_items, 2, '.', '').' zł';
				?>
				<form action="koszyk_zatwierdzanie.php" method="post">
					<input type="submit" name="akceptuj" value="ZAAKCEPTUJ TRANSAKCJĘ!"/>
					<input type="submit" name="wyczysc" value="WYCZYŚĆ KOSZYK!"/>
				</form>
			</div>
			<?php
		}
			?>

	
	
</body>
</html>