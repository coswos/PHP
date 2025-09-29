<?php
// 1. Запускаем сессию, чтобы получить доступ к ней
session_start();

// 2. Очищаем массив $_SESSION. Это удаляет все сохраненные переменные.
// Мы присваиваем массиву пустой массив.
$_SESSION = array();

// 3. Если используется сессионная cookie (ключ в браузере), удаляем ее.
// Это делает сессию недействительной на стороне клиента.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Уничтожаем данные сессии на сервере.
session_destroy();

echo "<h1>Вы вышли из системы.</h1>";
echo "<p>Данные сессии полностью очищены.</p>";
echo '<p><a href="page2.php">Попробовать вернуться на page2.php >></a></p>';
?>