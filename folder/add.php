<?php

require_once 'scheme/function.php';
require_once 'scheme/headers.php';

$description = 'Next item';
$amount = 2;

try {

$db = openDb();

$query = $db-> prepare('insert into item(description, amount) values (:description,:amount)');
$query -> bindValue(':description',$description,PDO::PARAM_STR);
$query -> bindValue(':amount',$amount,PDO::PARAM_INT);
$query->execute();

header('HTTP/1.1 200 OK');
$data = array('id' => $db -> lastInsertId(), 'description' => $description, 'amount' => $amount);
print json_encode($data);

} catch (PDOException $pdoex) {
    
returnError($pdoex);
  
}

?>