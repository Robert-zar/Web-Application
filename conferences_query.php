<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header('Location: registracia.html'); 
    exit;
}

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Получение информации о конференциях текущего администратора из базы данных
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM conferences WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

// Отображение списка конференций только для администраторов
if (mysqli_num_rows($result) > 0) {
    echo '<h1 class="conference-title">Ваши конференции</h1>';
    echo '<ul class="conference-list">';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<li class="conference-item">';
        echo '<h3>' . $row["title"] . '</h3>';
        echo '<p>Дата проведения: ' . $row["date"] . '</p>';
        echo '<p>Место проведения: ' . $row["location"] . '</p>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>У вас нет добавленных конференций.</p>';
}

mysqli_close($conn);
?>
