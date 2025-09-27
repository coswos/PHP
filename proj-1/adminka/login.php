<?php
$login = 'admin';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['login'] === $login && $_POST['passwd'] === $login) {
        header("Location: admin.php");
        exit;
    } else {
        // выебуется редирект, исправить через сессию
        echo "<script>alert('Wrong login or password!');</script>";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Log in</title>
</head>

<body>
    <div class="form">

        <form method="post">
            Login: <br>
            <input type="text" name="login"> <br>
            Password: <br>
            <input type="password" name="passwd"> <br>
            <button type="submit"><b>Enter</b></button>
        </form>
    </div>
</body>

</html>