## Описание веб-приложения "Организация научных конференций".

Данное веб-приложение предназначено для организации научных конференций, публикации своих статей, а также подача заявки на участие в конференции. Пользователи должны зарегистрироваться и авторизоваться, чтобы иметь доступ к личному кабинету. Пользователи могут зарегистрироваться в двух ролях: участники и администраторы, и у них разные личные кабинеты.
Есть веб-интерфейс с вкладками Главная, Конференции и Личный кабинет.

**Основные функции**


**Главная страница**

На главной странице можно увидеть приветствие.

**Личный кабинет**

Во вкладке личного кабинета есть форма для регистрации и авторизации.

**Регистрация и авторизация**

Для того чтобы зайти в личный кабинет, пользователи должны зарегистрироваться и авторизоваться. После регистрации данные пользователя автоматически заносятся в базу данных localhost phpmyadmin.

После того, как пользователь зарегестрировался и авторизовался, он переходит уже непосредственно на страницу личного кабинета.
В зависимости от роли пользователя, участник или администратор, функциаонал в личном кабинете будет отличаться.

### Личный кабинет участника

**Мои статьи**

Вкладка "Мои статьи" позволяет пользователям добавлять статьи. Здесь есть форма для добавления файла и названия статьи. После добавления статья она заносится в базу данных и отображается на странице "Мои статьи".

**Мои заявки**

Вкладка "Мои заявки" позволяет подавать заявки на участие в конференциях. Здесь также есть кнопка "Создать конференцию", при нажатии на которую пользователь переходит на форму для создания новой конференции. Создание конференции и подача заявок на участие также фиксируются в базе данных.

**Форма создания конференции**

На странице создания конференции пользователь вводит название, даты и место проведения конференции. После создания конференция отображается во вкладке "Мои заявки" и доступна для подачи заявки.

**Профиль**

Вкладка "Профиль" позволяет пользователям редактировать свои личные данные, такие как имя, фамилию и пароль. Это соответственно тоже фиксируется в базе данных.

**Выйти**

Вкладка "Выйти" соответственно производит выход из личного кабинета.

### Личный кабинет администратора

**Организация конференций**

Во вкладке "Организация конференций" у администратора есть возможность создать конференцию, введя необходимые данные о конференции в форму. Администратору видны только созданные им конференции.

Также есть вкладки "Профиль" и "Выйти" и выполняют те же функци, что у участников

**Используемые технологии и инструменты**

Для создания веб-приложения были использованы следующие технологии и инструменты:

HTML, CSS и JavaScript для фронтенда
PHP для бэкенда
MySQL для хранения данных
XAMPP для запуска локального сервера

**Установка и запуск**

Для запуска приложения необходимо скачать и установить XAMPP. Затем нужно скопировать проект в папку htdocs и запустить локальный сервер.
