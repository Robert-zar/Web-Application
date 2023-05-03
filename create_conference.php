<?php
session_start();

// Проверка авторизации пользователя и статуса администратора
if (!isset($_SESSION['id']) || !isset($_SESSION['is_admin'])) {
    header("Location: login.php");
    exit;
}

// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получение данных формы
    $title = $_POST['title'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $user_id = $_SESSION['id'];

    // Подключение к базе данных
    $conn = new mysqli('localhost', 'root', '', 'users_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Вставка данных о конференции в таблицу
    $sql = "INSERT INTO conferences (title, date, location, user_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $title, $date, $location, $user_id);
    $stmt->execute();

    // Закрытие соединения
    $stmt->close();
    $conn->close();

    // Перенаправление на страницу "мои заявки"
    header("Location: kabinet.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Создать конференцию</title>
</head>
<body>
    <h1>Создать конференцию</h1>
    <form action="create_conference.php" method="post">
    <label for="title">Название конференции:</label>
        <input type="text" name="title" id="title" required><br><br>

        <label for="date">Дата конференции:</label>
        <input type="date" name="date" id="date" required><br><br>

        <label for="location">Место проведения:</label>
        <input type="text" name="location" id="location" required><br><br>

        <input type="submit" value="Создать конференцию">
    </form>
</body>

<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 2px solid #ccc;
            margin-bottom: 20px;
            box-sizing: border-box;
            font-size: 16px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"]:focus,
        input[type="date"]:focus {
            border-color: #4CAF50;
            outline: none;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>

</html>
