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
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="active" >
                        <li><a href="PCReportReqOff.php">Requisition</a></li>     
                        <li><a href="PCReportAcqOff.php">Procurement</a></li>
                        <li><a href="PCReportIss.php">Issuance</a></li> 
                        <li><a class="active" href="PCReportInvOff.php">Inventory Stocks</a></li>               
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
                    <li><a href="PCReportInvOff.php">Inventory Stocks Report</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="color: white; background-color: gray">
                        Inventory of Office Supply Items Stocks Report
                    </header>
                <!--CHART-->

                <form class="col s12" method="POST">
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
                                        $view_query = mysqli_query($connection,"SELECT DISTINCT Item_Name, Quantity FROM `ims_r_office_stock` where Quantity > 20");
                                        while($row = mysqli_fetch_assoc($view_query))
                                            {   
                                                $name = $row["Item_Name"];
                                                $quan = $row["Quantity"];
                                    ?>      
                                    <tr>
                                        <th><?php echo $name?><br></th>
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

                  <div class="panel-body">
                    <div class="adv-table">
                        <div class="col-md-12" style="text-align: left">
                             <div class="col-md-3">
                                <div class="form-group">
                                <label>Filter Type:</label>
                                    <select class="form-control" name="filterstat" style="color: black;">
                                        <option selected value="ALL">All</option>
                                        <option value="CATEGORY">By Category</option>
                                       <!--  <option value="UNIT">By Unit</option> -->
                                   </select>
                                   <br>
                               </div>
                             </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                <label>Filter by Category</label>
                                    <select class="form-control" name="Category" style="color: black;">
                                         <option selected value="ALL">All</option>
                                                        <?php  
                                                                $sqlemp= "SELECT * FROM `ims_r_office_category`";
                                                                $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                while($row = mysqli_fetch_assoc($results))
                                                                {
                                                                    $categ = $row['Category_Name'];
                                                                    $catid = $row['Category_ID'];
                                                         ?>
                                       <option value="<?php echo $categ ?>"><?php echo "$categ"; ?></option>
                                                        <?php 
                                                            } 
                                                        ?>
                                   </select>
                                   <br>
                               </div>
                             </div>
                            <!--  <div class="col-md-2">
                                <div class="form-group">
                                <label>Filter by Unit</label>
                                    <select class="form-control" name="Unit" style="color: black;">
                                        <option selected value="ALL">All</option>
                                          <option value="Ream">Ream</option>
                                          <option value="Pad">Pad</option>
                                          <option value="Tube">Tube</option>
                                          <option value="Pack">Pack</option>
                                          <option value="Can">Can</option>
                                          <option value="Bottle">Bottle</option>
                                          <option value="Bundle">Bundle</option>
                                          <option value="Roll">Roll</option>
                                          <option value="Cartridge">Cartridge</option>
                                          <option value="Spool">Spool</option> 
                                          <option value="Box">Box</option>
                                          <option value="Piece">Piece</option>
                                   </select>
                                   <br>
                               </div>
                             </div> -->
                             
                             <div class="col-md-1"  style="text-align: left; padding-top: 22px">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" name="FilterOFFInventory" style="">Filter</button> 
                                   
                                </div>
                             </div>
                             <div class="col-md-1"  style="text-align: right; padding-top: 22px">
                                <div class="form-group">
                                     <button class="btn btn-success" onclick="printDiv('printablearea')" name="Print"><i class="fa fa-print"></i>   Print</button><br>
                                </div>
                             </div>
                              
                              

                              
                        </div>
                         
                    </form>
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>Stock No.</th>
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


                    <!--PRINTABLE FORM-->
                         <div style="display: none" id="printablearea">
                                <div class="">
                                     <img  src="../../Resources/images/PUP/QCheader.png" style="height:40%; width:60%; "> 
                                </div>
                                <div style="margin-top: 10px; margin-left: 15px">
                                    <div style="text-align: left; ">
                                        <h5 style="font-size: 15px; text-align: right">Report No. OSR-<?php echo date('m-d'); ?> </h5>
                                        <h5 style="font-size: 15px">Date Generated: <br>
                                            <?php echo date('F d, Y'); ?>
                                        </h5>
                                        <center>
                                            <b style="font-size: 20px">Inventory of Office Supplies Stocks Report</b>
                                        </center>
                                        <h5>Report Description:</h5> 
                                        <p style="text-align: justify; font-size: 14px">   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                            This report shows the details of the university campus' current inventory stocks of office supply items. Details may be filtered by the one who generated this report in order to specify the significant details of the said report.
                                        </p>
                                        <h5>Chart Description:</h5> 
                                        <p style="text-align: justify; font-size: 14px">   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                            The chart shows the graphical details of the current top items with the highest quantity.
                                        </p>
                                    </div>
                                    <div>
                                            <script src="js/code/highcharts.js"></script>
                                            <script src="js/code/modules/data.js"></script>
                                            <script src="js/code/modules/exporting.js"></script>

                                            <div id="inventory2" style="width: 97%; height: 500px;"></div>

                                                    <table style="display: none;" id="datatableinvtry">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Stock</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                                $view_query = mysqli_query($connection,"SELECT DISTINCT Item_Name, Quantity FROM `ims_r_office_stock` where Quantity > 20");
                                                                while($row = mysqli_fetch_assoc($view_query))
                                                                    {   
                                                                        $name = $row["Item_Name"];
                                                                        $quan = $row["Quantity"];
                                                            ?>      
                                                            <tr>
                                                                <th><?php echo $name?><br></th>
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
                                    <h5>Table Description:</h5> 
                                        <p style="text-align: justify; font-size: 14px">   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                            The table below shows the filtered details of the office supply items stocks status.
                                        </p>
                                     <table  class="display table table-bordered table-striped" id="dynamic-tabl">
                                             <thead>
                                                <tr>
                                                    <th>Stock No.</th>
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
                                        <h5>Report Generated By: <br><br><br>
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
                                                                     
                                                                      <br>
                                                                                         <p><b><?php  echo $fname.' '.$mname.'. '.$lname; ?></b>
                                                                                            <br><br>
                                                                                         <?php echo $job.''.', PUPQC'; ?>
                                                                                         </p>
                                                                            <?php } ?>
                                                               </h5> 
                                            
                                    <br>
                                    <hr>
                                    <p>PUPQC Inventory Management System <?php echo date('Y')?></p>
                                    </div>
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
