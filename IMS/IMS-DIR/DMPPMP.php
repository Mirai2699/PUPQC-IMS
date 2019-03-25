<?php
     include ("DMHeader.php");
     include ("DMJSCore.php");
     include ("DMJSCustom.php");

?>

<title>PPMPs | PUPQCIMS</title>


<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a href="DMmainpage.php">
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
                        <li><a href="DMPenReq.php">Pending</a></li>
                        <li><a href="DMRevReq.php">For Revision</a></li> 
                        <li><a href="DMAprReq.php">Approved</a></li>    
                        <li><a href="DMRelsReq.php">Released</a></li>             
                    </ul>
                </li>
                <li>
                    <a class="active" href="DMPPMP.php">
                        <i class="fa  fa-calendar"></i>
                        <span>PPMP</span>
                    </a>
                </li>
               
                 <li>
                    <a href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                   <ul class="sub" >
                        <li><a href="javascript:;">Requisition</a>
                           <ul class="sub" >
                              <li><a class="active" href="DMReportReqOff.php">Office Supplies</a></li>
                              <li><a href="DMReportReqMed.php">Medicinal Supplies</a></li> 
                              <li><a href="DMReportReqCli.php">Clinical Supplies</a></li>       
                          </ul>
                        </li>
                        </li>     
                        <li><a href="javascript:;">Acquisition</a>
                           <ul class="sub">
                              <li><a href="DMReportAcqOff.php">Office Supplies</a></li>
                              <li><a href="DMReportAcqMed.php">Medicinal Supplies</a></li> 
                              <li><a href="DMReportAcqCli.php">Clinical Supplies</a></li>       
                          </ul>
                        </li>
                        <li><a href="DMReportIss.php">Issuance</a></li> 
                        <li><a href="javascript:;">Inventory Stocks</a>
                           <ul class="sub">
                              <li><a href="DMReportInvOff.php">Office Supplies</a></li>
                              <li><a href="DMReportInvMed.php">Medicinal Supplies</a></li> 
                              <li><a href="DMReportInvCli.php">Clinical Supplies</a></li>       
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
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                   <li><a href="DMmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DMPPMP.php">View PPMP</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
        
      
    <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="background-color: #00c853; color: white">
                         Project procurement management plan for medicinal Supplies
                    </header>
            <form class="col s12">

                <div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th>PPMP No.</th>
                                    <th>Date Created</th>
                                    <th>Date Requested</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $accid = $_SESSION['AccountID'];
                                    $view_query = mysqli_query($connection,"SELECT * FROM ims_t_ppmp_med_summary AS SUMREQ
                                                                            INNER JOIN pso_r_user AS ACC
                                                                            WHERE ACC.U_ID = '$accid' ORDER BY MED_PPMP_ID DESC");

                                       while($row = mysqli_fetch_array($view_query))
                                        {
                                                $bn = $row["MED_PPMP_ID"];
                                                $DCreate = $row["MED_PPMP_Date_Created"];
                                                $DRequest = $row["MED_PPMP_Date_Request"];
                                        ?>      
                                         <tr class="gradeX">
                                                <td><?php echo $bn; ?></td>
                                                <td><?php echo $DCreate; ?></td>
                                                 <td><?php echo $DRequest; ?></td>
                                                <td style='width:150px'>
                                                        <center>
                                                            
                                                        <a data-toggle="modal" class="btn btn-default" style="background-color: gray"
                                                        href="DMReviewMEDPPMP.php?viewrequests=<?php echo $bn; ?>">View</a>               
                                                        </center>
                                               </td>
                                        </tr>  
                                            <?php 
                                                } 
                                      ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </form>
            </section>
            </div>
        </div>
    </section>
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="background-color: #eeff41; color: black">
                         Project procurement management plan for medical clinic Supplies and materials
                    </header>
            <form class="col s12">

                <div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="editable-sample">
                            <thead>
                                <tr>
                                    <th>PPMP No.</th>
                                    <th>Date Created</th>
                                    <th>Date Requested</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $accid = $_SESSION['AccountID'];
                                    $view_query = mysqli_query($connection,"SELECT * FROM ims_t_ppmp_clinic_summary AS SUMREQ
                                                                            INNER JOIN pso_r_user AS ACC
                                                                            WHERE ACC.U_ID = '$accid' ORDER BY MED_PPMP_ID DESC");

                                       while($row = mysqli_fetch_array($view_query))
                                        {
                                                $bn = $row["MED_PPMP_ID"];
                                                $DCreate = $row["MED_PPMP_Date_Created"];
                                                $DRequest = $row["MED_PPMP_Date_Request"];
                                        ?>      
                                         <tr class="gradeX">
                                                <td><?php echo $bn; ?></td>
                                                <td><?php echo $DCreate; ?></td>
                                                 <td><?php echo $DRequest; ?></td>
                                                <td style='width:150px'>
                                                        <center>
                                                            
                                                        <a data-toggle="modal" class="btn btn-default" style="background-color: gray"
                                                        href="DMReviewCLIPPMP.php?viewrequests=<?php echo $bn; ?>">View</a>               
                                                        </center>
                                               </td>
                                        </tr>  
                                            <?php 
                                                } 
                                      ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </form>
            </section>
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
