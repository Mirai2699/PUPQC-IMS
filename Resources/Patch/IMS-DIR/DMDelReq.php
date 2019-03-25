<?php
     include ("DMHeader.php");
     include ("DMJSCore.php");
     include ("DMJSCustom.php");

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
                    <a href="DMmainpage.php">
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
                        <li><a href="DMPenReq.php">Pending</a></li>
                        <li><a href="DMRevReq.php">For Revision</a></li> 
                        <li><a href="DMAprReq.php">Approved</a></li>    
                        <li><a href="DMRelsReq.php">Released</a></li>
                        <li><a class="active" href="DMDelReq.php">For Delivery</a></li> 
                        <li><a href="DMExpReq.php">Expired and Rejected</a></li>                 
                    </ul>
                </li>
                <li>
                    <a href="DMPPMP.php">
                        <i class="fa  fa-calendar"></i>
                        <span>PPMP</span>
                    </a>
                </li>
                 <li>
                    <a href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                   <ul class="sub" >
                        <li><a href="javascript:;">Requisition</a>
                           <ul class="sub" >
                              <li><a class="active" href="DMReportReqOff.php">Office Supplies</a></li>
                              <li><a href="DMReportReqMed.php">Medicinal Supplies</a></li> 
                              <li><a href="DMReportReqCli.php">Clinical Supplies</a></li>       
                          </ul>
                        </li>
                        </li>     
                        <li><a href="javascript:;">Acquisition</a>
                           <ul class="sub">
                              <li><a href="DMReportAcqOff.php">Office Supplies</a></li>
                              <li><a href="DMReportAcqMed.php">Medicinal Supplies</a></li> 
                              <li><a href="DMReportAcqCli.php">Clinical Supplies</a></li>       
                          </ul>
                        </li>
                        <li><a href="DMReportIss.php">Issuance</a></li> 
                        <li><a href="javascript:;">Inventory Stocks</a>
                           <ul class="sub">
                              <li><a href="DMReportInvOff.php">Office Supplies</a></li>
                              <li><a href="DMReportInvMed.php">Medicinal Supplies</a></li> 
                              <li><a href="DMReportInvCli.php">Clinical Supplies</a></li>       
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
                    <li><a href="DMmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DMDelReq.php">For Delivery / Delivered Requests</a></li>
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
                                    <header class="panel-heading">
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
                                            <th>Expected Date of Delivery</th> 
                                            <th>Date of Expiration</th>
                                            <th>Level of Urgency</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_summary_request` WHERE Status_Req = 'RELEASE' AND Accept_Status = 'APPROVED'
                                                                                    ORDER BY Batch_No DESC ");
                                            while($row = mysqli_fetch_assoc($view_query))
                                                {
                                                    $bn = $row["Batch_No"];
                                                    $DR = $row["Date_Requested"];
                                                    $DApr = $row["Date_Approved"];  
                                                    $DRels = $row["Date_Released"];
                                                    $DDel = $row["Date_Delivery"]; 
                                                    $DExp = $row["Date_Expired"];
                                                    $Urg = $row["Level_Urgency"];  
                                                
                                        ?>      
                                                 <tr class="gradeX">
                                                        <td><?php echo $bn; ?></td>
                                                        <td><?php echo $DR; ?></td>
                                                        <td><?php echo $DApr; ?></td>
                                                        <td><?php echo $DRels; ?></td>
                                                        <td><?php echo $DDel?></td>
                                                        <td><?php echo $DExp; ?></td>
                                                        <td style='width:150px'><?php echo $Urg; ?></td>
                                                        <td>
                                                                <center>
                                                                <a href="DMReviewDelv.php?viewrequests=<?php echo $bn; ?>" class="btn btn-info">View</a>               
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
                                    <header class="panel-heading">
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
                                            <th>Expected Date of Delivery</th> 
                                            <th>Date of Expiration</th>
                                            <th>Level of Urgency</th>
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
                                                    $DDel = $row["Date_Delivery"];  
                                                    $DExp = $row["Date_Expired"];
                                                    $Urg = $row["Level_Urgency"];  
                                                
                                        ?>      
                                                 <tr class="gradeX">
                                                        <td><?php echo $bn; ?></td>
                                                        <td><?php echo $DR; ?></td>
                                                        <td><?php echo $DApr; ?></td>
                                                        <td><?php echo $DRels; ?></td>
                                                        <td><?php echo $DDel?></td>
                                                        <td><?php echo $DExp; ?></td>
                                                        <td><?php echo $Urg; ?></td>
                                                        <td style='width:150px'>
                                                                <center>
                                                                <a href="DMReviewDelv.php?viewrequests=<?php echo $bn; ?>" class="btn btn-info">View</a>               
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
