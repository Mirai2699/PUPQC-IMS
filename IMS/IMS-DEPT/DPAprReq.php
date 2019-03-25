<?php
     include("DPJSHeader.php");
     include("DPJSCore.php");
     include("DPJSCustom.php");

?>



    <title>Pending Requests | PUPQC IMS</title>

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a href="DPmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-envelope"></i>
                        <span>Requests</span>
                    </a>
                    <ul class="active" >
                        <li><a href="DPAddNewReq.php">Add New</a></li>
                        <li><a href="DPPenReq.php">Pending</a></li>
                        <li><a class="active" href="DPAprReq.php">Approved</a></li>                   
                    </ul>
                </li>
                  <li>
                    <a href="DPAcquired.php">
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
                    <li><a href="DPAprReq.php">Approved Requests</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="background-color: gray; color: white">
                         Approved Requests
                    </header>
                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th>DR No.</th>
                            <th>Date Requested</th>
                            <th>Date Approved</th>
                            <th>Date Issued</th>
                            <th>Requested By:</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $office = $_SESSION['DEPART'];
                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_dept_summary_request` AS SUMREQ
                                                                    INNER JOIN pso_r_office AS OFF
                                                                    ON SUMREQ.Depart_Name = OFF.O_NAME
                                                                    WHERE SUMREQ.Status_Req = 'APPROVED' OR SUMREQ.Status_Req = 'RELEASED' AND OFF.O_ID = '$office' ORDER BY Batch_No DESC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {
                                    $bn = $row["Batch_No"];
                                    $DR = $row["Date_Requested"];
                                    $Dapr = $row["Date_Approved"];
                                    $Drel = $row["Date_Released"];
                                    $Accname = $row["Account_Name"];
                                    $Stats = $row["Status_Req"];
                                    
                                    if($Stats == "APPROVED")
                                    {
                                        echo"
                                           <tr class='gradeX'>
                                                <td>  $bn  </td>
                                                <td>  $DR  </td>
                                                <td>  $Dapr </td>
                                                <td>  $Drel </td>
                                                <td>  $Accname </td>
                                                <td style='width:150px'>
                                                        <center>
                                                        <a data-toggle='modal' class='btn btn-success' href='DPReviewApr.php?viewrequests=$bn'>Review</a>               
                                                        </center>
                                               </td>
                                          </tr>";
                                    }  
                                    else if($Stats == "RELEASED")
                                    {
                                        echo"
                                           <tr class='gradeX'>
                                                <td>  $bn  </td>
                                                <td>  $DR  </td>
                                                <td>  $Dapr </td>
                                                <td>  $Drel </td>
                                                <td>  $Accname </td>
                                                <td style='width:150px'>
                                                        <center>
                                                        <a data-toggle='modal' class='btn btn-info' href='DPReviewRels.php?viewrequests=$bn'>View</a>               
                                                        </center>
                                               </td>
                                          </tr>";
                                    }  
                                   

                                 }
                        ?>      
                    </tbody>
                     <tfoot>
                        <tr>
                            <th>Request No.</th>
                            <th>Date Requested</th>
                            <th>Date Approved</th>
                            <th>Date Issued</th>
                            <th>Requested By:</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </form>
            </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>


</body>
</html>
