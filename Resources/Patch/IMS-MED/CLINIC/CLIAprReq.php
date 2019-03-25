<?php
     include("MEDJSHeader.php");
     include("MEDJSCore.php");
     include("MEDJSCustom.php");

?>



    <title>Approved Requests | PUPQC IMS</title>


<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a href="MEDmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-medkit"></i>
                        <span>Medicinal Items</span>
                    </a>
                    <ul class="active" >
                        <li><a class="active" href="javascript:;"><i class="fa  fa-envelope"></i>Requisition</a>
                            <ul class="active" ">
                                <li><a href="MEDAddNewReq.php">Add New Items</a></li>
                                <li><a href="MEDPenReq.php">Pending Requests</a></li>
                                <li><a href="MEDRevReq.php">Requests for Revision</a></li>
                                <li><a class="active" href="MEDAprReq.php">Approved Requests</a></li> 
                            </ul>
                        </li>
                        <li><a href="javascript:;"><i class="fa  fa-download"></i>Acquisition</a>
                            <ul class="sub">
                                <li><a href="MEDDelivery.php">Delivery</a></li>
                                <li><a href="MEDEntry.php">Entry Items</a></li>
                                <li><a href="MEDAcquire.php">Acquired Items</a></li>
                            </ul>
                        </li>
                         <li><a href="javascript:;"><i class="fa fa-tasks"></i>Inventory Management</a>
                            <ul class="sub">
                                <li><a href="MEDCategory.php">Setup Item Category</a></li>
                                <li><a href="MEDInvent.php">Manage Critical Level <br>and Items' Status</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;">
                        <i class="fa  fa-plus-circle"></i>
                        <span>Clinical Items</span>
                    </a>
                    <ul class="sub">
                        <li><a href="javascript:;"><i class="fa  fa-envelope"></i>Requisition</a>
                            <ul class="sub">
                                <li><a href="CLIAddNewReq.php">Add New Items</a></li>
                                <li><a href="CLIPenReq.php">Pending Requests</a></li>
                                <li><a href="CLIRevReq.php">Requests for Revision</a></li>
                                <li><a href="CLIAprReq.php">Approved Requests</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:;"><i class="fa  fa-download"></i>Acquisition</a>
                            <ul class="sub">
                                <li><a href="CLIDelivery.php">Delivery</a></li>
                                <li><a href="CLIEntry.php">Entry Items</a></li>
                                <li><a href="CLIAcquire.php">Acquired Items</a></li>
                            </ul>
                        </li>
                         <li><a href="javascript:;"><i class="fa fa-tasks"></i>Inventory Management</a>
                            <ul class="sub">
                                <li><a href="CLICategory.php">Setup Item Category</a></li>
                                <li><a href="CLIInvent.php">Manage Critical Level <br>and Items' Status</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;"><i class="fa  fa-calendar"></i>PPMP</a>
                     <ul class="sub">
                            <li><a href="MEDPPMP.php">Medicinal Stocks</a></li>
                            <li><a href="CLIPPMP.php">Clinical Stocks</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">
                         <li><a href="javascript:;"><i class="fa  fa-download"></i>Procurement</a>
                            <ul class="sub">
                                <li><a href="MEDProcRep.php">Medicinal Stocks</a></li>
                                <li><a href="CLIProcRep.php">Clinical Stocks</a></li>
                            </ul>
                        </li>   
                        <li><a href="javascript:;"><i class="fa  fa-tasks"></i>Inventory Status</a>
                            <ul class="sub">
                                <li><a href="MEDInventstat.php">Medicinal Stocks</a></li>
                                <li><a href="CLIInventstat.php">Clinical Stocks</a></li>
                            </ul>
                        </li>  
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
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="DPmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DPAprReq.php">Approved Requests</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                         Approved Requests
                    </header>
                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th>Request No.</th>
                            <th>Date Requested</th>
                            <th>Date Revised</th>
                            <th>Date Approved</th>
                            <th>Date Released</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $office = $_SESSION['DEPART'];
                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_med_summary_request` AS SUMREQ
                                                                    INNER JOIN pso_r_office AS OFF
                                                                    ON SUMREQ.Depart_Name = OFF.O_NAME
                                                                    WHERE SUMREQ.Status_Req = 'APPROVED' OR SUMREQ.Status_Req = 'RELEASED'
                                                                    AND OFF.O_ID = '$office' ORDER BY Batch_No DESC");
                            
                                                                     while($row = mysqli_fetch_array($view_query))
                                {
                                        $bn = $row["Batch_No"];
                                        $DR = $row["Date_Requested"];
                                        $DRev = $row["Date_Revised"];
                                        $Dapr = $row["Date_Approved"];
                                        $Drels = $row["Date_Released"];
                                        $stat = $row["Status_Req"];

                                            echo
                                            "<tr>
                                                    <td>  ".$bn."     </td>                                                           
                                                    <td>  ".$DR." </td>
                                                    <td>  ".$DRev." </td>
                                                    <td>  ".$Dapr."   </td>
                                                    <td>  ".$Drels."   </td>
                                                    <td>  ".$stat." </td>
                                             ";
                                             
                                            
                                            if($stat == "APPROVED")
                                             {
                                                echo       
                                                    "<td style='text-align:center'>
                                                         
                                                         <a href='MEDReviewApr.php?viewrequests=$bn' class='btn btn-success'>Review</a> 
                                                    </td>";
                                             }
                                             else if($stat == "RELEASED")
                                             {
                                                echo       
                                                    "<td style='text-align:center'>
                                                         
                                                         <a href='MEDReviewRel.php?viewrequests=$bn' class='btn btn-info'>Review</a> 
                                                    </td>";
                                             }
                                             else if($stat == NULL)
                                             {
                                                echo    
                                                "<td style='text-align:center'>   
                                                    No Action Needed
                                                </td>";
                                             }
                                             echo " </tr>  ";
                                                        
                                }

                                
                                    ?>
                    </tbody>
                </form>
            </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>


</body>
</html>
