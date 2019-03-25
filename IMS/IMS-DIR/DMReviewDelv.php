<?php

     include ("DMHeader.php");
     include ("DMJSCore.php");
     include ("DMJSCustom.php");

    if (isset($_GET['viewrequests'])) 
    {
        $ids = $_GET['viewrequests'];
    } 
?>


    <title>Review Requests | PUPQCIMS</title>

   
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
      <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="DMmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DMDelReq.php">For Delivery / Delivered Requests</a></li>
                    <li><a href="DMReviewDelv.php?viewrequests=<?php echo $ids; ?>">Request Review</a></li>
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
                              $daterels = $row['Date_Released'];
                              $datedel = $row['Date_Delivery'];
                              $datedelv = $row['Date_Delivered'];
                              $dateexp = $row['Date_Expired'];
                              $level = $row['Level_Urgency'];
                              $status = $row['Accept_Status'];
                        ?>

                        <div class="panel-body">
                            <div class="row group"> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Batch No.</label>
                                            <input type="text" name="Batch_Num" value="<?php echo $ids; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Requested</label>
                                            <input type="Date" name="Drequested" value="<?php echo $datereq; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date of Expiration</label>
                                            <input type="Date" name="Dexpired" value="<?php echo $dateexp; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                   <div class="col-md-3">
                                     <div class="form-group">
                                        <label>Level of Urgency</label>
                                        <input type="text" name="PenRem" value="<?php echo $level; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                     </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Released</label>
                                            <input type="Date" name="Date_Aprove" value="<?php echo $daterels; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Expected Date of Delivery</label>
                                            <input type="Date" name="Drequested" value="<?php echo $datedel; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="text" name="status" value="<?php echo $status; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Delivered</label>
                                            <input type="Date" name="Datedelv" value="<?php echo $datedelv; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
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
                                                    <th style="width:250px">Category</th> 
                                                    <th style="width:150px">Quantity</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                    $sql = "SELECT * FROM `ims_t_summary_request` AS SUMREQ  
                                                            INNER JOIN `ims_t_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                                                 WHERE SUMREQ.Status_Req = 'RELEASE' AND Accept_Status = 'APPROVED' OR Accept_Status = 'DELIVERED' AND REQ.Batch_No = $ids  
                                                            ORDER BY SUMREQ.Date_Requested DESC ";

                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                      $No = $row['Requisition_No'];
                                                      $name = $row['Item_Name'];
                                                      $cat = $row['Item_Category'];    
                                                      $quantity = $row['Quantity'];

                                                ?>

                                                <tr class="gradeX">
                                                    <td style="display: none"> <?php echo $No; ?> </td>
                                                    <td> <?php echo $name; ?> </td>
                                                    <td> <?php echo $cat; ?> </td>
                                                    <td> <?php echo $quantity; ?> </td>
                                                    
                                            
                                                    
                                                </tr>
                                                    <?php
                                                 }
                                            ?>             
                                        </tbody>
                                    </table>
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
                            <div class="col-md-12" style="text-align: right">
                                    <div class="form-group" style="padding-top:22px; text-align: right">
                                        <a href="DMDelReq.php" class="btn btn-default" style=" background-color: gray; padding-left: ">Go Back</a>          
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
