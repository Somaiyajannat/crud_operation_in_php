<?php

include_once 'config.php';
$divisionId = $_POST['division_id'];

$sql = "select id, name from district where division_id = '" . $divisionId . "'";
$districtResult = $conn->query($sql);
if ($districtResult->num_rows > 0) {
    ?>
    <option value="0">--- Select District --- </option>
    <?php while ($row = $districtResult->fetch_assoc()) {
        ?>

        <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </option>
        <?php
    }
}
?>
