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
    <title>Manuel Order</title>
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
                <a class="navbar-brand" href="../admin_dashboard.php">Momentous Click</a>
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
                        <a href="../manual_order/add_order.php" class="dropdown-item">Add Orders</a>   
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

    <section id="booking-section" class="py-5">
        <div class="container">
            <h3 class="text-center mb-3">
                Please fill up the form
            </h3>
            <div class="form-section">
                <form action="add_order.php" method="post" id="booking-form">

                    <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="Your Name" name="name" vlaue="0" required>
                    </div>
                    <div class="form-group ">

                        <input type="email" class="form-control" id="email" placeholder="Your Email" name="email" required>
                    </div>
                    <div class="form-group ">

                        <input type="tel" class="form-control" id="number" placeholder="Your Mobile Number" name="number" maxlength="11" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="address" placeholder="Your Address" name="address" required>

                    </div>

                    <div class="form-group">
                        <label for="event-date" class="mb-2">Select Event date:</label>
                        <input type="date" class="form-control" id="event-date" placeholder="Event Date" name="event-date" required>
                    </div>
                    <div class="form-group">
                        <label for="time"> Select Event Time: </label>
                        <input type="radio" id="t-day" name="time" value="Day" required>
                        <label for="t-day">Day </label>
                        <input type="radio" id="t-night" name="time" value="Night">
                        <label for="t-night"> Night</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="event-vanue" placeholder="Event Venue" name="event-venue" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="selected-package"> Select Your Package: </label>
                        <select id="selected-package" name="package" placeholder="Select Package" required>
                            <option value=""> Choose Package </option>
                            <option value="Package-1">Select-Package 1</option>
                            <option value="Package-2">Select-Package 2</option>
                            <option value="Package-3">Select-Package 3</option>
                            <option value="Package-4">Select-Package 4</option>
                            <option value="Package-5">Select-Package 5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="extra-item" placeholder="Do you want to add or cancel anything?" name="extra-item">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="t-amount" placeholder="Total Amount (TK)" name="t-amount" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="a-amount" placeholder="Advance Amount (TK)" name="a-amount" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="p-method"> Way of advance payment: </label>


                        <input type="radio" id="p-cash" value="On Cash" name="p-method" class="mx-2" onclick="yesnoCheck()" required>
                        <label for="p-cash">On Cash</label>

                        <input type="radio" id="p-bkash" value="Bkash" name="p-method" class="mx-2" onclick="yesnoCheck()">
                        <label for="p-bkash">Bkash</label>

                        <input type="radio" id="p-bank" value="Bank" name="p-method" class="mx-2" onclick="yesnoCheck()">

                        <label for="p-bank">Bank</label>
                    </div>
                    <div class="form-group " id="trx-feild">
                        <input type="text" class="form-control trx-id" id="trx-id" placeholder="Put The Transection ID " name="trx-id">
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="agree-btn" name="agree-btn" required>
                        <label for="agree-btn"> I agree to all of your <a href="#">Terms &amp; Policy</a> </label>
                    </div>


                    <button type="submit" value="Save" name="submit" class="btn sub-btn">Submit</button>




                    <?php
                    if (isset($_SESSION['status']) && $_SESSION['status'] == "Order submitted") { ?>

                        <script>
                            swal({
                                title: "Congratulations!",
                                text: "<?php echo $_SESSION['status']; ?>",
                                icon: "success",
                                button: "Close",
                            });
                        </script>
                    <?php
                        unset($_SESSION['status']);
                    } elseif (isset($_SESSION['status']) && $_SESSION['status'] == "Order failed") {
                    ?>

                        <script>
                            swal({
                                title: "OOPS!",
                                text: "<?php echo $_SESSION['status']; ?>",
                                icon: "warning",
                                button: "Close",
                            });
                        </script>
                    <?php
                        unset($_SESSION['status']);
                    }
                    ?>

                </form>

            </div>
        </div>
    </section>

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

     <!--=================Bootstrap js==================-->

      <!--=================Main js==================-->
    <script src="../JS/main.js"></script>
     <!--=================Main js==================-->



</body>

</html>