<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'administrator') {
  header("Location: logowanie.php");
  exit();
}

require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $price = $_POST['price'];

  // Walidacja pól formularza

  $errors = array();

  if (empty($name)) {
    $errors[] = "Nazwa produktu jest wymagana.";
  }

  if (empty($price)) {
    $errors[] = "Cena produktu jest wymagana.";
  } elseif (!is_numeric($price)) {
    $errors[] = "Cena produktu musi być liczbą.";
  }

  if (empty($errors)) {
    $stmt = $conn->prepare("INSERT INTO products (name, price) VALUES (?, ?)");
    $stmt->bind_param("sd", $name, $price);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
      echo "Produkt został dodany.";
    } else {
      echo "Błąd podczas dodawania produktu.";
    }

    $stmt->close();
  } else {
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  }
}
?>

<h2>Dodaj produkt</h2>

<form method="POST" action="dodaj_produkt.php">
  <label for="name">Nazwa produktu:</label>
  <input type="text" name="name" value=""><br>
  <label for="price">Cena produktu:</label>
  <input type="text" name="price" value=""><br>
  <input type="submit" value="Dodaj">
</form>
