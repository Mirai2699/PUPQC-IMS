<?php
     include("MEDJSHeader.php");
     include("MEDJSCore.php");
     include("MEDJSCustom.php");
     include("MEDJSCharts.php");
    
?>

<title>Home | PUPQCIMS</title>

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a class="active" href="MEDmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-medkit"></i>
                        <span>Medicinal Items</span>
                    </a>
                    <ul class="sub">
                        <li><a href="javascript:;"><i class="fa  fa-envelope"></i>Requisition</a>
                            <ul class="sub">
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
                            <a href="javascript:;"><i class="fa  fa-calendar"></i>PPMP</a>
                             <ul class="sub">
                                    <li><a href="MEDPPMP.php">Medicinal Stocks</a>
                                         <ul class="sub">
                                            <li><a href="MED_ADDPPMP.php">Create Plan</a></li>
                                            <li><a href="MED_VIEWPPMP.php">View Plans</a></li>
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
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

  <!--mini statistics start-->
        <div class="row">
            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon orange"><i class="fa  fa-envelope"></i></span>
                    <div class="mini-stat-info">
                        <span>
                        <?php
                            $office = $_SESSION['DEPART'];
                            $sqlemp = "SELECT * FROM `pso_r_office` 
                                       WHERE O_ID = '$office' ";
                                       $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                       while($row = mysqli_fetch_assoc($results))
                                               {
                                                   $oname = $row['O_NAME'];
                                                                    
                            $sql = "SELECT * FROM ims_t_med_summary_request WHERE Depart_Name = '$oname' ";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Total Batch of M.C.H.O Requisitions
                      
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon tar"><i class="fa fa-download"></i></span>
                    <div class="mini-stat-info">
                        <span>
                            <?php
                           
                            $sql="SELECT * FROM ims_t_acquisition_med";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                      </span>
                        Total Batch of M.C.H.O Procured Items
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon green"><i class="fa fa-medkit"></i></span>
                    <div class="mini-stat-info">
                        <span>
                            <?php
                           
                            $sql="SELECT DISTINCT Med_Name FROM ims_r_medicinal_stock";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                      </span>
                        Total of Different Medicinal Stocked Items
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon pink"><i class="fa fa-plus-circle"></i></span>
                    <div class="mini-stat-info">
                        <span>
                            <?php
                           
                            $sql="SELECT * FROM ims_r_clinical_stock";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                      </span>
                        Total of Different Clinical Stocked Items
                    </div>
                </div>
            </div>
            <!---
            <div class="col-md-4">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon pink"><i class="fa fa-reply"></i></span>
                    <div class="mini-stat-info">
                        <span>
                             <?php
                           
                            $sql="SELECT * FROM ims_t_dept_summary_returns WHERE Depart_Name = '$oname' AND Status = 'RETURNED' ";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Total Batch of <?php echo $oname; ?> Returned Items
                        <?php } ?>
                    </div>
                </div>
            </div>
            
        </div>
