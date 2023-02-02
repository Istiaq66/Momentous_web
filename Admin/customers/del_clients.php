<?php
include 'conn.php';

$id = $_REQUEST['bn'];

$delete_query = "DELETE FROM clients WHERE client_id = '$id'";

if (mysqli_query($con, $delete_query)) {

    echo '<script type="text/javascript">';
    echo 'alert("Data has been deleted successfully");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Failed...");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
}


header('Location:unbooked.php');