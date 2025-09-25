<?php
if (isset($_POST['sauce'], $_POST['bun'])) {
    $sauces = $_POST['sauce']; // это массив
    if (count($sauces) == 1) {
        echo "Your choice: <br>{$_POST['bun']} bun with " . implode($sauces) . ' sauce.';
    } elseif (count($sauces) == 2) {
        echo "Your choice: <br>{$_POST['bun']} bun with " . implode(" and ", $sauces) . ' sauces.';
    } else {
        echo "Your choice: <br>{$_POST['bun']} bun with " . implode(", ", $sauces) . ' sauces.';
    }
} else {
    echo "Please finish filling out your order!<br>";
    echo '<a href="index.php"><button type="button">Come back</button></a>';
    // echo '<button type="button" onclick="history.back()">Come back</button>';

}
