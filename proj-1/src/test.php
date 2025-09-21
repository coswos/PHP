<?php
// $name = 'Oliver';
// echo $name .' '. ucfirst(strtolower(strrev($name)));
// echo "<br>";


$nums = ['one', 'two', 'three', 'age'=>32];
$nums[]='hello';
print_r($nums);
echo '<br>';
$new_nums = array_values($nums);
print_r($new_nums);
echo '<br>';
echo '<br>';


echo is_array($nums), '<br>';
echo in_array('two',$nums);
echo array_key_exists(0, $new_nums)? 'yes':'no';
echo array_search('two', $nums);

// foreach ($nums as $key => $value) {
//     echo $key, $value, "<br>";
// }
// echo '<br>';
// foreach ($new_nums as $key => $value) {
//     echo $key, $value, "<br>";
// }

// echo '<br>', count($nums);
// print_r($nums);