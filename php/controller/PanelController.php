<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2018-01-28
 * Time: 17:10
 */

//
//error_log( $_POST['opt']);
//error_log( $_POST['quest']);
//error_log( $_POST['ans2']);
//error_log( $_POST['ans1']);
//
////require_once
//
//$mapper = new DataMapper();


if(isset($_POST['opt']) && $_POST['opt'] == 1){


}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=egzamin', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $values = [
        $_POST['quest'],
        "IO"
    ];
    $sql = "INSERT INTO questions ( question, subject ) VALUES( ?, ? )";
    $insert_stmt = $pdo->prepare($sql);
    $insert_stmt->execute($values);
    $id = $pdo->lastInsertId();
//    error_log( $id );
    $values = [
        $_POST['ans1'],
        $id,
        "true"
    ];
    $sql = "INSERT INTO answers ( answer, id_question, type ) VALUES( ?, ?, ? )";
    $insert_stmt = $pdo->prepare($sql);
    $insert_stmt->execute($values);

    $values = [
        $_POST['ans2'],
        $id,
        "false"
    ];
    $sql = "INSERT INTO answers ( answer, id_question, type ) VALUES( ?, ?, ? )";
    $insert_stmt = $pdo->prepare($sql);
    $insert_stmt->execute($values);

    $values = [
        $_POST['ans3'],
        $id,
        "false"
    ];
    $sql = "INSERT INTO answers ( answer, id_question, type ) VALUES( ?, ?, ? )";
    $insert_stmt = $pdo->prepare($sql);
    $insert_stmt->execute($values);

    $values = [
        $_POST['ans4'],
        $id,
        "false"
    ];
    $sql = "INSERT INTO answers ( answer, id_question, type ) VALUES( ?, ?, ? )";
    $insert_stmt = $pdo->prepare($sql);
    $insert_stmt->execute($values);




    //echo "sukces";
} catch(PDOException $e) {
    echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
}