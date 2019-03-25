<?php 
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");
?>


<title>Delivery Details | PUPQC IMS</title>

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
                    <a class="active" href="PCDelDet.php">
                        <i class="fa fa-truck"></i>
                        <span>Delivery Details</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">
                        <li><a href="PCReportReqOff.php">Requisition</a></li>     
                        <li><a href="PCReportAcqOff.php">Procurement</a></li>
                        <li><a href="PCReportIss.php">Issuance</a></li> 
                        <li><a href="PCReportInvOff.php">Inventory Stocks</a></li>               
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
                    <li><a href="PCDelDet.php">Delivery Details</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
         <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#home">Procurement of Office Supplies</a>
                        </li><!--
                        <li class="">
                            <a data-toggle="tab" href="#about">About</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#profile">Profile</a>
                        </li>-->
                       
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="home" class="tab-pane active">
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
                                                                $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_acquisition`");
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
                        </div>
                        <div id="about" class="tab-pane">
                      <div class="row">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading">
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
                                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_clinic`");
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

                      
                                <!--end container-->
                            </section>
                            </div>
                        </div>

                        </div>
                        <div id="profile" class="tab-pane">

                        </div>
                    </div>
                </div>
            </section>

        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>


</body>
</html>
