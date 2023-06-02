<?php
// Konfiguracja połączenia z bazą danych
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'sklep';

// Połączenie z bazą danych
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Sprawdzenie połączenia
if ($conn->connect_error) {
  die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}
?>