<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Получение информации о конференциях из базы данных
$sql = "SELECT * FROM conferences";
$result = mysqli_query($conn, $sql);

// Отображение списка конференций и кнопки "подать заявку"
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "Название конференции: " . $row["title"]. "<br>";
        echo "Дата проведения: " . $row["date"]. "<br>";
        echo '<form action="apply_conference.php" method="post">';
        echo '<input type="hidden" name="conference_id" value="' . $row["id"] . '">';
        echo '<input type="submit" value="Подать заявку">';
        echo '</form>';
        echo "<br>";
    }
} else {
    echo "Нет доступных конференций";
}

mysqli_close($conn);
?>
