<?php
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");

?>



<title>Requisition Report | PUPQC IMS</title>


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
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="active" >
                        <li><a class="active" href="PCReportReqOff.php">Requisition</a></li>     
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
                    <li><a href="PCReportReqOff.php">Requisition Report</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>

 <!-- TABLE START -->
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="background-color: gray; color:white">
                        Requisition Report
                    </header>
                        <form class="col s12" method="POST">

                          <div class="panel-body">
                            <div class="adv-table">
                                <div class="col-md-12" style="text-align: left">
                                     <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Filter Type:</label>
                                            <select class="form-control" name="filterstat" style="color: black;">
                                                <option selected value="ALL">All</option>
                                                <option value="DATE">By Range of Date Requested</option>
                                                <option value="ALLWB">By Batch</option>
                                                <option value="PENDING">Status: Pending</option>
                                                <option value="REVISE">Staus: For Revision</option>
                                                <option value="APPROVED">Status: Approved</option>
                                                <option value="RELEASE">Status: Releases</option>
                                                
                                           </select>
                                           <br>
                                       </div>
                                     </div>
                                     <div class="col-md-2">
                                        <div class="form-group">
                                        <label>Filter by Batch No.</label>
                                            <input type="number" class="form-control" name="batchno">
                                           <br>
                                       </div>
                                     </div>
                                     
                                     <div class="col-md-5" style="border-style: solid; border-width: 1px">
                                        <label>Filter by Date Requested</label>
                                        <div class="form-group">
                                          <div class="col-md-6">
                                            <input id="startdate" style="color: black;" type="date" name="StartDate" class="form-control"/>
                                          </div>
                                          <div class="col-md-6">
                                            <input id="enddate" style="color: black;" type="date" name="EndDate" class="form-control"/>
                                          </div>
                                       </div>
                                     </div>
                                     
                                        <div class="col-md-1" style="margin-top: 21px">
                                            <button type="submit" class="btn btn-info" name="FilterOFFRequisition">Filter</button><br> 
                                        </div>
                                        <div class="col-md-1" style="margin-top: 21px">
                                                  <button class="btn btn-success" onclick="printDiv('printablearea')" name="Print"><i class="fa fa-print"></i>   Print</button>
                                        </div>
                                </div>
                            </form>
                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <th>Date Requested</th>
                                            <th>Status</th>
                                            <th>Batch No.</th>
                                            <th>Item Name</th>
                                            <th>Item Quantity</th>                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                              include("MasterReportView.php");
                                                    
                                            ?>

                                    </tbody>
                                </table>
                         <div style="display: none" id="printablearea">
                                <div class="">
                                     <img  src="../../Resources/images/PUP/QCheader.png" style="height:40%; width:60%; "> 
                                </div>
                                <div style="margin-top: 10px; margin-left: 15px">
                                    <div style="text-align: left; ">
                                        <h5 style="font-size: 15px; text-align: right">Report No. ORR-<?php echo date('m-d'); ?> </h5>
                                        <h5 style="font-size: 15px">Date Generated: <br>
                                            <?php echo date('F d, Y'); ?>
                                        </h5>
                                        <center>
                                            <b style="font-size: 20px">Office Supplies Requisition Report</b><br>
                                        </center>
                                        <h5>Report Description:</h5> 
                                        <p style="text-align: justify; font-size: 14px">   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                            This report is shoes the details of the university campus' office supplies detailed information of the requisition records. Details may be filtered by the one who generated this report in order to specify the significant details of the said report.
                                        </p>
                                       
                                    </div>
                                    
                                    <hr>
                                    <h5>Table Description:</h5> 
                                        <p style="text-align: justify; font-size: 14px">   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                            The table below shows the filtered details of office supply items requisition records as of <?php echo date('m-d-Y') ?>.
                                        </p>
                                     <table  class="display table table-bordered table-striped" id="dynamic-tabl">
                                            <thead>
                                                <tr>
                                                    <th>Date Requested</th>
                                                    <th>Status</th>
                                                    <th>Batch No.</th>
                                                    <th>Item Name</th>
                                                    <th>Item Quantity</th>                        
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                      include("MasterReportView.php");
                                                            
                                                    ?>

                                            </tbody>
                                        </table>
                                        <br>
                                    <div style="text-align: left;">
                                        <hr>
                                        <h5>Report Generated By: <br><br><br>
                                                             <?php
                                                                                         $id = $_SESSION['AccountID'];
                                                                                         $sqlemp= "SELECT * FROM `pso_r_employee_profile` AS EMP 
                                                                                                    INNER JOIN  `pso_r_user` AS ACC WHERE ACC.U_ID = '$id' and
                                                                                                    EMP.EP_ID = ACC.EP_ID";
                                                                                                    $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                                    while($row = mysqli_fetch_assoc($results))
                                                                                                            {
                                                                                                                $fname = $row['EP_FNAME'];
                                                                                                                $mname = $row['EP_MNAME'];
                                                                                                                $lname = $row['EP_LNAME'];
                                                                                                                $job = $row["EP_TYPE"];
                                                                                                            
                                                                      ?>
                                                                     
                                                                      <br>
                                                                                         <p><b><?php  echo $fname.' '.$mname.'. '.$lname; ?></b>
                                                                                            <br><br>
                                                                                         <?php echo $job.''.', PUPQC'; ?>
                                                                                         </p>
                                                                            <?php } ?>
                                                               </h5> 
                                            
                                    <br>
                                    <hr>
                                    <p>PUPQC Inventory Management System <?php echo date('Y')?></p>
                                    </div>
                                </div>
                            </div>
                      </div>
                     
                    </div>
            </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>




    <script> 
    function printDiv(printablearea)
    {
        var printContents = document.getElementById(printablearea).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        
        window.print();
        
        document.body.innerHTML = originalContents;
    }
    </script>

   
</body>
</html>
