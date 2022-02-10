<?php
include_once 'session.php';
include 'header.php';
include 'navbar.php';

?>
<div class="  dashboard col-md-10">
    <?php echo (!empty($_GET['notification'])? $_GET['notification']: "" ); ?>
    
    Welcome to my dashboard
</div>
</div>
</div>
<?php 
include 'footer.php';
?>