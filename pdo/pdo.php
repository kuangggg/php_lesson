<?php

//$dsn = 'mysql:host=192.168.99.101;dbname=test';
$dsn = 'mysql:host=mysql5;dbname=test';
$user = 'root';
$pwd = '123456';

try {
    $conn = new \PDO($dsn, $user, $pwd);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

//$stmt = $conn->query('select * from person');
//
//while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//    print_r($row);
//}

//参数和预处理
$sql = 'select username from person where user_id = :id';

$stmt = $conn->prepare($sql);

$stmt->execute([
    'id' => 7
]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

print_r($result);

$sql = 'select * from person where user_id = ? and sex = ?';

$stmt = $conn->prepare($sql);

$stmt->execute([
    7, 'man'
]);

$result = $stmt->fetch();

print_r($result);
