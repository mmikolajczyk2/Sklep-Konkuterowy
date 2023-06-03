<?php
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $encrypted_password = crypt($password, 'rl');

  $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $username, $encrypted_password);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    echo "Rejestracja zakończona sukcesem.";
  } else {
    echo "Błąd rejestracji.";

  }

  $stmt->close();
 
}

$conn->close();

?>
