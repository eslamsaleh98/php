<?php

include "../connect.php" ;


$user_id   =    filterRequest('user_id') ;
$name      =    filterRequest('name') ;
$age       =    filterRequest('age') ;
$notes     =    filterRequest('notes') ;
$phone     =    filterRequest('phone') ;
$email     =    filterRequest('email') ;

$imagename =  imageUplode('file') ; 
if ($imagename != 'fail') {
    $stmt = $con->prepare('INSERT INTO `userss`( `user_id` , `name` , `age` , `notes` , `phone` , `email` , `u_image`) VALUES (? , ? , ? , ? , ? , ? , ?)
') ;

$stmt->execute(array( $user_id , $name  , $age , $notes , $phone , $email , $imagename)) ;
$count = $stmt->rowCount() ; 
if ($count > 0) {
    echo json_encode(array('status' => 'success')) ;
} else {
    echo json_encode(array('status' => 'fail')) ;
} 


}else {
    echo json_encode(array('status' => 'fail')) ;

}





?>