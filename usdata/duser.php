<?php

include "../connect.php" ;

$user_id = filterRequest('user_id') ;


$stmt = $con->prepare('SELECT * FROM loginn WHERE `user_id` = ? ');

$stmt->execute(array($user_id)) ;

$data = $stmt->fetchAll(PDO::FETCH_ASSOC) ;

$count = $stmt->rowCount() ; 

if ($count > 0) {
    echo json_encode(array('status' => 'success' , 'data' => $data )) ;
} else {
    echo json_encode(array('status' => 'fail')) ;
}


?>