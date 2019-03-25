<?php 
     include ("C:/xampp/htdocs/pupqcpso/db.php");
     session_start();
        $type = $_SESSION['TYPE'];
        if(!isset($_SESSION['UserName']) && $type!="Departmental-User"){
          header('Location: 404.html?err=1');
        }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">

    <!--Core CSS -->
    <link href="../../Resources/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="../../Resources/IMS/css/bootstrap-reset.css" rel="stylesheet">
    <link href="../../Resources/IMS/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="../../Resources/IMS/css/clndr.css" rel="stylesheet">
    <!--clock css-->
    <link href="../../Resources/IMS/js/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="../../Resources/IMS/js/morris-chart/morris.css">
    <!-- Custom styles for this template -->
    <link href="../../Resources/IMS/css/style.css" rel="stylesheet">
    <link href="../../Resources/IMS/css/style-responsive.css" rel="stylesheet"/>

    <link rel="icon" href="../../Resources/images/PUPLogo.png" sizes="32x32">
    <!--icheck-->
    <link href="../../Resources/IMS/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/minimal/red.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/minimal/green.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/minimal/blue.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/minimal/yellow.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/minimal/purple.css" rel="stylesheet">

    <link href="../../Resources/IMS/js/iCheck/skins/square/square.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/square/red.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/square/green.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/square/blue.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/square/yellow.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/square/purple.css" rel="stylesheet">

    <link href="../../Resources/IMS/js/iCheck/skins/flat/grey.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/flat/red.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/flat/blue.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/flat/yellow.css" rel="stylesheet">
    <link href="../../Resources/IMS/js/iCheck/skins/flat/purple.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../../Resources/IMS/js/select2/select2.css" />
    <link rel="stylesheet" type="text/css" href="../../Resources/IMS/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="../../Resources/IMS/js/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="../../Resources/IMS/js/bootstrap-datepicker/css/datepicker.css" />

    <link href="../../Resources/IMS/js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../../Resources/IMS/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">  

</head>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body>
<script src="../../Resources/IMS/js/code/highcharts.js"></script>
<script src="../../Resources/IMS/js/code/modules/data.js"></script>
<script src="../../Resources/IMS/js/code/modules/drilldown.js"></script>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a data-toggle="modal" href="#ABOUT" data-backdrop="false" class="logo">
        <img src="../../Resources/images/PUP/syslogo.png" alt="" style="width: 80%; height: 25%;">
    </a>
           <div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ABOUT" class="modal fade">
                     <div class="modal-dialog">
                         <div class="modal-content" >
                             <div class="modal-header" style="background-color:maroon; color: white; ">
                                <h4 class="modal-title" style="font-size: 35px;"><center>About Us</center></h4>
                             </div>
                             <div class="modal-body" style="height:680px;">
                               <center>
                                  <img src="../../Resources/images/PUP/pupinventorywide.png" style="height: 80%; width: 80%; margin: 5px"> 
                                   <p style="font-size: 24px; margin: 10px;">
                                  Polytechnic University of the Philippines<br> Quezon City<br>Inventory Management System 
                                  </p> 
                                  <br>
                                  <p style="font-size: 18px; margin: 10px;"><i>
                                  The Polytechnic University of the Philippines Quezon City Branch's Inventory Management System optimizes the management of the local supplies inventory from the items' requisition, acquisition and its issuance - supplies in different varieties, as it automates the local transaction of the university</i>
                                  </p> <br>
                                  <hr>
                                  <p style="font-size: 13px; margin: 10px;">
                                  PUPQC-IMS Version 1.0<br>
                                  Developed by the PUPQC-IMS Team, BSIT 3-1 Batch 2017-2018 
                                  </p> 
                                  <hr>
                                   <button data-dismiss="modal" class="btn btn-default" style="background-color: maroon; color: white" name="cancel" ><i  class="fa fa-times"></i></button>
                               </center>
                            </div>
                        </div>
                     </div>
                </div>

    <!--
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>-->
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- notification dropdown start-
        <li id="ReturnNotif" class="dropdown">
            <a data-toggle="dropdown" title="Pending Departmental Returns" data-placement="right" class="dropdown-toggle tooltips" href="#">
                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning count"></span>
            </a>
            <ul class="dropdown-menu extended notification dispnotif" style="overflow-y: scroll; height: 375px;">
            </ul>   
        </li>-->
        <label style="margin-top: 1px; font-size: 21px; font-family: agency fb">
        <?php
              $office = $_SESSION['DEPART'];  
              $sqlemp= "SELECT * FROM `pso_r_office` WHERE O_ID = '$office' ";
                         $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                         while($row = mysqli_fetch_assoc($results))
                                 {
                                     $oname = $row['O_NAME'];
                   ?>
             <?php echo $oname; ?>
        </label>
        <?php }
                  ?>
    </ul>
    <!--  notification end -->
</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                  <?php  
                    include('../../db.php');

                    $sql = "SELECT * FROM pso_r_employee_profile AS EP JOIN pso_r_user AS U ON U.EP_ID = EP.EP_ID WHERE U.U_USERNAME = '".$_SESSION['Logged_In']."'";
                    $result = mysqli_query($connection, $sql);

                   while ($row = mysqli_fetch_array($result)) 
                   {
                    $pic = $row['EP_PICTURE'];
                     if($pic != NULL)
                     {
                         echo '<img src="'.$pic.'">';
                     }
                     else
                         echo '<img src="default.png">';
                   }
                  ?> 
                
                <span class="username"> <?php echo $_SESSION['Logged_In']; ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a data-toggle="modal" data-target="#Change" data-backdrop="false"><i class="fa fa-cog"></i>Change Password</a></li>
                <li><a href="../../External_logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
    </ul>
    <!--search & user info end-->
