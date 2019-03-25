<?php 
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");
?>
 
<title>Requests for Delivery | PUPQC IMS</title>

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a class="active" href="PCmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-envelope"></i>
                        <span>Requests</span>
                    </a>
                    <ul class="active">
                        <li><a href="PCAddNewReq.php">Add New</a></li>
                        <li><a href="PCPenReq.php">Pending</a></li>
                        <li><a href="PCRevReq.php">For Revision</a></li> 
                        <li><a href="PCAprReq.php">Approved for Requesting</a></li>  
                        <li><a class="active" href="PCDelReq.php">Approved for Delivery</a></li>  
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
                    <li><a href="PCDelReq.php">For Delivery / Delivered Requests</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
        <!--tab nav start-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#fordeliver">Requests Approved for Delivery</a>
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
                                    <header class="panel-heading" style="background-color: gray; color: white">
                                       Requests Approved For Delivery
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
                                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_summary_request` WHERE Status_Req = 'RELEASE' AND Accept_Status = 'PENDING'
                                                                                    ORDER BY Batch_No DESC ");
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
                                                                <a href="PCReviewDelv.php?viewrequests=<?php echo $bn; ?>" class="btn btn-info">View</a>               
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
                        <div id="delivered" class="tab-pane">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading" style="background-color: gray; color: white">
                                       Delivered Requests
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
                                            <th>Delivered Date</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_summary_request` WHERE Status_Req = 'RELEASE' AND Accept_Status = 'DELIVERED'
                                                                                    ORDER BY Batch_No DESC");
                                            while($row = mysqli_fetch_assoc($view_query))
                                                {
                                                    $bn = $row["Batch_No"];
                                                    $DR = $row["Date_Requested"];
                                                    $DApr = $row["Date_Approved"];  
                                                    $DRels = $row["Date_Released"];
                                                    $DDel = $row["Date_Delivered"];
                                                
                                        ?>      
                                                 <tr class="gradeX">
                                                        <td><?php echo $bn; ?></td>
                                                        <td><?php echo $DR; ?></td>
                                                        <td><?php echo $DApr; ?></td>
                                                        <td><?php echo $DRels; ?></td>
                                                        <td><?php echo $DDel; ?></td>
                                                        <td style='width:150px'>
                                                                <center>
                                                                <a href="PCReviewDelvDone.php?viewrequests=<?php echo $bn; ?>" class="btn btn-info">View</a>               
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
