<?php

require_once 'scheme/function.php';
require_once 'scheme/headers.php';

try {

$db = openDb();
$sql = "select * from item";
$query = $db->query($sql);
$results = $query->fetchAll(PDO::FETCH_ASSOC);
header('HTTP/1.1 200 OK');
print json_encode($results);

} catch (PDOException $pdoex) {
    
returnError($pdoex);
  
}

?>