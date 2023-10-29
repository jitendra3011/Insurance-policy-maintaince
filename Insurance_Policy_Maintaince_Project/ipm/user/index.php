<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['signin']))
  {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query=mysqli_query($con,"select ID from tbluser where  Email='$email' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['uid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>




<!DOCTYPE html>
<html lang="en">

    <!-- Design by foolishdeveloper.com -->
      <title>Glassmorphism login Form Tutorial in html css</title>
  
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->

    <style media="screen">
      *,
      *:before,
      *:after{
          padding: 0;
          margin: 0;
          box-sizing: border-box;
      }
      body{
          background-color: black;
          background-image:url("https://c1.wallpaperflare.com/preview/865/419/787/business-calculator-calculation-insurance.jpg");
          background-repeat:no-repeat;
          /* box-sizing:border-box; */
          background-size:cover;
      }
      .background{
          width: 430px;
          height: 520px;
          position: absolute;
          transform: translate(-50%,-50%);
          left: 50%;
          top: 50%;
      }
      .background .shape{
          height: 200px;
          width: 200px;
          position: absolute;
          border-radius: 50%;
      }
      .shape:first-child{
          background: linear-gradient(
              #1845ad,
              #23a2f6
          );
          left: -80px;
          top: -80px;
      }
      .shape:last-child{
          background: linear-gradient(
              to right,
              #ff512f,
              #f09819
          );
          right: -30px;
          bottom: -80px;
      }
      form{
          height: 520px;
          width: 400px;
          background-color: rgba(255,255,255,0.13);
          position: absolute;
          transform: translate(-50%,-50%);
          top: 50%;
          left: 50%;
          border-radius: 10px;
          backdrop-filter: blur(10px);
          border: 2px solid rgba(255,255,255,0.1);
          box-shadow: 0 0 40px rgba(8,7,16,0.6);
          padding: 50px 35px;
          border-radius:0px 30px;
      }
      form *{
          font-family: 'Poppins',sans-serif;
          color: #ffffff;
          letter-spacing: 0.5px;
          outline: none;
          border: none;
      }
      form h3{
          font-size: 32px;
          font-weight: 500;
          line-height: 42px;
          text-align: center;
      }

      label{
          display: block;
          margin-top: 30px;
          font-size: 16px;
          font-weight: 500;
      }
      input{
          display: block;
          height: 50px;
          width: 100%;
          background-color: rgba(255,255,255,0.07);
          border-radius: 3px;
          padding: 0 10px;
          margin-top: 8px;
          font-size: 14px;
          font-weight: 300;
      }
      ::placeholder{
          color: #e5e5e5;
      }
      button{
          margin-top: 50px;
          width: 100%;
          background-color: #ffffff;
          color: #080710;
          padding: 15px 0;
          font-size: 18px;
          font-weight: 600;
          border-radius: 5px;
          cursor: pointer;
      }
      .social{
        margin-top: 30px;
        display: flex;
      }
      .social div{
        background: red;
        width: 150px;
        border-radius: 3px;
        padding: 5px 10px 10px 5px;
        background-color: rgb(32 53 37 / 27%);
        color: #eaf0fb;
        text-align: center;
      }
      .social div:hover{
        background-color: rgba(255, 255, 255, 0.27);
      }
      .social .fb{
        margin-left: 25px;
      }
      .social i{
        margin-right: 4px;
      }

    </style>

  <head>


    <!-- Meta -->
    <meta name="description" content="Insurance Management System in PHP and MySQL">
    <meta name="author" content="Dhiraj">

    <title>Insurance Policy Maintaince | User Login</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

  </head>
  <body class="az-body">

    <div class="az-signin-wrapper">
      <div class="az-card-signin">
        <!-- <h1 class="az-logo">Insurance <span>Policy</span> &nbsp;&nbsp;Maintaince</h1> -->
        <div class="az-signin-header">
          <!-- <h2>Welcome back!</h2>
          <h4>Please sign in to continue</h4> -->
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
            echo $msg;
          }  ?> 
          </p>

            <div class="background">
                <div class="shape"></div>
                <div class="shape"></div>
            </div>

          <form name="login" method="post">
          <h3>Login Here</h3>

            <div class="form-group">
              <label>Email</label>
              <input type="email" placeholder="Enter your email" id="email" class="form-control" name="email" required="true">
              </div><!-- form-group -->
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" placeholder="Enter your password" id="password" class="form-control" name="password" required="true">
                </div><!-- form-group -->
            <button class="btn btn-az-primary btn-block" type="submit" name="signin">Sign In</button>
            <!-- <button>Log In</button> -->
            
            <div class="social">
              <div class="go"><i class="fab fa-google"></i>  Google</div>
              <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
            </div>

            <div class="az-signin-footer">
              <p><a href="forget-password.php">Forgot password?</a></p>
              <p>Don't have an account? <a href="signup.php">Create an Account</a>
              </p>
            </div>

          </form>
          
          
        </div><!-- az-signin-header -->

         <!-- az-signin-footer -->
      </div><!-- az-card-signin -->
    </div><!-- az-signin-wrapper -->

    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>

    <script src="../js/azia.js"></script>
    <script>
      $(function(){
        'use strict'

      });
    </script>
  </body>
</html>





