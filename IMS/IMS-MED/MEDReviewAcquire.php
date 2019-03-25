<?php 
     include ("MEDJSHeader.php");
     include ("MEDJSCore.php");
     include ("MEDJSCustom.php");

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
                    <a href="MEDmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-medkit"></i>
                        <span>Medicinal Items</span>
                    </a>
                     <ul class="active" >
                        <li><a href="javascript:;"><i class="fa  fa-envelope"></i>Requisition</a>
                            <ul class="sub">
                                <li><a href="MEDAddNewReq.php">Add New Items</a></li>
                                <li><a href="MEDPenReq.php">Pending Requests</a></li>
                                <li><a href="MEDRevReq.php">Requests for Revision</a></li>
                                <li><a href="MEDAprReq.php">Approved Requests</a></li>
                            </ul>
                        </li>
                        <li><a class="active" href="javascript:;"><i class="fa  fa-download"></i>Acquisition</a>
                            <ul class="active" >
                                <li><a class="active" href="MEDDelivery.php">Delivery</a></li>
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
                    <a href="javascript:;">
                        <i class="fa  fa-plus-circle"></i>
                        <span>Clinical Items</span>
                    </a>
                    <ul class="sub">
                        <li><a href="javascript:;"><i class="fa  fa-envelope"></i>Requisition</a>
                            <ul class="sub">
                                <li><a href="CLIAddNewReq.php">Add New Items</a></li>
                                <li><a href="CLIPenReq.php">Pending Requests</a></li>
                                <li><a href="CLIRevReq.php">Requests for Revision</a></li>
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
                    <li><a href="MEDAcquire.php">Items For Acquiring</a></li>
                    <li><a href="MEDReviewAcquire.php?viewrequests=<?php echo $ids; ?>">Items Review</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading" style="color: white; background-color: gray ">
                            Items Delivered
                        </header>
                        
                        <?php  

                            //$ids = $row['Batch_No'];
                            $sql = "SELECT * FROM `ims_t_med_summary_request` WHERE Batch_No = $ids";


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
                                                    <th style="width:150px">Quantity</th>
                                                    <th style="width:150px">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                    $sql = "SELECT * FROM `ims_t_med_summary_request` AS SUMREQ  
                                                            INNER JOIN `ims_t_med_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                                                 WHERE SUMREQ.Status_Req = 'RELEASED' AND REQ.Batch_No = $ids  AND REQ.Status = 'PENDING'
                                                            ORDER BY SUMREQ.Date_Requested DESC ";

                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                      $No = $row['Requisition_No'];
                                                      $name = $row['Item_Name'];
                                                      $cat = $row['Item_Category'];
                                                      $unit = $row['MED_Unit'];
                                                      $quantity = $row['MED_Quantity'];

                                                ?>

                                                <tr class="gradeX">
                                                    <td style="display: none"> <?php echo $No; ?> </td>
                                                    <td> <?php echo $name; ?> </td>
                                                    <td> <?php echo $quantity; ?> </td>
                                                    <td>
                                                        <center>
                                                            <a data-toggle="modal" href="#release<?php echo $No; ?>" class="btn btn-warning"><i class="fa  fa-refresh"></i>  Evaluate Item</a>
                                                        </center>
                                                    </td>
                                                </tr>

                                                 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="release<?php echo $No; ?>" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                              <div style="text-align: right"> 
                                                                 <button data-dismiss="modal">x</button>
                                                             </div>
                                                              <h4 class="modal-title">Evaluation of Items Delivered for Procurement</h4>

                                                                                <!--START OF EXISTING-->
                                                                               <form role="form" method="POST" action="F_Med_Acquisition.php">
                                                                                    <div class="form-group">
                                                                                        <input style="display: none;" type="text" name="a_No" value="<?php echo $No; ?>" class="form-control"/>
                                                                                    </div>
                                                                                     <div class="form-group">
                                                                                        <input style="display: none;" type="text" name="a_batch" value="<?php echo $ids; ?>" class="form-control"/>
                                                                                    </div>
                                                                                     <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;"></div>
                                                                                        </div>
                                                                                     </div>
                                                                                    
                                                                                    <div class="col-md-12">
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="exampleInputEmail1">Date of Procurement</label>
                                                                                                <input style="color: black;" type="Date" name="a_procdate" value="<?php echo date('Y-m-d') ?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                                 <div class="form-group">
                                                                                                    <label for="exampleInputEmail1">Expiration Date</label>
                                                                                                    <input style="color: black;" type="date" id="newexpdate"  name="a_expdate" class="form-control" required="" min="<?php $now = date('Y-m-d');$Dexpired =  date('Y-m-d',strtotime($now. ' + 1 month')); echo $Dexpired;?>"/>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label for="exampleInputEmail1">Item Name</label>
                                                                                                <input style="color: black;" type="text" name="a_name" value="<?php echo $name; ?>" class="form-control" readonly=""required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="exampleInputEmail1">Category</label>
                                                                                                <input style="color: black;" type="text" name="a_category" value="<?php echo $cat; ?>" class="form-control" readonly=""required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="exampleInputEmail1">Quantity</label>
                                                                                                <input style="color: black;" type="number" name="a_quan" value="<?php echo $quantity; ?>" class="form-control"required/>
                                                                                            </div>
                                                                                         </div>
                                                                                         
                                                                                        
                                                                                     </div>
                                                                                          <div class="col-md-12">
                                                                                            <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;"></div>
                                                                                          </div>
                                                                                         
                                                                                        <div class="col-md-6" style=" background-color: #fff59d;border-style: solid;" >
                                                                                            <button id="btnSwitch" class="btn btn-warning" disabled="disabled" onclick="undisableTxt()" style="margin-bottom: 10px; margin-top: 10px">For Existing Items</button>
                                                                                            <script>

                                                                                            function undisableTxt() {
                                                                                                document.getElementById("myText").disabled = false;
                                                                                                document.getElementById("skuSwitch").disabled = true;
                                                                                                document.getElementById("newunit").disabled = true;
                                                                                                document.getElementById("btnSwitch2").disabled = false;
                                                                                                document.getElementById("btnSwitch").disabled = true;
                                                                                                document.getElementById("btnold").disabled = false;  
                                                                                                document.getElementById("btnnew").disabled = true;
                                                                                              }
                                                                                            </script>
                                                                                            <div class="form-group">
                                                                                                    <label for="exampleInputEmail1">Existing Stock Key Unit</label>
                                                                                                    <select name="a_old_sku" class="form-control" id="myText" style="color: black; margin-bottom: 87px;"required>
                                                                                                         <option value="" selected disabled></option>
                                                                                                                        
                                                                                                                        <?php  
                                                                                                                            $sqlemp= "SELECT DISTINCT Med_Code, Med_Name FROM `ims_r_medicinal_stock` AS MEDSTK INNER JOIN ims_t_med_requisition AS MEDREQ ON MEDSTK.Med_Category = MEDREQ.Item_Category

                                                                                                                            where MEDSTK.Med_Category  = MEDREQ.Item_Category";
                                                                                                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                                                            while($row = mysqli_fetch_assoc($results))
                                                                                                                            {
                                                                                                                                $sku = $row['Med_Code'];
                                                                                                                                $Sname = $row['Med_Name'];
                                                                                                                        ?>
                                                                                                                            <option value="<?php echo $sku ?>"><?php echo "$sku"; ?> -- <?php echo "$Sname"; ?></option>
                                                                                                                        <?php 
                                                                                                                            } 
                                                                                                                        ?>
                                                                                                    </select>
                                                                                            </div>
                                                                                                  <button  name="MEDDevAcquireOLD" id="btnold" class="btn btn-warning" style="margin-bottom: 10px; margin-top: 10px"><i class="fa  fa-download"></i>  
                                                                                                  Confirm Entry </button>&nbsp&nbsp
                                                                                        </div>
                                                                                        <br>
                                                                                        
                                                                                    
                                                                                       <div class="col-md-6" style="background-color: #69f0ae;border-style: solid;" >
                                                                                            <button id="btnSwitch2" class="btn btn-success" onclick="undisableTxt2()" style="margin-bottom: 10px; margin-top: 10px">For New Items</button>
                                                                                            <script>

                                                                                            function undisableTxt2() {
                                                                                                document.getElementById("myText").disabled = true;
                                                                                                document.getElementById("skuSwitch").disabled = false;
                                                                                                document.getElementById("newunit").disabled = false;
                                                                                                 document.getElementById("btnSwitch").disabled = false;
                                                                                                 document.getElementById("btnSwitch2").disabled = true;
                                                                                                 document.getElementById("btnold").disabled = true;
                                                                                                 document.getElementById("btnnew").disabled = false;

                                                                                              }
                                                                                            </script>
                                                                                            
                                                                                           <div class="form-group">
                                                                                                <label for="exampleInputEmail1">New Stock Key Unit</label>
                                                                                                <input style="color: black;" type="text" disabled="" id="skuSwitch" name="a_new_sku" class="form-control"required/>
                                                                                            </div>
                                                                                             <div class="form-group">
                                                                                                <label>Unit</label>
                                                                                                <!--
                                                                                                <select name="a_new_unit" class="form-control" disabled="" id="newunit" style="color: black;" >
                                                                                                    <option selected disabled value=""></option>
                                                                                                    <option value="Ream">Ream</option>
                                                                                                    <option value="Set">Set</option>
                                                                                                    <option value="Bundle">Bundle</option>
                                                                                                    <option value="Piece">Piece</option>
                                                                                                </select>-->
                                                                                                 <input style="color: black;" type="text" disabled="" id="newunit" name="a_new_unit" value="<?php echo $unit?>" readonly="" class="form-control"required/>
                                                                                            </div>
                                                                                              <button  name="MEDDevAcquireNEW" id="btnnew" disabled="disabled" class="btn btn-success" style="margin-bottom: 10px; margin-top: 10px"><i class="fa  fa-download"></i>  
                                                                                              Confirm Entry </button>&nbsp&nbsp
                                                                                       </div>
                                                                                        
                                                                                    
                                                                                     
                                                                                    <!--
                                                                                     <div class="col-md-6">
                                                                                          <button data-toggle="modal" href="#ContinueOLD"  id="btnold" class="btn btn-warning"><i class="fa  fa-refresh"></i>  
                                                                                          Evaluate (Existing Item)</button>&nbsp&nbsp
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                          <button data-toggle="modal" href="#ContinueNEW" disabled="disabled" id="btnnew" class="btn btn-success"><i class="fa  fa-refresh"></i>  
                                                                                          Evaluate (New Item)</button> 
                                                                                    </div>-->
                                                                                     
                                                                                         &nbsp&nbsp
                                                                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ContinueOLD" class="modal ">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content" style="text-align: center;">
                                                                                                        <div class="modal-header">
                                                                                                            You are about to release the following item(s). Are you sure you want to proceed?
                                                                                                        </div>
                                                                                                        <img alt="" src="images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                                                                        <div class="panel" style="height: 50%; width: 100%">
                                                                                                            <button type="submit" class="btn btn-success btn-lg" name="INSDevAcquireOLD">   Yes  
                                                                                                            </button> &nbsp&nbsp&nbsp&nbsp
                                                                                                            <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                                                                        </div>
                                                                                                        <br>
                                                                                                    </div>
                                                                                                </div>
                                                                                        </div>
                                                                                    &nbsp&nbsp
                                                                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ContinueNEW" class="modal fade">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content" style="text-align: center;">
                                                                                                        <div class="modal-header">
                                                                                                            You are about to release the following item(s). Are you sure you want to proceed?
                                                                                                        </div>
                                                                                                        <img alt="" src="images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                                                                        <div class="panel" style="height: 50%; width: 100%">
                                                                                                            <button type="submit" class="btn btn-success btn-lg" name="INSDevAcquireNEW">   Yes  
                                                                                                            </button> &nbsp&nbsp&nbsp&nbsp
                                                                                                            <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                                                                        </div>
                                                                                                        <br>
                                                                                                    </div>
                                                                                                </div>
                                                                                        </div>
                                                                                
                                                                                   
                                                                                        <br>
                                                                               </form>
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
                            <!--<a data-toggle="modal" class="btn btn-success" href="DMPrintRequest.php?viewrequests=<?php echo $ids; ?>">View</a>-->

                                <div class="col-md-12" style="text-align: right">
                                    <div class="form-group" style="padding-top:22px; text-align: right">
                                         

                                        &nbsp&nbsp
                                        <a href="MEDEntry.php#home" class="btn btn-default" style=" background-color: gray; padding-left: ">Go Back to Delivered Items</a>          
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
<!--right sidebar start-->
<div class="right-sidebar">
    <div class="search-row">
        <input type="text" placeholder="Search" class="form-control">
    </div>
    <div class="right-stat-bar">
        <ul class="right-side-accordion">
        <li class="widget-collapsible">
            <ul class="widget-container">
                <li>
                    <div class="prog-row side-mini-stat clearfix">
                        <div class="side-graph-info">
                            <h4>Target sell</h4>
                            <p>
                                25%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="target-sell">
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="side-graph-info">
                            <h4>product delivery</h4>
                            <p>
                                55%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="p-delivery">
                                <div class="sparkline" data-type="bar" data-resize="true" data-height="30" data-width="90%" data-bar-color="#39b7ab" data-bar-width="5" data-data="[200,135,667,333,526,996,564,123,890,564,455]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="side-graph-info payment-info">
                            <h4>payment collection</h4>
                            <p>
                                25%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="p-collection">
                                <span class="pc-epie-chart" data-percent="45">
                                <span class="percent"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="side-graph-info">
                            <h4>delivery pending</h4>
                            <p>
                                44%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="d-pending">
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="col-md-12">
                            <h4>total progress</h4>
                            <p>
                                50%, Deadline 12 june 13
                            </p>
                            <div class="progress progress-xs mtop10">
                                <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
        </ul>
    </div>
</div>
<!--right sidebar end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->


    <script type="text/javascript">
    $(document).ready(function(){
        "use strict";
        
        $('.btn-message').click(function(){
            swal("Here's a message!");
        });
        
        $('.btn-title-text').click(function(){
            swal("Here's a message!", "It's pretty, isn't it?")
        });

        $('.btn-timer').click(function(){
            swal({
                title: "Auto close alert!",
                text: "I will close in 2 seconds.",
                timer: 2000,
                showConfirmButton: false
            });
        });
        
        $('.btn-successs').click(function(){
            swal("Good job!", "You clicked the button!", "success");
        });
        
        $('.btn-warning-confirm').click(function(){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, delete it!',
                closeOnConfirm: false
            },
            function(){
                swal("Deleted!", "Your imaginary file has been deleted!", "success");
            });
        });
        
        $('.btn-warning-cancel').click(function(){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
            if (isConfirm){
              swal("Deleted!", "Your imaginary file has been deleted!", "success");
            } else {
              swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
            });
        });
        
        $('.btn-custom-icon').click(function(){
            swal({
                title: "Sweet!",
                text: "Here's a custom image.",
                imageUrl: 'images/favicon/apple-touch-icon-152x152.png'
            });
        });
        
        $('.btn-message-html').click(function(){
            swal({
                title: "HTML <small>Title</small>!",
                text: 'A custom <span style="color:#F8BB86">html<span> message.',
                html: true
            });
        });
        
        $('.btn-input').click(function(){
            swal({
                title: "An input!",
                text: 'Write something interesting:',
                type: 'input',
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Write something",
            },
            function(inputValue){
                if (inputValue === false) return false;
        
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false;
                }
            
                swal("Nice!", 'You wrote: ' + inputValue, "success");
        
            });
        });
        
        $('.btn-theme').click(function(){
            swal({
                title: "Themes!",
                text: "Here's the Twitter theme for SweetAlert!",
                confirmButtonText: "Cool!",
                customClass: 'twitter'
            });
        });
        
        $('.btn-ajax').click(function(){
          swal({
            title: 'Ajax request example',
            text: 'Submit to run ajax request',
            type: 'info',
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
          }, function(){
            setTimeout(function() {
              swal('Ajax request finished!');
            }, 2000);
          });
        });
        
    });
    </script>
<script id="DMNotif" src="../js/DMNotification.js"></script>
</body>
</html>
