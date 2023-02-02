<?php

include 'conn.php';

$id = $_REQUEST['id'];


$find = mysqli_query($con, "SELECT * FROM incomplete WHERE In_id = '$id'");
$row = mysqli_fetch_assoc($find);

$name = $row['cname'];
$email = $row['cemail'];
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
$pg = $row['photographer'];
$ex = $row['expense'];



$insert ="INSERT INTO complete (comp_id,cname,cemail,cnumber,caddress,event_date,event_time,event_venue,package,extra_item,t_amount,a_amount,p_method,trx_id,photographer,expense) VALUES
('$id','$name','$email','$number','$address','$event_date','$time','$event_venue','$package','$extra_item','$t_amount','$a_amount','$p_method','$trx_id','$pg','$ex')";


$result1 = mysqli_query($con, $insert);



$income = $t_amount - $ex;
if ($result1) {
    $incquery = "INSERT INTO income (or_id,expense,income,in_date) VALUES ('$id','$ex','$income','$event_date')";
    $result2 = mysqli_query($con, $incquery);
}

$dupli = "SELECT c_name FROM clients WHERE c_name = '$name'";
$dupli_query = mysqli_query($con, $dupli);
$count = mysqli_num_rows($dupli_query);

if ($count < 1) {
    $client = "INSERT INTO clients (c_name,c_email,c_mobile,c_address) VALUES ('$name','$email','$number','$address')";
    $result3 = mysqli_query($con, $client);
}


if ($result1) {
    $delete_query = "DELETE FROM incomplete WHERE In_id = '$id'";
    $result4 = mysqli_query($con, $delete_query);
}


if ($result1) {

    echo '<script type="text/javascript">';
    echo 'alert("Order is completed");';
    echo 'window.location.href = "incomplete.php";';
    echo '</script>';
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Failed...");';
    echo 'window.location.href = "incomplete.php";';
    echo '</script>';
}
