<?php
session_start();
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Обработка регистрации пользователя
if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $is_admin = isset($_POST['is_admin']) ? 1 : 0;
    
    $sql = "INSERT INTO users (username, email, password, is_admin) VALUES ('$username', '$email', '$password', $is_admin)";
    
    if(mysqli_query($conn, $sql)) {
        $_SESSION['id'] = mysqli_insert_id($conn);
        // Регистрация прошла успешно, перенаправляем пользователя на страницу кабинета
        if($is_admin) {
            echo "<script>window.location.href = 'admin_kabinet.php';</script>";
        } else {
            echo "<script>window.location.href = 'kabinet.php';</script>";
        }
        exit;
    } else {
        echo "Ошибка регистрации: " . mysqli_error($conn);
    }
}

// Обработка авторизации пользователя
if(isset($_POST['log'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        // Авторизация прошла успешно, перенаправляем пользователя на страницу кабинета
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $user['id'];
        
        if($user['is_admin']) {
            echo "Авторизация выполнена успешно, id пользователя: " . $_SESSION['id'];
            echo "<script>window.location.href = 'admin_kabinet.php';</script>";
        } else {
            echo "Авторизация выполнена успешно, id пользователя: " . $_SESSION['id'];
            echo "<script>window.location.href = 'kabinet.php';</script>";
        }
        exit;
    } else {
        echo "Неверное имя пользователя или пароль!";
    }
}

// Закрытие соединения с базой данных
mysqli_close($conn);

?>
