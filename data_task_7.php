<?php
require_once 'dbConnect.php';

$sql = "SELECT * FROM employees";
$statement = $pdo->prepare($sql);
$statement->execute();
$employees = $statement->fetchAll(PDO::FETCH_ASSOC);




