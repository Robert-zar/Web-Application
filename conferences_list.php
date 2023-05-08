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
        echo '<button type="submit" style="background-color: #050563e6; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;" 
        onmouseover="this.style.backgroundColor=\'#050563cc\'" onmouseout="this.style.backgroundColor=\'#050563e6\'">Подать заявку</button>';
        echo '</form>';                        
        echo "<br>";
    }
} else {
    echo "Нет доступных конференций";
}

mysqli_close($conn);
?>
