<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Unbooked Orders</title>
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
            margin-top: 87px;
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
                <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <a href="../admin_dashboard.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Manuel Orders</a>
                    <div class="dropdown-menu">
                        <a href="../manual_order/manual_order.php" class="dropdown-item">Add Orders</a>   
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Client Site</a>
                    <div class="dropdown-menu">
                        <a href="../clinet_site/pic_up.php" class="dropdown-item">Pictures</a>
                        <a href="../clinet_site/review.php" class="dropdown-item">Review</a>
                        <a href="../clinet_site/package.php" class="dropdown-item">Packages</a>
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Team</a>
                    <div class="dropdown-menu">
                        <a href="../clinet_site/add_team.php" class="dropdown-item">Add Team members</a>
                        <a href="../clinet_site/manage_team.php" href="" class="dropdown-item">Manage Team members</a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>

    <div class="container-fluid">

        <h3 class="text-center text-dark my-5">Unbooked Orders</h3>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped table-success">
                <thead class="text-dark">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Address</th>
                        <th>Event Date</th>
                        <th>Event Time</th>
                        <th>Event Venue</th>
                        <th>Package</th>
                        <th>Customize Package</th>
                        <th>Total Amount</th>
                        <th>Advance Paid</th>
                        <th>Payment Method</th>
                        <th>Transaction ID</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Confirm Order</th>

                    </tr>
                </thead>
                <?php
                include 'conn.php';

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $num_per_page = 05;
                $start_from = ($page - 1) * 05;
                $query = "select * from booking order by booking_id desc limit $start_from,$num_per_page";
                $query_run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($query_run)) {
                ?>


                    <tr class=" text-center">
                        <td><?php echo $row['booking_id']; ?></td>
                        <td><?php echo $row['cname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['cnumber']; ?></td>
                        <td><?php echo $row['caddress']; ?></td>
                        <td><?php echo $row['event_date']; ?></td>
                        <td><?php echo $row['event_time']; ?></td>
                        <td><?php echo $row['event_venue']; ?></td>
                        <td><?php echo $row['package']; ?></td>
                        <td><?php echo $row['extra_item']; ?></td>
                        <td><?php echo $row['t_amount']; ?></td>
                        <td><?php echo $row['a_amount']; ?></td>
                        <td><?php echo $row['p_method']; ?></td>
                        <td><?php echo $row['trx_id']; ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" onclick="if (confirm('Edit selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['booking_id'] ?>">
                                Edit
                            </button>
                        </td>

                        <td>
                            <a onclick="if (confirm('Cancle selected order?')){return true;}else{event.stopPropagation(); event.preventDefault();};" class="btn btn-danger" href="cancle_order.php? bn=<?php echo $row['booking_id'] ?>">Cancle</a>
                        </td>

                        <td>
                            <a onclick="if (confirm('Confirm selected order?')){return true;}else{event.stopPropagation(); event.preventDefault();};" class="btn btn-success" href="confirm_order.php? id=<?php echo $row['booking_id'] ?>">Confirm</a>
                        </td>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $row['booking_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="exampleModalLabel">Edit Order</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="order_edit.php" method="post" enctype="multipart/form-data" id="myForm">
                                            <?php

                                            $id = $row['booking_id'];
                                            $select_query = "SELECT * FROM booking where booking_id='$id'";
                                            $result_edit = mysqli_query($con, $select_query);
                                            $result_edit_row = mysqli_fetch_row($result_edit);



                                            ?>
                                            <input id="id" type="hidden" name="id" value="<?php echo $result_edit_row[0] ?>">


                                            <label class="form-label">Name</label>
                                            <input class="form-control" name="name" required value="<?php echo $result_edit_row[1] ?>">

                                            <label class="form-label">Email</label>
                                            <input class="form-control" name="email" required value="<?php echo $result_edit_row[2] ?>">

                                            <label class="form-label">Mobile No.</label>
                                            <input class="form-control" name="number" required value="<?php echo $result_edit_row[3] ?>">

                                            <label class="form-label">Address</label>
                                            <input class="form-control" name="address" required value="<?php echo $result_edit_row[4] ?>">

                                            <label class="form-label">Event Date</label>
                                            <input class="form-control" type="date" name="date" required value="<?php echo $result_edit_row[5] ?>">

                                            <label class="form-label">Event Time</label>
                                            <input class="form-control" name="time" required value="<?php echo $result_edit_row[6] ?>">

                                            <label class="form-label">Event Venue</label>
                                            <input class="form-control" name="venue" required value="<?php echo $result_edit_row[7] ?>">

                                            <label class="form-label">Package</label>
                                            <input class="form-control" name="package" required value="<?php echo $result_edit_row[8] ?>">

                                            <label class="form-label">Customize Package</label>
                                            <input class="form-control" name="ex-item" placeholder="Do you want to add or cancel anything?" required value="<?php echo $result_edit_row[9] ?>">

                                            <label class="form-label">Total Amount</label>
                                            <input class="form-control" name="t-a" required value="<?php echo $result_edit_row[10] ?>">

                                            <label class="form-label">Advance Paid</label>
                                            <input class="form-control" name="a-p" required value="<?php echo $result_edit_row[11] ?>">

                                            <label class="form-label">Payment Method</label>
                                            <input class="form-control" name="p-m" required value="<?php echo $result_edit_row[12] ?>">



                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button onclick="confirm('Do you want to save changes?')" type="submit" class="btn btn-primary" form="myForm">Save changes</button>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </tr>
                <?php
                }
                ?>

            </table>
        </div>
        <?php
        $pr_query  = "select * from booking";
        $pr_result = mysqli_query($con, $pr_query);
        $total_record = mysqli_num_rows($pr_result);

        $total_pages = ceil($total_record / $num_per_page);


        if ($page > 1) {
            echo "<a href='unbooked.php?page=" . ($page - 1) . "' class='btn btn-danger mx-1 my-3'>Previous</a>";
        }

        for ($i = 1; $i < $total_pages; $i++) {
            echo "<a href='unbooked.php?page=" . $i . "'class='btn btn-primary mx-1 my-3'>" . $i . "</a>";
        }

        if ($i > $page) {
            echo "<a href='unbooked.php?page=" . ($page + 1) . "' class='btn btn-danger mx-1 my-3'>Next</a>";
        }

        ?>
    </div>






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