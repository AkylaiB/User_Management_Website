<?php
session_start();
if (!isset($_SESSION['admin'])) {
   header('Location: login.php');
   exit;
}


?>

<!DOCTYPE html>
<html>
<body>

<h2>Добавить нового пользователя</h2>

<form action="operations.php" method="POST">
   <input type="hidden" name="action" value="add">

   <label for="login">Логин:</label><br>
   <input type="email" name="login" ><br>

   <label for="password">Пароль:</label><br>
   <input type="password" id="password" name="password" ><br><br>

   <label for="name">Имя:</label><br>
   <input type="text" id="name" name="name" ><br><br>

   <label for="surname">Фамилия:</label><br>
   <input type="text" id="surname" name="surname" ><br><br>

   <label for="gender">Пол:</label><br>
   <input type="radio" name="gender" value="0" required> Муж<br>
   <input type="radio" name="gender" value="1"> Жен<br><br>

   <label for="birthdate">Дата рождения:</label><br>
   <input type="date" id="birthdate" name="birthdate"><br><br>

   <input type="submit" value="Добавить">
</form> 


</body>
</html>