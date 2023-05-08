<?php
// Начинаем сессию
session_start();

// Разрушаем сессию
session_destroy();

// Перенаправляем пользователя на главную страницу
header('Location: glavnaya.html');
exit;
?>
