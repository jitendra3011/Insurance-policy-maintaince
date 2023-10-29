<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
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
        /* margin-top: 0px; */
      }
    </style>

  </head>
  <body class="az-body az-body-sidebar">

<?php include_once('includes/sidebar.php');?>
    <div class="az-content az-content-dashboard-two">
    <?php include_once('includes/header.php');?>
    
    <div class="col md-12 mb-5">
        <h2 class="font-weight-bold text-uppercase text-center mt-4">Contact List</h2>
    </div>
    <div class="col-md-12 mt-5 ">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>Sr.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
                <th>Status</th>
            </tr>

            <!-- Selection Process -->
            <?php
                $query = "SELECT * from contact_data ORDER By c_id DESC";
                $fire = mysqli_query($con, $query);
                $i=1;
                while ($row=mysqli_fetch_assoc($fire)) {
                    ?>
                    <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row['name'];?></td>
                        <td><?=$row['email'];?></td>
                        <td><?=$row['subject'];?></td>
                        <td><?=$row['message'];?></td>
                        <td><?=$row['cdate'];?></td>
                        <td>
                            <a href="contact_request.php?id=<?=$row['c_id'];?>"><button class="btn btn-danger font-weight-bold">DELETE <span class="h4"><i class="fa-solid fa-trash-can"></i></span></button></a>
                        </td>
                    </tr>
                <?php
                }
            ?>
        </table>
    </div>

    <!-- Delete Process  -->
    <?php
    echo $_GET['id'];
    if (isset($_GET['id'])) {
        $query = "DELETE from contact_data WHERE c_id = '".$_GET['id']."'";
        $fire = mysqli_query($con,$query);
        if ($fire) {
            echo "<script>alert('Your Message Has Been Successfully Deleted!!');window.location.href='contact_request.php';</script>";
        }else {
            echo "Data Not Deleted!!";
        }
    }
    ?>
      
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
<?php } ?>