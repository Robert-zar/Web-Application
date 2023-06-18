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
    echo '<div class="conference-list">';
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="conference-item">';
        echo '<h3 class="conference-title">' . $row["title"]. '</h3>';
        echo '<p class="conference-details">Дата проведения: ' . $row["date"]. '</p>';
        echo '<p class="conference-details">Место проведения: ' . $row["location"] . '</p>';
        echo '<form action="apply_conference.php" method="post">';
        echo '<input type="hidden" name="conference_id" value="' . $row["id"] . '">';
        echo '<button type="submit" class="apply-button">Подать заявку</button>';
        echo '</form>'; 
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "Нет доступных конференций";
}

mysqli_close($conn);
?>

