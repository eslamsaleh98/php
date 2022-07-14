<?php

include "../connect.php" ;

$name =     filterRequest('name') ;
$password = filterRequest('password') ;
$email =    filterRequest('email') ;

$stmt = $con->prepare('INSERT INTO `loginn`(`name`, `password`, `email`) VALUES (? , ? , ?)
') ;

$stmt->execute(array($name  , $password , $email)) ;
$count = $stmt->rowCount() ; 
if ($count > 0) {
    echo json_encode(array('status' => 'success')) ;
} else {
    echo json_encode(array('status' => 'fail')) ;
}


?>