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
    <title>Manage Team Members</title>
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
            margin-top: 185px;
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
                        <a href="../team/add_team.php" class="dropdown-item">Add Team members</a>
                        <a href="../team/manage_team.php" href="" class="dropdown-item">Manage Team members</a>     </div>
                </li>

            </ul>
        </div>
    </nav>

    
    <div class="container-fluid">

        <h3 class="text-center text-dark my-5">Cliens</h3>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped table-success">
                <thead class="text-dark">
                    <tr class="text-center">

                        <th>ID</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Facebook Id Link</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <?php
                include 'conn.php';

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $i = 1;
                $num_per_page = 05;
                $start_from = ($page - 1) * 05;
                $query = "select * from team order by t_id desc limit $start_from,$num_per_page";
                $query_run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($query_run)) {
                ?>


                    <tr class=" text-center">
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row['t_name']; ?></td>
                        <td><?php echo $row['t_mobile']; ?></td>
                        <td><?php echo $row['t_email']; ?></td>
                        <td><a href="<?php echo $row['fb_id']; ?>"><?php echo $row['t_name']; ?></a></td>
                        <td>
                            <a onclick="if (confirm('Delete client?')){return true;}else{event.stopPropagation(); event.preventDefault();};" class="btn btn-danger" href="del_team.php? an=<?php echo $row['t_id'] ?>">Delete</a>
                        </td>



                    </tr>
                <?php
                }
                ?>

            </table>
        </div>
        <?php
        $pr_query  = "select * from clients";
        $pr_result = mysqli_query($con, $pr_query);
        $total_record = mysqli_num_rows($pr_result);

        $total_pages = ceil($total_record / $num_per_page);


        if ($page > 1) {
            echo "<a href='clients.php?page=" . ($page - 1) . "' class='btn btn-danger mx-1 my-3'>Previous</a>";
        }

        for ($i = 1; $i < $total_pages; $i++) {
            echo "<a href='clients.php?page=" . $i . "'class='btn btn-primary mx-1 my-3'>" . $i . "</a>";
        }

        if ($i > $page) {
            echo "<a href='clients.php?page=" . ($page + 1) . "' class='btn btn-danger mx-1 my-3'>Next</a>";
        }

        ?>
    </div>


    
    <footer class="bg-light text-center text-lg-start" id="addash">
        <!-- Copyright -->
        <div class="text-center p-3 text-light bg-dark">
            © 2023 Copyright: Momentous Click
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

<?php
if (isset($_POST['submit'])) {
	include 'conn.php';
	
	$name = $_POST['tname'];
    $number = $_POST['tnumber'];
    $email = $_POST['temail'];
    $fb = $_POST['fb_id'];

	$query = "INSERT INTO team(t_name,t_mobile,fb_id,email) VALUES ('$name','$number','$email','$fb')";
	$result = mysqli_query($con, $query);
    
    if ($result) {

        echo '<script type="text/javascript">';
        echo 'alert("Team Member added");';
        echo 'window.location.href = "add_team.php";';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed...");';
        echo 'window.location.href = "add_team.php";';
        echo '</script>';
    }




}