<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'add') {

        $login = $_POST['login'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];

        $q = $conn->prepare("INSERT INTO users (login, password, name, surname, gender, birthdate) VALUES (?, ?, ?, ?, ?, STR_TO_DATE(?, '%Y-%m-%d'))");
        $q->bind_param("ssssis", $login, $password, $name, $surname, $gender, $birthdate);
        $q->execute();

    } elseif ($action === 'edit') {
        $id = $_POST['id'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];

        $q = $conn->prepare("UPDATE users SET login=?, password=?, name=?, surname=?, gender=?, birthdate=STR_TO_DATE(?, '%Y-%m-%d') WHERE ID=?");
        $q->bind_param("ssssisi", $login, $password, $name, $surname, $gender, $birthdate, $id);
        $q->execute();
    }elseif ($action === 'delete') {
        $id = intval($_POST['id']); 

        $q = $conn->prepare("DELETE FROM users WHERE ID=?");
        $q->bind_param("i", $id);
        $q->execute();
    }

    header('Location: index.php');
    exit;
}
