<?php
session_start();
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if (hash_equals(crypt($password, 'rl'), $row['password'])) {
      $_SESSION['username'] = $username;
      $_SESSION['role'] = $row['role'];
      header("Location: panel_uzytkownika.php");
      exit();
    } else {
      echo "Błędne hasło.";
    }
  } else {
    echo "Użytkownik nie istnieje.";
  }

  $stmt->close();
}

$conn->close();
?>