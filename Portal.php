<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="Resources/images/favicon.png">

    <title>PUPQC PSO-MS</title>

    <!--Core CSS -->
    <link href="Resources/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="Resources/IMS/css/bootstrap-reset.css" rel="stylesheet">
    <link href="Resources/IMS/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--external css-->
    <link rel="stylesheet" type="text/css" href="Resources/IMS/js/gritter/css/jquery.gritter.css" />

    <!-- Custom styles for this template -->
    <link href="Resources/IMS/css/style.css" rel="stylesheet">

    <link rel="icon" href="Resources/images/PUPLogo.png" sizes="32x32">

    
</head>

<body>

<section id="container" >
<!--header start-->
  <div class="" style="height: 120px; background-color: maroon">
    
    <div class="col-md-1" style="font-family: trajan pro; font-size: 20px; color: white">
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
              <li><a  href="SystemAdmin.php"><i class="fa fa-lock"></i>&nbsp&nbsp    System Admin</a></li>
             </ul>
                   <!--   <form>
                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="sysad" class="modal fade">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Configuration and Management</h4>
                                            </div>
                                            <div class="modal-body" style="background-color: lightgrey">
                                              <center>
                                               <div class="panel" style="background-color: white; width: 70%">
                                                <form id="sys" class="form-signin" method="POST" action="login_SysAd.php">              
                                                    
                                                    <br>  
                                                    <img src="IMS/Images/PUP/key.png" style="width: 30%" />
                                                
                                                <h3 class="form-signin-heading">System Administrator</h3>

                                                <div class="login-wrap" style="font-size: 18px">
                                                    <div class="user-login-info">
                                                        <input type="text"  name="usernamesys" class="form-control" style="margin-bottom: 10px" placeholder="Username" required />
                                                        <input type="password" name="passwordsys" class="form-control" placeholder="Password" required />
                                                    </div>
                                                    
                                                    <button class="btn btn-lg btn-login btn-block" type="submit" style="background-color: #8C1C1C; color: white" name="submit">Log in</button>
                                                        
                                                </div>
                                                </center>
                                              </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                          </form>
         </div>
         <!-- /.navbar-collapse -->
    </nav>
            <!--navigation end-->
<!--header end-->

<!--sidebar end-->
<div class="col-md-11" style="margin-left: 5%; margin-top: 3%">

            <!--tab nav start-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#AMS">--------------------------------       Asset Management System   --------------------------------</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#IMS">--------------------------------       Inventory Management System  --------------------------------</a>
                        </li>
                    </ul>
                </header>

                <div class="panel-body">
                    <div class="tab-content">
                        <div id="AMS" class="tab-pane active">

                             <div class="panel" style="background-color: grey; height: 5px"></div>
                             <div class="col-md-8">
                                <img src="Resources/Images/PUP/AMS.png" style="width: 100%; height: 100%" />
                             </div>
                             <div class="col-md-4" style="background-color: lightgrey">
                               <form  class="form-signin" method="POST" action="login_SysAd.php">              
                                    <center>
                                        <br>
                                        <img src="Resources/Images/PUP/property.png" style="width: 30%" />
                                    </center>
                                    <h2 class="form-signin-heading">Asset Management System</h2>

                                    <div class="login-wrap" style="font-size: 18px">
                                        <div class="user-login-info">
                                            <input type="text" name="username" class="form-control" placeholder="Username"required/>
                                            <input type="password" name="password" class="form-control" placeholder="Password"required/>
                                        </div>
                                        <label class="checkbox">
                                            <input type="checkbox" value="remember-me"> Remember me
                                        </label>
                                        <button class="btn btn-lg btn-login btn-block" type="submi" style="background-color: #8C1C1C" name="submit">Log in</button>
                                        <br>
                                        <span class="pull-left">
                                            <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                                        </span>
                                        <br>
                                    </div>

                                      <!-- Modal 
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
                                      <!--Modal-->
                                </form>
                             </div>
                        </div>                       
                        <div id="IMS" class="tab-pane">
                             <div class="panel" style="background-color: grey; height: 5px">
                             </div>
                             <div class="col-md-8">
                                <img src="Resources/Images/PUP/IMS.png" style="width: 100%; height: 100%" />
                             </div>
                             <div class="col-md-4" style="background-color: lightgrey">
                                <form class="form-signin" method="POST" action="login_IMS.php">              
                                    <center>
                                        <br>
                                        <a href="PUPIMS_LogIn.php">
                                          <img src="Resources/Images/PUP/inventory.png" style="width: 30%" />
                                        </a>
                                    </center>
                                    <h2 class="form-signin-heading">Inventory Management System</h2>
                                    
                                    <div class="login-wrap" style="font-size: 18px">
                                        <div class="user-login-info">
                                            <input type="text" name="IMSusername" class="form-control" placeholder="Username" required />
                                            <input type="password" name="IMSpassword" class="form-control" placeholder="Password" required />
                                        </div>
                                        <label class="checkbox">
                                            <input type="checkbox" value="remember-me"> Remember me
                                        </label>
                                        <button class="btn btn-lg btn-login btn-block" type="submit" style="background-color: #8C1C1C" name="IMSsubmit">Log in</button>
                                            <br>
                                            <span class="pull-left">
                                                <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                                            </span>
                                            <br>
                                    </div>

                                    <!-- Modal 
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
                       </div>

                    </div>
                </div>
                
            </section>
</div>

            </div>
            </div>



</section>



<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="Resources/IMS/js/jquery.js"></script>
<script src="Resources/IMS/js/jquery-1.8.3.min.js"></script>
<script src="Resources/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="Resources/IMS/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="Resources/IMS/js/jquery.scrollTo.min.js"></script>
<script src="Resources/IMS/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="Resources/IMS/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="Resources/IMS/js/gritter/js/jquery.gritter.js"></script>
<!--Easy Pie Chart-->
<script src="Resources/IMS/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="Resources/IMS/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="Resources/IMS/js/flot-chart/jquery.flot.js"></script>
<script src="Resources/IMS/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="Resources/IMS/js/flot-chart/jquery.flot.resize.js"></script>
<script src="Resources/IMS/js/flot-chart/jquery.flot.pie.resize.js"></script>

<!--common script init for all pages-->
<script src="Resources/IMS/js/scripts.js"></script>

<!--script for this page-->
<script src="Resources/IMS/js/gritter.js" type="text/javascript"></script>

</body>

</html>
