<?php

class Database {

    private $servername = "localhost";
    private $username = "root";
    private $password = "localhost123";
    private $databasename = "project1_db";
    protected $conn;
    public $result;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->databasename);
        if ($this->conn->connect_error) {
            die("Connection Failed:" . $this->conn->connect_error);
        } 
    }

    public function select($table, $column, $join = null, $searchQuery = null, $pageLimit = null, $offset = null) {

        $searchQuery = !empty($searchQuery) ? $this->where($searchQuery) : '';
        $pageLimit = !empty($pageLimit) ? $this->limit($pageLimit, $offset) : '';

        $selectSql = "SELECT " . $column . " FROM " . $table . " " . $join . $searchQuery . $pageLimit;
//        echo $selectSql;
//        exit;
//        return $selectSql;
        return $this->conn->query($selectSql);
    }

    public function update($table, $updated_info, $id, $pageLimit = null) {
        $upadteQuery = "update " . $table . " set " . $updated_info . " where " . $id;
        //echo "Queary: " . $upadteQuery;
//        exit;
        return $this->conn->query($upadteQuery);
    }

    public function insert($table, $colNames, $colValues) {
        $insertSql = "insert into " . $table . " " . $colNames . " values " . $colValues;
        
        return $this->conn->query($insertSql);
    }

    public function delete($table, $id) {
//        $del_sql = "delete from user_info where id = '" . $userId . "';";
        $deleteSql = "delete from " . $table . "where id='" . $id . "';";
//        echo $deleteSql;
//        exit;
        return $this->conn->query($deleteSql);
    }

    protected function where($clause) {
        return " Where " . $clause;
    }

    protected function limit($limit, $offset = null) {
        $offset = !empty($offset) ? " OFFSET " . $offset : '';
        return " LIMIT " . $limit . $offset;
    }

}

?>
