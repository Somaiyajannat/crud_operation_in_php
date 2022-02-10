<?php
include_once 'header.php';
include_once 'navbar.php';
include_once 'session.php';
include_once 'user.php';
$user = new User();
$createUser = $user->create();
?>
<?php
//echo!empty($_GET['message']) ? $_GET['message'] : '';
?>
<div class="col-md-10">
    <div class="row">
        <?php
        echo!empty($_GET['message']) ? $_GET['message'] : '';
        ?>

        <form action="insertion.php" method="post">
            <input type="hidden" class="form-control" value="" name ="">
            <div class ="row ">
                <div class="form-design form-header">
                    Registration Form
                </div>
                <div class=" form-group registration-form">
                    <div class="form-group">
                        <!--<label for="firstname" class=" test-decoration col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">First Name</label>-->
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 col-form-label">
                            <input type="text" class="form-control" placeholder="First name"  name ="f_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <!--                <label for="lastname" class=" test-decoration col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Last Name</label>-->
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10  col-form-label">
                            <input type="text" class="form-control" placeholder="Last name"  name ="l_name" >
                        </div>
                    </div>
                    <div class="form-group">
                        <!--<label for="DateofBirth" class="test-decoration col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Date of Birth</label>-->
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10  col-form-label">
                            <input type="text" class="form-control" placeholder="Date Of Birth" name ="date_of_birth" >

                        </div>
                    </div>

                    <div class="form-group">
                        <!--<label for="contact" class="test-decoration col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Contact</label>-->
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 col-form-label">
                            <input type="text" placeholder="Contact Number" class="form-control" name="contact" >
                        </div>
                    </div>

                    <div class="form-group">
                        <!--<label for="academic" class="test-decoration col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Academic Level</label>-->
                        <div class ="col-sm-10 col-md-10 col-lg-10 col-xl-10 col-form-label">
                            <div class="input-group">
                                <select class="form-control" name ="acd_level" id="academic">
                                    <?php if (!empty($createUser['academic_list'])) { ?>
                                        <?php foreach ($createUser['academic_list'] as $id => $name) {
                                            ?>
                                            <option value="<?php echo $id; ?>"> <?php echo $name; ?> </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>  
                        <?php
//                echo(!empty($_GET['acd_level'])) ? $_GET['acd_level'] : "";
//                
                        ?>
                    </div>     

                    <div class="form-group">
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 col-form-label">
                            <input type="text" placeholder="Address" class= "form-control" id= "address"  name ="address">
                        </div>
                    </div>    

                    <div class="form-group col-sm-12 col-md-10 col-lg-12 col-xl-12 col-form-label">
                        <div class="division col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label">
                            <label>Select Division</label>
                            <select id="division" onchange="onChangeDivision()" name ="division_id">

                                <?php if ($createUser['division_list']->num_rows > 0) { ?>
                                    <option value="0">--- Select Division --- </option>
                                    <?php while ($row = $createUser['division_list']->fetch_assoc()) {
                                        ?>

                                        <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </option>
                                        <?php
                                    }
                                }
                                ?>

                            </select>

                        </div>
                        <div class="district col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label">
                            <label>Select District</label>
                            <select id="district" onchange ="onChangeDistrict()" name ="district_id">
                                <option value="0">--- Select ---</option>

                            </select>
                        </div>
                        <div class="thana col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label">
                            <label>Select Thana</label>
                            <select id="thana"  name ="thana_id">
                                <option value="0">--- Select ---</option>

                            </select>
                        </div>
                    </div>  



                    <div class="form-group">

                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 col-form-label">
                            <input type="text" placeholder="UserName" class= "form-control" id= "user_name"  name ="user_name">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 col-form-label">
                            <input type="text" placeholder="Password" class= "form-control" id= "password"  name ="password">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 col-form-label">
                            <input type=file value=""  name="photo" class="" >

                        </div>
                    </div>
                    <div class="form-group">
                        <!--<label for="gender" class=" col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Select Your Gender</label>-->
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10  col-form-label">

                            <input type="radio" id="male" value="1" name="gender"/>
                            <label for="male" >Male</label>
                            <input type="radio" id="female" value="2" name="gender"
                                   <label for="female" class="test-decoration">Female</label>
                            <input type="radio" id="others"  value="3" name="gender"  
                                   <label for="others" class="test-decoration">Others</label><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <!--<label for="hobby" class="test-decoration col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Hobby</label>-->

                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10  col-form-label">
                            <input type="checkbox"  name="hobby[]" value="1"  >
                            <label for="reading" >Reading</label>

                            <input type="checkbox"  name="hobby[]" value="2"  >
                            <label for="travelling">Travelling</label>

                            <input type="checkbox"  name="hobby[]" value="3" >
                            <label for="gardening" >Gardening</label>

                            <input type="checkbox"  name="hobby[]" value="4"  >
                            <label for="singing" >Singing</label>


                        </div>
                        <?php
                        echo(!empty($_GET['hobby'])) ? $_GET['hobby'] : "";
                        ?>
                    </div>
                    <div class="form-group">
                        <button type= "submit" name ="submit" class=" submit-button btn btn-primary button col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Submit</button>
                        <button type= "reset" name ="cancelButton" class=" cancel-button btn btn-primary col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Cancel</button>


                    </div>
                </div>
            </div>

    </div>
</form>
<script src =js/area.js></script>
</div>
</div>
</div>
<!--</div>-->

<?php
include_once 'footer.php';
?>