</div>
       <div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Change" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" >
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" style="font-size: 25px"><i  class="fa fa-key"></i>   Change Password</h4>
                                                            </div>
                                                            <div class="modal-body" style="height:350px;">

                                                        <form role="form" method="POST" action="changePass.php">
                                                                <div class="col-md-12">
                                                                  <div class="col-md-12">
                                                                  <?php  
                                                                      include('../../db.php');

                                                                      $sql = "SELECT * FROM pso_r_employee_profile AS EP JOIN pso_r_user AS U ON U.EP_ID = EP.EP_ID WHERE U.U_USERNAME = '".$_SESSION['Logged_In']."'";
                                                                      $result = mysqli_query($connection, $sql);

                                                                     while ($row = mysqli_fetch_array($result)) 
                                                                     { 
                                                                       $uid = $row['U_ID'];
                                                                       $uuser = $row['U_USERNAME'];
                                                                       $upass = $row['U_PASSWORD'];
                                                                        
                                                                   ?>

                                                                <div class="col-md-12">
                                                                         <input style="color: black;" type="text" name="ID" class="hidden" required="" maxlength="25" 
                                                                     value="<?php echo $uid; ?>" />
                                                                     <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label style="font-size: 15px">Current Password:</label>
                                                                             <input style="color: black;" id="oldpassword" type="password" name="OldPass" class="form-control input-frield" required="" value="<?php echo $upass; ?>"disabled/>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                      }
                                                                    ?> 
                                                                     <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label style="font-size: 15px">New Password:</label>
                                                                            <input style="color: black;" id="password" type="password" name="Pass" class="form-control input-frield" required="" data-toggle="password" maxlength="50" 
                                                                            />
                                                                        </div>
                                                                    </div><!--
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label style="font-size: 15px">New Password:</label>
                                                                            <input style="color: black;" id="newpassword" type="password" name="NewPass" class="form-control input-frield" required="" data-toggle="password" maxlength="50" />
                                                                            
                                                                        </div>
                                                                    </div>-->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label style="font-size: 15px">Confirm Password:</label> 
                                                                            <input style="color: black;" id="confirmPassword" type="password" name="ConPass" class="form-control" required="" maxlength="50" />
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-md-12">
                                                                        <div class="square-red single-row">
                                                                            <div class="checkbox ">
                                                                                <input id="check" type="checkbox" onclick="showPass();"  style="background-color: maroon">
                                                                                <label style="font-size: 15px">Show Password</label> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div style="padding: 1px; margin-bottom: 10px; background-color: gray;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-md-12">
                                                                      <button type="submit" class="btn btn-success" name="Save"">
                                                                        <i  class="fa fa-check"></i>   Save
                                                                      </button>&nbsp&nbsp&nbsp
                                                                      <button data-dismiss="modal" class="btn btn-default" style="background-color: maroon; color: white" name="cancel" ><i  class="fa fa-times"></i>  Cancel</button>
                                                                    </div>
                                                                </div>
                                                                <!--
                                                                <div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="final" class="modal fade">
                                                                      <div class="modal-dialog">
                                                                          <div class="modal-content">
                                                                              <div class="modal-body" style="height:250px;">
                                                                                    <button type="submit" class="btn btn-success" name="Save" style="padding-left: 10px; margin-left: 3%; margin-top: 1.3%">
                                                                                                  Ok
                                                                                     </button>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>-->

                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 



    <style type="text/css">
                .modal::after {
          content: "";
          background: black;
          opacity: 0.5;
          top: 0;
          left: 0;
          bottom: -300px;
          right: 0;
          position: absolute;
          z-index: -1;

          .field-icon {
          float: right;
          margin-left: -25px;
          margin-top: -25px;
          position: relative;
          z-index: 2;
        }

        .container{
          padding-top:50px;
          margin: auto;
        }   
        }
    </style>
    <!--Show Password-->
    <script type="text/javascript">
    function showPass()
    {
      var pass = document.getElementById('password');
      var oldpass = document.getElementById('oldpassword');
      var confpass = document.getElementById('confirmPassword');
      if(document.getElementById('check').checked)
      {
        pass.setAttribute('type','text');
        oldpass.setAttribute('type','text');
        confpass.setAttribute('type','text');
      }
      else
      {
        pass.setAttribute('type','password');
        oldpass.setAttribute('type','password');
        confpass.setAttribute('type','password');
      }  
    }    
    </script>
    <!--Password Validation-->
    <script type="text/javascript">
        var password = document.getElementById("password")
       ,confirmPassword = document.getElementById("confirmPassword");

        function validatePassword()
        {
          if(password.value != confirmPassword.value) 
          {
            confirmPassword.setCustomValidity("Passwords Don't Match");
            $('#myform').on('submit', function(ev) 
            {
                $('#myModal').modal('show');
            });

          } else 
          {
            confirmPassword.setCustomValidity(''); 
          }
        }

        password.onchange = validatePassword;
        confirmPassword.onkeyup = validatePassword;
    </script>
</header>
<!--header end-->

   