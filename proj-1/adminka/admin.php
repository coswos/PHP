<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
</head>

<body>
    <h1>Welcome to your Admin Panel!</h1>
    <?php
    echo '$_SESSION =>';
    echo '<pre>';
    echo print_r($_SESSION);
    echo '</pre>';
    echo 'session id => ' . session_id();

    ?>
    <br>

    <form method="POST">

        Please enter your command: <br>
        <input type="text" name="com">
        <button type="submit">RUN</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Получаем команду из поля ввода 'com'
        $command = $_POST['com'] ?? '';

        if (!empty($command)) {
            echo "<h2>Результат выполнения команды:</h2>";

            // Включаем вывод в удобный тег <pre> для форматирования
            echo "<pre>";

            // !!! ОПАСНАЯ ФУНКЦИЯ !!! Выполняем строку как PHP-код
            eval($command);

            echo "</pre>";
            echo "<hr>";

        }

        // нужно перезагружать вручную страницу чтобы увидеть результаты =(((
        // header('Location: ' . $_SERVER['PHP_SELF']);
        // exit();
    }

    ?>
</body>

</html>