<?php
     include("MEDJSHeader.php");
     include("MEDJSCore.php");
     include("MEDJSCustom.php");
    if (isset($_GET['viewrequests'])) 
    {
        $ids = $_GET['viewrequests'];

    }
?>


<title>Review PPMP | PUPQCIMS</title>

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
                            <ul class="sub" ">
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
                    <a class="active" href="javascript:;"><i class="fa  fa-calendar"></i>PPMP</a>
                        <ul class="active" >
                              <li><a class="active" href="MEDPPMP.php">Medicinal Stocks</a>
                                  <ul class="active" >
                                     <li><a href="MED_ADDPPMP.php">Create Plan</a></li>
                                     <li><a class="active" href="MED_VIEWPPMP.php">View Plans</a></li>
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
                    <li><a href="MED_VIEWPPMP.php">View PPMP</a></li>
                    <li><a href="MEDReviewMEDPPMP.php?viewrequests=<?php echo $ids; ?>">Plan Review</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
            
            <div class="row">
                <div class="col-sm-12">
                    
                        
                        <?php  

                            //$ids = $row['Batch_No'];
                            $sql = "SELECT * FROM `ims_t_ppmp_med_summary` WHERE MED_PPMP_ID = $ids";


                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {
                                 $DCreate = $row["MED_PPMP_Date_Created"];
                                 $DRequest = $row["MED_PPMP_Date_Request"];
                        ?>
                        <section class="panel">
                       <header class="panel-heading" style="background-color: gray; color: white">
                         Project procurement management plan for Medicinal Supplies details for PPMP ID: <?php echo $ids; ?>
                        </header>
                        <div class="panel-body">
                            <div class="row group"> 
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Project Procurement Management Plan No.<?php echo $ids; ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Date Created: <?php echo $DCreate; ?></label>
                                        </div>
                                    </div>
                                   <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Date Requested: <?php echo $DRequest; ?></label>
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label>PPMP For Year: <?php echo date('Y',strtotime(' + 1 Year'))?></label>
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
                                                    <th style="width:150px">General Description</th>
                                                    <th style="width:150px">Total Quantity/Size</th>
                                                    <th style="width:100px">Estimated Budget</th>
                                                    <th style="width:150px">Jan</th>
                                                    <th style="width:150px">Feb</th>
                                                    <th style="width:100px">Mar</th>
                                                    <th style="width:150px">Apr</th>
                                                    <th style="width:150px">May</th>
                                                    <th style="width:150px">Jun</th>
                                                    <th style="width:150px">Jul</th>
                                                    <th style="width:150px">Aug</th>
                                                    <th style="width:100px">Sep</th>
                                                    <th style="width:150px">Oct</th>
                                                    <th style="width:150px">Nov</th>
                                                    <th style="width:5%">Dec</th>

                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                        $sql = "SELECT * FROM `ims_t_ppmp_med_summary` AS SUMREQ  
                                                                INNER JOIN `ims_t_ppmp_med_details` AS REQ ON REQ.Batch_No = SUMREQ.MED_PPMP_ID
                                                                     WHERE REQ.Batch_No = $ids";

                                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                        while($row = mysqli_fetch_assoc($result))
                                                        { 
                                                                    $name = $row['Med_Name'];
                                                                    $unit = $row['Unit'];
                                                                    $budget = $row['Est_Budget'];
                                                                    $Jan = $row['Jan'];
                                                                    $Feb = $row['Feb'];
                                                                    $March = $row['March'];
                                                                    $April = $row['April'];
                                                                    $May = $row['May'];
                                                                    $June = $row['June'];
                                                                    $July = $row['July'];
                                                                    $Aug = $row['Aug']; 
                                                                    $Sept = $row['Sept'];
                                                                    $Oct = $row['Oct'];
                                                                    $Nov = $row['Nov']; 
                                                                    $Dec = $row['Decem'];
                                                                    $qty = ($Jan + $Feb + $March + $April + $May + $June + $July + $Aug + $Sept + $Oct + $Nov + $Dec)

                                                    ?>

                                                    <tr class="gradeX">
                                                        <td style="display: none"> <?php echo $No; ?> </td>
                                                        <td style="width: 30%"> <?php echo $name; ?> </td>
                                                        <td> <?php echo $qty.' '.$unit; ?> </td>
                                                        <td> <?php echo '₱ ', $budget; ?> </td>
                                                        <td style="width: 3%"> <?php echo $Jan; ?> </td>
                                                        <td style="width: 3%"> <?php echo $Feb; ?> </td>
                                                        <td style="width: 3%"> <?php echo $March; ?> </td>
                                                        <td style="width: 3%"> <?php echo $April; ?> </td>
                                                        <td style="width: 3%"> <?php echo $May; ?> </td>
                                                        <td style="width: 3%"> <?php echo $June; ?> </td>
                                                        <td style="width: 3%"> <?php echo $July; ?> </td>
                                                        <td style="width: 3%"> <?php echo $Aug; ?> </td>
                                                        <td style="width: 3%"> <?php echo $Sept; ?> </td>
                                                        <td style="width: 3%"> <?php echo $Oct; ?> </td>
                                                        <td style="width: 3%"> <?php echo $Nov; ?> </td>
                                                        <td style="width: 3%"> <?php echo $Dec; ?> </td>
                                                        
                                                    
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
                               <div class="col-md-12" style="text-align: right">
                                    <div class="form-group" style="padding-top:22px;">
                                         <button onclick="printDiv2('printablearea2')" class='btn btn-default' style='background-color: green; color: white'><i class='fa fa-print'></i>    Print</button>
                                        <a href="MED_VIEWPPMP.php" class="btn btn-default" style=" background-color: gray; padding-left: ">Go Back to Pending Requests</a>          
                                    </div>
                                </div>
                                 <!-- TABLE START -->
                                            <div style="display: none" id="printablearea2">
                                                    <br>
                                                     <div  style="font-family: arial; font-size: 13px; color: black;text-align: right;">
                                                           FORM D
                                                    </div>
                                                    <div  style="font-family: arial; font-size: 15px; color: black;text-align: center;">
                                                           Republic of the Philippines<br>
                                                    </div>
                                                    <div  style="font-family: arial; font-size: 18px; color: black; margin-top: 5px; text-align: center;">
                                                           <strong> POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</strong><br>
                                                    </div>
                                                    <div  style="font-family: arial; font-size: 15px; color: black;text-align: center;">
                                                           Don Fabian St., Commonwealth Quezon City<br>
                                                    </div>
                                                    <br> 
                                                    <br>
                                                    <div  style="font-family: arial; font-size: 14px; color: black;text-align: center;">
                                                           Project Procurement Management Plan (PPMP) FY <?php echo date('Y',strtotime(' + 1 Year'))?><br>
                                                           Medicinal Supplies<br>
                                                    </div>
                                                     <div  style="font-family: arial; font-size: 14px; text-align: left; margin-top: 20px; margin-bottom: 20px">
                                                           <strong>
                                                           END-USER/UNIT: 
                                                           <?php
                                                                                 $current = $_SESSION['AccountID'];
                                                                                 $sqlemp= "SELECT * FROM `pso_r_user` WHERE U_ID = '$current' ";
                                                                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                            while($row = mysqli_fetch_assoc($results))
                                                                                                    {
                                                                                                        $acc = $row['U_ID'];
                                                                                                        $type = $row['U_TYPE'];
                                                                                                        if($type == "Medical-Officer")
                                                                                                        {
                                                                                                            echo "Medical Services";
                                                                                                        }
                                                                                                        else if($type == "Dental")
                                                                                                        {
                                                                                                            echo "Dental Services";
                                                                                                        }
                                                                                                    }
                                                                                            
                                                                                 ?>
                                                            </strong>
                                                    </div>

                                                   
                                                  
                                             
                                            <table  class="display table table-bordered" id="">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">No</th>
                                                    <th>Code</th>
                                                    <th>General Description</th>
                                                    <th>Total Quantity/Size</th>
                                                    <th>Estimated Budget</th>
                                                    <th>Jan</th>
                                                    <th>Feb</th>
                                                    <th>Mar</th>
                                                    <th>Apr</th>
                                                    <th>May</th>
                                                    <th>Jun</th>
                                                    <th>Jul</th>
                                                    <th>Aug</th>
                                                    <th>Sep</th>
                                                    <th>Oct</th>
                                                    <th>Nov</th>
                                                    <th>Dec</th>

                                                </tr>
                                            </thead>

                                            <tbody> 
                                                <?php  
                                                        $sql = "SELECT * FROM `ims_t_ppmp_med_summary` AS SUMREQ  
                                                                INNER JOIN `ims_t_ppmp_med_details` AS REQ ON REQ.Batch_No = SUMREQ.MED_PPMP_ID
                                                                     WHERE REQ.Batch_No = $ids";

                                                        $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");
                                                        $total = 0;
                                                        while($row = mysqli_fetch_assoc($result))
                                                        { 
                                                                    $name = $row['Med_Name'];
                                                                    $unit = $row['Unit'];
                                                                    $budget = $row['Est_Budget'];
                                                                    $Jan = $row['Jan'];
                                                                    $Feb = $row['Feb'];
                                                                    $March = $row['March'];
                                                                    $April = $row['April'];
                                                                    $May = $row['May'];
                                                                    $June = $row['June'];
                                                                    $July = $row['July'];
                                                                    $Aug = $row['Aug']; 
                                                                    $Sept = $row['Sept'];
                                                                    $Oct = $row['Oct'];
                                                                    $Nov = $row['Nov']; 
                                                                    $Dec = $row['Decem'];
                                                                    $qty = ($Jan + $Feb + $March + $April + $May + $June + $July + $Aug + $Sept + $Oct + $Nov + $Dec);
                                                                    $total = ($total + $budget)


                                                    ?>
                                                    <tr class="gradeX">
                                                        <td style="display: none"> <?php echo $No; ?> </td>
                                                        <td style="width: 5%"></td>
                                                        <td style="width: 60%"> <?php echo $name; ?> </td>
                                                        <td style="width: 14%"> <?php echo $qty.' '.$unit; ?> </td>
                                                        <td style="width: 14%"> <?php echo '₱ ', $budget; ?> </td>
                                                        <td style="width: 2%"> <?php echo $Jan; ?> </td>
                                                        <td style="width: 2%"> <?php echo $Feb; ?> </td>
                                                        <td style="width: 2%"> <?php echo $March; ?> </td>
                                                        <td style="width: 2%"> <?php echo $April; ?> </td>
                                                        <td style="width: 2%"> <?php echo $May; ?> </td>
                                                        <td style="width: 2%"> <?php echo $June; ?> </td>
                                                        <td style="width: 2%"> <?php echo $July; ?> </td>
                                                        <td style="width: 2%"> <?php echo $Aug; ?> </td>
                                                        <td style="width: 2%"> <?php echo $Sept; ?> </td>
                                                        <td style="width: 2%"> <?php echo $Oct; ?> </td>
                                                        <td style="width: 2%"> <?php echo $Nov; ?> </td>
                                                        <td style="width: 2%"> <?php echo $Dec; ?> </td>
                                                    </tr>
                                                       <?php
                                                             }
                                                        ?>        
                                                    <tr class="gradeX">
                                                        <td style="display: none"> <?php echo $No; ?> </td>
                                                        <td style="width: 5%"></td>
                                                        <td style="width: 60%">GRAND-TOTAL:</td>
                                                        <td style="width: 14%"> --- </td>
                                                        <td style="width: 14%"> <?php echo '₱ ', $total; ?> </td>
                                                        <td style="width: 2%"> --- </td>
                                                        <td style="width: 2%"> --- </td>
                                                        <td style="width: 2%"> --- </td>
                                                        <td style="width: 2%"> --- </td>
                                                        <td style="width: 2%"> --- </td>
                                                        <td style="width: 2%"> --- </td>
                                                        <td style="width: 2%"> --- </td>
                                                        <td style="width: 2%"> --- </td>
                                                        <td style="width: 2%"> --- </td>
                                                        <td style="width: 2%"> --- </td>
                                                        <td style="width: 2%"> --- </td>
                                                        <td style="width: 2%"> --- </td>
                                                    </tr>

                                    
                                                      
                                        </tbody>
                                    </table>

                                                    <div style="text-align: left;">
                                                         <b style="font-size: 13px">NOTE: </b>
                                                           <p style="margin-left: 40px">1. Technical Specifications for each Ite/Project being proposed shall be submitted as part of the PPMP.</p>
                                                           <p style="margin-left: 40px">2. Technical Specificatio however, must be in generic form, no brand name shall be specified.</p>
                                                           <p style="margin-left: 40px">3. Non-submission of PMPP for common-use shall mean no budget provision for supplies.</p>
                                                    </div>
                                                    <table style="margin-top: 20px">
                                                        <thead>
                                                            <th style="width: 100px">Prepared By:</th>
                                                            <th style="width: 200px"></th>
                                                            <th style="width: 100px">Submitted By:</th>
                                                            <th style="width: 180px"></th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td style="text-align: center">
                                                                    <?php
                                                                                         $id = $_SESSION['AccountID'];
                                                                                         $sqlemp= "SELECT * FROM `pso_r_employee_profile` AS EMP 
                                                                                                    INNER JOIN  `pso_r_user` AS ACC WHERE ACC.U_ID = '$id' and
                                                                                                    EMP.EP_ID = ACC.EP_ID";
                                                                                                    $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                                    while($row = mysqli_fetch_assoc($results))
                                                                                                            {
                                                                                                                $fname = $row['EP_FNAME'];
                                                                                                                $mname = $row['EP_MNAME'];
                                                                                                                $lname = $row['EP_LNAME'];
                                                                                                                $job = $row["EP_TYPE"];
                                                                                                            
                                                                      ?>
                                                                     
                                                                      <br><br>
                                                                                         <p><b style="text-decoration: underline;"><?php  echo $fname.' '.$mname.'. '.$lname.', MD'; ?></b>
                                                                                            <br>
                                                                                         <?php echo $job; ?>
                                                                                         </p>
                                                                            <?php } ?>
                                                                </td>
                                                                <td></td>
                                                                <td style="text-align: center">
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
                                                                                                                $job = $row["EP_TYPE"];
                                                                                                            
                                                                      ?>
                                                                     
                                                                      <br><br>
                                                                                         <p><b style="text-decoration: underline;">  <?php  echo $fname.' '.$mname.'. '.$lname; ?></b>
                                                                                         <br><?php echo $job; ?>
                                                                                         </p>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                   
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
