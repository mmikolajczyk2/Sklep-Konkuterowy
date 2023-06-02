<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: logowanie.php");
  exit();
}

// Wyświetlanie listy produktów
echo "Lista produktów:";
echo "<ul>";
echo "<li>Produkt 1 <form method='POST' action='koszyk.php'><input type='hidden' name='product_id' value='1'><input type='submit' value='Dodaj do koszyka'></form></li>";
echo "<li>Produkt 2 <form method='POST' action='koszyk.php'><input type='hidden' name='product_id' value='2'><input type='submit' value='Dodaj do koszyka'></form></li>";
echo "<li>Produkt 3 <form method='POST' action='koszyk.php'><input type='hidden' name='product_id' value='3'><input type='submit' value='Dodaj do koszyka'></form></li>";
echo "</ul>";
?>
