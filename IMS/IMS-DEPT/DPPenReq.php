<?php
     include("DPJSHeader.php");
     include("DPJSCore.php");
     include("DPJSCustom.php");

?>



    <title>Pending Requests | PUPQC IMS</title>


<!--sidebar start-->
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
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="DPmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DPPenReq.php">Pending Requests</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="background-color: gray; color: white">
                        Pending Requests
                    </header>
                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th>DR No.</th>
                            <th>Date Requested</th>
                            <th>Date Revised</th>
                            <th>Requested By:</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $office = $_SESSION['DEPART'];
                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_dept_summary_request` AS SUMREQ
                                                                    INNER JOIN pso_r_office AS OFF
                                                                    ON SUMREQ.Depart_Name = OFF.O_NAME
                                                                    WHERE SUMREQ.Status_Req = 'PENDING' AND OFF.O_ID = '$office' ORDER BY Batch_No DESC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {
                                   $bn = $row["Batch_No"];
                                    $DR = $row["Date_Requested"];
                                    $DRev = $row["Date_Revised"];
                                    $Accname = $row["Account_Name"];
                                
                        ?>      
                                 <tr class="gradeX">
                                        <td><?php echo $bn; ?></td>
                                        <td><?php echo $DR; ?></td>
                                        <td><?php echo $DRev; ?></td>
                                        <td><?php echo $Accname; ?></td>
                                        <td style='width:150px'>
                                                <center>
                                                    
                                                <a data-toggle="modal" class="btn btn-warning" href="DPReviewPen.php?viewrequests=<?php echo $bn; ?>">Review</a>               
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
                                                        <button type="submit" class="btn btn-success" name="PCsave">Save</button>
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
                     <tfoot>
                        <tr>
                            <th>Request No.</th>
                            <th>Date Requested</th>
                            <th>Date Revised</th>
                            <th>Requested By:</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
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
