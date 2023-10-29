<?php 


function image($name,$size,$temp,$path)
{
$ext=explode(".",$name);
$a=rand(1,9999)."student.".$ext[count($ext)-1];
move_uploaded_file($temp,"$path".$a);
return $a;
}

 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
  }
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>

  <script src="https://kit.fontawesome.com/175f459b86.js" crossorigin="anonymous"></script>

    <title>Dashboard</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

    <style>
      .footer_here{
        margin-top: 445px;
      }
    </style>

  </head>
  <body class="az-body az-body-sidebar">

<?php include_once('includes/sidebar.php');?>
    <div class="az-content az-content-dashboard-two">
    <?php include_once('includes/header.php');?>
    
      <div class="az-content-body">

      <div class="col-md-12">
              <h3 class="text-center font-weight-bold text-danger text-uppercase">Users data</h3>
              <table class="table table-info table-bordered table-stripped table-hover">
                <tr>
                  <th>Sr.no</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Aadhar</th>
                  <th>PAN</th>
                  <th>Address</th>
                  <th>Date</th>
                  <th>Image</th>
                  <th>Status</th>
                </tr>
                <?php
                  $query = "SELECT * FROM user_docs";
                  $fire = mysqli_query($con,$query);
                  $i=1;
                  while ($row=mysqli_fetch_assoc($fire)) {
                    // print_r($row);
                    ?>
                  <form action="user-docs.php" method="post" enctype=multipart/form-data>
                  <tr>
                    <td><?=$i++;?></td>
                    <td>
                      <input type="text" name="uname1" id="" value="<?=$row['uname'];?>" class="form-control">
                    </td>
                    <td>
                      <input type="text" name="umobile" id="" value="<?=$row['umobile'];?>" class="form-control">
                    </td>
                    <td>
                      <input type="text" name="uadhar" id="" value="<?=$row['uadhar'];?>" class="form-control">
                    </td>
                    <td>
                      <input type="text" name="upan" id="" value="<?=$row['upan'];?>" class="form-control">
                    </td>
                    <td>
                      <input type="text" name="uadddress" id="" value="<?=$row['uadddress'];?>" class="form-control">
                    </td>
                    <td>
                      <input type="text" name="udate" id="" value="<?=$row['udate'];?>" class="form-control">
                    </td>
                    
                    <td>
                      <input type="hidden" name="u_id" id="" value="<?=$row['u_id'];?>" class="form-control">
                      <input type="hidden" name="umedical" id="" value="<?=$row['umedical'];?>" class="form-control">

                      <input type="file" name="umedical" id="umedical" class="form-control">
                      <img src="../upload/<?=$row['umedical'];?>" style="height:120px; width:120px;" alt="Not available">
                    </td>
                    <td>
                      <a href=""><button class="btn btn-warning">Edit</button></a>
                      <a href="user-docs.php?deleteid=<?=$row['u_id'];?> & img=<?=$row['umedical'];?>"><button class="btn btn-danger" onclick="return confirm('Are you sure want to delete this data..!');">Delete</button></a>
                    </td>
                  </tr>    
                </form>
                  <?php
                    }
                  ?>
                </table>
              </div>


                <?php
                  if (isset($_GET['deleteid'])) {
                    echo "OK";
                    $query = "DELETE FROM user_docs WHERE u_id= '".$_GET['deleteid']."'";
                    $path = '../upload/'.$_GET['img'];
                    unlink($path);
                    $fire = mysqli_query($con,$query);
                    if ($fire) {
                      echo "<script>alert('Document successfully Deleted');window.location.href='user-docs.php';</script>";
                    }else{
                      echo "Error";
                    }  
                  } 
                ?>
                <?php
                  
                  if (isset($_POST['uname1'])) {
                    // echo "<pre>";
                    // print_r($_POST);
                    // print_r($_FILES);

                    if ($_FILES['umedical']['name']!="") {
                      $name=$_FILES['umedical']['name'];
                      $size=$_FILES['umedical']['size'];
                      $tmp=$_FILES['umedical']['tmp_name'];
                      $path="../upload/";
                      $umedical=image($name,$size,$tmp,$path);
                      $path1 = '../upload/'.$_POST['umedical'];
                      unlink($path1);
                    }else{
                      $umedical = $_POST['umedical'];
                    }
                    $query = "UPDATE user_docs SET uname='".$_POST['uname1']."',umobile='".$_POST['umobile']."',uadhar='".$_POST['uadhar']."',upan='".$_POST['upan']."',uadddress='".$_POST['uadddress']."',udate='".$_POST['udate']."',umedical='".$umedical."' WHERE u_id='".$_POST['u_id']."'";
                    $fire = mysqli_query($con,$query);
                    if ($fire) {
                      echo "<script>alert('Document successfully Updated');window.location.href='user-docs.php';</script>";
                    }else{
                      echo "Error";
                    }  
                  }
                ?>  

        



        <!-- row -->
      </div><!-- az-content-body -->
      <div class="footer_here">
        <?php include_once('includes/footer.php');?>
      </div>
    </div><!-- az-content -->


    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="../lib/jqvmap/jquery.vmap.min.js"></script>
    <script src="../lib/jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="../lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="../js/azia.js"></script>
    <script src="../js/dashboard.sampledata.js"></script>
    <script>
      $(function(){
        'use strict'

        $('.az-sidebar .with-sub').on('click', function(e){
          e.preventDefault();
          $(this).parent().toggleClass('show');
          $(this).parent().siblings().removeClass('show');
        })

        $(document).on('click touchstart', function(e){
          e.stopPropagation();

          // closing of sidebar menu when clicking outside of it
          if(!$(e.target).closest('.az-header-menu-icon').length) {
            var sidebarTarg = $(e.target).closest('.az-sidebar').length;
            if(!sidebarTarg) {
              $('body').removeClass('az-sidebar-show');
            }
          }
        });


        $('#azSidebarToggle').on('click', function(e){
          e.preventDefault();

          if(window.matchMedia('(min-width: 992px)').matches) {
            $('body').toggleClass('az-sidebar-hide');
          } else {
            $('body').toggleClass('az-sidebar-show');
          }
        });

        new PerfectScrollbar('.az-sidebar-body', {
          suppressScrollX: true
        });

        /* ----------------------------------- */
        /* Dashboard content */


        $.plot('#flotChart1', [{
            data: dashData1,
            color: '#6f42c1'
          }], {
    			series: {
    				shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: { colors: [ { opacity: 0 }, { opacity: 1 } ] }
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 100
          },
    			xaxis: { show: false }
    		});

        $.plot('#flotChart2', [{
            data: dashData2,
            color: '#007bff'
          }], {
    			series: {
    				shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: { colors: [ { opacity: 0 }, { opacity: 1 } ] }
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 100
          },
    			xaxis: { show: false }
    		});

        $.plot('#flotChart3', [{
            data: dashData3,
            color: '#f10075'
          }], {
    			series: {
    				shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: { colors: [ { opacity: 0 }, { opacity: 1 } ] }
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 100
          },
    			xaxis: { show: false }
    		});

        $.plot('#flotChart4', [{
            data: dashData4,
            color: '#00cccc'
          }], {
    			series: {
    				shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: { colors: [ { opacity: 0 }, { opacity: 1 } ] }
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 100
          },
    			xaxis: { show: false }
    		});

        $.plot('#flotChart5', [{
            data: dashData2,
            color: '#00cccc'
          },{
            data: dashData3,
            color: '#007bff'
          },{
            data: dashData4,
            color: '#f10075'
          }], {
    			series: {
    				shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: false,
              fillColor: { colors: [ { opacity: 0 }, { opacity: 1 } ] }
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 20
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 100
          },
    			xaxis: {
            show: true,
            color: 'rgba(0,0,0,.16)',
            ticks: [
              [0, ''],
              [10, '<span>Nov</span><span>05</span>'],
              [20, '<span>Nov</span><span>10</span>'],
              [30, '<span>Nov</span><span>15</span>'],
              [40, '<span>Nov</span><span>18</span>'],
              [50, '<span>Nov</span><span>22</span>'],
              [60, '<span>Nov</span><span>26</span>'],
              [70, '<span>Nov</span><span>30</span>'],
            ]
          }
    		});

        $.plot('#flotChart6', [{
            data: dashData2,
            color: '#6f42c1'
          },{
            data: dashData3,
            color: '#007bff'
          },{
            data: dashData4,
            color: '#00cccc'
          }], {
    			series: {
    				shadowSize: 0,
            stack: true,
            bars: {
              show: true,
              lineWidth: 0,
              fill: 0.85
              //fillColor: { colors: [ { opacity: 0 }, { opacity: 1 } ] }
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 20
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 100
          },
    			xaxis: {
            show: true,
            color: 'rgba(0,0,0,.16)',
            ticks: [
              [0, ''],
              [10, '<span>Nov</span><span>05</span>'],
              [20, '<span>Nov</span><span>10</span>'],
              [30, '<span>Nov</span><span>15</span>'],
              [40, '<span>Nov</span><span>18</span>'],
              [50, '<span>Nov</span><span>22</span>'],
              [60, '<span>Nov</span><span>26</span>'],
              [70, '<span>Nov</span><span>30</span>'],
            ]
          }
    		});

        $('#vmap').vectorMap({
          map: 'world_en',
          showTooltip: true,
          backgroundColor: '#f8f9fa',
          color: '#ced4da',
          colors: {
            us: '#6610f2',
            gb: '#8b4bf3',
            ru: '#aa7df3',
            cn: '#c8aef4',
            au: '#dfd3f2'
          },
          hoverColor: '#222',
          enableZoom: false,
          borderOpacity: .3,
          borderWidth: 3,
          borderColor: '#fff',
          hoverOpacity: .85
        });

      });
    </script>
  </body>
</html>
<?php } ?>