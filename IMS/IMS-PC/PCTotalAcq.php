<?php 
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");
    
?>

<title>Delivery Report | PUPQC IMS</title>


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
                        <li><a class="active" href="PCTotalAcq.php">Delivery</a></li>
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
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="PCmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="PCTotalAcq.php">Delivery Report</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
         <!--tab nav start-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#home">Acquired Items from Delivery Report</a>
                        </li>
                       <!-- <li class="">
                            <a data-toggle="tab" href="#about">Return Items from Delivery Report</a>
                        </li>-->
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
                                            Acquired Items from Delivery Report
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
                                                                        <option value="MOA">By Mode of Acquisition</option>
                                                                        <option value="EVAL">By Item Grade</option>
                                                                   </select>
                                                                   <br>
                                                               </div>
                                                             </div>
                                                              <div class="col-md-4">
                                                                <div class="form-group">
                                                                <label>Mode of Acquisition:</label>
                                                                    <select class="form-control" name="MOA" style="color: black;">
                                                                        <option selected value="ALL">All</option>
                                                                        <option value="PURCHASE">Purchased</option>
                                                                        <option value="DONATED">Donated</option>
                                                                        <option value="DELIVERED">Obtained from Requested Delivery</option>
                                                                   </select>
                                                                   <br>
                                                               </div>
                                                             </div>
                                                            
                                                             <div class="col-md-2">
                                                                <div class="form-group">
                                                                <label>Filter by Item Grade</label>
                                                                    <select class="form-control" name="Grade" style="color: black;">
                                                                        <option selected value="ALL">All</option>
                                                                        <option value="VeryGood">Very Good</option>
                                                                        <option value="Good">Good</option>
                                                                        <option value="Enough">Enough</option>
                                                                        
                                                                   </select>
                                                                   <br>
                                                               </div>
                                                             </div>
                                                             
                                                             <div  style="padding-top: 22px">
                                                                <button type="submit" class="btn btn-info" name="FilterAcquisition" style="">Filter</button><br> 
                                                             </div>
                                                        </div>
                                                         
                                                    </form>
                                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                                    <thead>
                                                        <tr>
                                                                    <th>Date Procured</th>
                                                                    <th>Mode of Acquisition</th>
                                                                    <th>Stock Key Unit</th>
                                                                    <th>Quantity</th>
                                                                    <th>Supplier</th>
                                                                    <th>Item Grade</th>          
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
                                                        <h3>Acquired Items</h3>
                                                        <h4>Delivery Report</h4>
                                                        <br>
                                                    </div>
                                                    <div style="text-align: left;">
                                                        <h5>Date Generated: <br>
                                                            <?php echo date('d-m-Y'); ?>
                                                        </h5>
                                                        <h5>Report Description:</h5> 
                                                        <p>   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                                            This report is about the details of the university campus' acquisition of items from different, or a particular supplier. This report only covers the inspected items that are inserted to the inventory. Details
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
                                                                    <th>Date Procured</th>
                                                                    <th>Mode of Acquisition</th>
                                                                    <th>Stock Key Unit</th>
                                                                    <th>Quantity</th>
                                                                    <th>Supplier</th>
                                                                    <th>Item Grade</th>                
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
                                             <button class="btn btn-success btn-lg" onclick="printDiv('printablearea')" name="Print"><i class="fa fa-print"></i>   Print</button><br> 
                                          </div>
                                        </div>
                                </section>
                                </div>
                                </div>
                            </section>
                                <!--TABLES ENDS HERE -->
                        </div>
                        <!-- Close
                        <!-- 2nd Tab STARTS HERE
                        <div id="about" class="tab-pane">
                             <!-- TABLE START 
                            <section id="content">
                             <div class="row">
                                <div class="col-sm-12">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            Return Items from Delivery Report
                                        </header>
                                            <form class="col s12" method="POST">

                                              <div class="panel-body">
                                                <div class="adv-table">
                                                    <div class="col-md-12" style="text-align: left">
                                                         <div class="col-md-3">
                                                            <div class="form-group">
                                                            <label>Filter Type:</label>
                                                                <select class="form-control" name="RTfilterstat" style="color: black;">
                                                                    <option selected value="ALL">All</option>
                                                                    <option value="STATUS">By Status</option>
                                                                    <option value="MODE">By Mode of Acquisition</option>
                                                                    <option value="CATEGORY">By Category</option>
                                                                    <option value="UNIT">By Unit</option>
                                                               </select>
                                                               <br>
                                                           </div>
                                                         </div>
                                                         <div class="col-md-2">
                                                            <div class="form-group">
                                                            <label>Filter by Status</label>
                                                                <select class="form-control" name="RTStatus" style="color: black;">
                                                                    <option selected value="ALL">All</option>
                                                                    <option value="PENDING">For Return</option>
                                                                    <option value="RETURNED">Returned</option>
                                                                    
                                                               </select>
                                                               <br>
                                                           </div>
                                                         </div>
                                                         <div class="col-md-2">
                                                                <div class="form-group">
                                                                <label>Mode of Acquisition:</label>
                                                                    <select class="form-control" name="RTMOA" style="color: black;">
                                                                        <option selected value="ALL">All</option>
                                                                        <option value="PURCHASE">Purchased</option>
                                                                        <option value="DONATED">Donated</option>
                                                                        <option value="DELIVERED">Obtained from Requested Delivery</option>
                                                                        
                                                                   </select>
                                                                   <br>
                                                               </div>
                                                         </div>
                                                          <div class="col-md-2">
                                                                <div class="form-group">
                                                                <label>Filter by Category</label>
                                                                    <select class="form-control" name="RTCategory" style="color: black;">
                                                                         <option selected value="ALL">All</option>
                                                                                        <?php  
                                                                                                $sqlemp= "SELECT * FROM `ims_r_item_category`";
                                                                                                $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                                while($row = mysqli_fetch_assoc($results))
                                                                                                {
                                                                                                    $cat = $row['Category_Name'];
                                                                                                    $catid = $row['Category_ID'];
                                                                                         ?>
                                                                       <option value="<?php echo $catid ?>"><?php echo "$cat"; ?></option>
                                                                                        <?php 
                                                                                            } 
                                                                                        ?>
                                                                   </select>
                                                                   <br>
                                                               </div>
                                                             </div>
                                                         <div class="col-md-2">
                                                            <div class="form-group">
                                                            <label>Filter by Unit</label>
                                                                <select class="form-control" name="RTUnit" style="color: black;">
                                                                    <option selected value="ALL">All</option>
                                                                    <option value="REAM">Ream</option>
                                                                    <option value="SET">Set</option>
                                                                    <option value="BUNDLE">Bundle</option>
                                                                    <option value="PIECE">Piece</option>
                                                                    
                                                               </select>
                                                               <br>
                                                           </div>
                                                         </div>
                                                            <div class="col-md-1" style="margin-top: 21px">
                                                                <button type="submit" class="btn btn-info" name="FilterReturn">Filter</button><br> 
                                                            </div>
                                                    </div>
                                                </form>
                                                <table  class="display table table-bordered table-striped" id="editable-sample">
                                                    <thead>
                                                        <tr>
                                                            <th>Date Procured</th>
                                                            <th>Date of Return Issue</th>
                                                            <th>Status</th>
                                                            <th>Date Returned</th>
                                                            <th>Mode of Acquisition</th>
                                                            <th>Item Name</th>
                                                            <th>Item Category</th>
                                                            <th>Unit</th>
                                                            <th>Quantity</th>
                                                            <th>Supplier</th>                    
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
                                                        <img src="images/PUP/pupqclogo.png" alt="" style="width: 10%; height: 10%;">
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
                                                                    <th>Date Procured</th>
                                                                    <th>Date of Return Issue</th>
                                                                    <th>Status</th>
                                                                    <th>Date Returned</th>
                                                                    <th>Mode of Acquisition</th>
                                                                    <th>Item Name</th>
                                                                    <th>Item Category</th>
                                                                    <th>Unit</th>
                                                                    <th>Quantity</th>
                                                                    <th>Supplier</th>                            
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                   //   include("MasterReportView.php");
                                                                            
                                                                    ?>

                                                            </tbody>
                                                        </table>

                                                    <div style="text-align: left;">
                                                        <hr>
                                                        <h5>Report Generated By: <br><br><br>
                                                            Firmo Esguerra<br>
                                                            University Campus Director, PUPQC</h5> 
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
                                <!--TABLES ENDS HERE 
                            -->
                        </div>
                    </div>
                </div>
            </section>
            <!--tab nav end-->
           

        </section>
    </section>
    <!--main content end-->

</section>


    <script>
        jQuery(document).ready(function() {
            EditableTable.init();
        });
    </script>


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
