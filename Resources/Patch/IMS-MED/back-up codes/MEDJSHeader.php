<?php 
     include ("C:/xampp/htdocs/pupqcpso/db.php");
     session_start();
        $type = $_SESSION['TYPE'];
        if(!isset($_SESSION['UserName']) && $type!="Medical-Officer"){
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
    <a href="PCmainpage.php" class="logo">
        <img src="../../Resources/images/PUP/syslogo.png" alt="" style="width: 80%; height: 25%;">
    </a>
    <!--
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>-->
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- notification dropdown start-->
        <li id="ReturnNotif" class="dropdown">
            <a data-toggle="dropdown" title="Pending Departmental Returns" data-placement="right" class="dropdown-toggle tooltips" href="#">
                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning count"></span>
            </a>
            <ul class="dropdown-menu extended notification dispnotif" style="overflow-y: scroll; height: 375px;">
            </ul>   
        </li>
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
                <!--<li><a href="MEDAccount.php"><i class="fa fa-cog"></i>Account Settings</a></li>-->
                <li><a href="../../External_logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->

    

   

    <script id="header_notification_bar">
        $(document).ready(function(){
         
         function load_unseen_notification(view = '')
         {
          $.ajax({
           url:"fetch.php",
           method:"POST",
           data:{view:view},
           dataType:"json",
           success:function(data)
           {
            $('.dispnotif').html(data.notification);
            if(data.unseen_notification > 0)
            {
             $('.count').html(data.unseen_notification);
            }
           }
          });
         }
         
         load_unseen_notification();
         
         $('#comment_form').on('submit', function(event){
          event.preventDefault();
          if($('#subject').val() != '' && $('#comment').val() != '')
          {
           var form_data = $(this).serialize();
           $.ajax({
            url:"insert.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
             $('#comment_form')[0].reset();
             load_unseen_notification();
            }
           });
          }
          else
          {
           alert("Both Fields are Required");
          }
         });
         
         $(document).on('click', '.dropdown-toggle', function(){
          $('.count').html('');
          load_unseen_notification('yes');
         });
         
         setInterval(function(){ 
          load_unseen_notification();; 
         }, 2500);
         
        });
    </script>