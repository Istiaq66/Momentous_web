<?php
require('functions.php');
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    Favicon Link-->
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!--======= css Style Sheet==========-->
   <link rel="stylesheet" type="text/css" href="../CSS/admn.css">
    <script src="../JS/sweetalert.min.js"></script>
    <style>
        #addash {
            margin-top: 80.5px;
        }
    </style>


</head>


<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="admin_dashboard.php">Momentous Click</a>
            </div>
            <font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
            <font style="color: white"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></span></font>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        My Profile</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="view_prof.php">View Profile</a>
                        <a class="dropdown-item" href="edit_pro.php"> Edit Profile</a>
                        <a class="dropdown-item" href="change_pass.php">Change Password</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <a href="admin_dashboard.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Manuel Orders</a>
                    <div class="dropdown-menu">
                        <a href="./manual_order/manual_order.php" class="dropdown-item">Add Orders</a>   
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Client Site</a>
                    <div class="dropdown-menu">
                        <a href="./clinet_site/pic_up.php" class="dropdown-item">Pictures</a>
                        <a href="./clinet_site/add_review.php" class="dropdown-item">Review</a>
                        <a href="./clinet_site/add_review.php" class="dropdown-item">Packages</a>
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Team</a>
                    <div class="dropdown-menu">
                        <a href="./team/add_team.php" class="dropdown-item">Add Team members</a>
                        <a href="./clinet_site/manage_team.php" href="" class="dropdown-item">Manage Team members</a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>

    <div class="container-fluid admin-dash my-5 ">
        <h1 class="text-dark text-center">Admin Dashboard</h1>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-3 py-2">
                    <div class="card card shadow bg-light mt-2">
                        <div class="card-header">Unbooked Orders:</div>
                        <div class="card-body">
                            <p class="card-text">No. of unbooked orders:  <?php echo get_unbooked_count(); ?> </p>
                            <a href="./unbooked/unbooked.php" class="btn btn-danger">View Unbooked Orders</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 py-2">
                    <div class="card card shadow bg-light mt-2">
                        <div class="card-header">Booked Orders:</div>
                        <div class="card-body">
                            <p class="card-text">No. of booked orders: <?php echo get_booked_count(); ?> </p>
                            <a href="./booked/booked.php" class="btn btn-info">View Booked Orders</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 py-2">
                    <div class="card card shadow bg-light   mt-2">
                        <div class="card-header">Incomplete Orders:</div>
                        <div class="card-body">
                            <p class="card-text">No. of incomplete orders: <?php echo get_incomplete_count(); ?> </p>
                            <a href="./incomplete/incomplete.php" class="btn btn-warning">View Incomplete Orders</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 py-2">
                    <div class="card card shadow bg-light   mt-2">
                        <div class="card-header">Completed Orders </div>
                        <div class="card-body">
                            <p class="card-text">No. of completed orders: <?php echo get_completed_count(); ?>  </p>
                            <a href="./completed/completed.php" class="btn btn-primary">View Completed Orders</a>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 py-2">
                    <div class="card card shadow bg-light mt-2">
                        <div class="card-header">Clients</div>
                        <div class="card-body">
                            <p class="card-text">No. of Clients: <?php echo get_client_count(); ?>  </p>
                            <a href="./customers/clients.php" class="btn btn-success">View Clients</a>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 py-2">
                    <div class="card card shadow bg-light mt-2">
                        <div class="card-header">Last Month Income</div>
                        <div class="card-body">
                            <p class="card-text ">Last month: <?php echo get_income_count();?> BDT</p>
                            <a href="./Income_Stat/in_history.php" class="btn btn-success">Income History</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    if (isset($_SESSION['log']) && $_SESSION['log'] == "Login Successful") { ?>

        <script>
            swal({
                title: "Congratulations!",
                text: "<?php echo $_SESSION['log']; ?>",
                icon: "success",
                button: "Close",
            });
        </script>

    <?php
        unset($_SESSION['log']);
    }
    ?>



    <footer class="bg-light text-center text-lg-start" id="addash">
        <!-- Copyright -->
        <div class="text-center p-3 text-light bg-dark">
            © 2022 Copyright:
            <a class="text-light" href="https://www.istiaq66.me">Istiaq66.com</a>
            <a href="../contact.php">Contact us</a>
        </div>
        <!-- Copyright -->
    </footer>



    <!--=================Bootstrap js==================-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!--=================Bootstrap js End==================-->




</body>

</html>