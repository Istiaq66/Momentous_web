<?php
include 'conn.php';
$id = $_POST['id'];
$ex = $_POST['expense'];


$update_query = "UPDATE incomplete set expense='$ex' WHERE In_id = $id";
$result = mysqli_query($con, $update_query);

if ($result) {

    echo '<script type="text/javascript">';
    echo 'alert("Expense Added!");';
    echo 'window.location.href = "incomplete.php";';
    echo '</script>';
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Failed...");';
    echo 'window.location.href = "incomplete.php";';
    echo '</script>';
}
