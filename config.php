<!-- <?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "project1_db";

$conn = new mysqli($servername, $username, $password, $databasename);
if ($conn->connect_error) {
    die("Connection Failed:" . $conn->connect_error);
} else {
    return true;
}

function select($table, $col, $join = null, $where = null, $orderBy = null, $limit = null) {
    $searchQuery = !empty($where) ? $this->where($where) : '';
    $select_sql = "SELECT " . $col . " FROM " . $table
            . " left join thana on user_info.thana_id = thana.id"
            . " left join district on  thana.district_id = district.id"
            . " left join division on district.division_id = division.id" . $searchQuery;

    return $conn->query($select_sql);
}

function where($clause) {

    return " where " . $clause;
}

?> -->