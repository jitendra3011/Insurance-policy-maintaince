  <div class="az-sidebar">
      <div class="az-sidebar-header text-center justify-content-center">
        <!-- <a href="#" class="az-logo">I<span>P</span>M | User</a> -->
        <h1 class="text-bold text-danger">IPM</h1>
      </div><!-- az-sidebar-header -->
      <div class="az-sidebar-loggedin">
        <!-- <div class="az-img-user online"><img src="../img/user.png" alt=""></div> -->
        <div class="media-body">
              
            <?php
              $uid=$_SESSION['uid'];
              $ret=mysqli_query($con,"select FullName from tbluser where ID='$uid'");
              $row=mysqli_fetch_array($ret);
              $name=$row['FullName'];

            ?>
                  <h3 style="font-weight: bold"><?php echo $name; ?></h3>
              
                 
          <!-- <span>User</span> -->
        </div><!-- media-body -->
      </div><!-- az-sidebar-loggedin -->
      <div class="az-sidebar-body">
         <ul class="nav">
          <li class="nav-label">Main Menu</li>
          <a href="dashboard.php" class="nav-sub-link"><h4>Dashboard</h4></a>
          <li class="nav-item show">
            <!-- <a href="#" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Insurance </a> -->
            <h4>Insurance</h4>
            <nav class="nav-sub">
              <a href="apply-forpolicy.php" class="nav-sub-link">Apply</a>
              <a href="policy-history.php" class="nav-sub-link">History</a>
         
            </nav>
          </li>
          <li class="nav-item show">
            <!-- <a href="#" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Ticket </a> -->
            <h4>Ticket</h4>
            <nav class="nav-sub">
              <a href="tickets.php" class="nav-sub-link">Genrate</a>
              <a href="ticket-history.php" class="nav-sub-link">History</a>

            </nav>
          </li>
          <li class="nav-item show">
            <!-- <a href="#" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Feedback </a> -->
            <!-- <h4>Feedback</h4>
            <nav class="nav-sub">
              <a href="feedback.php" class="nav-sub-link">Feedback</a>
            </nav> -->
          </li>

          </ul>
      </div><!-- az-sidebar-body -->
    </div>