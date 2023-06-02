<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'administrator') {
  header("Location: logowanie.php");
  exit();
}

require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  // Walidacja pól formularza

  $errors = array();

  if (empty($username)) {
    $errors[] = "Nazwa użytkownika jest wymagana.";
  }

  if (empty($password)) {
    $errors[] = "Hasło jest wymagane.";
  }

  if (empty($role)) {
    $errors[] = "Rola jest wymagana.";
  }
  elseif ($role != 'administrator' && $role != 'moderator' && $role != 'klient') {
    $errors[] = "Rola nie istnieje.";
  }



  if (empty($errors)) {
    if (isset($_POST['id'])) {
      // Edycja istniejącego użytkownika
      $id = $_POST['id'];

      $stmt = $conn->prepare("UPDATE users SET username = ?, password = ?, role = ? WHERE id = ?");
      $stmt->bind_param("sssi", $username, $password, $role, $id);
      $stmt->execute();

      if ($stmt->affected_rows > 0) {
        echo "Użytkownik został zaktualizowany.";
      } else {
        echo "Błąd podczas aktualizacji użytkownika.";
      }

      $stmt->close();
    } else {
      // Dodawanie nowego użytkownika
      $hashed_password = crypt($password, 'rl');

      $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $username, $hashed_password, $role);
      $stmt->execute();

      if ($stmt->affected_rows > 0) {
        echo "Użytkownik został dodany.";
      } else {
        echo "Błąd podczas dodawania użytkownika.";
      }

      $stmt->close();
    }
  } else {
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  }
}

// Pobranie danych użytkownika do edycji
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
  $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $stmt->close();
}
?>

<h2><?php echo $id ? 'Edytuj użytkownika' : 'Dodaj użytkownika'; ?></h2>

<form method="POST" action="dodaj_edytuj_uzytkownika.php">
  <?php if ($id) : ?>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
  <?php endif; ?>
  <label for="username">Nazwa użytkownika:</label>
  <input type="text" name="username" value="<?php echo $id ? $row['username'] : ''; ?>"><br>
  <label for="password">Hasło:</label>
  <input type="password" name="password" value=""><br>
  <label for="role">Rola:</label>
  <input type="text" name="role" value="<?php echo $id ? $row['role'] : ''; ?>"><br>
  <input type="submit" value="<?php echo $id ? 'Zapisz' : 'Dodaj'; ?>">
</form>
