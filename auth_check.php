<?php
session_start(); 

require_once 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';       
    $password = $_POST['password'] ?? ''; 

    $q = $conn->prepare("SELECT * FROM admins WHERE login = ?");
    $q->bind_param("s", $login);
    $q->execute();
    $result = $q->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        if ($password === $admin['password']) { 

            $_SESSION['admin'] = true;
            $_SESSION['admin_login'] = $admin['login'];

            //javascript - page route
            echo '<script>window.location.href="index.php";</script>';

            exit;
        }
    }

    echo "Неверный логин или пароль.";
}
?>
