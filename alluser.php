

<?php

include_once 'user.php';
$allUser = new user ();

$pageNumber = (!empty($_GET['page_number'])) ? $_GET['page_number'] : 1;
if (isset($_GET['pageLimit'])) {
    $pageLimit = $_GET['pageLimit'];
} else {
    $pageLimit = 10;
}
$allResult = $allUser->viewUser($_GET, $_POST);

//include_once 'config.php';
//include_once 'configuration.php';

/*
  $name = !empty($_SESSION['search_name']) ? $_SESSION['search_name'] : '';
  $searchQuery = "";

  if (isset($_POST['submit'])) {
  $name = $_POST['search_name'];
  $_SESSION['search_name'] = $name;
  }

  if (isset($_GET['pageLimit'])) {
  $pageLimit = $_GET['pageLimit'];
  } else {
  $pageLimit = 10;
  }

  if (!empty($name)) {
  $searchQuery = "f_name LIKE '%" . $name . "%' OR l_name LIKE '%" . $name . "%' OR contact LIKE '%" . $name . "%'";
  }
  $all_user = new user();
  $all_user->viewUser();
  /*
 * SELECT user_info.*,thana.name as thana_name,district.name as district_name,division.name as division_name FROM user_info
  left join thana on user_info.thana_id = thana.id
  left join district on  thana.district_id = district.id
  left join division on district.division_id = division.id


  $table = "user_info ";
  $column = $table.".*,thana.name as thana_name, district.name as district_name, division.name as division_name";
  $join = "left join thana on user_info.thana_id = thana.id left join district on  thana.district_id = district.id left join division on district.division_id = division.id ";
  $pageNumber = (!empty($_GET['page_number'])) ? $_GET['page_number'] : 1;
  $offset = ($pageNumber - 1) * $pageLimit;

  $allResult = $db->select($table, $column, $join, $searchQuery,$pageLimit, $offset);
  //echo $allResult;
  //exit;




  $result = $db->select($table, $column, $join, $searchQuery, $pageLimit, $offset);






  //$thanaName = "SELECT thana.name FROM thana INNER JOIN user_info ON user_info.thana_id = thana.id where user_info.thana_id= '1'";
  //$thanaResult =$conn->query($thanaName);
  $table = "user_info";
  $where = "f_name LIKE '%" . $name . "%' OR l_name LIKE '%" . $name . "%' OR contact LIKE '%" . $name . "%'";
  $column = "user_info.*,thana.name as thana_name,district.name as district_name,division.name as division_name";
  $db->select($table, $column, $join, $where);
  $select_sql = "SELECT user_info.*,thana.name as thana_name,district.name as district_name,division.name as division_name FROM user_info"
  . " left join thana on user_info.thana_id = thana.id"
  . " left join district on  thana.district_id = district.id"
  . " left join division on district.division_id = division.id".$searchQuery;

  $allResult = $conn->query($select_sql);


  $select_sql = "SELECT user_info.*,thana.name as thana_name,district.name as district_name,division.name as division_name FROM user_info"
  . " left join thana on user_info.thana_id = thana.id"
  . " left join district on  thana.district_id = district.id"
  . " left join division on district.division_id = division.id"
  .$searchQuery
  . " LIMIT " . $pageLimit . " OFFSET " . $offset;
  $result = $conn->query($select_sql);


  //print_r($select_sql);
 */
?>

