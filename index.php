<?php

include "connect.php"; 

$stmt = $con->prepare("DELETE FROM `users`  WHERE id = ?") ;
$stmt->execute(array(6)) ;

$count = $stmt->rowCount() ;

if ($count > 0) {

    echo 'success' ;
} else {
    echo 'fail' ;
}



?>