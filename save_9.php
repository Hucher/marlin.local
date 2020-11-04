<?php
require_once 'dbConnect.php';

$text = $_POST['text'];
$sql = "INSERT INTO my_table (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text'=> $text]);