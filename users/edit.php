<?php

include "../connect.php" ;

$user_id    =    filterRequest('u_id');
$name       =    filterRequest('name');
$age        =    filterRequest('age');
$notes      =    filterRequest('notes');
$phone      =    filterRequest('phone');
$email      =    filterRequest('email');
$imagename  =    filterRequest('imagename');


if(isset($_FILES['file'])){

    deleteFile("../upload" , $imagename) ;
    $imagename =  imageUplode('file') ; 
}



$stmt = $con->prepare("UPDATE `userss` SET
`name`=? , `age`=? , `notes`=? , `phone`=? , `email`=? , `u_image` = ? WHERE u_id = ? ");

$stmt->execute(array( $name  , $age , $notes , $phone , $email , $imagename , $user_id  )) ;

$count = $stmt->rowCount() ; 

if ($count > 0) {
    echo json_encode(array('status' => 'success')) ;
} else {
    echo json_encode(array('status' => 'fail')) ;
}


?>