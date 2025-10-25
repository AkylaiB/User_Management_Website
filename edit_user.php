<?php
session_start();
if (!isset($_SESSION['admin'])) {
   header('Location: login.php');
   exit;
}

require_once 'db.php';

$id = $_GET['id'] ?? 0; 
if (!$id) {
    die("Не указан пользователь");
}

$q = $conn->prepare("SELECT * FROM users WHERE ID = ?");
$q->bind_param("i", $id);
$q->execute();
$result = $q->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("Пользователь не найден");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="edit-div" >
   <h2>Изменить данные пользователя</h2>
   <form action="operations.php" method="POST" class="edit-form">
      <input type="hidden" name="action" value="edit">
      <input type="hidden" name="id" value="<?= htmlspecialchars($user['ID']) ?>">

      <label for="login">Логин:</label><br>
      <input type="email" id="login" name="login" value="<?= htmlspecialchars($user['login']) ?>" required><br>

      <label for="password">Пароль:</label><br>
      <input type="password" id="password" name="password" value="<?= htmlspecialchars($user['password']) ?>" required><br>

      <label for="name">Имя:</label><br>
      <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br>

      <label for="surname">Фамилия:</label><br>
      <input type="text" id="surname" name="surname" value="<?= htmlspecialchars($user['surname']) ?>" required><br>

      <label for="gender">Пол:</label><br>
      <input type="radio" name="gender" value="0" <?= $user['gender'] == 0 ? 'checked' : '' ?>> Муж
      <input type="radio" name="gender" value="1" <?= $user['gender'] == 1 ? 'checked' : '' ?>> Жен<br><br>

      <label for="birthdate">Дата рождения:</label><br>
      <input type="date" id="birthdate" name="birthdate" value="<?= htmlspecialchars($user['birthdate']) ?>" required><br><br>

      <input type="submit" value="Сохранить" class="btn btn-sm add-btn">
   </form> 
</div>
</body>
</html>