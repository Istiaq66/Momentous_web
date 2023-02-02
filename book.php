<?php
session_start();
include 'conn.php';
include './Notification/notify.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $event_date = $_POST['event-date'];
    $time = $_POST['time'];
    $event_venue = $_POST['event-venue'];
    $package = $_POST['package'];
    $extra_item = $_POST['extra-item'];
    $t_amount = $_POST['t-amount'];
    $a_amount = $_POST['a-amount'];
    $p_method = $_POST['p-method'];
    $trx_id = $_POST['trx-id'];



    if ($trx_id == "") {
        $trx_id = "N/A";
    }
    if ($extra_item == "") {
        $extra_item = "N/A";
    }


    $query = "INSERT INTO booking (cname,email,cnumber,caddress,event_date,event_time,event_venue,package,extra_item,t_amount,a_amount,p_method,trx_id)
    VALUES ('$name','$email','$number','$address','$event_date','$time','$event_venue','$package','$extra_item','$t_amount','$a_amount','$p_method','$trx_id')";


    $result = mysqli_query($con, $query);

    if ($result) {
        $_SESSION['status'] = "Order submitted";
        echo '<script type="text/javascript">';
        echo 'window.location.href = "booking_form.php";';
        echo '</script>';
    } else {
        $_SESSION['status'] = "Order failed";
        echo '<script type="text/javascript">';
        echo 'window.location.href = "booking_form.php";';
        echo '</script>';
    }
}
