<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: logowanie.php");
  exit();
}

require_once 'db_config.php';

// Przetwarzanie zamówienia
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_SESSION['username'];

  // Pobranie danych użytkownika
  $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $user_id = $row['id'];
  $stmt->close();

  // Tworzenie zamówienia
  $stmt = $conn->prepare("INSERT INTO orders (user_id) VALUES (?)");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $order_id = $stmt->insert_id;
  $stmt->close();

  // Dodawanie produktów do zamówienia
  if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id) VALUES (?, ?)");

    foreach ($_SESSION['cart'] as $product_id) {
      $stmt->bind_param("ii", $order_id, $product_id);
      $stmt->execute();
    }

    $stmt->close();
  }

  // Wyczyszczenie koszyka
  unset($_SESSION['cart']);

  echo "Zamówienie zostało złożone.";
}

$conn->close();
?>

<h2>Zamówienie</h2>

<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) : ?>
  <form method="POST" action="zamowienie.php">
    <input type="submit" value="Złóż zamówienie">
  </form>
<?php else : ?>
  <p>Koszyk jest pusty. Dodaj produkty przed złożeniem zamówienia.</p>
<?php endif; ?>
