<?php
$ID_Klient = "";
$Imie = "";
$Nazwisko = "";
$login = "";
$admin = "";

$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "php1";

$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

$error = "";
$pomyslnie = "";

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if(!isset($_GET["ID_Klient"]))
    {
        header("location: edycja_userow.php");
        exit;
    }

    $ID_Klient = $_GET["ID_Klient"];

    $sql = "SELECT * FROM danelogowania WHERE ID_Klient = $ID_Klient";
    $rezultat = $polaczenie->query($sql);
    $wiersz = $rezultat->fetch_assoc();

    if(!$wiersz)
    {
        header("location: edycja_userow.php");
        exit;
    }

    $Imie = $wiersz["Imie"];
    $Nazwisko = $wiersz["Nazwisko"];
    $login = $wiersz["login"];
    $admin = $wiersz["admin"];
}
else
{
    $ID_Klient = $_POST["ID_Klient"];
    $Imie = $_POST["Imie"];
    $Nazwisko = $_POST["Nazwisko"];
    $login = $_POST["login"];
    $admin = $_POST["admin"];

    do{
        if (empty($ID_Klient) || empty($Imie) || empty($Nazwisko) || empty($login) || empty($admin))
        {
            $error ="Któreś pole jest puste!";
            break;
        }

        $sql = "UPDATE danelogowania SET Imie = '$Imie', Nazwisko = '$Nazwisko', login = '$login', admin = '$admin' WHERE ID_Klient = $ID_Klient";

        $rezultat = $polaczenie->query($sql);

        if(!$rezultat)
        {
            $error = "Coś poszło nie tak!". $polaczenie->error;
            break;
        }

        $pomyslnie = "Edytowano użytkownika!";

        header("location: edycja_userow.php");
        exit;

    }while(false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj</title>
</head>
<body>
    <div>
        <h2>Edytuj użytkownika</h2>

            <?php
                if(!empty($error))
                {
                    echo $error;
                }
            ?>

            <form method = "post">
                <input type="hidden" name="ID_Klient" value="<?php echo $ID_Klient; ?>">
                <div>
                    <label> Imię </label>
                        <div>
                            <input type = "text" name = "Imie" value = "<?php echo $Imie; ?>">
                        </div>
                </div>

                <div>
                    <label> Nazwisko </label>
                        <div>
                            <input type = "text" name = "Nazwisko" value = "<?php echo $Nazwisko; ?>">
                        </div>
                </div>

                <div>
                    <label> Login </label>
                        <div>
                            <input type = "text" name = "login" value = "<?php echo $login; ?>">
                        </div>
                </div>

                <div>
                    <label> Admin </label>
                        <div>
                            <input type = "text" name = "admin" value = "<?php echo $admin; ?>">
                        </div>
                </div>

                <?php
                if(!empty($pomyslnie))
                {
                    echo $pomyslnie;
                } 
                ?>

                <div>
                    <div>
                        <button type = "submit"> Akceptuj </button>
                    </div>
                    <div>
                        <a href = "edycja_userow.php" role = "button"> Anuluj </a>
                    </div>
                </div>
            </form>
    </div>
</body>
</html>