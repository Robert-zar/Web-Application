<?php
// подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_db";

// создание соединения
$conn = mysqli_connect($servername, $username, $password, $dbname);

// проверка соединения
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// запуск сессии
session_start();

// обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // получаем идентификатор пользователя из сессии
    $userId = $_SESSION['id'];

    // создаем массив для хранения данных пользователя для обновления
    $userData = array();

    // проверяем, было ли введено новое значение для имени пользователя
    if (!empty($_POST['username'])) {
        $userData['username'] = $_POST['username'];
    }

    // проверяем, было ли введено новое значение для email
    if (!empty($_POST['email'])) {
        $userData['email'] = $_POST['email'];
    }

    // проверяем, было ли введено новое значение для пароля
    if (!empty($_POST['password'])) {
        $userData['password'] = $_POST['password'];
    }

    // обновляем запись в таблице "users"
    if (!empty($userData)) {
        $sql = "UPDATE users SET ";
        $sql .= implode(', ', array_map(function ($key) use ($userData) {
            return "$key='{$userData[$key]}'";
        }, array_keys($userData)));
        $sql .= " WHERE id=$userId";
        $result = mysqli_query($conn, $sql);

        // проверяем успешность выполнения запроса
        if ($result) {
            // если запрос выполнен успешно, перенаправляем пользователя на страницу профиля
            $sql = "SELECT is_admin FROM users WHERE id=$userId";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);
            if($user['is_admin'] == 1) {
                header('Location: admin_kabinet.php');
            }  else {
                header('Location: kabinet.php');
            }
            exit();
        } else {
            // если произошла ошибка при выполнении запроса, выводим сообщение об ошибке
            echo "Произошла ошибка при обновлении профиля";
        }
    }
}

// получаем данные пользователя из базы данных
$userId = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id=$userId";
$result = mysqli_query($conn, $sql);

// проверяем успешность выполнения запроса
if ($result && mysqli_num_rows($result) > 0) {
    $userData = mysqli_fetch_assoc($result);
} else {
    echo "Произошла ошибка при получении данных пользователя";
}

// закрытие соединения с базой данных
mysqli_close($conn);

?>
