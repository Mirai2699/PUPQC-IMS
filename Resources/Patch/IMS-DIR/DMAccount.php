<?php
     include ("DMHeader.php");
     include ("DMJSCore.php");
     include ("DMJSCustom.php");
?>


    <title>Manage Account | PUPQC IMS</title>


<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a href="DMmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-envelope"></i>
                        <span>Requests</span>
                    </a>
                    <ul class="sub">
                        <li><a href="DMPenReq.php">Pending</a></li>
                        <li><a href="DMRevReq.php">For Revision</a></li> 
                        <li><a href="DMAprReq.php">Approved</a></li>    
                        <li><a href="DMRelsReq.php">Released</a></li> 
                        <li><a href="DMDelReq.php">For Delivery</a></li> 
                        <li><a href="DMExpReq.php">Expired and Rejected</a></li>                
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                   <ul class="sub">
                        <li><a href="DMReportReq.php">Requisition</a></li>     
                        <li><a href="DMReportAcq.php">Acquisition</a></li>
                        <!--<li><a href="DMReportIss.php">Issuance</a></li> -->
                        <li><a href="DMReportStock.php">Inventory Stocks</a></li>               
                    </ul>
                </li>
                <hr>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

<!--Main Content-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

       
              


            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <br>
                        <div class="col-md-3">
                            <h4>Edit User Account Details</h4>
                        </div>
                                  

                                        <div class="col-md-12">
                                            <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;"></div>
                                        </div>

                                                        <form role="form" method="POST">
                                                            <div class="col-md-9" style="margin: 10px">
                                                                <div class="col-md-4">
                                                                  <div class="col-md-12" style="border-style: solid;">
                                                                  <?php  
                                                                      include('../../db.php');

                                                                      $sql = "SELECT * FROM pso_r_employee_profile AS EP JOIN pso_r_user AS U ON U.EP_ID = EP.EP_ID WHERE U.U_USERNAME = '".$_SESSION['Logged_In']."'";
                                                                      $result = mysqli_query($connection, $sql);

                                                                     while ($row = mysqli_fetch_array($result)) 
                                                                     { 
                                                                       $uid = $row['U_ID'];
                                                                       $uuser = $row['U_USERNAME'];
                                                                       $upass = $row['U_PASSWORD'];
                                                                       $pic = $row['EP_PICTURE'];
                                                                       echo '<img alt="../Resources/images/PUP/pupqclogo.png" src="'.$pic.'" style="width:100%; height:90%; margin:5px">';
                                                                   ?>
                                                                  </div>

                                                                   <button type="#" class="btn btn-warning" name="ChangeProf" style="padding-left: 10px; margin-top: 10px">
                                                                         Change Profile Picture
                                                                   </button>
                                                                </div>

                                                                <div class="col-md-8">
                                                                     <input style="color: black;" type="text" name="ID" class="hidden" required="" maxlength="25" 
                                                                     value="<?php echo $uid; ?>" />
                                                                     <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Username</label>
                                                                            <input style="color: black;" type="text" name="User" class="form-control" required="" maxlength="25" 
                                                                            value="<?php echo $uuser; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Password</label>
                                                                            <input style="color: black;" type="password" name="Pass" class="form-control" required="" maxlength="50" 
                                                                            value="<?php echo $upass; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                      }
                                                                    ?> 
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Confirm Password</label> 
                                                                            <input style="color: black;" type="password" name="ConPass" class="form-control" required="" maxlength="50" />
                                                                        </div>
                                                                    </div>
                                                                     <button type="submit" class="btn btn-success" name="Save" style="padding-left: 10px; margin-left: 3%; margin-top: 1.3%">
                                                                                Save
                                                                     </button>
                                                                      <a href="PCmainpage.php" class="btn btn-default" name="cancel" style="padding-left: 10px; margin-left: 3%; margin-top: 1.3%">
                                                                                Cancel
                                                                     </a>
                                                                      <?php
                                                                        if(isset($_POST['Save']))
                                                                        {
                                                                          $No = $_POST['ID'];
                                                                          $user = $_POST['User'];
                                                                          $pass = $_POST['Pass'];
                                                                          $conpass = $_POST['ConPass'];
                                                                          if($pass == $conpass)
                                                                          {
                                                                            $query = mysqli_query($connection,"UPDATE pso_r_user SET U_USERNAME = '$user', U_PASSWORD = '$pass' WHERE U_ID = '$No'");
                                                                              header('location: PCmainpage.php');

                                                                           }
                                                                          else if($pass != $conpass)
                                                                          {
                                                                            echo "<label style='color:red ; margin-left: 5%; font-weight: 10px; font-size: 15px'>Password Do Not Match!</label>";
                                                                          }
                                                                        }

                                                                      ?>
                                                                </div>

                                                            </div>
                                        
                                                                    <div class="row">
                                                                        <div class="col-md-11" style="margin: 10px; margin-left: 30px; text-align: right;">
                                                                           
                                                                        </div>
                                                                    </div>
                                                            </form>
                                                             <div class="col-md-12">
                                                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;"></div>
                                                            </div>
                                                            
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <!-- page end-->
        </section>
    </section>
<!--End of Main Content-->


<script id="DMNotif" src="DMNotification.js"></script>
</body>


</html>