<?php
     include("DPJSHeader.php");
     include("DPJSCore.php");
     include("DPJSCustom.php");

    if (isset($_GET['viewrequests'])) 
    {
        $ids = $_GET['viewrequests'];

    }
?>



    <title>Review Claimed Requests | PUPQCIMS</title>

<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a href="DPmainpage.php">
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
                        <li><a href="DPAddNewReq.php">Add New</a></li>
                        <li><a href="DPPenReq.php">Pending</a></li>
                        <li><a href="DPAprReq.php">Approved</a></li>                   
                    </ul>
                </li>
                  <li>
                    <a class="active" href="DPAcquired.php">
                        <i class="fa  fa-download"></i>
                        <span>Claimed Items</span>
                    </a>
                </li>
               
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">
                        <li><a href="DPTotalAcq.php">Procurement</a></li>               
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
                    <li><a href="DPmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DPAcquired.php">Claimed Items</a></li>
                    <li><a href="DPReviewRel.php?viewrequests=<?php echo $ids; ?>">Review Items</a></li>
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
                            $sql = "SELECT * FROM `ims_t_dept_summary_request` WHERE Batch_No = $ids";


                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {
                              $datereq = $row['Date_Requested'];
                              $revdate = $row['Date_Revised'];
                              $aprdate = $row['Date_Approved'];
                              $reldate = $row['Date_Released'];
                              $dateexp = $row['Date_Expired'];
                              $level = $row['Level_Urgency'];
                              $rmks = $row['Remarks'];
                        ?>

                        <div class="panel-body">
                            <div class="col-md-2">
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
                                            <label>Date Revised</label>
                                            <input type="Date" name="Drequested" value="<?php echo $revdate; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Approved</label>
                                            <input type="Date" name="Date_apr" value="<?php echo $aprdate; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Issued</label>
                                            <input type="Date" name="Date_apr" value="<?php echo $reldate; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                     <div class="form-group">
                                        <label>Remarks</label>
                                        <input type="text" name="PenRem" value="<?php echo $rmks; ?>" class="form-control" readonly="" disabled style="color: black;" />
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
                                                    <th>SKU</th>
                                                    <th>Item Name</th>
                                                    <th style="width:150px">Quantity</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                    $sql = "SELECT * FROM `ims_t_dept_summary_request` AS SUMREQ
                                                            INNER JOIN `ims_t_dept_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                                            INNER JOIN `ims_r_office_stock` AS STK ON STK.Stock_Key_Unit = REQ.Item_SKU
                                                                 WHERE  REQ.Batch_No = $ids  
                                                            ORDER BY SUMREQ.Date_Requested DESC ";


                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                      $No = $row['DeptReq_No'];
                                                      $sku = $row['Item_SKU'];
                                                      $name = $row['Item_Name'];
                                                      $quantity = $row['DR_Quantity'];

                                                ?>

                                                <tr class="gradeX">
                                                    <td style="display: none"> <?php echo $No; ?> </td>
                                                    <td> <?php echo $sku; ?> </td>
                                                    <td> <?php echo $name; ?> </td>
                                                    <td> <?php echo $quantity; ?> </td>

                                            

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
                            <div class="row group">              

                                <div class="col-md-12">
                                    <div class="col-md-12" style="padding-top:15px; text-align: right">
                                        <a href="DPAcquired.php" class="btn btn-default" style=" background-color: gray; margin-bottom: 10px ">Go Back Acquired Items </a>          
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


</section>

</body>
</html>
