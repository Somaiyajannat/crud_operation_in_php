<!-- <?php

//include_once 'config.php';
include_once 'configuration.php';
if (isset($_POST['submit'])) {
//    echo '<pre>';
//    print_r($_POST);exit;

    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $hobby = implode(',', $_POST['hobby']);
    $acd_level = $_POST['acd_level'];
    $photo = $_POST['photo'];
    $address = $_POST['address'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $thana_id = $_POST['thana_id'];
    
   
    
   

    /* header("Location:create_user.php?f_name=".$f_name .'&l_name='.$l_name .'&date_of_birth='.$date_of_birth.'&contact='.$contact.'&gender='.$gender.'&hobby='.$hobby
      .'&acd_level='.$acd_level.'&address='.$address); */
    $db = new Database();
    $table = "user_info";
    $colNames = "(f_name,l_name, date_of_birth,gender,contact, hobby,acd_level,photo,address,user_name,password,thana_id)";
    $colValues = "('$f_name','$l_name', '$date_of_birth','$gender','$contact', '$hobby','$acd_level','$photo','$address','$user_name','$password','$thana_id')";
    $insertSql = $db->insert($table, $colNames, $colValues);
    
    
    /*$insertSql = "INSERT INTO user_info (f_name,l_name, date_of_birth,gender,contact, hobby,acd_level,photo,address,user_name,password,thana_id)"
            . "VALUES('$f_name','$l_name', '$date_of_birth','$gender','$contact', '$hobby','$acd_level','$photo','$address','$user_name','$password','$thana_id')";
    
    
    /* echo '<pre>';
      print_r($sql);
      exit; */
    if ($insertSql) {
        $message = "New Record Created Successfullly!";
    } else {
        $message = "Data has not created successfully";
    }
    
    header("Location:create_user.php?message=".$message); 
}
?> -->