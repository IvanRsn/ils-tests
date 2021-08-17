<?php

// Подключаемся к БД.
$mysqli = new mysqli('127.0.0.1', 'root', 'mirumir', 'ils-test5');

if ($mysqli->connect_errno) {
    echo 'Database connection error.<br>';
    echo "Error number: " . $mysqli->connect_errno . '<br>';
    echo "Error: " . $mysqli->connect_error . '<br>';
    die;
}

// Выполняем запрос SQL
$sql = 'SELECT u.id, u.name, d.name as dog_name FROM `users` AS u
        LEFT JOIN `dogs` AS d ON d.user_id = u.id';

if (!$sqlResult = $mysqli->query($sql)) {
    echo 'MySQLi request error.';
    echo "Request: " . $sql . '<br>';
    echo "Error number: " . $mysqli->errno . '<br>';
    echo "Error: " . $mysqli->error . '<br>';
    die;
}

// Выводим результат
$arrUsers = $sqlResult->fetch_all(MYSQLI_ASSOC);

echo '<table  border="1">';
echo '<tr> <th>ID</th> <th>Имя</th> <th>Питомец</th> </tr>';
foreach($arrUsers as $arrUser) {
    echo '<tr>';
    echo '<td>'.$arrUser['id'].'</td>';
    echo '<td>'.$arrUser['name'].'</td>';
    echo '<td>'.($arrUser['dog_name'] ?? 'Нет питомца').'</td>';
    echo '</tr>';
}
echo '</table>';