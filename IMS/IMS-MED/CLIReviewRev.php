<?php
     include("MEDJSHeader.php");
     include("MEDJSCore.php");
     include("MEDJSCustom.php");

    if (isset($_GET['viewrequests'])) 
    {
        $ids = $_GET['viewrequests'];

    }
?>



<title>Review Requests for Revision | PUPQCIMS</title>


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
                    <a href="javascript:;">
                        <i class="fa  fa-medkit"></i>
                        <span>Medicinal Items</span>
                    </a>
                    <ul class="sub" >
                        <li><a href="javascript:;"><i class="fa  fa-envelope"></i>Requisition</a>
                            <ul class="sub">
                                <li><a href="MEDAddNewReq.php">Add New Items</a></li>
                                <li><a href="MEDPenReq.php">Pending Requests</a></li>
                                <li><a href="MEDRevReq.php">Requests for Revision</a></li>
                                <li><a href="MEDAprReq.php">Approved Requests</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:;"><i class="fa  fa-download"></i>Acquisition</a>
                            <ul class="sub">
                                <li><a href="MEDDelivery.php">Delivery</a></li>
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
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-plus-circle"></i>
                        <span>Clinical Items</span>
                    </a>
                    <ul class="active" >
                        <li><a class="active" href="javascript:;"><i class="fa  fa-envelope"></i>Requisition</a>
                            <ul class="active" >
                                <li><a href="CLIAddNewReq.php">Add New Items</a></li>
                                <li><a href="CLIPenReq.php">Pending Requests</a></li>
                                <li><a class="active" href="CLIRevReq.php">Requests for Revision</a></li>
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
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="MEDmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="CLIRevReq.php">Requests for Revision</a></li>
                    <li><a href="CLIReviewRev.php?viewrequests=<?php echo $ids; ?>">Request for Revision Review</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                       <header style="color: white; background-color: gray" class="panel-heading">
                            Request Review
                        </header>
                        
                        <?php  

                            //$ids = $row['Batch_No'];
                            $sql = "SELECT * FROM `ims_t_clinic_summary_request` WHERE Batch_No = $ids";


                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {
                              $datereq = $row['Date_Requested'];
                              $revdate = $row['Date_Revised'];
                        ?>

                        <div class="panel-body">
                            <div class="row group"> 
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
                                            <label>Date Revised</label>
                                            <input type="Date" name="Drequested" value="<?php echo $revdate; ?>" class="form-control" readonly="" disabled style="color: black;" />
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
                                                    <th>Item Category</th>
                                                    <th style="width:150px">Unit</th>
                                                    <th style="width:150px">Quantity</th>
                                                    <th style="width:100px">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                            <?php
                                               $sql = "SELECT * FROM `ims_t_clinic_summary_request` AS SUMREQ  
                                                            INNER JOIN `ims_t_clinic_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                                                 WHERE SUMREQ.Status_Req = 'REVISE' AND REQ.Batch_No = $ids  
                                                            ORDER BY SUMREQ.Date_Requested DESC ";

                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    while($row = mysqli_fetch_assoc($result))
                                                    { 
                                                      $No = $row['Requisition_No'];
                                                      $name = $row['CLI_Name'];
                                                      $category = $row['CLI_Category'];
                                                      $unit = $row['CLI_Unit'];
                                                      $quantity = $row['CLI_Quantity'];

                                                    ?>

                                                    <tr class="gradeX">
                                                        <td style="display: none"> <?php echo $No; ?> </td>
                                                        <td> <?php echo $name; ?> </td>
                                                        <td> <?php echo $category; ?> </td>
                                                        <td> <?php echo $unit; ?> </td>
                                                        <td> <?php echo $quantity; ?> </td>
                                                    
                                                        <td>
                                                            <center>
                                                            <a data-toggle="modal" href="#Change<?php echo $No; ?>" class="btn btn-warning">Edit</a>
                                                            </center>
                                                       </td>
                                                    
                                                </tr>

                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Change<?php echo $No; ?>" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                              <div style="text-align: right"> 
                                                                 <button data-dismiss="modal">x</button>
                                                             </div>

                                                                <h4 class="modal-title">Edit Details for Revision</h4>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form role="form" method="POST" action="ChangeStat.php">
                                                                   

                                                                    <div class="form-group">
                                                                        <input style="display: none;" type="text" name="ReqNo" value="<?php echo $No; ?>" class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input style="display: none;" type="text" name="r_batch" value="<?php echo $ids; ?>" class="form-control"/>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Item Name</label>
                                                                        <input style="color: black;" type="text" name="r_name" value="<?php echo $name; ?>" class="form-control"readonly/>
                                                                    </div>
                                                                    
                                                                   

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Change Quantity</label>
                                                                        <input style="color: black;" type="number" name="r_quan" value="<?php echo $quantity; ?>" class="form-control" min=1 max=20/>
                                                                    </div>

                                                                    <br><hr>
                                                                   
                                                                    <button type="submit" class="btn btn-success" name="CLIsave">Save</button>
                                                                    &nbsp&nbsp
                                                                   
                                                                        <br>
                                                                    

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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
                            <form role="form" method="POST" action="ChangeStat.php">
                            <div class="row group">              

                                   <div class="form-group">
                                     <input style="display: none;" type="text" name="r_batch" value="<?php echo $ids; ?>" class="form-control"/>
                                   </div>                                          
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Change Remarks</label>
                                        <select name="r_rmrks" class="form-control" style="color: black;" value="<?php echo $unit; ?>" required="">
                                            <option selected disabled value=""></option>
                                            <option value="Not So Urgent">Not So Urgent (Low Priority)</option>
                                            <option value="Urgent">Urgent (Medium Priority)</option>
                                            <option value="Very Urgent">Very Urgent (High Priority)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="padding-top:22px;">
                                         <a data-toggle="modal" href="#Continue" class="btn btn-success">Re-Send</a>   
                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="text-align: center;">
                                                            <div class="modal-header">
                                                                You are about to finalize the following changes. Are you sure you want to proceed?
                                                            </div>
                                                            <img alt="" src="../../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                            <div class="panel" style="height: 50%; width: 100%">
                                                                <button type="submit" class="btn btn-success btn-lg" name="CLIResend">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
                                                                <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                            </div>
                                        <a href="CLIRevReq.php" class="btn btn-default" style=" background-color: gray; padding-left: ">Go Back to Requests for Revision</a>          
                                    </div>

                                </div>

                            </div>
                          </form>
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
