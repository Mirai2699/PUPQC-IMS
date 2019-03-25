<?php 
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");
    
?>
<title>Issuance Report | PUPQC IMS</title>

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
                        <li><a href="PCExpReq.php"></i>Expired and Rejected</a></li>                 
                    </ul>
                </li>
                <li>
                    <a href="PCIssuance.php">
                        <i class="fa  fa-upload"></i>
                        <span>Departmental Issuance</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-reply"></i>
                        <span>Departmental Returns</span>
                    </a>
                    <ul class="sub" >
                        <li><a href="PCdepForRet.php">Pending Returns</a></li>
                        <li><a href="PCdepRetDet.php">Returned</a></li>     
                        <hr>
                    </ul>
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
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="active" >
                        <li><a href="PCTotalReq.php">Requisition</a></li>     
                        <li><a href="PCTotalAcq.php">Delivery</a></li>
                        <li><a class="active" href="PCTotalIssue.php">Issuance</a></li> 
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
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="DMmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DMReportIss.php">Issuance Report</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
         <!--tab nav start-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#home">Actual Releases from Actual Requests Report</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#about">Actual Releases LM Mofified Report</a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <!-- 1st Tab STARTS HERE-->
                        <div id="home" class="tab-pane active">
                            <!-- TABLE START -->
                            <section id="content">
                             <div class="row">
                                <div class="col-sm-12">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            Actual Releases from Actual Requests Report
                                        </header>
                                            <form class="col s12" method="POST">

                                              <div class="panel-body">
                                                <div class="adv-table">
                                                    <div class="col-md-12" style="text-align: left">
                                                         <div class="col-md-3">
                                                            <div class="form-group">
                                                            <label>Filter Type:</label>
                                                                <select class="form-control" name="filterstat" style="color: black;">
                                                                    <option selected value="ALL">All</option>
                                                                    <option value="STATUS">By Status</option>
                                                                    <option value="DEPT">By Department</option>
                                                                    <option value="MIXED">By Status & Department</option>

                                                               </select>
                                                               <br>
                                                           </div>
                                                         </div>
                                                         <div class="col-md-2">
                                                            <div class="form-group">
                                                            <label>Filter by Status</label>
                                                                <select class="form-control" name="Stats" style="color: black;">
                                                                    <option selected value="ALL">All</option>
                                                                    <option value="PENDING">Pending</option>
                                                                    <option value="APPROVED">Approved</option>
                                                                    <option value="RELEASE">Released</option>
                                                                    
                                                               </select>
                                                               <br>
                                                           </div>
                                                         </div>
                                                         
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                            <label>Filter by Department</label>
                                                                <select class="form-control" name="Dept" style="color: black;">
                                                                     <option value="ALL" selected>All</option>
                                                                                <?php 
                                                                                    $sqlemp= "SELECT * FROM `ims_r_department` AS DEPT 
                                                                                    INNER JOIN  `ims_r_account` AS ACC WHERE ACC.Account_Type = 'Dept' and
                                                                                    DEPT.Depart_Name = ACC.Depart_Name ";
                                                                                    $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                    while($row = mysqli_fetch_assoc($results))
                                                                                    {
                                                                                        $Dname = $row['Depart_Name'];
                                                                                ?>
                                                                                    <option value="<?php echo $Dname ?>"><?php echo "$Dname"; ?></option>
                                                                                <?php 
                                                                                    } 
                                                                                ?>
                                                               </select>
                                                               <br>
                                                           </div>
                                                         </div>
                                                            <div class="col-md-1" style="margin-top: 21px">
                                                                <button type="submit" class="btn btn-info" name="FilterIssuance">Filter</button><br> 
                                                            </div>
                                                    </div>
                                                </form>
                                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Batch No.</th>
                                                            <th>Status</th>
                                                            <th>Date Requested</th>
                                                            <th>Date Approved</th>
                                                            <th>Date Released</th>
                                                            <th>Item SKU</th>
                                                            <th>Item Quantity</th> 
                                                            <th>Requested By</th>
                                                            <th>Department Requested</th>                       
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                              include("MasterReportView.php");
                                                                    
                                                            ?>

                                                    </tbody>
                                                </table> 
                                                <div style="display: none" id="printablearea">
                                                    <div style="text-align: center;">
                                                        <img src="../../Resources/images/PUP/pupqclogo.png" alt="" style="width: 10%; height: 10%;">
                                                        <h3>Polytechnic University of the Philippines</h3>
                                                        <h4>Quezon City Branch<br>Property and Supply Office</h4>
                                                        <h4>PUPQC Inventory Management System</h4>
                                                        <h3>Issuance Report<br>(Actual Releases from Actual Requests Report)</h3>

                                                        <br>
                                                    </div>
                                                    <div style="text-align: left;">
                                                        <h5>Date Generated: <br>
                                                            <?php echo date('d-m-Y'); ?>
                                                        </h5>
                                                        <h5>Report Description:</h5> 
                                                        <p>   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                                            This report is about the details of the university campus' issuance of items per requests of each and every department. This report only covers the actual releases of the actual requests by a particular department. Details
                                                                            may be filtered by the one who generated this report in order to specify the significant details of the said
                                                                            report.
                                                        </p>
                                                    </div>
                                                    <hr>
                                                    <p>   
                                                      The table below displays details of the report:
                                                    </p>
                                                     <table  class="display table table-bordered table-striped" id="dynamic-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Batch No.</th>
                                                                    <th>Status</th>
                                                                    <th>Date Requested</th>
                                                                    <th>Date Approved</th>
                                                                    <th>Date Released</th>
                                                                    <th>Item SKU</th>
                                                                    <th>Item Quantity</th> 
                                                                    <th>Requested By</th>
                                                                    <th>Department Requested</th>                     
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                      include("MasterReportView.php");
                                                                            
                                                                    ?>

                                                            </tbody>
                                                        </table>

                                                    <div style="text-align: left;">
                                                        <hr>
                                                        <h5>Report Generated By: <br><br><br>
                                                            Edgardo S. Delmo<br>
                                                            University Campus Director, PUPQC</h5> 
                                                    </div>
                                                </div>
                                          </div>
                                          <div style="text-align: right;">
                                             <button class="btn btn-success btn-lg" onclick="printDiv('printablearea')" name="Print"><i class="fa fa-print"></i>   Print</button><br> 
                                          </div>
                                        </div>
                                </section>
                                </div>
                                </div>
                            </section>
                                <!--TABLES ENDS HERE -->
                        </div>
                        <!-- 2nd Tab STARTS HERE-->
                        <div id="about" class="tab-pane">
                             <!-- TABLE START -->
                            <section id="content">
                             <div class="row">
                                <div class="col-sm-12">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            Actual Releases from LM Modification Report
                                        </header>
                                            <form class="col s12" method="POST">

                                              <div class="panel-body">
                                                <div class="adv-table">
                                                    <div class="col-md-12" style="text-align: left">
                                                         <div class="col-md-3">
                                                            <div class="form-group">
                                                            <label>Filter Type:</label>
                                                                <select class="form-control" name="LMfilterstat" style="color: black;">
                                                                    <option selected value="ALL">All</option>
                                                                    <option value="UNIT">By Unit</option>
                                                                    <option value="DEPT">By Department</option>


                                                               </select>
                                                               <br>
                                                           </div>
                                                         </div>
                                                         
                                                         <div class="col-md-2">
                                                            <div class="form-group">
                                                            <label>Filter by Unit</label>
                                                                <select class="form-control" name="LMUnit" style="color: black;">
                                                                    <option selected value="ALL">All</option>
                                                                    <option value="REAM">Ream</option>
                                                                    <option value="SET">Set</option>
                                                                    <option value="BUNDLE">Bundle</option>
                                                                    <option value="PIECE">Piece</option>
                                                                    
                                                               </select>
                                                               <br>
                                                           </div>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                            <label>Filter by Department</label>
                                                                <select class="form-control" name="LMDept" style="color: black;">
                                                                     <option value="ALL" selected>All</option>
                                                                                <?php 
                                                                                    $sqlemp= "SELECT * FROM `ims_r_department` AS DEPT 
                                                                                    INNER JOIN  `ims_r_account` AS ACC WHERE ACC.Account_Type = 'Dept' and
                                                                                    DEPT.Depart_Name = ACC.Depart_Name ";
                                                                                    $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                    while($row = mysqli_fetch_assoc($results))
                                                                                    {
                                                                                        $Dname = $row['Depart_Name'];
                                                                                ?>
                                                                                    <option value="<?php echo $Dname ?>"><?php echo "$Dname"; ?></option>
                                                                                <?php 
                                                                                    } 
                                                                                ?>
                                                               </select>
                                                               <br>
                                                           </div>
                                                         </div>
                                                            <div class="col-md-1" style="margin-top: 21px">
                                                                <button type="submit" class="btn btn-info" name="LMFilterIssuance">Filter</button><br> 
                                                            </div>
                                                    </div>
                                                </form>
                                                <table  class="display table table-bordered table-striped" id="editable-sample">
                                                    <thead>
                                                        <tr>
                                                            <th>Batch No.</th>
                                                            <th>Date Released</th>
                                                            <th>Item Name</th>
                                                            <th>Item Unit</th>
                                                            <th>Item Quantity</th> 
                                                            <th>Account Used</th>
                                                            <th>Department Requested</th>                       
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                              include("MasterReportView.php");
                                                                    
                                                            ?>

                                                    </tbody>
                                                </table>
                                                <div style="display: none" id="printablearea2">
                                                    <div style="text-align: center;">
                                                        <img src="../../Resources/images/PUP/pupqclogo.png" alt="" style="width: 10%; height: 10%;">
                                                        <h3>Polytechnic University of the Philippines</h3>
                                                        <h4>Quezon City Branch<br>Property and Supply Office</h4>
                                                        <h4>PUPQC Inventory Management System</h4>
                                                        <h3>Issuance Report<br>(Actual Releases from Last-Minute Modification Report)</h3>

                                                        <br>
                                                    </div>
                                                    <div style="text-align: left;">
                                                        <h5>Date Generated: <br>
                                                            <?php echo date('d-m-Y'); ?>
                                                        </h5>
                                                        <h5>Report Description:</h5> 
                                                        <p>   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                                            This report is about the details of the university campus' issuance of items per requests of each and every department. This report only covers the modified release of the property custodian different to the actual requests by a particular department. Details may be filtered by the one who generated this report in order to specify the significant details of the said
                                                                            report.
                                                        </p>
                                                    </div>
                                                    <hr>
                                                    <p>   
                                                      The table below displays details of the report:
                                                    </p>
                                                     <table  class="display table table-bordered table-striped" id="dynamic-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Batch No.</th>
                                                                    <th>Date Released</th>
                                                                    <th>Item Name</th>
                                                                    <th>Item Unit</th>
                                                                    <th>Item Quantity</th> 
                                                                    <th>Account Used</th>
                                                                    <th>Department Requested</th>                           
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                      include("MasterReportView.php");
                                                                            
                                                                    ?>

                                                            </tbody>
                                                        </table>

                                                    <div style="text-align: left;">
                                                        <hr>
                                                       <h5>Report Generated By: <br><br><br><br>
                                                            Edgardo Delmo<br>
                                                            Property Custodian, PUPQC</h5>  
                                                    </div>
                                                </div>
                                          </div>
                                          <div style="text-align: right;">
                                             <button class="btn btn-success btn-lg" onclick="printDiv2('printablearea2')" name="Print"><i class="fa fa-print"></i>   Print</button><br> 
                                          </div>
                                        </div>
                                </section>
                                </div>
                                </div>
                            </section>
                                <!--TABLES ENDS HERE -->
                        </div>
                    </div>
                </div>
            </section>
            <!--tab nav end-->
           

        </section>
    </section>
    <!--main content end-->


</section>



    
    <!--Printing-->
    <script> 
    function printDiv(printablearea)
    {
        var printContents = document.getElementById(printablearea).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        
        window.print();
        
        document.body.innerHTML = originalContents;
    }
    </script>
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
