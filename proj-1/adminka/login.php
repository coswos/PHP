<?php
// login.php

// 1. Запуск сессии для работы с Flash-сообщениями
session_start();

// --- Секция 1: Обработка отправки формы (логика) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // ВАЛИДАЦИЯ (заменим реальную логику простым примером)
    if ($username === 'admin' && $password === '12345') {
        
        // Успешный вход: сохраняем данные в сессию и редирект в админку
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        
        // Редирект в админку (предположим, что это файл admin.php)
        header('Location: admin.php');
        exit(); // Всегда останавливаем скрипт после header('Location: ...')

    } else {
        
        // Ошибка: сохраняем сообщение в сессию для отображения на этой же странице
        $_SESSION['flash_error'] = 'Неверное имя пользователя или пароль!';
        
        // Редирект обратно на страницу входа. 
        // Это предотвращает повторную отправку формы при обновлении страницы.
        header('Location: login.php');
        exit(); 
    }
}

// --- Секция 2: Чтение и отображение Flash-сообщения ---
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход в Админку</title>
</head>
<body>

    <h1>Вход в Административную панель</h1>

    <?php
    // Проверяем, есть ли в сессии сообщение об ошибке, которое нужно показать
    if (isset($_SESSION['flash_error'])) {
        
        // 1. Выводим сообщение (с безопасной функцией htmlspecialchars!)
        echo '<div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">';
        echo htmlspecialchars($_SESSION['flash_error']);
        echo '</div>';
        
        // 2. КРИТИЧЕСКИ ВАЖНЫЙ ШАГ: Удаляем сообщение из сессии.
        // Это гарантирует, что оно не появится при следующем обновлении страницы.
        unset($_SESSION['flash_error']);
    }
    ?>

    <form method="POST" action="login.php">
        <label for="username">Имя пользователя:</label><br>
        <input type="text" id="username" name="username" value=""><br><br>
        
        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password"><br><br>
        
        <input type="submit" value="Войти">
    </form>

</body>
</html>