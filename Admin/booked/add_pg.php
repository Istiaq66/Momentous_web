<?php
include 'conn.php';
$id = $_POST['id'];
$name = $_POST['pg'];


$update_query = "UPDATE booked set photographer='$name' WHERE booked_id = $id";
$result = mysqli_query($con, $update_query);

if ($result) {

    echo '<script type="text/javascript">';
    echo 'alert("Photographer added");';
    echo 'window.location.href = "booked.php";';
    echo '</script>';
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Failed...");';
    echo 'window.location.href = "booked.php";';
    echo '</script>';
}
