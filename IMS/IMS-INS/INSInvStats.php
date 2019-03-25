<?php 
     include ("INSHeader.php");
     include ("INSJSCore.php");
     include ("INSJSCustom.php");
     include ("INSJSCharts.php");
?>


    <title>Inventory Status | PUPQC IMS</title>

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
                    <a class="active" href="INSInvStats.php">
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
        <!-- page start-->

         <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="INSmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="INSInvStats.php">Current Status of Inventory</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
       <div class="row">
            <div class="col-sm-12">
         <!-- START CONTENT -->
            <section id="content">
                     <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="background-color: gray; color: white">
                        Current Quantity of Stock in the Inventory    
                    </header>
                <div>
                    <script src="js/code/highcharts.js"></script>
                    <script src="js/code/modules/data.js"></script>
                    <script src="js/code/modules/exporting.js"></script>

                    <script src="js/code/stock/highstock.js"></script>
                    <script src="js/code/stock/modules/exporting.js"></script>

                    <div id="inventory" style="width: 98%; height: 350px;"></div>

                            <table style="display: none;" id="datatableinv">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT * FROM `ims_r_office_stock` order by Stock_Key_Unit ASC");
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
                            text: 'Quantity Level of the Inventory Stocks'
                        },
                        yAxis: {
                            allowDecimals: false,
                            title: {
                                text: 'Quantity Level'
                            },
                            scrollbar: {
                                    enabled: true
                                },
                                tickLength: 0
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





                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th style="display: none;">No</th>
                            <th style="width: 8%">Stock Key Unit</th>
                            <th style="width: 15%">Name</th>
                            <th style="width: 10%">Category</th>
                            <th style="width: 10%">Unit</th>
                            <th style="width: 5%">Quantity</th>
                            <th style="width: 7%">Critical level</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_r_office_stock`");
                            while($row = mysqli_fetch_assoc($view_query))
                                {
                                    $No = $row["Item_No"];
                                    $SKU = $row["Stock_Key_Unit"];
                                    $name = $row["Item_Name"];       
                                    $category = $row["Item_Category"];  
                                    $unit = $row["Unit"];  
                                    $quan = $row["Quantity"];
                                    $crit = $row["Critical_level"]; 

                                
                        ?>      
                                 <tr class="gradeX">
                                        <td style="display: none;"><?php echo $No; ?></td>
                                        <td style="width: 8%"><?php echo $SKU; ?></td>
                                        <td style="width: 15%"><?php echo $name; ?></td>
                                        <td style="width: 10%"><?php echo $category; ?></td>
                                        <td style="width: 10%"><?php echo $unit; ?></td>
                                        
                                            <?php 
                                                if($quan <= $crit)
                                                {  ?>
                                                    <td style="width: 5%; background-color: red; color: white"><?php echo $quan; ?></td>

                                            <?php    }
                                            ?>
                                             <?php 
                                                if($quan > $crit)
                                                {  ?>
                                                    <td style="width: 5%"><?php echo $quan; ?></td>

                                            <?php    }
                                            ?>
                                        
                                        <td style="width: 7%"><?php echo $crit; ?></td>
                                        
                                </tr>  

                                <?php 
                                  } 
                                    ?>

      
                <!--end container-->
            </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<!--right sidebar start-->
<div class="right-sidebar">
    <div class="search-row">
        <input type="text" placeholder="Search" class="form-control">
    </div>
    <div class="right-stat-bar">
        <ul class="right-side-accordion">
        <li class="widget-collapsible">
            <ul class="widget-container">
                <li>
                    <div class="prog-row side-mini-stat clearfix">
                        <div class="side-graph-info">
                            <h4>Target sell</h4>
                            <p>
                                25%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="target-sell">
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="side-graph-info">
                            <h4>product delivery</h4>
                            <p>
                                55%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="p-delivery">
                                <div class="sparkline" data-type="bar" data-resize="true" data-height="30" data-width="90%" data-bar-color="#39b7ab" data-bar-width="5" data-data="[200,135,667,333,526,996,564,123,890,564,455]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="side-graph-info payment-info">
                            <h4>payment collection</h4>
                            <p>
                                25%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="p-collection">
                                <span class="pc-epie-chart" data-percent="45">
                                <span class="percent"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="side-graph-info">
                            <h4>delivery pending</h4>
                            <p>
                                44%, Deadline 12 june 13
                            </p>
                        </div>
                        <div class="side-mini-graph">
                            <div class="d-pending">
                            </div>
                        </div>
                    </div>
                    <div class="prog-row side-mini-stat">
                        <div class="col-md-12">
                            <h4>total progress</h4>
                            <p>
                                50%, Deadline 12 june 13
                            </p>
                            <div class="progress progress-xs mtop10">
                                <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
        </ul>
    </div>
</div>
<!--right sidebar end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->


    

</body>
</html>
