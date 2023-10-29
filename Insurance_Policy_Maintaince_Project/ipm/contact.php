<?php
    // $conn = mysqli_connect('localhost','root','','ipmdb')
?>
<?php
    $conn=mysqli_connect("Localhost", "root", "", "ipmdb");
    if(mysqli_connect_errno()){
    echo "Connection Fail".mysqli_connect_error();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
        
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Insurance Management System in PHP and MySQL">
    <meta name="author" content="Dhiraj">

    <title>Insurance Policy Maintaince</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">

    <!-- bootstrap online css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <style>
        .cmap{
            margin-top: 150px;
            border: red;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top pt-3 pb-3">
        <div class="container">
        <a class="navbar-brand" href="#">Insurance Policy Maintaince</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user/signup.php">User Sign Up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user/index.php">User Log In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin/index.php">Admin Log In</a>
                <!-- <a class="nav-link" href="">Admin Log In</a> -->
            </li>
            </ul>
        </div>
        </div>
    </nav>
    
    <div class="container cmap">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Contact Us</h2>
            </div>
            <div class="col-12 px-5">
                <p>Our customer support team is always available to assist our clients with any queries or issues related to their policies. They are well-versed in the insurance policies offered by different providers and can provide clients with valuable advice on selecting the right policy.</p>
            </div>
            <div class="col-lg-6">
                <div>
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15249822.21961233!2d82.75252935!3d21.068622799999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1682944643030!5m2!1sen!2sin" width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3867187.666169696!2d76.76983739999999!3d18.81817715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcfc41e9c9cd6f9%3A0x1b2f22924be04fb6!2sMaharashtra!5e0!3m2!1sen!2sin!4v1682944854981!5m2!1sen!2sin" width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-lg-6 border border-danger">
                <form action="contact.php" method="post">
                    <div class="row g-3">
                        <div class="col md-6">
                            <div class="form-floating">
                                <label for="name">Your Name</label>
                                <input type="text" name="name" id="name" placeholder="Your name" class="form-control border-1 bg-light">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <label for="email">Your Email</label>
                                <input type="email" name="email" id="email" placeholder="Your email" class="form-control border-1 bg-light">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control border-1 bg-light" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="6" class="form-control bg-light" placeholder="Your message here..."></textarea>
                            </div>
                        </div>
                        <div class="col-12 mt-2 text-right">
                            <button class="btn btn-primary py-2 px-2" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>

            
            <!-- <div class="col-lg-6 border border-danger">
                <div class="text-center pt-3">
                    <h2>Contact Us</h2>
                </div>
                <div class="">
                    <label for="">Enter your mail here</label>
                    <input class="form-control" type="text" placeholder="Enter your mail" name="" id=""> <br>
                    <label for="">Enter Message</label>
                    <textarea class="form-control" placeholder="Enter messsage you want" name="" id="" cols="70" rows="6"></textarea>
                    <div class="text-center">
                        <button class="btn btn-success mt-2">Submit</button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>


</body>
</html>

<?php
// print_r($_POST);
if (isset($_POST['name'])) {
    $query = "INSERT INTO `contact_data`(`name`, `email`, `subject`, `message`, `cdate`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['subject']."','".$_POST['message']."','".date('Y-m-d')."')";

    $fire = mysqli_query($conn, $query);
    if ($fire) {
        echo "<script>alert('Your Message Has Been Successfully submited!!');window.location.href='contact.php';</script>";
    }else {
        echo "Data Not Sent!!";
    }
}
?>