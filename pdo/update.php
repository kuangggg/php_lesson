<?php

$conn = new PDO('mysql:host=mysql5;dbname=test', 'root', '123456');


$sql = 'update person set email = :email where user_id = :id';


$stmt = $conn->prepare($sql);


$stmt->execute([
    ':email' => 'oo.wetax.com',
    ':id' => 9
]);

echo $stmt->rowCount();

