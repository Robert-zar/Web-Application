<?php
session_start();
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header('Location: registracia.html'); 
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Личный кабинет</title>
	
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="#" class="active" data-tab="articles">Мои статьи</a></li>
				<li><a href="#" data-tab="applications">Конференции</a></li>
				<li><a href="#" data-tab="profile">Профиль</a></li>
				<li><a href="#" id="logout-link">Выйти</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<div class="tab-content active" data-tab="articles">
			<h1>Мои статьи</h1>
			<ul class="article-list">
				<?php include 'my_articles.php'; ?>
			</ul>
			<br><br>
			<button type="button" onclick="openAddArticleForm()">Добавить статью</button>

			

<div id="addArticleForm" style="display:none;">
  <form method="post" enctype="multipart/form-data" action="http://localhost/add_article.php">
    <input type="file" name="article_file" accept=".docx,.doc, text/plain, application/pdf" required>
    <br>
    <input type="text" name="article_title" placeholder="Название статьи" required>
    <br>
    <button type="submit">Добавить</button>
	<button type="button" onclick="closeAddArticleForm()">Отмена</button>
  </form>


</div>
		</div>
		<div class="tab-content" data-tab="applications">
			<h1>Конференции</h1>
			
			<?php include 'conferences_list.php'; ?>

		</div>

		<div class="tab-content" data-tab="profile">
			<h1>Профиль</h1>
			<form class="profile-form"  action="update_profile.php" method="POST">
				<div class="form-group">
					<label for="username">Имя:</label>
					<input type="text" id="username" name="username">
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="password">Пароль:</label>
					<input type="password" id="password" name="password">
				</div>
				<input type="submit" value="Сохранить изменения">
			</form>
		</div>
		
	</main>

	<footer>
		<p>&copy; 2023 Все права защищены.</p>
	</footer>


</body>



<style>/* Общие стили */
	body {
		font-family: Arial, sans-serif;
		margin: 0;
		padding: 0;
	}
	
	/* Стили для шапки */
	header {
		background-image: url("/Картинки/shapka2.png");
		color: #fff;
		padding: 10px;
		background-size: cover;
	}
	
	nav ul {
		list-style: none;
		margin: 0;
		padding: 0;
		display: flex;
		justify-content: flex-start;
	}
	
	nav li {
		margin-right: 20px;
	}
	
	nav a {
		color: #fff;
		text-decoration: none;
		font-weight: bold;
		font-size: 18px;
	}
	
	nav a.active {
		border-bottom: 2px solid #fff;
	}
	
	/* Стили для вкладок */
	.tab-content {
		display: none;
		padding: 20px;
	}
	
	.tab-content.active {
		display: block;
	}
	
	/* Стили для основной части */
	main {
		max-width: 800px;
		margin: 0 auto;
		padding: 20px;
	}
	
	/* Стили для подвала */
	footer {
		background-image: url("/Картинки/shapka2.png");
		color: #fff;
		padding: 10px;
		text-align: center;
		position: fixed;
		bottom: 0;
		left: 0;
		right: 0;
		margin: auto;
		background-size: cover;
	}
	
	/* Стили для формы профиля */
	.profile-form {
		max-width: 600px;
		margin: 0 auto;
	}
	
	.form-group {
		margin-bottom: 20px;
	}
	
	.form-group label {
		display: block;
		font-weight: bold;
		margin-bottom: 5px;
	}
	
	.form-group input {
		display: block;
		width: 100%;
		padding: 10px;
		border: 2px solid #ccc;
		border-radius: 5px;
		font-size: 16px;
	}
	
	.form-group input:focus {
		border-color: #333;
		outline: none;
	}
	
	input[type="submit"] {
		background-color: rgba(5, 5, 99, 0.9);
		color: #fff;
		padding: 10px 20px;
		border: none;
		border-radius: 5px;
		font-size: 18px;
		cursor: pointer;
	}
	
	input[type="submit"]:hover {
		background-color: #555;
	}

	
	
	/* Стили для списка статей */
	.article-list {
		list-style: none;
		padding: 0;
		margin: 0;
	}
	
	.article-item {
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 10px;
		border-bottom: 1px solid #ccc;
	}
	
	.article-item:last-child {
		border-bottom: none;
	}
	
	.article-item a {
		color: #333;
		text-decoration: none;
	}
	
	.article-date {
		color: #999;
		font-size: 14px;
	}
	
	/* Стили для списка заявок */
	.application-list {
		list-style: none;
		padding: 0;
		margin: 0;
	}
	
	.application-item {
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 10px;
		border-bottom: 1px solid #ccc;
	}
	
	.application-item:last-child {
		border-bottom: none;
	}
	
	.application-item a {
		color: #333;
		text-decoration: none;
	}
	
	.application-status {
		padding: 5px 10px;
		border-radius: 5px;
		font-size: 14px;
	}
	
	.application-status.approved {
		background-color: #4CAF50;
		color: #fff;
	}
	
	.application-status.pending {
		background-color: #FFC107;
		color: #333;
	}
	
	.application-status.rejected {
		background-color: #F44336;
		color: #fff;
	}
	
	/* Стили для вкладок "Мои заявки" и "Мои статьи" */
	.tab-content ul {
		padding: 0;
		margin: 0;
	}
	
	.tab-content li {
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 10px;
		border-bottom: 1px solid #ccc;
	}
	
	.tab-content li:last-child {
		border-bottom: none;
	}
	
	.tab-content a {
		color: #333;
		text-decoration: none;
	}
	
	.tab-content h1 {
		margin-top: 0;
	}
	
	.tab-content ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}
	
	.tab-content li {
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 10px;
		border-bottom: 1px solid #ccc;
	}
	
	.tab-content li:last-child {
		border-bottom: none;
	}
	
	.tab-content a {
		color: #333;
		text-decoration: none;
	}
	
	.tab-content h1 {
		margin-top: 0;
	}
	
	.tab-content .status {
		padding: 5px 10px;
		border-radius: 5px;
		font-size: 14px;
	}
	
	.tab-content .status.approved {
		background-color: #4CAF50;
		color: #fff;
	}
	
	.tab-content .status.pending {
		background-color: #FFC107;
		color: #333;
	}
	
	.tab-content .status.rejected {
		background-color: #F44336;
		color: #fff;
	}


	#addArticleForm {
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 4px;
  display: none;
}

