<?php 
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");
    
?>

<title>Inventory Stocks Report | PUPQC IMS</title>


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
                        <li><a href="PCTotalIssue.php">Issuance</a></li> 
                        <li><a class="active" href="PCTotalStock.php">Inventory Stocks</a></li>               
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
                    <li><a href="DMReportStock.php">Inventory Stocks Report</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Inventory Stocks Report
                    </header>
                <!--CHART-->
                <div>
                    <script src="js/code/highcharts.js"></script>
                    <script src="js/code/modules/data.js"></script>
                    <script src="js/code/modules/exporting.js"></script>

                    <div id="inventory" style="width: 97%; height: 300px;"></div>

                            <table style="display: none;" id="datatableinv">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT * FROM `ims_r_stock` where Quantity > 20");
                                        while($row = mysqli_fetch_assoc($view_query))
                                            {   
                                                $name = $row["Item_Name"];
                                                $quan = $row["Quantity"];
                                    ?>      
                                    <tr>
                                        <th><?php echo $name?></th>
                                        <td><?php echo $quan; ?></td>
                                    </tr>
                                    
                                    <?php 
                                        }
                                    ?>
                                </tbody>
                            </table>

                    <script type="text/javascript">

                    Highcharts.chart('inventory', {
                        data: {
                            table: 'datatableinv'
                        },
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Top Items with the Highest Stock Quantity'
                        },
                        yAxis: {
                            allowDecimals: false,
                            title: {
                                text: 'Quantity Level'
                            }
                        },
                        tooltip: {
                            formatter: function () {
                                return '<b>' + this.series.name + '</b><br/>' +
                                    this.point.y + ' ' + this.point.name.toLowerCase();
                            }
                        }
                    });
                    </script>
                </div>
                <hr>
                <!--End of Chart-->
                <form class="col s12" method="POST">

                  <div class="panel-body">
                    <div class="adv-table">
                        <div class="col-md-12" style="text-align: left">
                             <div class="col-md-2">
                                <div class="form-group">
                                <label>Filter Type:</label>
                                    <select class="form-control" name="filterstat" style="color: black;">
                                        <option selected value="ALL">All</option>
                                        <option value="CATEGORY">By Category</option>
                                        <option value="UNIT">By Unit</option>
                                        
                                        
                                   </select>
                                   <br>
                               </div>
                             </div>
                             <div class="col-md-2">
                                <div class="form-group">
                                <label>Filter by Category</label>
                                    <select class="form-control" name="Category" style="color: black;">
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
                                    <select class="form-control" name="Unit" style="color: black;">
                                        <option selected value="ALL">All</option>
                                        <option value="REAM">Ream</option>
                                        <option value="SET">Set</option>
                                        <option value="BUNDLE">Bundle</option>
                                        <option value="PIECE">Piece</option>
                                        
                                   </select>
                                   <br>
                               </div>
                             </div>
                             
                             <div  style="padding-top: 22px">
                                <button type="submit" class="btn btn-info" name="FilterInventory" style="">Filter</button><br> 
                             </div>
                        </div>
                         
                    </form>
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th>Stock Key Unit</th>
                            <th>Item Name</th>
                            <th>Item Category</th>
                            <th>Item Unit</th>
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
                                    <img src="IMS/images/PUP/pupqclogo.png" alt="" style="width: 10%; height: 10%;">
                                    <h3>Polytechnic University of the Philippines</h3>
                                    <h4>Quezon City Branch<br>Property and Supply Office</h4>
                                    <h4>PUPQC Inventory Management System</h4>
                                    <h3>Inventory Stocks Report</h3>

                                    <br>
                                </div>
                                <div style="text-align: left;">
                                    <h5>Date Generated: <br>
                                        <?php echo date('d-m-Y'); ?>
                                    </h5>
                                    <h5>Report Description:</h5> 
                                    <p style="text-align: justify;">   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                        This report is about the details of the university campus' inventory stocks status. Details
                                                        may be filtered by the one who generated this report in order to specify the significant details of the said
                                                        report.
                                    </p>
                                </div>
                                <div>
                                        <script src="js/code/highcharts.js"></script>
                                        <script src="js/code/modules/data.js"></script>
                                        <script src="js/code/modules/exporting.js"></script>

                                        <div id="inventory2" style="width: 97%; height: 300px;"></div>

                                                <table style="display: none;" id="datatableinvtry">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Stock</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_r_stock` where Quantity > 20");
                                                            while($row = mysqli_fetch_assoc($view_query))
                                                                {   
                                                                    $name = $row["Item_Name"];
                                                                    $quan = $row["Quantity"];
                                                        ?>      
                                                        <tr>
                                                            <th><?php echo $name?></th>
                                                            <td><?php echo $quan; ?></td>
                                                        </tr>
                                                        
                                                        <?php 
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>

                                        <script type="text/javascript">

                                        Highcharts.chart('inventory2', {
                                            data: {
                                                table: 'datatableinvtry'
                                            },
                                            chart: {
                                                type: 'column'
                                            },
                                            title: {
                                                text: 'Top Items with the Highest Stock Quantity'
                                            },
                                            yAxis: {
                                                allowDecimals: false,
                                                title: {
                                                    text: 'Quantity Level'
                                                }
                                            },
                                            tooltip: {
                                                formatter: function () {
                                                    return '<b>' + this.series.name + '</b><br/>' +
                                                        this.point.y + ' ' + this.point.name.toLowerCase();
                                                }
                                            }
                                        });
                                        </script>
                                    </div>
                                <hr>
                                <p>   
                                  The table below displays details of the report:
                                </p>
                                 <table  class="display table table-bordered table-striped" id="dynamic-table">
                                        <thead>
                                            <tr>
                                                <th>Stock Key Unit</th>
                                                <th>Item Name</th>
                                                <th>Item Category</th>
                                                <th>Item Unit</th>
                                                <th>Item Quantity</th>                   
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                  include("MasterReportView.php");
                                                        
                                                ?>

                                        </tbody>
                                    </table>
                                    <br>
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
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>




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

   
</body>
</html>
