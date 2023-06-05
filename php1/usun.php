<?php
if(isset($_GET["ID_Klient"]))
{
    $ID_Klient = $_GET["ID_Klient"];

    	
	$host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "php1";

    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

    $sql = "DELETE FROM danelogowania WHERE ID_Klient = $ID_Klient";
    $polaczenie->query($sql);
}

header("location: edycja_userow.php");
exit;
?>