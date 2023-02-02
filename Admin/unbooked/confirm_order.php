<?php

include 'conn.php';
$id = $_REQUEST['id'];



$find = mysqli_query($con, "SELECT cname,email,cnumber,caddress,event_date,event_time,event_venue,package,extra_item,t_amount,a_amount,p_method,trx_id FROM booking WHERE booking_id = '$id'");

$row = mysqli_fetch_assoc($find);

$name = $row['cname'];
$email = $row['email'];
$number = $row['cnumber'];
$address = $row['caddress'];
$event_date = $row['event_date'];
$time = $row['event_time'];
$event_venue = $row['event_venue'];
$package = $row['package'];
$extra_item = $row['extra_item'];
$t_amount = $row['t_amount'];
$a_amount = $row['a_amount'];
$p_method = $row['p_method'];
$trx_id = $row['trx_id'];

$insert = "INSERT INTO booked (booked_id,cname,cemail,cnumber,caddress,event_date,event_time,event_venue,package,extra_item,t_amount,a_amount,p_method,trx_id) VALUES
 ('$id','$name','$email','$number','$address','$event_date','$time','$event_venue','$package','$extra_item','$t_amount','$a_amount','$p_method','$trx_id')";

$result1 = mysqli_query($con, $insert);

if ($result1) {
    $delete_query = "DELETE FROM booking WHERE booking_id = '$id'";
    $result2 = mysqli_query($con, $delete_query);
}

if ($result2) {

    echo '<script type="text/javascript">';
    echo 'alert("Order is confirmed");';
    echo 'window.location.href = "unbooked.php";';
    echo '</script>';
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Failed...");';
    echo 'window.location.href = "unbooked.php";';
    echo '</script>';
}
