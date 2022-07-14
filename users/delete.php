<?php

include "../connect.php" ;


$user_id =    filterRequest('u_id') ;
$imagename =  filterRequest('imagename') ;

$stmt = $con->prepare('DELETE FROM userss WHERE u_id = ? ') ;

$stmt->execute(array( $user_id )) ;
$count = $stmt->rowCount() ; 
if ($count > 0) {
    deleteFile("../upload" , $imagename) ;

    echo json_encode(array('status' => 'success')) ;
} else {
    echo json_encode(array('status' => 'fail')) ;
}


?>