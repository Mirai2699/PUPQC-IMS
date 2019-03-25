<?php
     include("DPJSHeader.php");
     include("DPJSCore.php");
     include("DPJSCustom.php");

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
                    <a  href="DPmainpage.php">
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
                        <li><a href="DPAddNewReq.php">Add New</a></li>
                        <li><a href="DPPenReq.php">Pending</a></li>
                        <li><a href="DPAprReq.php">Approved</a></li>                   
                    </ul>
                </li>
                  <li>
                    <a class="active" href="DPAcquired.php">
                        <i class="fa  fa-download"></i>
                        <span>Claimed Items</span>
                    </a>
                </li>
               
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">     
                        <li><a href="DPTotalAcq.php">Procurement</a></li>               
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
                    <li><a href="DPmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DPAcquired.php">Acquired Items</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="background-color:  gray; color: white">
                        Actual Release Reference Record 
                    </header>
                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th>Date Requested</th>
                            <th>Date Approved</th>
                            <th>Date Issued</th>
                            <th>Stock Key Unit</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>DR No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $office = $_SESSION['DEPART'];
                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_dept_issuance` AS SUMREQ
                                                                    INNER JOIN pso_r_office AS OFF
                                                                    ON SUMREQ.Office_Request = OFF.O_NAME
                                                                    WHERE OFF.O_ID = '$office' ORDER BY Batch_No DESC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {
                                    $bn = $row["Issue_No"];
                                    $DR = $row["Date_Requested"];
                                    $DApr = $row["Date_Approved"];
                                    $DIss = $row["Date_Issued"];
                                    $sku = $row["SKU"]; 
                                    $name = $row["Item_Name"];
                                    $quan   = $row["Quantity"];     
                                    $AccID = $row["Account_Issued"];
                                    $office = $row["Office_Request"];
                                    $batch = $row["Batch_No"];
                                
                        ?>      
                                 <tr class="gradeX">
                                        <td><?php echo $DR; ?></td>
                                        <td><?php echo $DApr; ?></td>
                                        <td><?php echo $DIss; ?></td>
                                        <td><?php echo $sku; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $quan; ?></td>
                                        <td><?php echo $batch; ?></td>
                                        
                                </tr>  

                                    <?php 
                                      } 
                                    ?>
                                 </tbody>
                                   <tfoot>
                                        <tr>
                                            <th>Date Requested</th>
                                            <th>Date Approved</th>
                                            <th>Date Issued</th>
                                            <th>Stock Key Unit</th>
                                            <th>Item Name</th>
                                            <th>Quantity</th>
                                            <th>Batch No.</th>
                                        </tr>
                                    </tfoot>
                                 </table>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </section>


                                              

        </section>
    </section>
    <!--main content end-->


</section>



</body>
</html>
