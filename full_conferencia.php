<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_db";

// Устанавливаем соединение с базой данных
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Запрос на выборку всех конференций и имен пользователей, которые их добавили
$sql = "SELECT conferences.title, users.username FROM conferences JOIN users ON conferences.user_id = users.id";
$result = mysqli_query($conn, $sql);

// Преобразуем результат в ассоциативный массив
$conferences = array();
while ($row = mysqli_fetch_assoc($result)) {
    $conferences[] = $row;
}

// Возвращаем результат в формате JSON
echo json_encode($conferences);

mysqli_close($conn);

?>
