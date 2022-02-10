<?php
include_once 'welcomeHeader.php';


?>
<div class="col-md-12" style="height: 750px">
    
    <div class="container" id="login">
        <?php echo(!empty($_GET['error'])? $_GET['error']:"") ?>
        <div class="row">
            <div class="login-header">LogIn</div>
            <div class="login col-md-4">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 col-form-label">
                            <input type="text" class="form-control" placeholder="UserName"  name ="user_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10  col-form-label">
                            <input type="text" class="form-control" placeholder="Password"  name ="password" >
                        </div>
                    </div>
                    <div class="login-button">
                        <div class="form-group">
                            <button type= "submit" name ="submit" class=" submit btn btn-primary button col-sm-4 col-md-4 col-lg-4 col-xl-4">LogIn</button>
                            <button type= "reset" name ="cancelButton" class=" cancel btn btn-primary col-sm-4 col-md-4 col-lg-4 col-xl-4 ">Cancel</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php
include 'footer.php';
?>