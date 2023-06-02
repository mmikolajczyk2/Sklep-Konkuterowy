<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: logowanie.php");
  exit();
}

$role = $_SESSION['role'];
$username = $_SESSION['username'];

// Sprawdzenie poziomu uprawnień
if ($role === 'administrator') {
  // Wyświetlanie stron dla administratora
  echo "Witaj, $username! Jesteś zalogowany jako administrator.";
} else {
  // Wyświetlanie stron dla użytkownika
  echo "Witaj, $username! Jesteś zalogowany jako użytkownik.";
}
?>
