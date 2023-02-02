<?php

include 'conn.php';



    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $event_date = $_POST['date'];
    $time = $_POST['time'];
    $venue = $_POST['venue'];
    $package = $_POST['package'];
    $ex_item = $_POST['ex-item'];
    $t_amount = $_POST['t-a'];
    $a_amount = $_POST['a-p'];
    $p_method = $_POST['p-m'];




    $update_query = "UPDATE booking set cname='$name',email='$email',cnumber='$number',caddress='$address',
    event_date='$event_date',event_time='$time',event_venue='$venue',package='$package',extra_item='$ex_item',
    t_amount='$t_amount',a_amount='$a_amount',p_method='$p_method' WHERE booking_id = $id";

    $result = mysqli_query($con, $update_query);
   
    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Order edited");';
        echo 'window.location.href = "unbooked.php";';
        echo '</script>';
        
    } else {
     
        echo '<script type="text/javascript">';
        echo 'alert("Order edit failed...");';
        echo 'window.location.href = "unbooked.php";';
        echo '</script>';
    }
 

