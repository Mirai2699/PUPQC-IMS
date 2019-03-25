<?php
     include("MEDJSHeader.php");
     include("MEDJSCore.php");
     include("MEDJSCustom.php");

?>


<title>Delivery Details | PUPQC IMS</title>

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
                        <li><a href="javascript:;"><i class="fa  fa-envelope"></i>Requisition</a>
                            <ul class="sub">
                                <li><a href="MEDAddNewReq.php">Add New Items</a></li>
                                <li><a href="MEDPenReq.php">Pending Requests</a></li>
                                <li><a href="MEDRevReq.php">Requests for Revision</a></li>
                                <li><a href="MEDAprReq.php">Approved Requests</a></li>
                            </ul>
                        </li>
                        <li><a class="active" href="javascript:;"><i class="fa  fa-download"></i>Acquisition</a>
                            <ul class="active" >
                                <li><a class="active" href="MEDDelivery.php">Delivery</a></li>
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
                                    <li><a href="MEDPPMP.php">Medicinal Stocks</a>
                                         <ul class="sub">
                                            <li><a href="MED_ADDPPMP.php">Create Plan</a></li>
                                            <li><a href="MED_VIEWPPMP.php">View Plans</a></li>
                                         </ul>
                                    </li>
                                    <li><a href="CLIPPMP.php">Clinical Stocks</a>
                                        <ul class="sub">
                                            <li><a href="CLI_ADDPPMP.php">Create Plan</a></li>
                                            <li><a href="CLI_VIEWPPMP.php">View Plans</a></li>
                                         </ul>
                                     </li>
                            </ul>
                        </li>
                <li>
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
                    <li><a href="MEDmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="MEDDelivery.php">For Delivery / Delivered Requests</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
        <!--tab nav start-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#fordeliver">Requests Approved for Acquisition</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#delivered">Delivered Requests</a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="fordeliver" class="tab-pane active">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading" style="color: white; background-color: gray ">
                                       Requests Approved For Actual Procurement
                                    </header>

                                  <div class="panel-body">
                                    <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <th>Batch No.</th>
                                            <th>Date Requested</th>
                                            <th>Date Approved</th>
                                            <th>Date Released</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_med_summary_request` WHERE Status_Req = 'RELEASED'                     AND Acquired_Status = 'PENDING' ORDER BY Batch_No DESC ");
                                            while($row = mysqli_fetch_assoc($view_query))
                                                {
                                                    $bn = $row["Batch_No"];
                                                    $DR = $row["Date_Requested"];
                                                    $DApr = $row["Date_Approved"];  
                                                    $DRels = $row["Date_Released"];
                                                
                                        ?>      
                                                 <tr class="gradeX">
                                                        <td><?php echo $bn; ?></td>
                                                        <td><?php echo $DR; ?></td>
                                                        <td><?php echo $DApr; ?></td>
                                                        <td><?php echo $DRels; ?></td>
                                                        <td>
                                                                <center>
                                                                <a href="MEDReviewDel.php?viewrequests=<?php echo $bn; ?>" class="btn btn-warning">Check Status</a>               
                                                                </center>
                                                       </td>
                                                </tr>  

                                                <?php 
                                                  } 
                                                    ?>

                      
                                <!--end container-->
                         
                                          
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </section>
                          </div>
                        </div>
                        <!--START DELIVERED-->
                        <div id="delivered" name="delivered" class="tab-pane">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading" style="color: white; background-color: gray ">
                                       Delivered (Procured) Requests
                                    </header>

                                  <div class="panel-body">
                                    <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th>Batch No.</th>
                                            <th>Date Requested</th>
                                            <th>Date Approved</th>
                                            <th>Date Released</th>
                                            <th>Date Procured</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_med_summary_request` WHERE Status_Req = 'RELEASED'                  AND Acquired_Status = 'ACQUIRED' ORDER BY Batch_No DESC");
                                            while($row = mysqli_fetch_assoc($view_query))
                                                {
                                                    $bn = $row["Batch_No"];
                                                    $DR = $row["Date_Requested"];
                                                    $DApr = $row["Date_Approved"];  
                                                    $DRels = $row["Date_Released"];
                                                    $DDel = $row["Date_Procured"];  
                                                
                                        ?>      
                                                 <tr class="gradeX">
                                                        <td><?php echo $bn; ?></td>
                                                        <td><?php echo $DR; ?></td>
                                                        <td><?php echo $DApr; ?></td>
                                                        <td><?php echo $DRels; ?></td>
                                                        <td><?php echo $DDel?></td>
                                                        <td style='width:150px'>
                                                                <center>
                                                                <a href="MEDReviewDel.php?viewrequests=<?php echo $bn; ?>" class="btn btn-info">View</a>               
                                                                </center>
                                                       </td>
                                                </tr>  

                                                <?php 
                                                  } 
                                                    ?>

                      
                                <!--end container-->
                         
                                          
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </section>
                          </div>
                          <!--END-->
                        </div>
                    </div>
                </div>
            </section>
            <!--tab nav start-->
      
         




            
        
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>


</body>
</html>
