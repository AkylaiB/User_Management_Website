<?php
session_start();
if (!isset($_SESSION['admin'])) {
   header('Location: login.php');
   exit;
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body style="margin: 0px; padding: 0px;">

<div class="container-fluid">
   <div class="row g-0" >

      <div class="col-12 col-md-6 add-user-right-block d-flex flex-column align-items-center justify-content-center text-center">
         <img src="images/add-user-pc.png" alt="Добавить пользователя" class="user-image" style="max-height: 50vh; width: auto;">
         <h1 style="color: white; font-size: 50px;">Добавить<br> нового<br> пользователя</h1>
      </div>

      <div class="col-12 col-md-6 edit-div d-flex align-items-center justify-content-center">

         <form action="operations.php" method="POST" class="edit-form">
            <input type="hidden" name="action" value="add">

            <label for="login">Логин:</label><br>
            <input type="email" name="login" ><br>

            <label for="password">Пароль:</label><br>
            <input type="password" id="password" name="password" ><br>

            <label for="name">Имя:</label><br>
            <input type="text" id="name" name="name" ><br>

            <label for="surname">Фамилия:</label><br>
            <input type="text" id="surname" name="surname" ><br>

            <label for="gender">Пол:</label><br>
            <input type="radio" name="gender" value="0" required> Муж
            <input type="radio" name="gender" value="1"> Жен<br><br>

            <label for="birthdate">Дата рождения:</label><br>
            <input type="date" id="birthdate" name="birthdate"><br><br>

            <input type="submit" value="Добавить" class="btn btn-sm savebtn" style="width: 120px;">
         </form> 
      </div>
   </div>
</div>

</body>
</html>