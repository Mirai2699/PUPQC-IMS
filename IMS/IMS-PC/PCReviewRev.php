<?php 
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");

    if (isset($_GET['viewrequests'])) 
    {
        $ids = $_GET['viewrequests'];

    } 
    
?>
<title>Review Requests | PUPQCIMS</title>

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
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-envelope"></i>
                        <span>Requests</span>
                    </a>
                    <ul class="active" >
                        <li><a href="PCAddNewReq.php">Add New</a></li>
                        <li><a href="PCPenReq.php">Pending</a></li>
                        <li><a class="active" href="PCRevReq.php">For Revision</a></li> 
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
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="PCmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="PCRevReq.php">Requests for Revisions</a></li>
                    <li><a href="PCReviewRev.php?viewrequests=<?php echo $ids; ?>">Request Review</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header style="color: white; background-color: gray" class="panel-heading">
                            <label>Request Review</label>
                        </header>
                        
                        <?php  

                            //$ids = $row['Batch_No'];
                            $sql = "SELECT * FROM `ims_t_summary_request` WHERE Batch_No = $ids";


                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {
                              $datereq = $row['Date_Requested'];
                              $revdate = $row['Date_Revised'];
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
                                                    <th style="width:250px">Category</th> 
                                                    <th style="width:150px">Quantity</th>
                                                    <th style="width:100px">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                    $sql = "SELECT * FROM `ims_t_summary_request` AS SUMREQ  
                                                            INNER JOIN `ims_t_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                                                 WHERE SUMREQ.Status_Req = 'REVISE' AND REQ.Batch_No = $ids  
                                                            ORDER BY SUMREQ.Date_Requested DESC ";

                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                      $No = $row['Requisition_No'];
                                                      $name = $row['OFF_Name'];
                                                      $cat = $row['OFF_Category'];    
                                                      $quantity = $row['OFF_Quantity'];

                                                ?>

                                                <tr class="gradeX">
                                                    <td style="display: none"> <?php echo $No; ?> </td>
                                                    <td> <?php echo $name; ?> </td>
                                                    <td> <?php echo $cat; ?> </td>
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
                                                                        <input style="color: black;" type="text" name="r_name" value="<?php echo $name; ?>" class="form-control"disabled/>
                                                                    </div>
                                                                    

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Change Quantity</label>
                                                                        <input style="color: black;" type="number" name="r_quan" value="<?php echo $quantity; ?>" min="0" max="50" maxlength="2" class="form-control"/>
                                                                    </div>

                                                                    <br><hr>
                                                                   
                                                                    <button type="submit" class="btn btn-success" name="PCsave">Save</button>
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
                                        <div class="form-group">
                                        <a data-toggle="modal" href="#Continue" class="btn btn-success">Re-Send</a>   
                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="text-align: center;">
                                                            <div class="modal-header">
                                                                You are about to finalize the following changes. Are you sure you want to proceed?
                                                            </div>
                                                            <img alt="" src="../../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                            <div class="panel" style="height: 50%; width: 100%">
                                                                <button type="submit" class="btn btn-success btn-lg" name="Resend">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
                                                                <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                            </div> 
                                        <a href="PCRevReq.php" class="btn btn-default" style=" background-color: gray; padding-left: ">Go Back to Requests for Revision</a>          
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
