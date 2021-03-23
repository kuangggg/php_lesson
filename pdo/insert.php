<?php

try {

    $conn = new PDO('mysql:host=mysql5;dbname=test', 'root', '123456');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo $e->getMessage();
}


$sql = 'insert into person (username1, sex) values (:username, :sex)';

$stmt = $conn->prepare($sql);

try {

    $stmt->execute([
        ':username' => 'zhoukuankuan',
        ':sex' => 'mann'
    ]);

    echo $conn->lastInsertId();

} catch (PDOException $e) {
    echo $e->getMessage();
}

