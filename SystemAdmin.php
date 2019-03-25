<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author">
    <link rel="shortcut icon" href="Resources/images/favicon.png">

    <title>PUPQCPSO - System Administration</title>

    <!--Core CSS -->
    <link href="Resources/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="Resources/IMS/css/bootstrap-reset.css" rel="stylesheet">
    <link href="Resources/IMS/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="Resources/IMS/css/style.css" rel="stylesheet">
    <link href="Resources/IMS/css/style-responsive.css" rel="stylesheet" /> 

    <link rel="icon" href="Resources/images/PUPLogo.png" sizes="32x32">

</head>

  <body class="login-body" style="background-color: gray">

     <div class="" style="height: 120px; background-color: maroon">
    
    <div class="col-md-1" style="font-family: trajen; font-size: 20px; color: white">
      <img  src="Resources/images/PUPLogo.png" style="height:100%; width:100%; margin: 10px"> 
          
    </div>   
    <div class="col-md-6" style="font-family: copperplate gothic; font-size: 20px; color: white; margin-top: 15px">
          Polytechnic University of the Philippines<br>
          Quezon City Branch<br>
          Property and Supply Office
    </div> 
  </div>
   <nav class="top navbar-inverse" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <p style="margin: 15px; font-size: 17px; color: white; font-family: ">PUPQC Property and Supply Office Management Systems</p>
        </div>

         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse navbar-ex1-collapse">
             <ul class="nav navbar-nav navbar-right">
               <li><a href="javascript:;"><i class="fa fa-info-circle"></i>&nbsp&nbsp   About Us</a></li>
              <li><a  href="Portal.php"><i class="fa fa-reply"></i>&nbsp&nbsp    Go Back to Portal</a></li>
             </ul>
         </div>
         <!-- /.navbar-collapse -->
    </nav>

    <div class="container">
            
         <form id="sys" class="form-signin" method="POST">  
           <center>
             <br>  
              <img src="Resources/Images/PUP/key.png" style="width: 30%" />
              <h3 class="form-signin-heading">System Administrator</h3>
            <?php
                                                              //include ("db.php");
                                                                $connection = mysqli_connect('localhost','root','','pupqc_ams_ims_db');
                                                                if(isset($_POST['submitsys']))
                                                                {
                                                                  $username = $_POST['usernamesys'];
                                                                  $password = $_POST['passwordsys'];
                                                                  
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
                                                                      }
                                                                      echo 'OK!';

                                                    
                                                                  session_start();
                                                                  
                                                                  $_SESSION['Logged_In'] = $UserName;
                                                                  $_SESSION['TYPE'] = $type;
                                                                  $_SESSION['AccountID'] = $account;


                                                                  if($_SESSION['TYPE'] == "Administrator")
                                                                  {
                                                                    $header ='Location:SYSAD/SAmainpage.php? username='.$UserName.'&Account_Type = '.$type.'';
                                                                    header($header);
                                                                  }
                                                                  
                                                                  
                                                                }
                                                              else
                                                                      {
                                                                        echo "<p style='color:red ; margin-left: 15%'>Incorrect Username or Password! </p>";         
                                                                      }
                                                              }
                                                        ?>           
           
                    <div class="login-wrap" style="font-size: 18px">
                     <div class="user-login-info">
                         <input type="text"  name="usernamesys" class="form-control" style="margin-bottom: 10px" placeholder="Username" required />
                         <input type="password" name="passwordsys" class="form-control" placeholder="Password" required />
                     </div>
                     <button class="btn btn-lg btn-login btn-block" type="submit" style="background-color: #8C1C1C; color: white" name="submitsys">Log in</button>
              </div>
            </center>
          </form>
    </div>



    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->

    <script src="Resources/IMS/js/jquery.js"></script>
    <script src="Resources/bs3/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="Resources/IMS/js/jquery.dcjqaccordion.2.7.js"></script>
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


    <script type="text/javascript" src="Resources/IMS/js/jquery.validate.min.js"></script>

    <!--common script init for all pages-->
    <script src="Resources/IMS/js/scripts.js"></script>
    <!--this page script-->
    <script src="Resources/IMS/js/validation-init.js"></script>

  </body>
</html>
