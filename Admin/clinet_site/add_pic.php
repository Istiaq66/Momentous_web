<?php

include 'conn.php';


    $cat = $_POST['cat'];

    $filename = $_FILES['file']['name'];

    $destination = 'upload/' . $filename;


    $extension = pathinfo($filename, PATHINFO_EXTENSION);


    $file = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];


    $number = $size / (float) 1000000.00;
    $mb = round($number, 2);


    if (!in_array($extension, ['png', 'jpg', 'jpeg', 'svg', 'PNG', 'JPG', 'JPEG', 'SVG'])) {
        echo '<script type="text/javascript">';
        echo 'alert("You file extension must be .png, .jpg, .jpeg  or .svg");';
        echo 'window.location.href = "pic_up.php";';
        echo '</script>';
    } else if ($mb > 20) {

        // file shouldn't be larger than 10Megabyte
        echo '<script type="text/javascript">';
        echo 'alert("File too large!");';
        echo 'window.location.href = "pic_up.php";';
        echo '</script>';
    } else {

        if (move_uploaded_file($file, $destination)) {

            $sql = "INSERT INTO pictures (p_name,p_dest,p_cat) 
            VALUES ('$filename','$destination','$cat')";

            $result = mysqli_query($con, $sql);
            if ($result) {
                echo '<script type="text/javascript">';
                echo 'alert("File Uploaded!");';
                echo 'window.location.href = "pic_up.php";';
                echo '</script>';
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Failed...!");';
            echo 'window.location.href = "pic_up.php";';
            echo '</script>';
        }
    }

