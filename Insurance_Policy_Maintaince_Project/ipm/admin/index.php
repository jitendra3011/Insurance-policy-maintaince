<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['signin']))
  {
    $uname=$_POST['username'];
    $Password=$_POST['password'];
    $query=mysqli_query($con,"select ID from tblimsadmin where  AdminUsername='$uname' && Password='$Password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['aid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
   $msg="Invalid Details";
    }
  }
  ?>




<!DOCTYPE html>
<html lang="en">
  <head>


    <!-- Meta -->
    <meta name="description" content="Insurance Management System in PHP and MySQL">
    <meta name="author" content="Dhiraj">

    <title>Insurance Policy Maintaince | Admin Login</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

    <style>
      
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

      * {
          box-sizing: border-box;
      }

      ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #fff;
        opacity: 1; /* Firefox */
      }

      body {
          padding: 0;
          margin: 0;
          background-color: #03080e;
          /*background: url('./bg3.jpg') no-repeat 49% 76%;*/
          /*background-size: cover;*/
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
          font-family: poppins;
          position: relative;
      }

      .circles {
          width: 400px;
          height: 400px;
          margin: auto;
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
      }


      .circle1 {
          width: 300px;
          height: 300px;
          background: linear-gradient(45deg, #ff0099, #7a0ed6);
          border-radius: 50%;
          position: absolute;
          top: -100px;
          right: -155px;
      }

      .circle2 {
          width: 200px;
          height: 200px;
          background: linear-gradient(45deg, #ff237b, #f64838);
          border-radius: 50%;
          position: absolute;
          bottom: -90px;
          left: -70px;
      }

      .login_form {
          display: flex;
          flex-direction: column;
          color: #fff;
          padding: 40px 26px;
          width: 300px;
          /*height: 300px;*/
          background-color: rgba(255, 255, 255, 0.2);
          backdrop-filter: blur(8px);
          border: 1px solid rgba(255, 255, 255, 0.15);
          border-radius: 10px;
          box-shadow: 0 20px 40px rgba(0, 0, 0, 0.18);
      }


      .login_form h1 {
          font-size: 25px;
          margin-top: 0;
          margin-bottom: 8px;
      }

      .login_form p {
          margin-top: 0;
          margin-bottom: 26px;
      }


      .login_form input {
          background: transparent;
          color: #fff;
          border: 1px solid rgba(255, 255, 255, 0.2);
          border-radius: 6px;
          padding: 14px 16px;
          margin-bottom: 30px;
      }

      .login_form input:focus {
          outline: none;
          border-color: #fff;
      }

      .login_form button {
          background: linear-gradient(45deg, #ff0d45, #ff01eb);
          color: #fff;
          border: none;
          border-radius: 6px;
          padding: 14px 16px;
          margin-top: 10px;
          font-size: 16px;
          font-weight: bold;
      }

      /*.login_form button:focus {
          outline: none;
          box-shadow: 0 0 15px #ff0d45;
      }*/
    </style>

  </head>
  <body class="az-body">



    <div class="az-signin-wrapper">
      <div class="">
        <!-- <h1 class="az-logo">Insurance <span>Policy</span> &nbsp;&nbsp;Maintaince</h1> -->
        <div class="az-signin-header">
          <!-- <h2>Welcome back!</h2>
          <h4>Please sign in to continue</h4> -->
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
            echo $msg;
          }  ?> </p>

          <div class="circles">
            <div class="circle1"></div>
            <div class="circle2"></div>
          </div>

          <form name="login" method="post" class="login_form">
            <h1>Welcome,</h1>
            <h1>Login here</h1>
            <p>Login to your account.</p>
            <input type="text" class="form-control" placeholder="Enter your Username"  name="username" required="true">
            <input type="password" class="form-control" placeholder="Enter your password" name="password" required="true">
            <button class="btn btn-az-primary btn-block" type="submit" name="signin">Sign In</button>
            <p>Back to Home Page <a href="../index.html">Click Here</a></p>
          </form>
        </div><!-- az-signin-header -->
        <div class="az-signin-footer">
       
        </div><!-- az-signin-footer -->
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
