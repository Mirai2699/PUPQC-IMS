<?php 
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");
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
                <li>
                    <a class="active" href="PCInventory.php">
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
                    <li><a href="PCInventory.php">Inventory Status</a></li>
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
                    <header class="panel-heading" style="background-color: gray; color:white">
                       Inventory Status
                    </header>
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
                                        
                              
                                        </tbody>
                                    </table>

      
                <!--end container-->
            </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>


</section>

</body>
</html>
