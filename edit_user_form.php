<?php
include_once 'header.php';
include_once 'navbar.php';
//include_once 'edit.php';
//include_once 'division.php';
include_once 'user.php';
$user = new User();
$editUser = $user->edit();

$userInformation = $editUser['user_info'];
$division_id = $userInformation['division_id'];
//$district_id = $userInformation['district_id'];
//$divisions =$user->get_district($division_id);
//$districts = $user->get
//echo $division_id;
//echo '<pre>';
//print_r($userInformation);
//
////echo $editUser['district_list']->num_rows;
//echo '<pre>';print_r($editUser['thana_list']);

//echo $district_id = $userInformation['district_id'];
//exit;
?>

<div class="col-md-10">

    <form action="update.php" method="post">
        <input type="hidden" class="form-control" value="<?php echo (!empty($userInformation['id'])) ? $userInformation['id'] : ""; ?>" name ="id">
        <div class ="row registration-form">
            <div class="form-design">
                Edit Your Information
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9">
                    <input class=" form-control " value="<?php echo (!empty($userInformation['f_name'])) ? $userInformation['f_name'] : ""; ?>" name ="f_name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9  col-form-label">
                    <input class="form-control" value = "<?php echo(!empty($userInformation['l_name'])) ? $userInformation['l_name'] : ""; ?>" name ="l_name" >
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9  col-form-label">
                    <input class="form-control" value = "<?php echo(!empty($userInformation['date_of_birth'])) ? $userInformation['date_of_birth'] : ""; ?>" name ="date_of_birth" >

                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 col-form-label">
                    <input  class="form-control" value="<?php echo(!empty($userInformation['contact'])) ? $userInformation['contact'] : ""; ?>" name="contact" >


                </div>
            </div>
            <div class="form-group">
                <div class ="col-sm-9 col-md-9 col-lg-9 col-xl-9">
                    <div class="input-group">
                        <select class="form-control" name ="acd_level" id="academic">
                            <option value="">--- Select Academic Level ---</option>
                            <option value="1" <?php echo ($userInformation['acd_level'] == 1) ? 'selected' : ''; ?> >Graduation</option>
                            <option value="2" <?php echo ($userInformation['acd_level'] == 2) ? 'selected' : ''; ?> >Post Graduation</option>
                            <option value="3" <?php echo ($userInformation['acd_level'] == 3) ? 'selected' : ''; ?> >HSC</option>
                        </select>
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 col-form-label">
                    <input class= "form-control" id= "address" value="<?php echo(!empty($userInformation['address'])) ? $userInformation['address'] : ""; ?>" name ="address">
                </div>
            </div>
            <div class="form-group col-sm-12 col-md-10 col-lg-12 col-xl-12 col-form-label">
                <div class="division col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label">
                    <label>Select Division</label>
                    <select id="division" onchange="onChangeDivision()" name="division_id">

                        <?php
                        $selectedDivision = "";
                        if ($editUser['division_list']->num_rows > 0) {
                            ?>
                            <option value="0">--- Select Division --- </option>
                            <?php
                            while ($row = $editUser['division_list']->fetch_assoc()) {
                                $selectedDivision = ($row['id'] == $userInformation['division_id']) ? 'selected' : "";
                                ?>
                                <option value ="<?php echo $row['id'] ?>"<?php echo $selectedDivision; ?>> <?php echo $row['name'] ?> </option>

                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="district col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label">
                    <label>Select District</label>
                    <select id="district" onchange ="onChangeDistrict()" name="district_id">
                        <?php
                        $districts = $editUser['district_list'];
                        if ($districts->num_rows > 0) {
                            $isSelected = "";
                            while ($row = $districts->fetch_assoc()) {
                                $isSelected = ($row['id'] == $userInformation['district_id']) ? 'selected' : "";
                                echo "<option value ='" . $row['id'] . "' " . $isSelected . ">" . $row['name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="thana col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label">
                    <label>Select Thana</label>
                    <select id="thana" name="thana_id">
                        <?php
                        
                        $thana = $editUser['thana_list'];
                        if ($thana->num_rows > 0) {
                            $isSelected = "";
                            while ($row = $thana->fetch_assoc()) {
                                $isSelected = ($row['id'] == $userInformation['thana_id']) ? 'selected' : "";
                                echo "<option value ='" . $row['id'] . "' " . $isSelected . ">" . $row['name'] . "</option>";
                                
                                ?>
                                <!--<option value ="<?php echo $row['id'] ?>" <?php echo $isSelected ?> > <?php $row['name'] ?> </option>-->

                                <?php
                            }
                        }
                        ?>

                    </select>
                </div>
            </div> 
            <div class="form-group">
                <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9  col-form-label">

                    <input type="radio" id="male" value="1" name="gender"  <?php echo ($userInformation['gender'] == 1) ? "checked" : "" ?>/>
                    <label for="male">Male</label>
                    <input type="radio" id="female" value="2" name="gender" <?php echo ($userInformation['gender'] == 2) ? "checked" : "" ?>/>
                    <label for="female">female</label>
                    <input type="radio" id="others"  value="3" name="gender" <?php echo ($userInformation['gender'] == 3) ? "checked" : "" ?>/>
                    <label for="others">Others</label><br>
                </div>
            </div>

            <div class="form-group">

                <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9  col-form-label">
                    <?php
                    $hobbyList = explode(",", $userInformation['hobby']);
                    ?>
                    <input type="checkbox"  name="hobby[]" value="1"  <?php echo in_array(1, $hobbyList) ? 'checked' : '' ?>>
                    <label for="reading">Reading</label>

                    <input type="checkbox"  name="hobby[]" value="2"  <?php echo in_array(2, $hobbyList) ? 'checked' : '' ?>>
                    <label for="travelling">Travelling</label>

                    <input type="checkbox"  name="hobby[]" value="3" <?php echo in_array(3, $hobbyList) ? 'checked' : '' ?>>
                    <label for="gardening">Gardening</label>

                    <input type="checkbox"  name="hobby[]" value="4" <?php echo in_array(4, $hobbyList) ? 'checked' : '' ?> >
                    <label for="singing">Singing</label>
                </div>
            </div>

            <div class="form-group">

                <div class="input-group col-sm-10 col-md-10 col-lg-10 col-xl-10">
                    <input type=file value=""  name="photo" class="" >

                </div>
            </div>

            <div class="form-group">
                <button type= "submit" name ="update" class="submit-button btn btn-primary button col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Save</button>
                <a type= "button" href="view_user.php" name ="cancelButton" class=" cancel-button btn btn-primary col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Cancel</a>


            </div>
        </div>
    </form>
<!--    <script src =js/area.js></script>-->
</div>
</div>
</div>

<?php
include_once 'footer.php';
?>
