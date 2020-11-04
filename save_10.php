<?php
require_once 'dbConnect.php';
session_start();

$data = [
    'title' => $_POST['title'],
    'description' => $_POST['description']
];

$sql = "SELECT * FROM articles WHERE :title=title";

$statement = $pdo->prepare($sql);
$test = $statement->execute(['title' => $data['title']]);
$article = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($article)) {
    $message = 'Такая запись присутствует в таблице';
    $_SESSION['danger'] = $message;
}
else {
    $sql = "INSERT INTO articles (title ,description) VALUES (:title ,:description)";
    $statement = $pdo->prepare($sql);
    $test = $statement->execute([
        'title' => $data['title'],
        'description' => $data['description']
    ]);
    $message = 'Запись успешно добавлена';
    $_SESSION['success'] = $message;
}

header('Location:task_10.php');


