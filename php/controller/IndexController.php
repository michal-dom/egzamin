<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2018-01-29
 * Time: 11:12
 */



$pdo = new PDO('mysql:host=localhost;dbname=egzamin', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = rand(3, 34);
$arr = [];

$sql = "SELECT * FROM questions WHERE id_question = ".$id;

$select_stmt = $pdo->query($sql);
$row = $select_stmt->fetch();
//print_r($row);
$arr[0] = $row;

$sql = "SELECT * FROM answers WHERE id_question = ".$id;
$select_stmt = $pdo->query($sql);
//$row = $select_stmt->fetch();
//print_r($row);

while($row = $select_stmt->fetch())
{
//    echo '<li>'.$row['nazwa'].': '.$row['opis'].'</li>';
    array_push($arr, $row);
}

//print_r($arr);

echo json_encode($arr);


//$insert_stmt->execute($id);