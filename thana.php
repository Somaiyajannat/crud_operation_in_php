<?php
include_once 'config.php';
!(empty($_POST['district_id'])) ? $districtId = $_POST['district_id'] : "";


$sql = "select id, name from thana where district_id = '" . $districtId . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>
    <option value="0" >--- Select Thana --- </option>
    <?php while ($row = $result->fetch_assoc()) {
        ?>

        <option value="<?php echo $row['id'] ?>" > <?php echo $row['name'] ?> </option>
        <?php
    }
}
?>