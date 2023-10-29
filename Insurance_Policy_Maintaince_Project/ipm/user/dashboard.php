<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{

?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta -->
 <meta name="description" content="Insurance Management System in PHP and MySQL">
    <meta name="author" content="Dhiraj">

    <title>Insurance Policy Maintaince |  Manage Category</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/morris.js/morris.css" rel="stylesheet">
    <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="../lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  </head>
  <body class="az-body az-body-sidebar">
      <!-- -sidebar -->
<?php include_once('includes/sidebar.php');?>
  <!-- -sidebar -->
    <div class="az-content az-content-dashboard-two">
     
     <!-- -header -->
<?php include_once('includes/header.php');?>
  <!-- -header -->

      <div class="az-content-header d-block d-md-flex">
        <div>
          <h1>Welcome</h1>
          <h2 class="az-content-title mg-b-5 mg-b-lg-8">Insurance Policy Maintaince !</h2>
          <hr />
          <h4>Dear <span style="color:red"><?php echo $name;?></span>,First you have to upload below documents</h4>
          <hr>
        </div>
       <!-- az-dashboard-header-right -->
      </div><!-- az-content-header -->
      
             <!-- name 
             mobile
             aadhar
             pan no
             address
             medical certificate  -->

             <div>
              <form action="dashboard.php" method="post" enctype=multipart/form-data>
                <div class="row">
                  <div class="container">
                    <div class="col-md-6">
                      <label for="uname">User Name</label>
                      <input type="text" name="uname" id="uname" class="form-control bg-light" placeholder="Enter your name" require>
                    </div>
                    <div class="col-md-6">
                      <label for="umobile">User Mobile</label>
                      <input type="number" name="umobile" id="umobile" class="form-control bg-light" placeholder="Enter your mobile no." require>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="container">
                    <div class="col-md-6">
                      <label for="uadhar">User Adhar number</label>
                      <input type="text" name="uadhar" id="uadhar" class="form-control bg-light" placeholder="Enter your Adhar no." require>
                    </div>
                    <div class="col-md-6">
                      <label for="upan">User PAN number</label>
                      <input type="text" name="upan" id="upan" class="form-control bg-light" placeholder="Enter your PAN no." require>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="container">
                    <div class="col-md-6">
                      <label for="uadddress">User Address</label>
                      <input type="text" name="uadddress" id="uadddress" class="form-control bg-light" placeholder="Enter your address" require>
                    </div>
                    <div class="col-md-6">
                      <label for="umedical">Image</label>
                      <input type="file" name="umedical" id="umedical" class="form-control bg-light" placeholder="Select medical certiificate" require>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="container">
                    <div class="col-md-12 text-center">
                      <button class="btn btn-primary my-3 py-2 px-4">Save</button>
                    </div>
                  </div>
                </div>
              </form>
             </div>



      <?php
      // print_r($_POST);
      // print_r($_FILES);

      $con = mysqli_connect('localhost','root','','ipmdb');

      function image($name,$size,$temp,$path){
        $ext = explode(".",$name);
        $a=rand(1,9999)."userData.".$ext[count($ext)-1];
        move_uploaded_file($temp,"$path".$a);
        return $a;
      }

      if (isset($_POST['uname'])) {
        $name=$_FILES['umedical']['name'];
        $size=$_FILES['umedical']['size'];
        $tmp=$_FILES['umedical']['tmp_name'];
        $path="../upload/";
        $umedical=image($name,$size,$tmp,$path);
        $query = "INSERT INTO user_docs(uname, umobile, uadhar, upan, uadddress, udate, umedical) VALUES ('".$_POST['uname']."','".$_POST['umobile']."','".$_POST['uadhar']."','".$_POST['upan']."','".$_POST['uadddress']."','".date('Y-m-d')."','".$umedical."')";
        $fire=mysqli_query($con,$query);
        if ($fire) {
          echo "<script>alert('Your Documents Has Been Submitted Successfully!!');window.location.href='apply-forpolicy.php';</script>";
        }else {
            echo "Document Not Submitted!!";
        }
      }
      ?>

      <div class="az-content-body">
      

     <div class="az-content">
      <div class="container">
        <div class="az-content-body">
          <div class="az-content-breadcrumb">
            
          </div>
  

          
<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                  <?php
$uid=$_SESSION['uid'];
$ret=mysqli_query($con,"select FullName from tbluser where ID='$uid'");
$row=mysqli_fetch_array($ret);
$name=$row['FullName'];

?>
          <!-- <div class="table-responsive" align="center">
            <h2>Welcome back ! <span style="color:red"><?php echo $name;?></span></h2>
          </div> -->

            </div><!-- card-dashboard-five -->
          </div>
    
        </div><!-- row -->
      </div><!-- az-content-body -->
    <!-- footer -->
    <?php include_once('includes/footer.php');?>
    </div><!-- az-content -->


    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../lib/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../lib/raphael/raphael.min.js"></script>
    <script src="../lib/morris.js/morris.min.js"></script>
    <script src="../lib/jqvmap/jquery.vmap.min.js"></script>
    <script src="../lib/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="../js/azia.js"></script>
    
  </body>
</html>
<?php }  ?>