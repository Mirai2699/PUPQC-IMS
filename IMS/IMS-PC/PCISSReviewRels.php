<?php 
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");


    if (isset($_GET['viewrequests'])) 
    {
        $ids = $_GET['viewrequests'];
    } 
?>

<title>Review Issuance | PUPQCIMS</title>

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
                        <li><a href="PCTotalReq.php">Requisition</a></li>     
                        <li><a href="PCTotalAcq.php">Delivery</a></li>
                        <li><a href="PCTotalIssue.php">Issuance</a></li> 
                        <li><a href="PCTotalStock.php">Inventory Stocks</a></li>               
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
                    <li><a href="PCmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="PCIssuance.php">Issuance of Items for Departments</a></li>
                    <li><a href="PCISSReviewRels.php?viewrequests=<?php echo $ids?>">Review Issued Departmental Requests</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header style="color: white; background-color: gray" class="panel-heading">
                            Departmental Requests (RELEASES)
                        </header>

                        <?php  

                            $sql = "SELECT * FROM `ims_t_dept_summary_request` WHERE Batch_No = $ids";

                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {
                              $datereq = $row['Date_Requested'];
                              $Aprdate = $row['Date_Approved'];
                              $Issdate = $row['Date_Released'];
                              $Dname = $row['Depart_Name'];
                              $claimer = $row['Account_Name'];
                              $remarks = $row['Remarks'];
                        ?>

                        <div class="panel-body">
                            <div class="row group"> 
                                    <div class="col-md-2">
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
                                   <!--  <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Revised</label>
                                            <input type="Date" name="Drevise" value="<?php echo $revdate; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div> -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Approved</label>
                                            <input type="Date" name="Dapprove" value="<?php echo $Aprdate; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Issued</label>
                                            <input type="Date" name="Drelease" value="<?php echo $Issdate; ?>" class="form-control" readonly="" disabled style="color: black;" />   
                                        </div>
                                    </div>
                                     <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Issued to Department:</label>
                                            <input type="text" name="Drequested" value="<?php echo $Dname; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Requested and Claimed By:</label>
                                            <input type="text" name="Drevise" value="<?php echo $claimer; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                   <!--  <div class="col-md-11">
                                        <div class="form-group">
                                            <label>Remarks</label>
                                            <input type="text" name="PenRem" value="<?php echo $remarks; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div> -->
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
                                                    <th style="display: none">No</th>
                                                    <th>SKU</th>
                                                    <th>Item Name</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                    $sql = "SELECT * FROM `ims_t_dept_issuance` WHERE Batch_No = $ids  
                                                            ORDER BY Date_Issued DESC ";

                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                      $sku = $row['SKU'];
                                                      $name = $row['Item_Name'];
                                                      $quantity = $row['Quantity'];

                                                ?>

                                                <tr class="gradeX">
                                                    <td style="display: none"> <?php echo $No; ?> </td>
                                                    <td> <?php echo $sku; ?> </td>
                                                    <td> <?php echo $name; ?> </td>
                                                    <td> <?php echo $quantity; ?> </td>
                                                </tr>

                                                <?php
                                                    }
                                                ?>
                                            </tbody><!--
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
                                                </tr>

                                                <?php
                                                    }
                                                ?>
                                            </tbody>-->
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
                            <div class="col-md-12" style="text-align: right">
                                <a href="PCIssuance.php" class="btn btn-default" style=" background-color: gray;">Go Back</a>
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
