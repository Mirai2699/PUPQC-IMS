<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Log In | PUPQCIMS </title>

    <!--Core CSS -->
    <link href="Resources/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="Resources/IMS/css/bootstrap-reset.css" rel="stylesheet">
    <link href="Resources/IMS/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="Resources/IMS/css/style.css" rel="stylesheet">
    <link href="Resources/IMS/css/style-responsive.css" rel="stylesheet" />

    <link rel="icon" href="Resources/images/PUPLogo.png" sizes="32x32">

</head>

  <body class="login-body" style="background-color: #8C1C1C">

    <div class="container">

      <form class="form-signin" method="POST"">
        <center>
        <img src="Resources/images/PUP/pupinventorywide.png" style="height: 100%; width: 98%; margin: 5px">   
        </center>    
        <h2 class="form-signin-heading">PUP QC<br>Inventory Management System</h2>

<?php
                                      include ("db.php");
                                        
                                        if(isset($_POST['IMSsubmit']))
                                        {
                                          $username = $_POST['IMSusername'];
                                          $password = $_POST['IMSpassword'];
                                          
                                          $query = "SELECT * FROM pso_r_user WHERE U_USERNAME = '".$username."' and U_PASSWORD = '".$password."'";

                                          $result = mysqli_query($connection,$query) or die(mysqli_error());
                                          if (mysqli_num_rows($result) > 0)
                                          {
                                           while($row = mysqli_fetch_assoc($result))
                                             {
                                               $user_id = $row['EP_ID'];
                                               $UserName = $row['U_USERNAME'];
                                               $type = $row['U_TYPE'];
                                               $account = $row['U_ID'];
                                               $employee = $row['EP_ID'];
                                               $office = $row['O_ID'];
                                             }
                                             echo 'OK!';

                            
                                          session_start();
                                          

                                          $_SESSION['Logged_In'] = $UserName;
                                          $_SESSION['TYPE'] = $type;
                                          $_SESSION['AccountID'] = $account;
                                          $_SESSION['DEPART'] = $office;
                                          $_SESSION['EmployeeID'] = $employee;


                                          if($_SESSION['TYPE'] == "Property-Custodian")
                                          {
                                            $header ='Location:IMS/IMS-PC/PCmainpage.php? username='.$UserName.'';
                                            header($header);
                                          }
                                          else if($_SESSION['TYPE'] == "Director")
                                          {
                                            
                                            $header ='Location:IMS/IMS-DIR/DMmainpage.php? username='.$UserName.'';
                                            header($header);
                                          } 
                                          else if($_SESSION['TYPE'] == "Departmental-User")
                                          {
                                            
                                            $header ='Location:IMS/IMS-DEPT/DPmainpage.php? username='.$UserName.'';
                                            header($header);
                                          } 
                                          else if($_SESSION['TYPE'] == "Inspection-Officer")
                                          {
                                            
                                            $header ='Location:IMS/IMS-INS/INSmainpage.php? username='.$UserName.'';
                                            header($header);
                                          } 
                                           else if($_SESSION['TYPE'] == "Medical-Officer")
                                          {
                                            
                                            $header ='Location:IMS/IMS-MED/MEDmainpage.php? username='.$UserName.'';
                                            header($header);
                                          } 
                                           else if($_SESSION['TYPE'] == "Dental-Officer")
                                          {
                                            
                                            $header ='Location:IMS/IMS-DEN/Dental-Officermainpage.php? username='.$UserName.'';
                                            header($header);
                                          } 
                                           else if($_SESSION['TYPE'] == "Administrator")
                                          {
                                            
                                            $header ='Location:SYSAD/SAmainpage.php? username='.$UserName.'&Account_Type = '.$type.'';
                                            header($header);
                                          }
                                          
                                         
                                         $query = "INSERT INTO pso_r_users_log (UL_LOGGED_TYPE,EP_ID) VALUES('$type','$employee')";
                                         mysqli_query($connection,$query);
                                          
                                        }
                                else
                                        {
                                           
                                            echo  "
                                            <center>
                                            <label style='color:red; font-weight: 10px; font-size: 15px'>Incorrect Username or Password!</label>
                                            </center>";         
                                            }
                                      }
                                ?>
        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" id="exampleInputEmail1" name="IMSusername" class="form-control" placeholder="Username" required />
              
                <input type="password" name="IMSpassword" class="form-control" placeholder="Password" required />
            </div>
            <!--
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>
          -->
            <button class="btn btn-lg btn-login btn-block" type="submit" style="background-color: #b71c1c" name="IMSsubmit">Log in</button>

        </div>

          <!-- Modal -->
          <form>
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix" />

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Send</button>
                      </div>
                  </div>
              </div>
          </div>
          </form>
          
          <!-- modal -->

      </form>

    </div>



    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->

    <script src="Resources/IMS/js/jquery.js"></script>
    <script src="Resources/bs3/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="Resources/IMS/js/jquery.scrollTo.min.js"></script>
    <script src="Resources/IMS/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
    <script src="Resources/IMS/js/jquery.nicescroll.js"></script>
    <!--Easy Pie Chart-->
    <script src="Resources/IMS/js/easypiechart/jquery.easypiechart.js"></script>
    <!--Sparkline Chart-->
    <script src="Resources/IMS/js/sparkline/jquery.sparkline.js"></script>
    <!--jQuery Flot Chart-->
    <script src="Resources/IMS/js/flot-chart/jquery.flot.js"></script>
    <script src="Resources/IMS/js/flot-chart/jquery.flot.tooltip.min.js"></script>
    <script src="Resources/IMS/js/flot-chart/jquery.flot.resize.js"></script>
    <script src="Resources/IMS/js/flot-chart/jquery.flot.pie.resize.js"></script>


    <script type="text/javascript" src="Reosources/IMS/js/jquery.validate.min.js"></script>

    <!--common script init for all pages-->
    <script src="Resources/IMS/js/scripts.js"></script>
    <!--this page script-->
    <script src="Resources/IMS/js/validation-init.js"></script>

  </body>
</html>
