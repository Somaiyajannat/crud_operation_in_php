
<?php
include_once 'user.php';
$userId = $_GET['user_id'];
$deletedUser = new user(); 
$result = $deletedUser->delete($userId);
$message="";
if($result=== TRUE){
    echo $message= "Delete Raw Successfully!";
}else{
    echo $message= "Delete Raw Unsuccessfully!";
}
header("Location:view_user.php?message=" . $message);



//$userId = $_GET['user_id'];
//
//$del_sql = "delete from user_info where id = '" . $userId . "';";
//$table = "user_info";
//$id= $userId;
//$deleteSql = $db->delete($table, $id);
//
//$message="";
//if($deleteSql=== TRUE){
//    echo $message="Delete Raw Successfully!";
//}else{
//    echo $message="Delete Raw Unsuccessfully!";
//}
//header("Location:view_user.php?message=" . $message);
//?>