<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>

<title>Home | PUPQC PSO</title>

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a class="active" href="SAmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Personnel Setup</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAaddperson.php">Add Personnel</a></li>
                        <li><a href="SAmngeperson.php">Manage Personnel</a></li>              
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa   fa-unlock-alt"></i>
                        <span>User Account Setup</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAaddacc.php">Add User Account</a></li>
                        <li><a href="SAmngeacc.php">Manage User Accounts</a></li>         
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-building-o"></i>
                        <span>Office Setup</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAadddept.php">Add Office</a></li>
                        <li><a href="SAmngedept.php">Manage Office</a></li>         
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-qrcode"></i>
                        <span>Asset Management</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAAssetlib.php"> Setup Asset Library</a></li>
                        <li><a href="SADisloc.php"> Setup Disposal Location</a></li>         
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-tasks"></i>
                        <span>Inventory Management</span>
                    </a>
                    <ul class="sub">
                            <li><a href="javascript:;">Setup Item Category</a>
                            	<ul class="sub">
			                        <li><a href="SA_Off_Category.php">------  Office Supplies</a></li>
			                        <li><a href="SA_Clinic_Category.php">------  Clinical Supplies</a></li>   
			                        <li><a href="SA_Med_Category.php">------  Medicinal Supplies</a></li>      
			                    </ul>
                            </li>
                            <li><a href="javascript:;">Setup Items and Critical Level</a>
                            	<ul class="sub">
			                        <li><a href="SA_Supp_Office.php">------  Office Supplies</a></li>
			                        <li><a href="SA_Supp_Clinic.php">------  Clinical Supplies</a></li>   
			                        <li><a href="SA_Supp_Medic.php">------  Medicinal Supplies</a></li>      
			                    </ul>
                            </li>         
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-cogs"></i>
                        <span>Miscellaneous</span>
                    </a>
                    <ul class="sub">
                            <li><a href="SAUserlog.php">Users' Logs</a></li>
                    </ul>
                </li>
                <hr>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

  <!--mini statistics start-->
        <div class="row">
            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <a href="SAmngeperson.php">
                    <span class="mini-stat-icon orange">
                        <i class="fa  fa-users"></i>
                    </span>
                    </a>
                    <div class="mini-stat-info">
                        <span>
                        <?php
                           
                            $sql="SELECT * FROM pso_r_employee_profile";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Registered Employees in the System
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <a href="SAmngeacc.php">
                    <span class="mini-stat-icon tar">
                        <i class="fa fa-unlock-alt"></i>
                    </span>
                    </a>
                    <div class="mini-stat-info">
                        <span>
                            <?php
                           
                            $sql="SELECT * FROM pso_r_user where U_STATUS = 'Active' ";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                      </span>
                        Registered Active Accounts in the System
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <a href="SAcampus.php">
                    <span class="mini-stat-icon pink">
                        <i class="fa fa-sitemap"></i>
                    </span>
                    </a>
                    <div class="mini-stat-info">
                        <span>
                             <?php
                           
                            $sql="SELECT * FROM pso_r_campus";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Registered Campus in the System
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <a href="#">
                    <span class="mini-stat-icon green">
                        <i class="fa fa-qrcode"></i>
                    </span>
                    </a>
                    <div class="mini-stat-info">
                        <span>
                            <?php
                           
                            $sql="SELECT * FROM ams_r_asset";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Total Number of Each Different Asset 
                    </div>
                </div>
            </div>
        </div>

        <!--PART TWO-->
        
        <div class="row">
            <div class="col-md-4">
                <div class="mini-stat clearfix">
                    <a href="SAUserlog.php">
                    <span class="mini-stat-icon orange">
                        <i class="fa  fa-laptop"></i>
                    </span>
                    </a>
                    <div class="mini-stat-info">
                        <span>
                        <?php
                           
                            $sql="SELECT * FROM pso_r_users_log";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Recorded Log-Ins in the system
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mini-stat clearfix">
                    <a href="SAmngedept.php">
                    <span class="mini-stat-icon pink">
                        <i class="fa fa-building-o"></i>
                    </span>
                    </a>
                    <div class="mini-stat-info">
                        <span>
                             <?php
                           
                            $sql="SELECT * FROM pso_r_office";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Registered Departments in the System
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mini-stat clearfix">
                    <a href="SAStocklevel.php">
                    <span class="mini-stat-icon green">
                        <i class="fa fa-tasks"></i>
                    </span>
                    </a>
                    <div class="mini-stat-info">
                        <span>
                            <?php
                           
                            $sql="SELECT * FROM ims_r_stock";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Total Number of Each Different Stock Items 
                    </div>
                </div>
            </div>
        </div>
<!--mini statistics end-->
        

        <br/>
            
                </div>

    </section>
</section>

</section>


</body>
</html>