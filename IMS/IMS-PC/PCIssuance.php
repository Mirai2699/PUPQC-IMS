<?php 
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");
?>

<title>Departmental Issuance | PUPQC IMS</title>

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
                    <a href="javascript:;">
                        <i class="fa  fa-envelope"></i>
                        <span>Requests</span>
                    </a>
                    <ul class="sub">
                        <li><a href="PCAddNewReq.php">Add New</a></li>
                        <li><a href="PCPenReq.php">Pending</a></li>
                        <li><a href="PCRevReq.php">For Revision</a></li> 
                        <li><a href="PCAprReq.php">Approved for Requesting</a></li>  
                        <li><a href="PCDelReq.php">Approved for Delivery</a></li>             
                    </ul>
                </li>
                <li>
                    <a class="active" href="PCIssuance.php">
                        <i class="fa  fa-upload"></i>
                        <span>Departmental Issuance</span>
                    </a>
                </li>
                <li>
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
                    <li><a href="PCIssuance.php">Issuance of Items for Departments</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="background-color: gray; color: white">
                        Issuance of Items for Departments
                    </header>
                <form class="col s12">

                  <div class="panel-body">
                   <p style="font-size: 15px"> Color Reference: </p>
                    <div>
                       <div class="col-md-4">
                        <div class="panel" style="background-color: #ff8a65; color: white; font-size: 17px">
                         <p style="margin: 13px; padding-top: 3px; padding-bottom: 3px">- For Approval / Pending 
                         </p>
                        </div> 
                      </div>
                       <div class="col-md-4">
                        <div class="panel" style="background-color: #4caf50; color: white; font-size: 17px">
                         <p style="margin: 13px; padding-top: 3px; padding-bottom: 3px">- For Issuance / Releasing 
                         </p>
                        </div> 
                      </div>
                       <div class="col-md-4">
                        <div class="panel" style="background-color: #81d4fa; color: white; font-size: 17px">
                         <p style="margin: 13px; padding-top: 3px; padding-bottom: 3px">- Released / Issued 
                         </p>
                        </div> 
                      </div>
                      <div class="panel" style="background-color: gray; padding: 1px"></div>
                    </div>

                    <div class="adv-table"> 
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        
                    <thead>
                        <tr>
                            <th>Batch No.</th>
                            <th>Date Requested</th>
                            <th>Status</th>
                            <th>Requested By</th>
                            <th>From Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_dept_summary_request` order by Batch_No DESC, Date_Requested DESC");
                                while($row = mysqli_fetch_array($view_query))
                                {
                                                $bn = $row["Batch_No"];
                                                $DR = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];      
                                                $AccID = $row["Account_Name"];
                                                $Status = $row["Status_Req"];
                                                $DptName = $row["Depart_Name"];

                                            echo
                                            "<tr>
                                                    <td>  $bn  </td>                                                           
                                                    <td>  ".$DR." </td>
                                                    <td>  ".$stat."   </td>
                                                    <td>  ".$AccID." </td>
                                                    <td>  ".$DptName." </td>
                                             ";
                                             
                                             if($Status == "PENDING")
                                             {
                                                echo       
                                                    "<td style='text-align:center'>
                                                         
                                                         <a href='PCISSReviewReq.php?viewrequests=$bn' class='btn btn-danger' >Review</a> 
                                                    </td>";
                                             }
                                             
                                             else if($Status == "APPROVED")
                                             {
                                                echo       
                                                    "<td style='text-align:center'>
                                                         
                                                         <a href='PCISSReviewApr.php?viewrequests=$bn' class='btn btn-success'>Review</a> 
                                                    </td>";
                                             }
                                             else if($Status == "RELEASED")
                                             {
                                                echo       
                                                    "<td style='text-align:center'>
                                                         
                                                         <a href='PCISSReviewRels.php?viewrequests=$bn' class='btn btn-info'>Review</a> 
                                                    </td>";
                                             }
                                             else if($Status == NULL)
                                             {
                                                echo    
                                                "<td style='text-align:center'>   
                                                    No Action Needed
                                                </td>";
                                             }
                                             echo " </tr>  ";
                                                        
                                }

                                
                                    ?>

      
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
