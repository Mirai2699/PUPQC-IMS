    <?php
     include("MEDJSHeader.php");
     include("MEDJSCore.php");
     include("MEDJSCustom.php");


?>



    <title>Requests for Revision | PUPQC IMS</title>

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
                            <li><a href="MEDPPMP.php">Medicinal Stocks</a></li>
                            <li><a href="CLIPPMP.php">Clinical Stocks</a></li>
                    </ul>
                </li>
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
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="DPmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DPRevReq.php">Requests for Revision</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                         Requests for Revision
                    </header>
                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th>Request No.</th>
                            <th>Date Requested</th>
                            <th>Date Request for Revision</th>
                            <th>Revision Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_clinic_summary_request` WHERE Status_Req = 'REVISE' ORDER BY Batch_No DESC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {
                                   $bn = $row["Batch_No"];
                                    $DR = $row["Date_Requested"];
                                    $DRev = $row["Date_Revised"];
                                    $rmks =  $row["Remarks"];
                                
                        ?>      
                                 <tr class="gradeX">
                                        <td><?php echo $bn; ?></td>
                                        <td><?php echo $DR; ?></td>
                                        <td><?php echo $DRev; ?></td>
                                        <td><?php echo $rmks; ?></td>
                                        <td style='width:150px'>
                                                <center>
                                                    
                                                <a data-toggle="modal" class="btn btn-warning" href="MEDReviewRev.php?viewrequests=<?php echo $bn; ?>">Review</a>               
                                                </center>
                                       </td>
                                </tr>  

                    


                                <div class="modal fade" id="review<?php echo $bn; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Pending Request</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="ChangeStat.php">
                                                        <div class="form-group">
                                                                <input style="display: none;" type="text" name="ReqNo" value="<?php echo $No; ?>" class="form-control"/>
                                                        </div>

                                                        <div class="form-group">
                                                            <input style="display: none;" type="text" name="r_batch" value="<?php echo $ids; ?>" class="form-control"/>
                                                        <div>  


                                                        <div class="form-group">
                                                                <label for="exampleInputEmail1">Item Name</label>
                                                                <input style="color: black;" type="text" name="r_name" value="<?php echo $name; ?>" class="form-control"/>
                                                        </div>     
                                                        <div class="form-group">
                                                               <label>Unit</label>
                                                               <select name="r_unit" class="form-control" style="color: black;" value="<?php echo $unit; ?>" required="">
                                                                             <option selected disabled value="<?php echo $unit; ?>"></option>
                                                                             <option value="Ream">Ream</option>
                                                                             <option value="Set">Set</option>
                                                                             <option value="Bundle">Bundle</option>
                                                                             <option value="Piece">Piece</option>
                                                               </select>
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="exampleInputEmail1">Change Quantity</label>
                                                                <input style="color: black;" type="number" name="r_quan" value="<?php echo $quantity; ?>" class="form-control"/>
                                                        </div>
                                                        <br><hr>
                                                        <button type="submit" class="btn btn-success" name="CLIsave">Save</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </form>
                                                </div>
                                         </div>
                                    </div>
                                </div><!-- /.modal -->
                                    <?php 
                                        } 
                              ?>
                    </tbody>
                </form>
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
