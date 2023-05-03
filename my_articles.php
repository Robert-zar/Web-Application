<?php




// Получаем информацию о текущем пользователе из базы данных
$user_id = $_SESSION['id'];

// Подключаемся к базе данных
$conn = mysqli_connect('localhost', 'root', '', 'users_db');

// Проверяем, удалось ли подключение к базе данных
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Выбираем все статьи, которые добавил текущий пользователь
$sql = "SELECT * FROM articles WHERE user_fk = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Проверяем, есть ли статьи для отображения
if (mysqli_num_rows($result) > 0) {
  // Выводим каждую статью
  while($row = mysqli_fetch_assoc($result)) {
    echo "<li><a href=\"uploads/{$row['file_path']}/{$row['file_name']}\" target=\"_blank\">{$row['title']}</a></li>";
  }
} else {
  echo "У вас еще нет добавленных статей.";
}

// Закрываем соединение с базой данных
mysqli_close($conn);


?>


