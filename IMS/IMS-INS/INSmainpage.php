<?php 
     include ("INSHeader.php");
     include ("INSJSCore.php");
     include ("INSJSCustom.php");    
?>

    <title>Home | PUPQC IMS</title>

<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a class="active" href="INSmainpage.php">
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
                    <a href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">
                        <li><a href="INSrepacquired.php">Acquisition</a></li>    
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
           

            <div class="col-md-4">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon orange"><i class="fa fa-truck"></i></span>
                    <div class="mini-stat-info">
                        <span>
                             <?php
                           
                            $sql="SELECT * FROM ims_t_summary_request WHERE Accept_Status = 'DELIVERED' ";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Total Number of Requests Procured from Official Supplier
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon pink"><i class="fa fa-download"></i></span>
                    <div class="mini-stat-info">
                        <span>
                             <?php
                           
                            $sql="SELECT * FROM ims_t_acquisition";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Total Number of Recorded Acquisition of Office Supplies
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon green"><i class="fa fa-tasks"></i></span>
                    <div class="mini-stat-info">
                        <span>
                            <?php
                           
                            $sql="SELECT * FROM ims_r_office_stock";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Total Number of Individual Stock of Each Office Supply Items 
                    </div>
                </div>
            </div>
        </div>
<!--mini statistics end-->
        
    
                    <div class="col-md-6">
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
                                        $view_query = mysqli_query($connection,"SELECT COUNT(`Mode_Acquisition`) AS DFR FROM `ims_t_acquisition` WHERE `Mode_Acquisition` = 'DeliveryFromRequest' ");
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

                        Highcharts.chart('acquisition', {
                            data: {
                                table: 'datatableacq'
                            },
                            chart: {
                                type: 'pie'
                            },
                            title: {
                                text: 'Acquired Items by <br> Different Modes of Acquisition'
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
                    <script src="../js/code/highcharts.js"></script>
                    <script src="../js/code/modules/data.js"></script>
                    <script src="../js/code/modules/exporting.js"></script>

                    <div id="inventory" style="width: 100%; height: 500px;"></div>

                            <table style="display: none;" id="datatableinv">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Quantity of Acquisition</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT DISTINCT Item_SKU, Quantity FROM `ims_t_acquisition_med` WHERE Quantity > 9");
                                        while($row = mysqli_fetch_assoc($view_query))
                                            {   

                                                $name = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                  
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
                            table: 'datatableinv'
                        },
                        chart: {
                            type: 'bar'
                        },
                        title: {
                            text: 'Most Acquired Items By SKU'
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
                

    </section>
</section>

</section>
