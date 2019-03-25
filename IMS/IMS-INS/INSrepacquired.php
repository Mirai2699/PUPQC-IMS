<?php 
     include ("INSHeader.php");
     include ("INSJSCore.php");
     include ("INSJSCustom.php");
    
?>

    <title>Acquisition Report | PUPQC IMS</title>
 
<!--logo end-->
<script src="../js/code/highcharts.js"></script>
<script src="../js/code/modules/data.js"></script>
<script src="../js/code/modules/drilldown.js"></script>

<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a href="INSmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="INSDelDet.php">
                        <i class="fa fa-truck"></i>
                        <span>Delivery</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-download"></i>
                        <span>Acquisition</span>
                    </a>
                    <ul class="sub">
                        <li><a href="INSacquire.php">Entry Items</a></li>
                        <li><a href="INSAcqDet.php">Acquired</a></li>      
                    </ul>
                </li>
                <li>
                    <a href="INSInvStats.php">
                        <i class="fa fa-tasks"></i>
                        <span>Inventory Status</span>
                    </a>
                </li>

                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="active">
                        <li><a class="active" href="INSrepacquired.php">Acquisition</a></li>    
                        </li>
                    </ul>
                </li>
                <hr>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside><!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="INSmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="INSrepacquired.php">Acquisition Report</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="background-color: gray; color: white">
                       Frequency of Different Modes of Acquisition for Medical and Clinic Supplies
                    </header>
                <!--CHART-->

                <form class="col s12" method="POST">
                <div>
                    <script src="js/code/highcharts.js"></script>
                    <script src="js/code/modules/data.js"></script>
                    <script src="js/code/modules/exporting.js"></script>

                    <div id="inventory" style="width: 97%; height: 300px;"></div>

                              <table style="display: none;" id="datatableacq">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Mode of Acquisition</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT COUNT(`Mode_Acquisition`) AS DFR FROM `ims_t_acquisition` WHERE `Mode_Acquisition` = 'DeliveryFromRequest' ");
                                        while($row = mysqli_fetch_assoc($view_query))
                                            {   
                                                $name = 'Procurement From Request';
                                                $quan = $row["DFR"];
                                                  
                                    ?>    
                                    <tr>
                                        <th><?php echo $name;?></th>
                                        <th><?php echo $quan;?></th>
                                    </tr>  
                                
                                    <?php 
                                        }
                                    ?>
                                     <?php
                                        $view_query = mysqli_query($connection,"SELECT COUNT(`Mode_Acquisition`) AS PRCH FROM `ims_t_acquisition` WHERE `Mode_Acquisition` = 'Purchased' ");
                                        while($row = mysqli_fetch_assoc($view_query))
                                            {   
                                                $name = 'Purchased';
                                                $quan = $row["PRCH"];
                                                  
                                    ?>    
                                    <tr>
                                        <th><?php echo $name;?></th>
                                        <th><?php echo $quan;?></th>
                                    </tr>  
                                
                                    <?php 
                                        }
                                    ?>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT COUNT(`Mode_Acquisition`) AS DNTD FROM `ims_t_acquisition` WHERE `Mode_Acquisition` = 'Donated' ");
                                        while($row = mysqli_fetch_assoc($view_query))
                                            {   

                                                $name = 'Donated';
                                                $quan = $row["DNTD"];
                                                  
                                    ?>    
                                    <tr>
                                        <th><?php echo $name; ?></th>
                                        <th><?php echo $quan; ?></th>
                                    </tr>  
                                
                                    <?php 
                                        }
                                    ?>
                                    </tbody>
                                </table>

                    <script type="text/javascript">

                    Highcharts.chart('inventory', {
                        data: {
                            table: 'datatableacq'
                        },
                        chart: {
                            type: 'bar'
                        },
                        title: {
                            text: 'Frequency of Different Modes of Acquisition'
                        },
                        yAxis: {
                            allowDecimals: false,
                            title: {
                                text: 'Frequency Level'
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
                            
                             <div class="col-md-2">
                                <div class="form-group">
                                <label>Filter Type:</label>
                                    <select class="form-control" name="filterstat" style="color: black;">
                                            <option selected value="ALL">All</option>
                                            <option value="MOA">By Mode of Acquisition</option>
                                            <option value="DATE">By Date Procured</option>
                                        </select>
                                       <br>
                                   </div>
                                 </div>
                                   <div class="col-md-3">
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
                             <div class="col-md-5" style="border-style: solid; border-width: 1px">
                                <label>Filter by Date Procured</label>
                                <div class="form-group">
                                    <div class="col-md-6">
                                      <input id="startdate" style="color: black;" type="date" name="StartDate" class="form-control"/>
                                    </div>
                                    <div class="col-md-6">
                                     <input id="enddate" style="color: black;" type="date" name="EndDate" class="form-control"/>
                                    </div>
                               </div>
                            </div>
                             
                             <div class="col-md-1"  style="text-align: left; padding-top: 22px">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" name="FilterAcquisition" style="">Filter</button> 
                                   
                                </div>
                             </div>
                             <div class="col-md-1"  style="text-align: right; padding-top: 22px">
                                <div class="form-group">
                                     <button class="btn btn-success" onclick="printDiv('printablearea')" name="Print"><i class="fa fa-print"></i>   Print</button><br>
                                </div>

                             </div>
                             
                              <hr>

                              
                        </div>
                         
                    </form>
                     <hr>
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>Date Procured</th>
                                <th>Mode of Acquisition</th>
                                <th>Stock Key Unit</th>
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


                    <!--PRINTABLE FORM-->
                         <div style="display: none" id="printablearea">
                                <div class="">
                                     <img  src="../../Resources/images/PUP/QCheader.png" style="height:40%; width:60%; "> 
                                </div>
                                <div style="margin-top: 10px; margin-left: 15px">
                                    <div style="text-align: left; ">
                                        <h5 style="font-size: 15px; text-align: right">Report No. OPR-<?php echo date('m-d'); ?> </h5>
                                        <h5 style="font-size: 15px">Date Generated: <br>
                                            <?php echo date('F d, Y'); ?>
                                        </h5>
                                        <center>
                                            <b style="font-size: 20px">Office Supplies Procurement Report</b><br>
                                        </center>
                                        <br>
                                        <h5>Report Description:</h5> 
                                        <p style="text-align: justify; font-size: 14px">   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                            This report shows the details of the university campus' frequency of procurement as per mode of acquisition and the detailed information of the procurement records. Details may be filtered by the one who generated this report in order to specify the significant details of the said report.
                                        </p>
                                        <h5>Chart Description:</h5> 
                                        <p style="text-align: justify; font-size: 14px">   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                            The chart shows the graphical details of the office supplies items frequency of procurement per mode of acquisition.
                                        </p>
                                    </div>
                                    <div>
                                            <script src="js/code/highcharts.js"></script>
                                            <script src="js/code/modules/data.js"></script>
                                            <script src="js/code/modules/exporting.js"></script>

                                            <div id="inventory2" style="width: 97%; height: 400px;"></div>

                                                    <table style="display: none;" id="datatableacqin">
                                                       <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Mode of Acquisition</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                                $view_query = mysqli_query($connection,"SELECT COUNT(`Mode_Acquisition`) AS DFR FROM `ims_t_acquisition` WHERE `Mode_Acquisition` = 'DeliveryFromRequest' ");
                                                while($row = mysqli_fetch_assoc($view_query))
                                                    {   
                                                        $name = 'Procurement From Request';
                                                        $quan = $row["DFR"];
                                                          
                                            ?>    
                                            <tr>
                                                <th><?php echo $name;?></th>
                                                <th><?php echo $quan;?></th>
                                            </tr>  
                                        
                                            <?php 
                                                }
                                            ?>
                                             <?php
                                                $view_query = mysqli_query($connection,"SELECT COUNT(`Mode_Acquisition`) AS PRCH FROM `ims_t_acquisition` WHERE `Mode_Acquisition` = 'Purchased' ");
                                                while($row = mysqli_fetch_assoc($view_query))
                                                    {   
                                                        $name = 'Purchased';
                                                        $quan = $row["PRCH"];
                                                          
                                            ?>    
                                            <tr>
                                                <th><?php echo $name;?></th>
                                                <th><?php echo $quan;?></th>
                                            </tr>  
                                        
                                            <?php 
                                                }
                                            ?>
                                            <?php
                                                $view_query = mysqli_query($connection,"SELECT COUNT(`Mode_Acquisition`) AS DNTD FROM `ims_t_acquisition` WHERE `Mode_Acquisition` = 'Donated' ");
                                                while($row = mysqli_fetch_assoc($view_query))
                                                    {   

                                                        $name = 'Donated';
                                                        $quan = $row["DNTD"];
                                                          
                                            ?>    
                                            <tr>
                                                <th><?php echo $name; ?></th>
                                                <th><?php echo $quan; ?></th>
                                            </tr>  
                                        
                                            <?php 
                                                }
                                            ?>
                                            </tbody>
                                    </table>

                                           <script type="text/javascript">

                                            Highcharts.chart('inventory2', {
                                                data: {
                                                    table: 'datatableacqin'
                                                },
                                                chart: {
                                                    type: 'bar'
                                                },
                                                title: {
                                                    text: 'Frequency of Different Modes of Acquisition'
                                                },
                                                yAxis: {
                                                    allowDecimals: false,
                                                    title: {
                                                        text: 'Frequency Level'
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
                                                            The table below shows the filtered details of the office supply items procurement records as of <?php echo date('F d, Y') ?>.
                                        </p>
                                     <table  class="display table table-bordered table-striped" id="dynamic-tabl">
                                            <thead>
                                                <tr>
                                                    <th>Date Procured</th>
                                                    <th>Mode of Acquisition</th>
                                                    <th>Stock Key Unit</th>
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
