<?php
require_once 'db.php'; // Подключение к базе данных

// Читаем параметры сортировки из URL
$sort = $_GET['sort'] ?? 'id';       // по умолчанию сортируем по id
$order = $_GET['order'] ?? 'asc';    // по умолчанию по возрастанию

//Для разбивки на страницы
$limit = 10; // количество записей на странице
$page = $_GET['page'] ?? 1; // текущая страница (по умолчанию 1)
$offset = ($page - 1) * $limit; // номер записи в таблице, с которой SQL должен начать отдавать данные для текущей страницы


// Проверяем допустимые поля
$allowed_columns = ['id', 'login', 'name', 'surname', 'gender', 'birthdate'];
if (!in_array($sort, $allowed_columns)) {
    $sort = 'id';
}

// Проверяем input сортировки
$order = ($order === 'desc') ? 'desc' : 'asc';

$sql = "SELECT * FROM users ORDER BY $sort $order LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

if (!$result) {
    die("Ошибка выполнения запроса: " . $conn->error);
}

// данные для разбивки на страницы
$total_result = $conn->query("SELECT COUNT(*) AS total FROM users");
$total_row = $total_result->fetch_assoc();
$total_users = $total_row['total'];
$total_pages = ceil($total_users / $limit);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список пользователей</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body class="p-3">

<h1>Список пользователей</h1>
<br>
<div class="container">
   <table class="table">
      <thead>
         <tr>
            <th><a href="?sort=login&order=<?php echo $order === 'asc' ? 'desc' : 'asc' ?>&page=<?php echo $page; ?>">Логин</a></th>
            <th><a href="?sort=name&order=<?php echo  $order === 'asc' ? 'desc' : 'asc' ?>&page=<?php echo $page; ?>">Имя</a></th>
            <th><a href="?sort=surname&order=<?php echo  $order === 'asc' ? 'desc' : 'asc' ?>&page=<?php echo $page; ?>">Фамилия</a></th>
            <th><a href="?sort=gender&order=<?php echo  $order === 'asc' ? 'desc' : 'asc' ?>&page=<?php echo $page; ?>">Пол</a></th>
            <th><a href="?sort=birthdate&order=<?php echo  $order === 'asc' ? 'desc' : 'asc' ?>&page=<?php echo $page; ?>">Дата рождения</a></th>
            <th></th>
            <th><a href="add_user.php" class="btn btn-sm add-btn">Добавить</a></th>
         </tr>
      </thead>
      <tbody>
         <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
               <td><?php echo  htmlspecialchars($row['login']) ?></td>
               <td><?php echo  htmlspecialchars($row['name']) ?></td>
               <td><?php echo  htmlspecialchars($row['surname']) ?></td>
               <td><?php echo  $row['gender'] ? 'Жен' : 'Муж' ?></td>
               <td><?php echo  htmlspecialchars($row['birthdate']) ?></td>
               <td>
                  <a href="edit_user.php?id=<?php echo $row['ID'] ?>" class="btn btn-sm edit-btn" >Изменить</a>
               </td>
               <td>
                  <form action="operations.php" method="POST" style="display:inline;">
                     <input type="hidden" name="action" value="delete">
                     <input type="hidden" name="id" value="<?php echo $row['ID'] ?>">
                     <button type="submit" class="btn btn-sm delete-btn">Удалить</button>
                  </form>
               </td>
            </tr>
         <?php endwhile; ?>
      </tbody>
   </table>
</div>
<div class="pagination">
   <a href="?page=<?php echo max($page-1,1) ?>&sort=<?php echo $sort ?>&order=<?php echo $order ?>" class="btn btn-sm page-btn">
       <i class="bi bi-arrow-left"></i>
   </a>

   <a href="?page=<?php echo min($page+1,$total_pages) ?>&sort=<?php echo $sort ?>&order=<?php echo $order ?>" class="btn btn-sm page-btn">
       <i class="bi bi-arrow-right"></i>
   </a>
</div>

</body>
</html>
