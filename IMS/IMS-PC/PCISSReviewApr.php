<?php 
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");

    if (isset($_GET['viewrequests'])) 
    {
        $ids = $_GET['viewrequests'];
    } 
?>
<title>Review Approved Request | PUPQCIMS</title>

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
                    <li><a href="PCISSReviewApr.php?viewrequests=<?php echo $ids ?>">Review Approved Departmental Requests</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header style="color: white; background-color: gray" class="panel-heading">
                            Departmental Requests (For Issuance / Releasing)
                        </header>

                        <?php  

                            $sql = "SELECT * FROM `ims_t_dept_summary_request` WHERE Batch_No = $ids";

                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {
                             $datereq = $row['Date_Requested'];
                              // $revdate = $row['Date_Revised'];
                              $aprdate = $row['Date_Approved'];
                              $accname = $row['Account_Name'];
                              $office = $row['Depart_Name'];
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
                                  <!--  <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Revised</label>
                                            <input type="Date" name="Drequested" value="<?php echo $revdate; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div> -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Approved</label>
                                            <input type="Date" name="Date_apr" value="<?php echo $aprdate; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Requested By:</label>
                                            <input type="text" name="Date_apr" value="<?php echo $accname; ?>" class="form-control" readonly="" disabled style="color: black;" />
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Office:</label>
                                            <input type="text" name="Date_apr" value="<?php echo $office; ?>" class="form-control" readonly="" disabled style="color: black;" />
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
                                        <table  class="display table table-bordered table-striped" id="dynamic-tab  e">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">No</th>
                                                    <th>SKU</th>
                                                    <th>Item Name</th>
                                                    <th>Quantity</th>
                                                    <th style="width:150px">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody> 
                                               
                                                <?php  
                                                    $sql = "SELECT * FROM `ims_t_dept_summary_request` AS SUMREQ  
                                                            INNER JOIN `ims_t_dept_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                                            INNER JOIN `ims_r_office_stock` AS STK ON STK.Stock_Key_Unit = REQ.Item_SKU
                                                                 WHERE  REQ.Status = 'PENDING' AND REQ.Batch_No = $ids  
                                                            ORDER BY SUMREQ.Date_Requested DESC ";

                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    while($row = mysqli_fetch_assoc($result))
                                                    {

                                                      $Dreq = $row['Date_Requested'];
                                                      $Dapr = $row['Date_Approved'];
                                                      $No = $row['DeptReq_No'];
                                                      $sku = $row['Item_SKU'];
                                                      $name = $row['Item_Name'];
                                                      $quantity = $row['DR_Quantity'];
                                                      $accname = $row['Account_Name'];
                                                      $office = $row['Depart_Name'];
                                                      $status = $row['Status'];

                                                      if($status == 'PENDING')
                                                      {
                                                       echo'<tr class="gradeX">
                                                            <td style="display: none"> '.$No.' </td>
                                                            <td>  '.$sku.' </td>
                                                            <td>  '.$name.' </td>
                                                            <td>  '.$quantity.' </td>
                                                               <td>
                                                                    <center>
                                                                    <a data-toggle="modal" href="#release'.$No.'" class="btn btn-info"><i class="fa  fa-upload"></i>  Release</a>
                                                                    </center>
                                                               </td>
                                                            
                                                        </tr>';
                                                       }
                                                      

                                                ?>

                                              <!--   <tr class="gradeX">
                                                    <td style="display: none"> <?php echo $No; ?> </td>
                                                    <td> <?php echo $sku; ?> </td>
                                                    <td> <?php echo $name; ?> </td>
                                                    <td> <?php echo $quantity; ?> </td>
                                                       <td>
                                                            <center>
                                                            <a data-toggle="modal" href="#release<?php echo $No; ?>" class="btn btn-info"><i class="fa  fa-upload"></i>  Release</a>
                                                            </center>
                                                       </td>
                                                    
                                                </tr> -->
                                               

                                             <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="release<?php echo $No; ?>" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                              <div style="text-align: right"> 
                                                                 <button data-dismiss="modal">x</button>
                                                             </div>

                                                                <h4 class="modal-title">Details for Item Release</h4>
                                                            </div>
                                                            <div class="modal-body">

                                                                 <form role="form" method="POST" action="ChangeStat.php">
                                                                    <div class="form-group">
                                                                        <input style="display: none;" type="date" name="DIssued" value="<?php echo date('Y-m-d'); ?>" class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input style="display: none;" type="date" name="Drequest" value="<?php echo $Dreq ?>" class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input style="display: none;" type="date" name="DApprove" value="<?php echo $Dapr ?>" class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input style="display: none;" type="Text" name="AccName" value="<?php echo $accname ?>" class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input style="display: none;" type="Text" name="Office" value="<?php echo $office ?>" class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                         <input style="display: none;" type="text" name="r_batch" value="<?php echo $ids; ?>" class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input style="display: none;" type="text" name="ReqNo" value="<?php echo $No; ?>" class="form-control"/>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Item SKU</label>
                                                                            <input style="color: black;" type="text" name="SKU" value="<?php echo $sku; ?>" class="form-control"readonly/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Item Name</label>
                                                                            <input style="color: black;" type="text" name="r_name" value="<?php echo $name; ?>" class="form-control"readonly/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Quantity</label>
                                                                            <input style="color: black;" type="number" name="r_quan" value="<?php echo $quantity; ?>" class="form-control" min="1" max="20"/>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    

                                                                    <br>
                                                                    <div class="row">
                                                                          <div class="col-md-12">
                                                                             <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;"></div>
                                                                         </div>
                                                                     </div>
                                                                   
                                                                    
                                                                    <a data-toggle="modal" href="#Continue" class="btn btn-info"><i class="fa  fa-upload"></i>  Release</a>   
                                                                        

                                                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content" style="text-align: center;">
                                                                                        <div class="modal-header">
                                                                                            You are about to release the following item(s). Are you sure you want to proceed?
                                                                                        </div>
                                                                                        <img alt="" src="../../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                                                        <div class="panel" style="height: 50%; width: 100%">
                                                                                            <button type="submit" class="btn btn-success btn-lg" name="PCISSrelease">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
                                                                                            <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                                                        </div>
                                                                                        <br>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                    &nbsp&nbsp
                                                                     
                                                                 </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Modal Division-->
                                                    <?php
                                                 } //ETO UNG DULO NG LOOP, DAPAT ENCLOSED PARIN SYA NG PHP 
                                                    // KAILANGAN YAN PARA UNG DATA SA LOOB NG TABLE PATULOY NYANG PINAPASA 
                                            ?>   
                                           
                                               
                                            </tbody>
                                        </table>
                                         <?php
                                                $sql = "SELECT * FROM `ims_t_dept_summary_request` AS SUMREQ  
                                                            INNER JOIN `ims_t_dept_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                                                 WHERE  REQ.Batch_No = $ids  
                                                            ORDER BY SUMREQ.Date_Requested DESC LIMIT 1";

                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        $status = $row['Status'];
                                                        if ($status == 'RELEASED') 
                                                        {
                                                            echo 
                                                            '
                                                               <div class="panel" style="text-align: center; background-color: #eeeeee; font-size: 16px" >
                                                                   <p style="padding-top:15px; color:red"> This request has been fullfilled; There is no data available. </p>
                                                                    <p style="padding-bottom: 15px;"> You can now go back to other departmental requests.</p>
                                                               </div>
                                                               
                                                            ';
                                                        }
                                                    }
                                            ?>
                                         <div style="padding: 1px; margin-bottom: 0px; background-color: #757575;">                                                             
                                    </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12" style="text-align: right; margin-bottom: 10px;">
                                            <a href="PCIssuance.php" class="btn btn-default" style=" background-color: gray; padding-left: ">Go Back to Requests</a>               
                                    </div>
                                </div>
                            </div>
                                        
                                              
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
<script>

        $('.form-content').multifield({
            section: '.group',
            btnAdd:'#btnAdd',
            btnRemove:'.btnRemove',
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=place]').val($(this).val());            
            });
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=reqperson]').val($(this).val());            
            });
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=asttypesss]').val($(this).val());            
            });
        });

</script>
</body>
</html>
