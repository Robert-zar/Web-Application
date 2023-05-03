<?php
// Проверка авторизации пользователя
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

// Обработка нажатия кнопки "Подать заявку"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['id'];
    $conference_id = $_POST['conference_id'];

    // Подключение к базе данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "users_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Добавление новой записи в таблицу applications
    $stmt = $conn->prepare("INSERT INTO applications (user_id, conference_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $conference_id);

    if ($stmt->execute()) {
        echo "Заявка успешно подана";
    } else {
        echo "Ошибка: не удалось подать заявку";
    }

    $stmt->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Конференция</title>
</head>
<body>
<?php
if (isset($message)) {
    echo $message;
}
?>
<form action="apply_conference.php" method="POST">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="hidden" name="conference_id" value="<?php echo $conference_id; ?>">
    <input type="submit" value="Подать заявку на конференцию">
</form>
</body>
</html>
