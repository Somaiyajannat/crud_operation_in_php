<?php 
include_once 'config.php';

//SELECT thana.name FROM thana INNER JOIN user_info ON user_info.thana_id = thana.id where user_info.thana_id= '1';
$sql = "SELECT thana.name FROM thana INNER JOIN user_info ON user_info.thana_id = thana.id where user_info.thana_id= '1';"

  

?>