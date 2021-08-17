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
$sql = 'SELECT * FROM `users`';

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
echo '<tr> <th>ID</th> <th>Имя</th> <th>email</th> <th>Дата создания</th> </tr>';
foreach($arrUsers as $arrUser) {
    echo '<tr>';
    echo '<td>'.$arrUser['id'].'</td>';
    echo '<td>'.$arrUser['name'].'</td>';
    echo '<td>'.$arrUser['email'].'</td>';
    echo '<td>'.$arrUser['created_at'].'</td>';
    echo '</tr>';
}
echo '</table>';