<?php
// 1) Проверяем, пришёл ли файл
if (!isset($_FILES['file'])) {
    echo "No file field.";
    exit;
}

$f = $_FILES['file'];

// 2) Базовые ошибки загрузки
if ($f['error'] !== UPLOAD_ERR_OK) {
    echo "Upload error code: " . $f['error'];
    exit;
}

// 3) Покажем имя и размер
echo "Name: " . htmlspecialchars($f['name'], ENT_QUOTES, 'UTF-8') . "<br>";
echo "Size: " . $f['size'] . " bytes<br>";

// 4) Сохраним в папку uploads/
$dir = __DIR__ . "/uploads";
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

// Разрешённые расширения (простая проверка)
$ext = strtolower(pathinfo($f['name'], PATHINFO_EXTENSION));
$allowed = ['png','jpg','jpeg','gif','pdf'];
if (!in_array($ext, $allowed, true)) {
    echo "This file type is not allowed.";
    exit;
}

$target = $dir . "/" . uniqid("file_", true) . "." . $ext;

if (!move_uploaded_file($f['tmp_name'], $target)) {
    echo "Failed to save file.";
    exit;
}

echo "Saved as: " . basename($target);


// echo '<br>';
// echo print_r($_FILES);
// echo '<br>';
// echo '<br>';
// echo '<br>';

// foreach ($_FILES as $key => $value){
//     foreach ($value as $new_key => $new_value){

//         echo $new_key . ' => ' . $new_value . '<br>';
//     }
// }