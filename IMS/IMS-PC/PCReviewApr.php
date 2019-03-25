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
                        <li><a href="PCRevReq.php">For Revision</a></li> 
                        <li><a class="active" href="PCAprReq.php">Approved for Requesting</a></li>  
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
                    <li><a href="PCAprReq.php">Approved Requests</a></li>
                    <li><a href="PCReviewApr.php?viewrequests=<?php echo $ids; ?>">Request Review</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header style="color: white; background-color: gray" class="panel-heading">
                            <label>Requests Review</label>
                        </header>
                        
                        <?php  

                            //$ids = $row['Batch_No'];
                            $sql = "SELECT * FROM `ims_t_summary_request` WHERE Batch_No = $ids";


                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {
                              $datereq = $row['Date_Requested'];
                              $revdate = $row['Date_Revised'];
                              $aprdate = $row['Date_Approved'];
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
                                            <input type="Date" name="Date_apr" value="<?php echo $aprdate; ?>" class="form-control" readonly="" disabled style="color: black;" />
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
                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                    $sql = "SELECT * FROM `ims_t_summary_request` AS SUMREQ  
                                                            INNER JOIN `ims_t_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                                                 WHERE SUMREQ.Status_Req = 'APPROVED' AND REQ.Batch_No = $ids  
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
                                                </tr>

                                            
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
                            

                                <div class="col-md-12" style="text-align: right">                                 <!-- TABLE START -->
                                     <div style="display: none" id="printablearea2">
                                                        <div class="panel">
                                                            <img  src="../../Resources/images/PUP/Logoheader.png" style="height:40%; width:70%; "> 
                                                        </div>
                                                        <div class="col-md-12" style="font-family: arial; font-size: 13px; text-align: right ">
                                                             <?php echo date('m-d-Y'); ?>
                                                        </div> 
                                                   
                                                    <br>
                                                    <div  style="font-family: arial; font-size: 16px; color: black; margin-top: 5px; text-align: center;">
                                                              REQUISITION AND ISSUE SLIP<br>
                                                    </div><br>
                                                     <div  style="font-family: arial; font-size: 13px; color: black; margin-top: 10px">
                                                             <p style="font-size: 12px; text-align: left">Fund Cluster:</p>
                                                             <p style="font-size: 12px; text-align: left">Division: Office of the Vice President for Branches and Satellite Campuses
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                                
                                                                
                                                                
                                                           
                                                                
                                               
                                                                Responsibility Center Code: CM
                                                             </p>
                                                             <p style="font-size: 12px; text-align: left">Office:
                                                                PUP QUEZON CITY BRANCH
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                                
                                                                RIS No: <?php echo date('Y-m'); ?>-<?php echo $ids; ?>
                                                             </p>
                                                    </div> 

                                                    <br>
                                                    <p style="color: black">
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                        <b><i>Requisition</i></b>
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                        <b><i>Stock Available?</i></b>
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                        <b><i>Issue</i></b></p>
                                                   
                                                     <table  class="table" style="border-style: none;">
                                                             <thead>
                                                                <tr>
                                                                    <th style="display: none;">No</th>
                                                                    <th>Stock No.</th>
                                                                    <th>Unit</th>
                                                                    <th>Details</th>
                                                                    <th style="text-align: center">Quantity</th>
                                                                    <th>Yes</th>
                                                                    <th>No</th>
                                                                    <th style="text-align: center">Quantity</th>
                                                                    <th>Remarks</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody> 
                                                                 <?php  
                                                                        $sql = "SELECT * 
                                                                                FROM `ims_t_summary_request` AS SUMREQ  
                                                                                INNER JOIN `ims_t_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                                                                     WHERE SUMREQ.Status_Req = 'APPROVED' AND REQ.Batch_No = $ids  
                                                                                ORDER BY SUMREQ.Date_Requested DESC ";

                                                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                                        while($row = mysqli_fetch_assoc($result))
                                                                        {
                                                                          $No = $row['Requisition_No'];
                                                                        //  $sku = $row['Med_Code'];
                                                                          $name = $row['OFF_Name']; 
                                                                          $unit = $row['OFF_Unit']; 
                                                                          $quantity = $row['OFF_Quantity'];
                                                                          $bn = $row["Batch_No"];

                                                                    ?>

                                                                    <tr class="gradeX">
                                                                        <td style="display: none"> <?php echo $No; ?> </td>
                                                                        <td><?php echo "N/A" ?></td>
                                                                       <!-- <td><?php echo $sku; ?></td>-->
                                                                        <td><?php echo $unit; ?></td>
                                                                        <td><?php echo $name; ?></td>
                                                                        <td style="text-align: center"><?php echo $quantity; ?></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td style="text-align: center"> <?php echo $quantity; ?> </td>
                                                                        <td></td>
                                                                        
                                                                    </tr>
                                                                    
                                                                

                                                                        <?php
                                                                     }
                                                                ?>        
                                                                   <tr class="gradeX" style="font-size: 13px; text-align: center; ">
                                                                        <td><b>...</b></td>
                                                                        <td><b>...</b></td>
                                                                        <td><b>***  Nothing Follows ***</b></td>
                                                                        <td><b>...</b></td>
                                                                        <td><b>...</b></td>
                                                                        <td><b>...</b></td>
                                                                        <td><b>...</b></td>
                                                                        <td><b>...</b></td>
                                                                        
                                                                    </tr>     
                                                         </tbody>
                                                    </table>

                                                    <div style="text-align: left;">
                                                         <br><br><br><br><br><br>
                                                         <b style="font-size: 13px">Purpose:</b><br>
                                                         <p>Office supplies for the university campus</p>
                                                         <hr>
                                                         <br>
                                                              <table  class="table" style="border-color: white">
                                                                <tbody> 
                                                                        <tr class="gradeX">
                                                                            <td style="border-color:white; width: 20%"></td>
                                                                            <td style="text-align: center; border-color: white">Requested By:</td>
                                                                            <td style="text-align: center; border-color: white">Approved By:</td>
                                                                            <td style="text-align: center; border-color: white">Issued By:</td>
                                                                            <td style="text-align: center; border-color: white">Received By:</td>
                                                                        </tr>
                                                                        <tr class="gradeX">
                                                                            <td style="border-color:white;width: 20% ">Signature:</td>
                                                                            <td style="border-color:white "></td>
                                                                            <td style="border-color:white "></td>
                                                                            <td style="border-color:white "></td>
                                                                            <td style="border-color:white "></td>
                                                                        </tr>   
                                                                         <tr class="gradeX">
                                                                            <td style="border-color:white; width: 20% ">Printed Name:</td>
                                                                            <td style="text-align: center; border-color: white">
                                                                               <?php
                                                                                 $sqlemp= "SELECT * FROM `pso_r_employee_profile` AS EMP 
                                                                                            INNER JOIN  `pso_r_user` AS ACC WHERE ACC.U_TYPE = 'Property-Custodian' and
                                                                                            EMP.EP_ID = ACC.EP_ID";
                                                                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                            while($row = mysqli_fetch_assoc($results))
                                                                                                    {
                                                                                                        $fname = $row['EP_FNAME'];
                                                                                                        $mname = $row['EP_MNAME'];
                                                                                                        $lname = $row['EP_LNAME'];
                                                                                                    }
                                                                                                echo $fname.' '.$mname.'. '.$lname;
                                                                                 ?>
                                                                            </td>
                                                                            <td style="text-align: center; border-color: white">
                                                                                <?php
                                                                                 $sqlemp= "SELECT * FROM `pso_r_employee_profile` AS EMP 
                                                                                            INNER JOIN  `pso_r_user` AS ACC WHERE ACC.U_TYPE = 'Director' and
                                                                                            EMP.EP_ID = ACC.EP_ID";
                                                                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                            while($row = mysqli_fetch_assoc($results))
                                                                                                    {
                                                                                                        $fname = $row['EP_FNAME'];
                                                                                                        $mname = $row['EP_MNAME'];
                                                                                                        $lname = $row['EP_LNAME'];
                                                                                                    }
                                                                                                echo $fname.' '.$mname.'. '.$lname;
                                                                                 ?>
                                                                            </td>
                                                                            <td style="border-color:white "></td>
                                                                            <td style="border-color:white "></td>
                                                                        </tr>    
                                                                         <tr class="gradeX">
                                                                            <td style="border-color:white; width: 20%">Designation:</td>
                                                                            <td style="text-align: center; border-color: white"">
                                                                              <?php
                                                                                 $sqlemp= "SELECT * FROM `pso_r_employee_profile` AS EMP 
                                                                                            INNER JOIN  `pso_r_user` AS ACC WHERE ACC.U_TYPE = 'Property-Custodian' and
                                                                                            EMP.EP_ID = ACC.EP_ID";
                                                                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                            while($row = mysqli_fetch_assoc($results))
                                                                                                    {
                                                                                                       $job = $row["EP_TYPE"];
                                                                                                    }
                                                                                                echo $job;
                                                                                      ?>
                                                                            </td>
                                                                            <td style="text-align: center; border-color: white">
                                                                            <?php
                                                                                 $sqlemp= "SELECT * FROM `pso_r_employee_profile` AS EMP 
                                                                                            INNER JOIN  `pso_r_user` AS ACC WHERE ACC.U_TYPE = 'Director' and
                                                                                            EMP.EP_ID = ACC.EP_ID";
                                                                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                            while($row = mysqli_fetch_assoc($results))
                                                                                                    {
                                                                                                       $job = $row["EP_TYPE"];
                                                                                                    }
                                                                                                echo $job;
                                                                                      ?>
                                                                            </td>
                                                                            <td style="border-color:white "></td>
                                                                            <td style="border-color:white "></td>
                                                                        </tr>  
                                                                        <tr class="gradeX">
                                                                            <td style="border-color:white; width: 20%">Date Signed:</td>
                                                                            <td style="border-color:white "></td>
                                                                            <td style="border-color:white "></td>
                                                                            <td style="border-color:white "></td>
                                                                            <td style="border-color:white "></td>
                                                                        </tr>
                                                                </tbody>
                                                             </table>
                                                             <p style="font-size: 10px">This request is valid until 3 working days upon approval after which, if items are not picked up, the request is automatically cancelled.</p>
                                                             <p style="font-size: 10px">Supplies will be released only to an authorized personnel of the requesting PUP campus.</p>
                                                        </div>
                                          </div>

                                <div class="col-md-12" style="text-align: right">
                                    <div class="form-group" style="padding-top:22px; text-align: right">
                                           <?php  

                                        $sql = "SELECT * FROM `ims_t_summary_request` WHERE Batch_No = $ids";
                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                        while($row = mysqli_fetch_assoc($result))
                                        {  
                                            $batch = $row["Batch_No"];
                                            $status = $row["Accept_Status"];
                                           if($status == "ACQUIRED")
                                            {
                                                echo "
                                                   <p style='font-size:15px; color: red;'>(This Request has been delivered, printing another copy of RIS is not necessary as it lost its validity)</p>  
                                                ";
                                            }
                                          } 

                                         ?>

                                        
                                    <div class="form-group" style="padding-top:0px; text-align: right">
                                         <button onclick="printDiv2('printablearea2')"  class="btn btn-default" style="background-color: green; color: white"><i class="fa fa-print"></i>    Print a Copy of RIS</button> &nbsp
                                        &nbsp&nbsp
                                        <a href="PCAprReq.php" class="btn btn-default" style=" background-color: gray; padding-left: ">Go Back to Approved Requests</a>          
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
    function printDiv2(printablearea2)
    {
        var printContents = document.getElementById(printablearea2).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        
        window.print();
        
        document.body.innerHTML = originalContents;
    }
</script>

</body>
</html>
