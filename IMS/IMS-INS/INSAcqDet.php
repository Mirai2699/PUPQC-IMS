<?php 
     include ("INSHeader.php");
     include ("INSJSCore.php");
     include ("INSJSCustom.php");

?>


    <title>Acquired Items | PUPQC IMS</title>

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
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-download"></i>
                        <span>Acquisition</span>
                    </a>
                    <ul class="active" >
                        <li><a href="INSacquire.php">Entry Items</a></li>
                        <li><a class="active" href="INSAcqDet.php">Acquired</a></li>      
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
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="INSmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="INSAcqDet.php">Acquired Items</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
    <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="background-color: gray; color: white">
                        Acquired Items
                    </header>
                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th>Date Acquired</th>
                            <th>Mode of Acquisition</th>
                            <th>R.B.N</th>
                            <th>S.K.U</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                        </tr>
                    </thead>
                    <tbody>
                                <?php
                                    $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_acquisition` ORDER BY Date_Procured DESC");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                                    $procure = $row['Date_Procured'];
                                                    $mode = $row['Mode_Acquisition'];
                                                    $sku = $row['Item_SKU'];
                                                    $quan = $row['Quantity'];
                                                    $supp = $row['Supplier']; 
                                                    $batch = $row['Request_Batch_No']; 
                                        
                                ?>      
                                         <tr class="gradeX">
                                                <td><?php echo $procure; ?></td>
                                                <td><?php echo $mode; ?></td>
                                                <td><?php echo $batch; ?></td>
                                                <td><?php echo $sku; ?></td>
                                                <td><?php echo $quan; ?></td>
                                                <td><?php echo $supp; ?></td>
                                                
                                        </tr>  

                                        <?php 
                                          } 
                                            ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                <!--end container-->
            </section>
            </div>
        </div>
    </section>
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

<!--right sidebar end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->



    <script>
    var $table = $('#table');
    $(function () {
        $('#modalTable').on('shown.bs.modal', function () {
            $table.bootstrapTable('resetView');
        });
    });
</script>

</body>
</html>
