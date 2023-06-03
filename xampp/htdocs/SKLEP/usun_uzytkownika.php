<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'administrator') {
  header("Location: logowanie.php");
  exit();
}

require_once 'db_config.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
  echo "Użytkownik został usunięty.";
} else {
  echo "Błąd podczas usuwania użytkownika.";
}

$stmt->close();

$conn->close();
?>
