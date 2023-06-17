<?php
include 'conn.php';

$id = $_REQUEST['pn'];



$del = "SELECT p_dest FROM pictures WHERE p_id='$id'";
$query_run = mysqli_query($con, $del);

while ($row = mysqli_fetch_assoc($query_run)) {
    unlink($row['p_dest']);
}


$delete_query = "DELETE FROM pictures WHERE p_id = '$id'";
$result = mysqli_query($con, $delete_query);

if ($result) {
    echo '<script type="text/javascript">';
    echo 'alert("Data deleted....");';
    echo 'window.location.href = "pic_up.php";';
    echo '</script>';
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Failed to delete....");';
    echo 'window.location.href = "pic_up.php";';
    echo '</script>';
}
