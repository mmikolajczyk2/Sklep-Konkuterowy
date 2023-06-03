<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: logowanie.php");
  exit();
}

require_once 'db_config.php';

// Dodawanie produktu do koszyka
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $product_id = $_POST['product_id'];

  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }

  array_push($_SESSION['cart'], $product_id);

  echo "Produkt dodany do koszyka.";
}

// Usuwanie produktu z koszyka
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['remove'])) {
  $product_id = $_GET['remove'];

  if (($key = array_search($product_id, $_SESSION['cart'])) !== false) {
    unset($_SESSION['cart'][$key]);
    echo "Produkt usunięty z koszyka.";
  }
}

// Wyświetlanie koszyka
echo "<h2>Koszyk</h2>";

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
  echo "<table>";
  echo "<tr><th>Nazwa produktu</th><th>Akcje</th></tr>";

  foreach ($_SESSION['cart'] as $product_id) {
    $stmt = $conn->prepare("SELECT name FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td><a href='koszyk.php?remove=" . $product_id . "'>Usuń</a></td>";
    echo "</tr>";

    $stmt->close();
  }

  echo "</table>";
} else {
  echo "Koszyk jest pusty.";
}

$stmt->close();

$conn->close();
?>
