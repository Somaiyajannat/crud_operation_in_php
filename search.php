<?php

include_once 'config.php';
$name = !empty($_SESSION['search_name']) ? $_SESSION['search_name'] : '';
$searchQuery = "";

if (isset($_POST['submit'])) {
    $name = $_POST['search_name'];
    $_SESSION['search_name']=$name;
}
if (isset($_GET['pageLimit'])) {
    $pageLimit = $_GET['pageLimit'];
} else {
    $pageLimit = 10;
}
if (!empty($name)) {
    $searchQuery = "where f_name LIKE '%" . $name . "%' OR l_name LIKE '%" . $name . "%' OR contact LIKE '%" . $name . "%'";
}


$pageNumber = (!empty($_GET['page_number'])) ? $_GET['page_number'] : 1;
$offset = ($pageNumber - 1) * $pageLimit;

$select_sql = "SELECT * FROM user_info " . $searchQuery . ";";
$allResult = $conn->query($select_sql);

$select_sql = "SELECT * FROM user_info " . $searchQuery . " LIMIT " . $pageLimit . " OFFSET " . $offset . ";";
$result = $conn->query($select_sql);
//    echo $name;
//$sql = "select * from user_info where f_name = '" . $name . "' OR l_name = '" . $name . "' OR contact = '" . $name . "';";
// $sql = "select * from user_info where f_name LIKE '%" . $name . "%' OR l_name LIKE '%" . $name . "%' OR contact LIKE '%" . $name . "%';";
// $result = $conn->query($sql);
?>