<!--mini statistics end-->
        
                <div class="col-md-6">
                    <script src="js/code/highcharts.js"></script>
                    <script src="js/code/modules/data.js"></script>
                    <script src="js/code/modules/exporting.js"></script>    
                    <center>
                    <div id="inventory" style="width: 100%; height: 500px;"></div>

                            <table style="display: none;" id="datatableinv">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Frequency of Request</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        //$off = $_SESSION['DEPART'];
                                        $view_query = mysqli_query($connection,"SELECT DISTINCT Item_Name, MED_Quantity FROM `ims_t_med_requisition` AS REQ 
                                                                                INNER JOIN `ims_r_medicinal_stock` AS STK ON STK.MED_Name = REQ.Item_Name
                                                                                WHERE Quantity > 10");
                                        while($row = mysqli_fetch_assoc($view_query))
                                            {   
                                                $name = $row["Item_Name"];
                                                $quan = $row["MED_Quantity"];
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
                            text: 'M.C.H.O Tally of Most Requested Items in terms of Medicinal Supplies'
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
                <div class="col-md-6">
                    <script src="js/code/highcharts.js"></script>
                    <script src="js/code/modules/data.js"></script>
                    <script src="js/code/modules/exporting.js"></script>    
                    <center>
                    <div id="inventorycli" style="width: 100%; height: 500px;"></div>

                            <table style="display: none;" id="datatableinvcli">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Frequency of Request</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        //$off = $_SESSION['DEPART'];
                                        $view_query = mysqli_query($connection,"SELECT DISTINCT CLI_Name, CLI_Quantity FROM `ims_t_clinic_requisition` AS REQ
                                                                                INNER JOIN `ims_r_clinical_stock` AS STK ON STK.Item_Name = REQ.CLI_Name
                                                                                WHERE Quantity > 10");
                                        while($row = mysqli_fetch_assoc($view_query))
                                            {   
                                                $name = $row["CLI_Name"];
                                                $quan = $row["CLI_Quantity"];
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

                    Highcharts.chart('inventorycli', {
                        data: {
                            table: 'datatableinvcli'
                        },
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'M.C.H.O Tally of Most Requested Items in terms of Clinical Supplies'
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

                 <div class="col-md-6" style="margin-top: 20px">
                        <script src="../js/code/highcharts.js"></script>
                        <script src="../js/code/modules/data.js"></script>
                        <script src="../js/code/modules/exporting.js"></script>

                        <div id="acquisition" style="width: 100%; height: 500px;"></div>

                                <table style="display: none;" id="datatableacq">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Mode of Acquisition</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT COUNT(`Mode_Acquisition`) AS DFR FROM `ims_t_acquisition_med` WHERE `Mode_Acquisition` = 'DeliveryFromRequest' ");
                                        while($row = mysqli_fetch_assoc($view_query))
                                            {   
                                                $name = 'Delivery From Request';
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
                                        $view_query = mysqli_query($connection,"SELECT COUNT(`Mode_Acquisition`) AS PRCH FROM `ims_t_acquisition_med` WHERE `Mode_Acquisition` = 'Purchased' ");
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
                                        $view_query = mysqli_query($connection,"SELECT COUNT(`Mode_Acquisition`) AS DNTD FROM `ims_t_acquisition_med` WHERE `Mode_Acquisition` = 'Donated' ");
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

                        Highcharts.chart('acquisition', {
                            data: {
                                table: 'datatableacq'
                            },
                            chart: {
                                type: 'pie'
                            },
                            title: {
                                text: 'Procured Items by  Different Modes of Acquisition in terms of Medicinal Supplies'
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


                     <div class="col-md-6" style="margin-top: 20px">
                        <script src="../js/code/highcharts.js"></script>
                        <script src="../js/code/modules/data.js"></script>
                        <script src="../js/code/modules/exporting.js"></script>

                        <div id="acquisitioncli" style="width: 100%; height: 500px;"></div>

                                <table style="display: none;" id="datatableacqcli">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Mode of Acquisition</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT COUNT(`Mode_Acquisition`) AS DFR FROM `ims_t_acquisition_clinic` WHERE `Mode_Acquisition` = 'DeliveryFromRequest' ");
                                        while($row = mysqli_fetch_assoc($view_query))
                                            {   
                                                $name = 'Delivery From Request';
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
                                        $view_query = mysqli_query($connection,"SELECT COUNT(`Mode_Acquisition`) AS PRCH FROM `ims_t_acquisition_clinic` WHERE `Mode_Acquisition` = 'Purchased' ");
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
                                        $view_query = mysqli_query($connection,"SELECT COUNT(`Mode_Acquisition`) AS DNTD FROM `ims_t_acquisition_clinic` WHERE `Mode_Acquisition` = 'Donated' ");
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

                        Highcharts.chart('acquisitioncli', {
                            data: {
                                table: 'datatableacqcli'
                            },
                            chart: {
                                type: 'pie'
                            },
                            title: {
                                text: 'Procured Items by  Different Modes of Acquisition in terms of Clinical Supplies'
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
            </center>

    </section>
</section>

</section>


</body>
</html>
