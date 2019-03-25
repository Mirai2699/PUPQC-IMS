<?php 
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");
    
?>
<title>Requisition Report | PUPQC IMS</title>


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
                        <li><a class="active" href="PCTotalReq.php">Requisition</a></li>     
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
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="DMmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DMReportReq.php">Requisition Report</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      <!-- TABLE START -->
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Requisition Report
                    </header>
                        <form class="col s12" method="POST">

                          <div class="panel-body">
                            <div class="adv-table">
                                <div class="col-md-10" style="text-align: left">
                                     <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Filter Type:</label>
                                            <select class="form-control" name="filterstat" style="color: black;">
                                                <option selected value="ALL">All</option>
                                                <option value="ALLWB">By Batch</option>
                                                <option value="PENDING">Status: Pending</option>
                                                <option value="REVISE">Staus: For Revision</option>
                                                <option value="APPROVED">Status: Approved</option>
                                                <option value="RELEASE">Status: Releases</option>
                                                
                                           </select>
                                           <br>
                                       </div>
                                     </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Filter by Batch No.</label>
                                            <input type="number" class="form-control" name="batchno">
                                           <br>
                                       </div>
                                     </div>
                                     
                                        <div class="col-md-1" style="margin-top: 21px">
                                            <button type="submit" class="btn btn-info" name="FilterRequisition">Filter</button><br> 
                                        </div>
                                </div>
                            </form>
                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <th>Date Requested</th>
                                            <th>Status</th>
                                            <th>Batch No.</th>
                                            <th>Item Name</th>
                                            <th>Item Quantity</th>                        
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
                                    <h3>Requisition Report</h3>

                                    <br>
                                </div>
                                <div style="text-align: left;">
                                    <h5>Date Generated: <br>
                                        <?php echo date('d-m-Y'); ?>
                                    </h5>
                                    <h5>Report Description:</h5> 
                                    <p>   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                        This report is about the details of the university campus' requisition of items to the PUP main office. Some 
                                                details are filtered by the one who generated this report in order to specify the significant details of the said
                                                report.
                                    </p>
                                    <br>
                                </div>
                                <hr>
                                <p>   
                                  The table below displays details of the report:
                                </p>
                                 <table  class="display table table-bordered table-striped" id="dynamic-table">
                                        <thead>
                                            <tr>
                                                <th>Date Requested</th>
                                                <th>Status</th>
                                                <th>Batch No.</th>
                                                <th>Item Name</th>
                                                <th>Item Quantity</th>                           
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
        <!-- page end-->
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
        function printData()
        {
           var divToPrint=document.getElementById("dynamic-table");
           newWin= window.open("");
           newWin.document.write(divToPrint.outerHTML);
           newWin.print();
           newWin.close();
        }
    </script>
</body>
</html>
