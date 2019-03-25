<?php 
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");
     //include ("PCJSAll.php");l
?>

<title>Pending Requests | PUPQC IMS</title>

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a href="PCmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-envelope"></i>
                        <span>Requests</span>
                    </a>
                    <ul class="active" >
                        <li><a href="PCAddNewReq.php">Add New</a></li>
                        <li><a class="active" href="PCPenReq.php">Pending</a></li>
                        <li><a href="PCRevReq.php">For Revision</a></li> 
                        <li><a href="PCAprReq.php">Approved for Requesting</a></li>  
                        <li><a href="PCDelReq.php">Approved for Delivery</a></li>            
                    </ul>
                </li>
                <li>
                    <a href="PCIssuance.php">
                        <i class="fa  fa-upload"></i>
                        <span>Departmental Issuance</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="PCInventory.php">
                        <i class="fa fa-tasks"></i>
                        <span>Inventory Status</span>
                    </a>
                </li>
                 <li class="sub-menu">
                    <a href="PCDelDet.php">
                        <i class="fa fa-truck"></i>
                        <span>Delivery Details</span>
                    </a>
                </li>
                 <li>
                    <a href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">
                        <li><a href="PCReportReqOff.php">Requisition</a></li>     
                        <li><a href="PCReportAcqOff.php">Procurement</a></li>
                        <li><a href="PCReportIss.php">Issuance</a></li> 
                        <li><a href="PCReportInvOff.php">Inventory Stocks</a></li>               
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
                    <li><a href="PCmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="PCPenReq.php">Pending Requests</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      





      	
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="background-color: gray; color: white">
                        Pending Requests
                    </header>
                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th>Batch No.</th>
                            <th>Date Requested</th>
                            <th>Date Revised</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_summary_request` WHERE Status_Req = 'PENDING' ORDER BY Date_Requested DESC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {
                                    $bn = $row["Batch_No"];
                                    $DR = $row["Date_Requested"];
                                    $DRev = $row["Date_Revised"];
                                    
                                
                        ?>      
                                 <tr class="gradeX">
                                        <td><?php echo $bn; ?></td>
                                        <td><?php echo $DR; ?></td>
                                        <td><?php echo $DRev; ?></td>
                                        <td style='width:150px'>
                                                <center>
                                                    
                                                <a href="PCReviewReq.php?viewrequests=<?php echo $bn; ?>" class="btn btn-success">View</a>               
                                                </center>
                                       </td>
                                </tr>  

                                <?php 
                                  } 
                                    ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </section>
                <!--end container-->
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
