<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'administrator') {
  header("Location: logowanie.php");
  exit();
}

require_once 'db_config.php';

// Wyświetlanie panelu administracyjnego
echo "<h2>Panel administracyjny</h2>";

// Wyświetlanie wszystkich użytkowników
echo "<h3>Lista użytkowników</h3>";

$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$result = $stmt->get_result();

echo "<table>";
echo "<tr><th>Username</th><th>Role</th><th>Akcje</th></tr>";

while ($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['role'] . "</td>";
  echo "<td><a href='edytuj_uzytkownika.php?id=" . $row['id'] . "'>Edytuj</a> | <a href='usun_uzytkownika.php?id=" . $row['id'] . "'>Usuń</a></td>";
  echo "</tr>";
}

echo "</table>";

$stmt->close();

$conn->close();
?>
