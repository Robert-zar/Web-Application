<?php
session_start();

// Проверка авторизации пользователя
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}


// Установка значения is_admin в сессии
$_SESSION['is_admin'] = 1;

// Перенаправление на страницу создания конференций
header("Location: create_conference.php");
exit;
?>
