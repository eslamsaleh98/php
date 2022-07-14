<?php

include "../connect.php" ;


$user_id    =    filterRequest('user_id');
$name       =    filterRequest('name');
$password = filterRequest('password') ;
$email =    filterRequest('email') ;



$stmt = $con->prepare('UPDATE loginn SET `name`= ? , `password` =? ,`email`=
? WHERE `user_id`=?  ' );
    
 

$stmt->execute(array( $name  , $password , $email ,$user_id )) ;

$count = $stmt->rowCount() ; 

if ($count > 0) {
    echo json_encode(array('status' => 'success')) ;
} else {
    echo json_encode(array('status' => 'fail')) ;
}


?>