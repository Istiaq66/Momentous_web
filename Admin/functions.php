<?php
function get_unbooked_count()
{
    include 'conn.php';

    $unbooked_count = "";
    $query = "select count(*) as unbooked_count from booking";
    $query_run =  mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $unbooked_count = $row['unbooked_count'];
    }
    return ($unbooked_count);
}

function get_booked_count()
{
    include 'conn.php';

    $booked_count = "";
    $query = "select count(*) as booked_count from booked";
    $query_run =  mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $booked_count = $row['booked_count'];
    }
    return ($booked_count);
}
function get_incomplete_count()
{
    include 'conn.php';

    $incomplete_count = "";
    $query = "select count(*) as incomplete_count from incomplete";
    $query_run =  mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $incomplete_count = $row['incomplete_count'];
    }
    return ($incomplete_count);
}

function get_completed_count()
{
    include 'conn.php';

    $completed_count = "";
    $query = "select count(*) as completed_count from complete";
    $query_run =  mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $completed_count = $row['completed_count'];
    }
    return ($completed_count);
}


function get_client_count()
{
    include 'conn.php';

    $client_count = "";
    $query = "select count(*) as client_count from clients";
    $query_run =  mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $client_count = $row['client_count'];
    }
    return ($client_count);
}



function get_income_count()
{
    include 'conn.php';
   $income ="select sum(income) from income where in_date>now() - interval 1 month" ;
   $query = mysqli_query($con, $income);
   $row = mysqli_fetch_assoc($query);
   return implode(" ",$row);;

}