<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div class="edit-div">
  <h2>Login</h2>

  <form action="auth_check.php" method="post" class="edit-form">
    <label for="login">Логин:</label><br>
    <input type="text" id="login" name="login"><br>
    <label for="password">Пароль:</label><br>
    <input type="text" id="password" name="password"><br><br>
    <input type="submit" value="Войти" class="btn btn-sm add-btn">
  </form> 
</div>

</body>
</html>
