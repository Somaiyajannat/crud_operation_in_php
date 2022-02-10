<?php

include_once 'configuration.php';

class User {

    protected $db;
    private $pageLimit;
    private $offset;

    public function __construct() {
        $this->db = new Database();
    }

    public function index() {
        
    }

    public function create() {
        $academicList = [
            '0' => '--- Select Academic Level ---',
            '1' => 'Graduation',
            '2' => 'Post Graduation',
            '3' => 'HSC',
        ];
        $divisionList = $this->db->select('division', 'id, name', null, 'id = "12"');

        return [
            'division_list' => $divisionList,
            'academic_list' => $academicList,
        ];
    }

    public function pagination() {
        $pageNumber = (!empty($_GET['page_number'])) ? $_GET['page_number'] : 1;
        (isset($_GET['pageLimit'])) ? $pageLimit = $_GET['pageLimit'] : $pageLimit = 10;
        $offset = ($pageNumber - 1) * $pageLimit;
        $this->pageLimit = $pageLimit;
        $this->offset = $offset;
    }

    protected function searchUser($post) {
        $name = "";
        if (!empty($post['search_name'])) {
            $name = $post['search_name'];
        }
        $searchQuery = "";
        if (!empty($name)) {
            $searchQuery = "f_name LIKE '%" . $name . "%' OR l_name LIKE '%" . $name . "%' OR contact LIKE '%" . $name . "%'";
        }
        return $searchQuery;
    }

    public function viewUser($post, $get) {
        
        //$searchArr = $this->searchUser($post);
        $this->pagination();

        $searchQuery = $this->searchUser($post);

        $table = "user_info ";
        $column = $table . ".*,thana.name as thana_name, district.name as district_name, division.name as division_name ";
        $join = "left join thana on user_info.thana_id = thana.id left join district on  thana.district_id = district.id left join division on district.division_id = division.id ";

        $viewResult = $this->db->select($table, $column, $join, $searchQuery, $this->pageLimit, $this->offset);
        $allResult = $this->db->select($table, $column, $join, $searchQuery);
        $numberOfResults = mysqli_num_rows($allResult);
        
        return [
        'user_data' => $viewResult,
        'total_page' => $numberOfResults,
        'offset' =>$this->offset
        ];
    }

    public function edit() {
        $userId = $_GET['user_id'];
        $table = "user_info";
        $cols = $table . ".* ,thana.id as thana_id,district.id as district_id, division.id as division_id";
        $join = "LEFT JOIN thana on user_info.thana_id = thana.id "
                . "LEFT JOIN district on thana.district_id = district.id "
                . "LEFT JOIN division on district.division_id = division.id";
        $where = "user_info.id = '" . $userId . "'";
        $userInfo = $this->db->select('user_info', $cols, $join, $where);
        $userInformation = $userInfo->fetch_assoc();

        $academicList = [
            '0' => '--- Select Academic Level ---',
            '1' => 'Graduation',
            '2' => 'Post Graduation',
            '3' => 'HSC',
        ];
        $divisionList = $this->db->select('division', 'id, name');
        $condition = "division_id='" . $userInformation['division_id'] . "'"; // division_id='1'
        $districtList = $this->db->select('district', 'id, name', null, $condition);

        $thanaid = "district_id='" . $userInformation['district_id'] . "'";
        $thanaList = $this->db->select('thana', 'id, name', null, $thanaid);



        return [
            'division_list' => $divisionList,
            'district_list' => $districtList,
            'thana_list' => $thanaList,
            'academic_list' => $academicList,
            'user_info' => $userInformation,
        ];
    }

    public function update($update) {
        //echo "user::update start";
        if (isset($_POST[$update])) {
            $id = $_POST['id'];
            $f_name = $_POST['f_name'];
            $l_name = $_POST['l_name'];
            $date_of_birth = $_POST['date_of_birth'];
            $gender = $_POST['gender'];
            $contact = $_POST['contact'];
            $hobby = implode(',', $_POST['hobby']);
            $acd_level = $_POST['acd_level'];
            $photo = $_POST['photo'];
            $address = $_POST['address'];
            $thana_id = $_POST['thana_id'];

            //echo "<br>thana id: " . $thana_id;

            $table = "user_info ";
            $updated_info = " f_name='" . $f_name
                    . "', l_name='" . $l_name
                    . "', gender='" . $gender
                    . "', contact='" . $contact
                    . "', hobby='" . $hobby
                    . "', acd_level='" . $acd_level
                    . "', photo='" . $photo
                    . "', address='" . $address
                    . "',  thana_id='" . $thana_id
                    . "'";
            $id = "id='" . $id . "';";
            $updateResult = $this->db->update($table, $updated_info, $id);
            //echo "<br>row affected: " . $updateResult;
            if ($updateResult == TRUE) {
                $message = "Data Update Successfully";
            } else {
                $message = "Data does not save!!";
            }

            header("Location:view_user.php?message=" . $message);
        }
    }

    public function delete($userId) {
        $table = "user_info ";
        $id = $userId;
        $deleteSql = $this->db->delete($table, $id);
    }

}

?>