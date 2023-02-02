<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Momentous Click</title>
<!--    Favicon Link-->
        <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!--======= css Style Sheet==========-->
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">


    <!--    Owl carousel css link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="./JS/sweetalert.min.js"></script>

</head>

<body>


    <!--================Heading Section start here=================-->


    <header id="header">
        <div class="container">


            <nav class="navbar navbar-expand-md ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="./img/Logo.png" alt="Brand Logo" class="img-fluid"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"><i class="fa-solid fa-bars "></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="./index.html">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./about_us.html">ABOUT US</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./gallery.php">GALLERY</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">CINEMATOGRAPHY</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">PACKAGES</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="./contact.html">CONTACT US</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>



        </div>
    </header>

    <!--================Heading Section End here=================-->


    <!--    ===============main section start here================-->
    <main id="about-page">


        <div class="heading-banner">
            <div class="container">
                <h1 class="title">Booking Form</h1>

                <!--                    Navigation section start here -->
                <section id="nevigation" class="my-3">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./index.html " class="color-change">Home</a></li>
                            <li class="breadcrumb-item ">Booking Form</li>
                        </ol>
                    </nav>

                </section>
            </div>

        </div>

        <!--------------------------------Booking Area start here------------------------------>

        <section id="booking-section" class="py-5">
            <div class="container">


                <h3 class="text-center mb-3">
                    Please fill up the form
                </h3>

                <!--         form section -->

                <div class="form-section">

                    <form action="book.php" method="post" id="booking-form">

                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name"  name="name" vlaue="0" required>

                        </div>
                        <div class="form-group ">

                            <input type="email" class="form-control" id="email" placeholder="Your Email" name="email" required>
                        </div>
                        <div class="form-group ">

                            <input type="tel" class="form-control" id="number" placeholder="Your Mobile Number" name="number" maxlength="11" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="address" placeholder="Your Address" name="address"  required>

                        </div>

                        <div class="form-group">
                            <label for="event-date" class="mb-2">Select Event date:</label>
                            <input type="date" class="form-control" id="event-date" placeholder="Event Date" name="event-date" required>
                        </div>
                        <div class="form-group">
                            <label for="time"> Select Event Time: </label>
                            <input type="radio" id="t-day"  name="time" value="Day" required>
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


                            <input type="radio" id="p-cash" value="On Cash" name="p-method"  class="mx-2" onclick="yesnoCheck()" required>
                            <label for="p-cash">On Cash</label>

                            <input type="radio" id="p-bkash" value="Bkash" name="p-method"  class="mx-2" onclick="yesnoCheck()" >
                            <label for="p-bkash">Bkash</label>

                            <input type="radio" id="p-bank" value="Bank" name="p-method"  class="mx-2" onclick="yesnoCheck()" >

                            <label for="p-bank">Bank</label>
                        </div>
                        <div class="form-group " id="trx-feild" >
                            <input type="text" class="form-control trx-id" id="trx-id" placeholder="Put The Transection ID " name="trx-id" >
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
                        } elseif(isset($_SESSION['status']) && $_SESSION['status'] == "Order failed") {
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

                <!-- form section -->

            </div>



        </section>



        <!-- ---------------------------------------------Booking Area  End here Section-------------------------------------->










    </main>
    <!-- ============main section end here==============-->



    <!--=============   footer secton start here =============-->
    <footer id="footer-section" class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="logo-img">
                        <a href="index.html"><img src=".//img/Logo.png" class="image-fluid" alt="Logo Image"></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h4>
                        Useful Links
                    </h4>
                    <div class="links mt-5">
                        <p><a href="./about_us.html" id="">About Us</a> </p>
                        <p><a href="Admin/index.php" id="">Admin</a> </p>
                        <p><a href="#" id="">Packages</a> </p>
                        <p><a href="./booking_form.php" id="">Book Now</a> </p>
                        <p><a href="#" id="">Terms &amp; Policy </a> </p>
                        <p><a href="#" id="">Privacy Policy</a> </p>


                    </div>

                </div>
                <div class="col-lg-4">
                    <h4>
                        Get In Touch </h4>
                    <div class="contact-info  mt-5">
                        <p>L/44/C , Master Lane , Pahartali ,
                            <br>Chittagong.
                        </p>
                        <p>
                            Gmail: momentousclick25@gmail.com
                        </p>
                        <p>Office No: 01635542808 , 01835199998</p>
                        <p><small class="text-muted">Pay with-</small></p>
                        <img src=".//img/pay_img.png" alt="" class="image-fluid">

                    </div>
                </div>
            </div>
            <hr class="footer-line text-white">
            <!--        nav start here-->
            <nav class="footer-nav text-center">

                <p>&copy; All Rights Resereved By <a href="#">Momentous Click</a></p>
            </nav>
        </div>
    </footer>
    <!--=============   footer secton End here =============-->


    <!--=================Bootstrap js==================-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!--=================Bootstrap js End==================-->

    <!--    FontAwsam kit  Link-->
    <script src="https://kit.fontawesome.com/afbdf6c0fc.js" crossorigin="anonymous"></script>


    <!--    ====================== Main Js==========================-->

   
    <script src="JS/main.js"></script>
</body></html>
