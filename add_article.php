<?php
// Проверяем, что пользователь авторизован
session_start();


// Проверяем, что была отправлена форма для добавления статьи
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['article_file']) && isset($_POST['article_title'])) {

    // Устанавливаем соединение с базой данных
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "users_db";
    $connection = mysqli_connect($host, $user, $password);
    mysqli_select_db($connection, $database);

    // Получаем идентификатор пользователя
    $user_id = $_SESSION['id'];

    // Получаем информацию о загруженном файле
    $article_file = $_FILES['article_file']['tmp_name'];
    $article_file_name = $_FILES['article_file']['name'];
    $article_title = $_POST['article_title'];

    // Генерируем случайное имя файла
    $file_name = md5(uniqid()) . '.' . pathinfo($article_file_name, PATHINFO_EXTENSION);

    // Сохраняем файл на сервере
    $file_path = 'uploads' . DIRECTORY_SEPARATOR . $file_name;

    move_uploaded_file($article_file, $file_path);

    // Проверяем, что пользователь существует
    $stmt = mysqli_prepare($connection, "SELECT id FROM users WHERE id=?");
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
        // Пользователь не найден, обрабатываем ошибку
        echo "Ошибка: неверный идентификатор пользователя";
        exit;
    }

    // Добавляем запись в таблицу articles
    $stmt = mysqli_prepare($connection, "INSERT INTO articles (title, file_path, file_name, user_fk) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sssi', $article_title, $file_path, $file_name, $user_id);
    mysqli_stmt_execute($stmt);
    
    // Получаем идентификатор добавленной статьи
    $article_id = mysqli_insert_id($connection);
    
    // Закрываем соединение с базой данных
    mysqli_close($connection);
    
    // Перенаправляем пользователя на страницу личного кабинета
    header('Location: kabinet.php');
    exit;
}
?>    
