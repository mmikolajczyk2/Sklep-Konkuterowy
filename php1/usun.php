<?php
if(isset($_GET["login"]))
{
    $login = $_GET["login"];

    	
	$host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "php1";

    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

    $sql = "DELETE FROM danelogowania WHERE 'login' = $login";
    $polaczenie->query($sql);
}

header("location: edycja_userow.php");
exit;
?>