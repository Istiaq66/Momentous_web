<?php
include 'conn.php';

$id = $_REQUEST['an'];

$delete_query = "DELETE FROM team WHERE t_id = '$id'";

if (mysqli_query($con, $delete_query)) {

    echo '<script type="text/javascript">';
    echo 'alert("Data has been deleted successfully");';
    echo 'window.location.href = "del_team.php";';
    echo '</script>';
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Failed...");';
    echo 'window.location.href = "del_team.php.php";';
    echo '</script>';
}


header('Location:unbooked.php');