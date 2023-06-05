<?php
	$login = $_SESSION['login'];

	$sql = "SELECT * FROM danelogowania WHERE login = '$login'";

	if($rezultat = @$polaczenie->query($sql))
	{
	$wiersz = $rezultat->fetch_assoc();
	}
    
	else
	{
	echo "Cos poszlo nie tak";
	}
?>