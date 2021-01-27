<?php
    $host = 'localhost';
    $user = 'root';
    $password = '123456';
    $dbname = 'pdotest';

    // set DSN
    $dsn = "mysql:host=$host;dbname=$dbname";

    // pdo instance
    $pdo = new PDO($dsn, $user, $password);

    $status = 'admin';

    $sql = 'SELECT * FROM users';
    // $sql = 'SELECT * FROM users WHERE status = :status';
    
    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    // $stmt->execute(['status' => $status]);

    $users = $stmt->fetchAll();

    foreach ($users as $user ) {
        echo $user['name'].'<br>';
    }