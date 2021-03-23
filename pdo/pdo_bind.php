<?php

try {
    $conn = new PDO('mysql:host=mysql5;dbname=test', 'root', '123456');
} catch (PDOException $e) {
    echo $e->getMessage();
}


$sql = 'select * from person where user_id =:user_id and sex =:sex';

$stmt = $conn->prepare($sql);

$stmt->bindValue(':user_id', 4, PDO::PARAM_INT);

$stmt->bindParam(':sex', $sex);

$sex = 'man';

$stmt->execute();

$result = $stmt->fetchAll();

print_r($result);



