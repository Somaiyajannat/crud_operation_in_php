<?php

$userId = $_GET['user_id'];
include_once 'config.php';

$sql = "select  user_info.* ,thana.id as thana_id,district.id as district_id, division.id as division_id from user_info 
        LEFT JOIN thana on user_info.thana_id = thana.id 
        LEFT JOIN district on thana.district_id = district.id
        LEFT JOIN division on district.division_id = division.id 
        where user_info.id='" . $userId."'";
$result = $conn->query($sql);


$dSql = "select id, name from district";
$districtResult = $conn->query($dSql);

$thanaSql = "select id , name from thana";
$thanaResult = $conn-> query($thanaSql);



?>