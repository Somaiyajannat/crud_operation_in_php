<?php
include_once 'session.php';
include_once 'header.php';
include_once 'navbar.php';
include_once 'user.php';

$user = new user ();

if (isset($_GET['pageLimit'])) {
    $pageLimit = $_GET['pageLimit'];
//    echo $pageLimit;
  
} else {
    $pageLimit = 10;
}
//$allUser->pagination($pageLimit);
//echo $allUser->pagination($pageLimit)['offset'];
$userInfo = $user->viewUser($_POST, $_GET);
$search_name = !empty($_POST['search_name']) ? $_POST['search_name'] : '';
//echo $search_name;
$allResult = $userInfo['user_data'];
$numberOfResults = $userInfo['total_page'];
$offset = $userInfo['offset'];


// $search_name = $allUser->viewUser($_POST)['search_name'];

//echo '<pre>';
//print_r($allResult);
//exit;
//$search_name = $allUser['search_name'];
//print_r($_POST);
//exit;
//$offset = ($pageNumber - 1) * $pageLimit;
//$allResult = $allUser->viewUser($_POST);
//print_r($allResult);
//exit;
//$result = $allUser->searchUser('submit', 'name');
?>

<div class="col-md-10">
    <div class ="row">
        <?php
        echo!empty($_GET['message']) ? $_GET['message'] : '';
        ?>
        <div>
            <div class="col-md-12">
                <p class="view">User Information</p>
            </div>
            <form action="" method="post" class="col-md-12">
                <input type="text" class="col-md-8 input" placeholder="Search your data" value="<?php echo(!empty($search_name) ? $search_name : ''); ?>" name="search_name">
                <button type="submit" name="submit" class="col-md-2 btn btn-secondary " >Search</button><br>
            </form>

        </div>
        <table class="table table-bordered">
            <thead class="table-header-design">
                <tr>
                    <th> Serial</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date Of Birth</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Hobby</th>
                    <th>Academic Level</th>
                    <th>Photo</th>
                    <th>Address</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $serial = $offset;
                if ($allResult->num_rows > 0) {
                    // output data of each row
                    /* echo '<pre>';
                      print_r($result->fetch_assoc());
                      exit; */
                    while ($row = $allResult->fetch_assoc()) {
                        ?>   <tr>
                            <td><?php echo ++$serial; ?></td>
                            <td><?php echo $row["f_name"]; ?></td>
                            <td><?php echo $row["l_name"]; ?></td>
                            <td><?php echo $row["date_of_birth"]; ?></td>
                            <td><?php
                                if ($row["gender"] == 1) {
                                    echo "Male";
                                } else if ($row["gender"] == 2) {
                                    echo "Female";
                                } else {
                                    echo "Others";
                                };
                                ?></td>
                            <td><?php echo $row["contact"]; ?></td>
                            <td><?php
                                if ($row["hobby"] == 1) {
                                    echo "Reading";
                                } else if ($row["hobby"] == 2) {
                                    echo "Travelling";
                                } else if ($row["hobby"] == 3) {
                                    echo "Gardening";
                                } else {
                                    echo "Singing";
                                }
                                ?></td>
                            <td><?php
                                if ($row["acd_level"] == 1) {
                                    echo "Graduation";
                                } else if ($row["acd_level"] == 1) {
                                    echo "Post Graduation";
                                } else {
                                    echo "HSC";
                                }
                                ?></td>

                            <td><?php echo $row["photo"]; ?></td>
                            <td><?php echo $row["address"] . "  " . $row["thana_name"] . " " . $row["district_name"] . " " . $row["division_name"] ?></td>
                            <td> <a type="submit" href ="edit_user_form.php?user_id=<?php echo $row['id'] ?>">Edit</a></td>
                            <td> <a type="submit"href ="delete.php?user_id=<?php echo $row['id'] ?>">Delete</a></td>
                        </tr>

                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td><?php echo "No Data Found"; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>

        </table>
    </div>
    <?php
   
    //$numberOfResults = mysqli_num_rows($allResult);
    //echo $numberOfResults;
    $numOfPages = ceil($numberOfResults / $pageLimit);
    $current_page = $prev_page = $next_page = 1;
    

    if (isset($_GET['page_number'])) {
       $current_page = $_GET['page_number'];
//        exit;
    }

    ($current_page > 1) ? $prev_page = ($current_page - 1) : $prev_page = $current_page;
    if($current_page >= $numOfPages) {
        $next_page = $current_page;
    } else {
        $next_page = ($current_page + 1);
    }
    ?>

    <div class="pagination">
        <ul>
            <?php
            if (!empty($numberOfResults)) {
//                echo $numberOfResults;
//                echo $pageLimit;
                ?>
                <li><?php echo '<a href ="view_user.php?page_number=1&pageLimit=' . $pageLimit . '">' . "<<" . '</a>'; ?> </li>
                <li><?php echo '<a href ="view_user.php?page_number=' . $prev_page . '&pageLimit=' . $pageLimit . '">' . "<" . '</a>'; ?></li>
                <li class="highlight"><?php echo '<a id="currentPage" href ="view_user.php?page_number=' . $current_page . '&pageLimit=' . $pageLimit . '">' . $current_page . '</a>'; ?></li>
                <?php if ($numOfPages > 1 && $numOfPages != $current_page) {
                    ?>
                    <li><?php echo '<a href ="view_user.php?page_number=' . $next_page . '&pageLimit=' . $pageLimit . '">' . $next_page . '</a>'; ?></li>
                <?php } ?>



                <li><?php echo '<a href ="view_user.php?page_number=' . $next_page . '&pageLimit=' . $pageLimit . '">' . ">" . '</a>'; ?></li>
                <li><?php echo '<a href ="view_user.php?page_number=' . $numOfPages . '&pageLimit=' . $pageLimit . '">' . ">>" . '</a>'; ?></li>
                <?php
            }
   
    
            ?>



        </ul>
 
    </div>



    <div class=pagination>
        <!--        <ul>
                    <li><?php echo '<a href ="view_user.php?page_number=1&pageLimit=' . $pageLimit . '">' . "<<" . '</a>'; ?> </li>
                    <li><?php echo '<a href ="view_user.php?page_number=' . $prev_page . '&pageLimit=' . $pageLimit . '">' . "<" . '</a>'; ?></li>
        <?php
        for ($x = 1; $x <= $numOfPages; $x++) {
            $color = ($current_page == $x) ? "highlight" : "";
            echo '<li class=' . $color . '>';
            echo '<a href ="view_user.php?page_number=' . $x . '&pageLimit=' . $pageLimit . '">' . $x . " " . '</a>';
            echo '</li>';
        }
        ?>
                    <li><?php echo '<a href ="view_user.php?page_number=' . $next_page . '&pageLimit=' . $pageLimit . '">' . ">" . '</a>'; ?></li>
                    <li><?php echo '<a href ="view_user.php?page_number=' . $numOfPages . '&pageLimit=' . $pageLimit . '">' . ">>" . '</a>'; ?></li>
                </ul>-->
        <script>
            function pagelimit()
            {
                var limit = document.getElementById('page').value;
                console.log(limit);
                var currPage = document.getElementById("currentPage").innerHTML;
                console.log(currPage);
                window.location.href = "view_user.php?pageLimit=" + limit;
            }
        </script>
        <div class="pagelimit">
            <label for="page">Select Page Limit</label>
            <select name="page" id="page" onchange="pagelimit()" >
            
                <option  <?php echo ($pageLimit == 5) ? 'selected' : ""; ?> value="5"> 5  </option>
                <option  <?php echo ($pageLimit == 10) ? 'selected' : ""; ?> value="10"> 10 </option>
                <option  <?php echo ($pageLimit == 15) ? 'selected' : ""; ?> value="15"> 15 </option>
                <option  <?php echo ($pageLimit == 20) ? 'selected' : ""; ?> value="20"> 20 </option>
                <option  <?php echo ($pageLimit == 50) ? 'selected' : ""; ?> value="50"> 50 </option>
                <option  <?php echo ($pageLimit == 100) ? 'selected' : ""; ?> value="100"> 100 </option>
                

            </select>
        </div>
    </div>


    <?php
// echo ($current_page == $x) ? "background-color: #008000" : " background-color: #DDFGFF";
// echo '<a href ="view_user.php?$current_page=' . $current_page . '">' . " >" . '</a>';
    ?>



</div>
</div>
</div>
<?php
include_once 'footer.php';
?>