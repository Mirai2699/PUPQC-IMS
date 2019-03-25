<?php
     include ("DMHeader.php");
     include ("DMJSCore.php");
     include ("DMJSCustom.php");

    if (isset($_GET['viewrequests'])) 
    {
        $ids = $_GET['viewrequests'];
    } 
?>


    <title>Review Items Delivered from Requests | PUPQCIMS</title>

    
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a class="active" href="DMmainpage.php">
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
                        <li><a href="DMPenReq.php">Pending</a></li>
                        <li><a href="DMRevReq.php">For Revision</a></li> 
                        <li><a href="DMAprReq.php">Approved</a></li>
                        <li><a class="active" href="DMRelsReq.php">Released</a></li>                
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
      <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="DMmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DMRelsReq.php">Released / Printed Requests</a></li>
                    <li><a href="DMReviewRels.php?viewrequests=<?php echo $ids; ?>">Request Review</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header style="color: #FAFAFA;" class="panel-heading">
                            <label>Requests</label>
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>
                        
                        <?php  

                            //$ids = $row['Batch_No'];
                            $sql = "SELECT * FROM `ims_t_summary_request` WHERE Batch_No = $ids";


                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {
                              $datereq = $row['Date_Requested'];
                              $revdate = $row['Date_Revised'];
                              $dateapr = $row['Date_Approved'];
                              $daterels = $row['Date_Released'];
                              $remarks = $row['Remarks'];
                        ?>

                        <div class="panel-body">
                            <div class="row group"> 
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>Batch No.</label>
                                            <input type="text" name="Batch_Num" value="<?php echo $ids; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                               <div class="row" style="padding-left: 15px;" >
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Requested</label>
                                            <input type="Date" name="Drequested" value="<?php echo $datereq; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Revised</label>
                                            <input type="Date" name="Date_Revise" value="<?php echo $revdate; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Approved</label>
                                            <input type="Date" name="Date_Aprove" value="<?php echo $dateapr; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Released / Printed</label>
                                            <input type="Date" name="Date_Print" value="<?php echo $daterels; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <input type="text" name="PenRem" value="<?php echo $remarks; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                    </div>
                                </div>

                        <?php
                            }
                        ?>

                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Requests</label>
                                    <div class="adv-table">
                                        <table  class="display table table-bordered table-striped" id=" ">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">No</th>
                                                    <th>Item Name</th>
                                                    <th style="width:250px">Unit</th> 
                                                    <th style="width:150px">Quantity</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                    $sql = "SELECT * FROM `ims_t_summary_request` AS SUMREQ  
                                                            INNER JOIN `ims_t_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                                                 WHERE SUMREQ.Status_Req = 'RELEASE' AND REQ.Batch_No = $ids  
                                                            ORDER BY SUMREQ.Date_Requested DESC ";

                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                      $No = $row['Requisition_No'];
                                                      $name = $row['Item_Name'];
                                                      $unit = $row['Unit'];    
                                                      $quantity = $row['Quantity'];

                                                ?>

                                                <tr class="gradeX">
                                                    <td style="display: none"> <?php echo $No; ?> </td>
                                                    <td> <?php echo $name; ?> </td>
                                                    <td> <?php echo $unit; ?> </td>
                                                    <td> <?php echo $quantity; ?> </td>
                                                    
                                            
                                                    
                                                </tr>
                                                    <?php
                                                 }
                                            ?>             
                                        </tbody>
                                    </table>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px;">                                                             
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">                                                             
                                    </div>
                                </div>
                            </div>
                            <!--<a data-toggle="modal" class="btn btn-success" href="DMPrintRequest.php?viewrequests=<?php echo $ids; ?>">View</a>-->

                                <div class="col-md-12" style="text-align: right">
                                    <div class="form-group" style="padding-top:22px; text-align: right">
                                         <?php  

                                        //$ids = $row['Batch_No'];
                                        $sql = "SELECT * FROM `ims_t_summary_request` WHERE Batch_No = $ids";
                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                        while($row = mysqli_fetch_assoc($result))
                                        {  
                                            $batch = $row["Batch_No"];
                                            $status = $row["Accept_Status"];
                                            if($status == "PENDING")
                                            {
                                            echo "
                                                <a data-toggle='modal' href='#delivery' class='btn btn-default' style=' background-color: green ; padding-left: '>
                                                <i class='fa fa-truck'></i>
                                                Confirmation for Delivery
                                                </a> 
                                            "; }
                                         ?>
                                          


                                         
                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="delivery" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="text-align: center;">
                                                            <div class="modal-header">
                                                                <strong>
                                                                    Clicking this button means this request is approved for delivery.<br>
                                                                    Please Enter the Expected Date of Delivery
                                                                </strong>
                                                            </div>
                                                            <br>
                                                        <center>
                                                        <form role="form" action="ChangeStat.php" method="POST">
                                                            <div class="form-group">
                                                                <input type="hidden" name="r_batch" value="<?php echo $ids ?>">
                                                            </div>
                                                              <div class="panel" style="height: 60%; width: 50%">
                                                                    <img alt="" src="../../Resources/images/PUP/delivery.png" style="height: 20%; width: 20%"><br>
                                                                    <label>Date of Delivery</label>
                                                                    <input type="Date" name="DeliveryDate" class="form-control" required="" style="color: black;"  />
                                                                </div>
                                                            </center>
                                                                <div class="panel" style="height: 50%; width: 100%">
                                                                    <button class="btn btn-success btn-md" type="submit" name="DMDeliver">Confirm</button> &nbsp&nbsp&nbsp&nbsp
                                                                    <button data-dismiss="modal" class="btn btn-error btn-md">Go Back</button>
                                                                </div>
                                                                <br>
                                                            </div>
                                                          </form>
                                                    </div>
                                        </div>  


                                        &nbsp&nbsp
                                        <a data-toggle="modal" href="#Continue" class="btn btn-default" style=" background-color: steelblue ; padding-left: "><i class="fa fa-print"></i>    Re-Print</a>  
                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="text-align: center;">
                                                            <div class="modal-header">
                                                                You are about to re-print a request form. Are you sure you want to proceed?
                                                            </div>
                                                            <img alt="" src="../../Resources/images/PUP/printer.png" style="height: 20%; width: 20%">
                                                            <div class="panel" style="height: 50%; width: 100%">
                                                                 <a href="DMPrintRequest.php?viewrequests=<?php echo $ids; ?>" class="btn btn-success btn-lg"> Yes </a> &nbsp&nbsp&nbsp&nbsp
                                                                <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                            </div>  
                                        <?php } ?> 

                                        &nbsp&nbsp
                                        <a href="DMRelsReq.php" class="btn btn-default" style=" background-color: gray; padding-left: ">Go Back to Released Requests</a>          
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

</body>
</html>
