<?php
     include("DPJSHeader.php");
     include("DPJSCore.php");
     include("DPJSCustom.php");

    if (isset($_GET['viewrequests'])) 
    {
        $ids = $_GET['viewrequests'];

    }
?>


    <title>Review Pending Requests | PUPQCIMS</title>


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
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-envelope"></i>
                        <span>Requests</span>
                    </a>
                    <ul class="active" >
                        <li><a href="DPAddNewReq.php">Add New</a></li>
                        <li><a class="active" href="DPPenReq.php">Pending</a></li>
                        <li><a href="DPAprReq.php">Approved</a></li>                   
                    </ul>
                </li>
                  <li>
                    <a href="DPAcquired.php">
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
                    <li><a href="DPPenReq.php">Pending Requests</a></li>
                    <li><a href="DPReviewPen.php?viewrequests=<?php echo $ids; ?>">Request Review</a></li>
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
                        ?>

                        <div class="panel-body">
                            <div class="row group"> 
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Request No.</label>
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
                                                    <th>SKU</th>
                                                    <th>Item Name</th>
                                                    <th style="width:150px">Quantity</th>
                                                    <th style="width:100px">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                    $sql = "SELECT * FROM `ims_t_dept_summary_request` AS SUMREQ  
                                                            INNER JOIN `ims_t_dept_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                                            INNER JOIN `ims_r_office_stock` AS STK ON STK.Stock_Key_Unit = REQ.Item_SKU
                                                                 WHERE SUMREQ.Status_Req = 'PENDING' AND REQ.Batch_No = $ids  
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
                                                                        <label id="itemLabel">Item Name</label>
                                                                       <select id="ddCategory" class="form-control" style="color: black;" required="" name="SKU" >
                                                                            <option selected value="<?php echo $sku; ?> "><?php echo $name; ?> </option>
                                                                              <?php  
                                                                                  $sqlemp= "SELECT * FROM `ims_r_office_stock`";
                                                                                  $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                  while($row = mysqli_fetch_assoc($results))
                                                                                   {  
                                                                                      $skus = $row['Stock_Key_Unit'];
                                                                                      $names = $row['Item_Name'];
                                                                                      $cats = $row['Item_Category'];
                                                                            ?>
                                                                            <option value="<?php echo $skus ?>"><?php echo $cats.' --- '.$names; ?></option>
                                                                             <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                   

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Change Quantity</label>
                                                                        <input style="color: black;" type="number" name="r_quan" value="<?php echo $quantity; ?>" minlength="2" min="1" max="20" class="form-control"/>
                                                                    </div>

                                                                    <br><hr>
                                                                   
                                                                    <button type="submit" class="btn btn-success" name="DPPENsave">Save</button>
                                                                    

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
                             

                                 <!--   <div class="form-group">
                                     <input style="display: none;" type="text" name="r_batch" value="<?php echo $ids; ?>" class="form-control"/>
                                   </div>  

                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Change Remarks</label>
                                        <input maxlength="150" type="text" name="r_rmrks" class="form-control"/>
                                    </div>
                                </div> -->

                                <div class="col-md-10;" style="text-align: right">
                                    <div class="form-group" style="padding-top:10px;">
                                         <!-- <a data-toggle="modal" href="#Continue" class="btn btn-success">Save</a>   
                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="text-align: center;">
                                                            <div class="modal-header">
                                                                You are about to save the following changes. Are you sure you want to proceed?
                                                            </div>
                                                            <img alt="" src="../../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                            <div class="panel" style="height: 50%; width: 100%">
                                                                <button type="submit" class="btn btn-success btn-lg" name="DPPenBatchSave">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
                                                                <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                            </div> -->
                                        <a href="DPPenReq.php" class="btn btn-default" style=" background-color: gray; ">Go Back to Pending Requests</a>          
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