.addArticleForm.show {
  display: block;
}

#addArticleForm input[type=file],
#addArticleForm input[type=text] {
  margin-bottom: 10px;
  padding: 10px;
  width: 100%;
  border-radius: 4px;
}

#addArticleForm button[type=submit],
button[type=button] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
  border-radius: 4px;
}


button.btn.btn-primary {
  background-color: #4CAF50;
  border-color: #4CAF50;
  color: white;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  text-decoration: none;
}

button.btn.btn-primary:hover,
button.btn.btn-primary:focus {
  background-color: #3e8e41;
  border-color: #3e8e41;
}

.conference-list {
    display: flex;
    flex-direction: column;
}

.conference-item {
    background-color: #f8f8f8;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
    font-family: Arial, sans-serif;
}

.conference-title {
    margin: 0;
    font-size: 18px;
    color: #333;
}

.conference-details {
    margin-top: 5px;
    font-size: 14px;
    color: #777;
}

.apply-button {
    background-color: #050563e6;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
}

.apply-button:hover {
    background-color: #050563cc;
}

.apply-button:focus {
    outline: none;
}

	</style>




<script>
// Получаем ссылки на вкладки
const tabLinks = document.querySelectorAll('nav a');

// Получаем контенты вкладок
const tabContents = document.querySelectorAll('.tab-content');

// Перебираем ссылки на вкладки
tabLinks.forEach(link => {
	// Добавляем обработчик события "клик"
	link.addEventListener('click', event => {
		// Отменяем стандартное действие ссылки
		event.preventDefault();

		// Получаем значение атрибута "data-tab" ссылки
		const tabName = link.getAttribute('data-tab');

		// Скрываем все контенты вкладок
		tabContents.forEach(tabContent => {
			tabContent.classList.remove('active');
		});

		// Отображаем активный контент вкладки
		document.querySelector(`.tab-content[data-tab="${tabName}"]`).classList.add('active');

		// Удаляем класс "active" у всех ссылок на вкладки
		tabLinks.forEach(tabLink => {
			tabLink.classList.remove('active');
		});

		// Добавляем класс "active" только выбранной ссылке на вкладку
		link.classList.add('active');
	});
});

// Устанавливаем первую вкладку активной
tabLinks[0].click();

// Получаем все ссылки на статьи
const articleLinks = document.querySelectorAll('.tab-content[data-tab="articles"] a');

// Добавляем обработчики событий на все ссылки
articleLinks.forEach(link => {
  link.addEventListener('click', event => {
    // Отменяем стандартное действие ссылки
    event.preventDefault();

    // Отображаем статью
    const articleTitle = link.textContent;
    openArticle(articleTitle);
  });
});

// Функция для открытия статьи
function openArticle(title) {
  // Находим соответствующую статью
  const article = document.querySelector(`.tab-content[data-tab="articles"] li a[href="#${title}"]`);
  
  // Проверяем, что статья существует
  if (article) {
    // Отображаем статью
    article.click();
  } else {
    // Выводим сообщение об ошибке, если статья не найдена
    alert('Статья не найдена');
  }
}

// Добавляем обработчик событий для кнопки "Добавить статью"
document.querySelector('button[type="button"]').addEventListener('click', event => {
  event.preventDefault();
  openAddArticleForm();
});

// Добавляем обработчик событий для кнопки "Отмена"
document.querySelector('#addArticleForm button[type="button"]').addEventListener('click', event => {
  event.preventDefault();
  closeAddArticleForm();
});

function openAddArticleForm() {
  document.getElementById("addArticleForm").style.display = "block";
}


function closeAddArticleForm() {
  document.getElementById("addArticleForm").style.display = "none";
}


const applicationsTabContent = document.querySelector('.tab-content[data-tab="applications"]');
    const conferencesList = document.createElement('ul');

    <?php while ($row = $result->fetch_assoc()): ?>
        const listItem = document.createElement('li');
        listItem.innerHTML = `<?php echo $row['title'] . " - " . $row['date'] . " - " . $row['location']; ?> <a href='apply_conference.php?conference_id=<?php echo $row['id']; ?>'>Подать заявку</a>`;
        conferencesList.appendChild(listItem);
    <?php endwhile; ?>

    applicationsTabContent.appendChild(conferencesList);



// Находим ссылку на выход в навигационном меню
const logoutLink = document.querySelector('#logout-link');

// Назначаем обработчик клика на ссылку
logoutLink.addEventListener('click', (event) => {
  // Отменяем стандартное действие ссылки
  event.preventDefault();
  
  // Выполняем запрос на сервер для выхода из личного кабинета
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'exit.php');
  xhr.onload = () => {
    // Перенаправляем пользователя на HTML страницу
    window.location.href = 'glavnaya.html';
  };
  xhr.send();

  // Добавляем обработчик события DOMContentLoaded
  document.addEventListener('DOMContentLoaded', () => {
    // Делаем видимым содержимое страницы
    document.body.style.visibility = 'visible';
  });
  
  // Скрываем содержимое страницы перед загрузкой
  document.body.style.visibility = 'hidden';
});



</script>



</html>
