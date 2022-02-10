<?php

//include_once 'config.php';
include_once 'user.php';
$updated_user = new user();

$updated_user->update('update');



//if (isset($_POST['update'])) {
//    $id = $_POST['id'];
//    $f_name = $_POST['f_name'];
//    $l_name = $_POST['l_name'];
//    $date_of_birth = $_POST['date_of_birth'];
//    $gender = $_POST['gender'];
//    $contact = $_POST['contact'];
//    $hobby = implode(',', $_POST['hobby']);
//    $acd_level = $_POST['acd_level'];
//    $photo = $_POST['photo'];
//    $address = $_POST['address'];
//    $thana_id = $_POST['thana_id'];
//
//    
//    $table = "user_info ";
//    $set = " f_name='" . $f_name
//            . "', l_name='" . $l_name
//            . "', gender='" . $gender
//            . "', contact='" . $contact
//            . "', hobby='" . $hobby
//            . "', acd_level='" . $acd_level
//            . "', photo='" . $photo
//            . "', address='" . $address
//            . "',  thana_id='" . $thana_id
//            . "'";
//    $id = "id='" . $id . "';";
//    $updateResult = $update->update($table, $set, $id);


//    echo "$id";
//    exit;
    // $db = new Database();
//     $table = "user_info ";
//     $set = " f_name='" . $f_name
//            . "', l_name='" . $l_name
//            . "', gender='" . $gender
//            . "', contact='" . $contact
//            . "', hobby='" . $hobby
//            . "', acd_level='" . $acd_level
//            . "', photo='" . $photo
//            . "', address='" . $address
//            . "',  thana_id='". $thana_id
//            . "'";  
//    $id ="id='" . $id . "';";
//    $upadteQuery = $db ->update($table,$set,$id);
//    $upadte_query = "UPDATE user_info SET f_name='" . $f_name
//            . "', l_name='" . $l_name
//            . "', gender='" . $gender
//            . "', contact='" . $contact
//            . "', hobby='" . $hobby
//            . "', acd_level='" . $acd_level
//            . "', photo='" . $photo
//            . "', address='" . $address
//            . "',  thana_id='". $thana_id
//            . "' WHERE id='" . $id . "';";
//
//
//    if ($upadteQuery === TRUE) {
//        $message = "Data Save Successfully!";
//    } else {
//        $message = "Data does Not save successfully";
//    }
//
//    header("Location:view_user.php?message=" . $message);
//}
?>