<?php
// Проверка авторизации пользователя
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

// Обработка нажатия кнопки "Подать заявку"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['apply_conference'])) {
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

    // Проверка, была ли уже подана заявка на данную конференцию
    $stmt = $conn->prepare("SELECT * FROM applications WHERE user_id = ? AND conference_id = ?");
    $stmt->bind_param("ii", $user_id, $conference_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Вы уже подали заявку на данную конференцию. ";
        echo '<a href="kabinet.php">Вернуться в личный кабинет</a>';
    } else {
        // Добавление новой записи в таблицу applications
        $stmt = $conn->prepare("INSERT INTO applications (user_id, conference_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $user_id, $conference_id);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Заявка успешно подана";
        } else {
            $_SESSION['message'] = "Ошибка: не удалось подать заявку";
        }

        // Переход обратно в личный кабинет
        header("Location: kabinet.php");
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Конференция</title>
    <style>
        button:hover {
            cursor: pointer;
            background-color: #050563cc;
        }
    </style>
</head>
<body>
<?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<form action="apply_conference.php" method="POST">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
    <input type="hidden" name="conference_id" value="<?php echo $_POST['conference_id']; ?>">
    <?php
    // Подключение к базе данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "users_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Проверка, была ли уже подана заявка на конференцию
    $stmt = $conn->prepare("SELECT * FROM applications WHERE user_id = ? AND conference_id = ?");
    $stmt->bind_param("ii", $_SESSION['id'], $_POST['conference_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Вы уже подали заявку на данную конференцию. ";
        echo '<a href="kabinet.php">Вернуться в личный кабинет</a>';
    } else {
        // Кнопка подачи заявки
        echo '<button type="submit" name="apply_conference" style="background-color: #050563e6; color: white; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Подать заявку на конференцию</button>';
    }

    $stmt->close();
    $conn->close();
    ?>
</form>
</body>
</html>
