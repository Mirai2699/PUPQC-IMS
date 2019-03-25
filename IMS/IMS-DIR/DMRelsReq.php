<?php

     include ("DMHeader.php");
     include ("DMJSCore.php");
     include ("DMJSCustom.php");

?>



    <title>Released Requests | PUPQC IMS</title>

    
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
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-envelope"></i>
                        <span>Requests</span>
                    </a>
                    <ul class="active" >
                        <li><a href="DMPenReq.php">Pending</a></li>
                        <li><a href="DMRevReq.php">For Revision</a></li> 
                        <li><a href="DMAprReq.php">Approved</a></li>    
                        <li><a class="active" href="DMRelsReq.php">Released</a></li>           
                    </ul>
                </li>
               <li>
                    <a href="DMPPMP.php">
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
                    <li><a href="DMAprReq.php">Released / Printed Requests</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>


                   <!--tab nav start-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#fordeliver">Property and Supply Office's Requests </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#delivered">Medical Clinic and Health Office's Requests</a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="fordeliver" class="tab-pane active">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading" style="background-color: navy; color: white">
                                      Released Requests of Property and Supply Office
                                    </header>

                                  <div class="panel-body">
                                    <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                                          <thead>
                                            <tr>
                                                <th>Batch No.</th>
                                                <th>Date Requested</th>
                                                <th>Date Revised</th>
                                                <th>Date Approved</th>
                                                <th>Date Released</th>
                                                <th>Last Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_summary_request` WHERE Status_Req = 'RELEASE' ORDER BY Batch_No DESC");
                                                while($row = mysqli_fetch_assoc($view_query))
                                                    {
                                                        $bn = $row["Batch_No"];
                                                        $DR = $row["Date_Requested"];
                                                        $DRev = $row["Date_Revised"];  
                                                        $DApr = $row["Date_Approved"];
                                                        $DRels = $row["Date_Released"];  
                                                        $rmks = $row["Remarks"];
                                                    
                                            ?>      
                                                     <tr class="gradeX">
                                                            <td><?php echo $bn; ?></td>
                                                            <td><?php echo $DR; ?></td>
                                                            <td><?php echo $DRev; ?></td>
                                                            <td><?php echo $DApr; ?></td>
                                                            <td><?php echo $DRels?></td>
                                                            <td style='width:150px'><?php echo $rmks; ?></td>
                                                            <td>
                                                                    <center>
                                                                        
                                                                    <a href="DMReviewRels.php?viewrequestsoff=<?php echo $bn; ?>" class="btn btn-info">View</a>               
                                                                    </center>
                                                           </td>
                                                    </tr>  

                                                    <?php 
                                                      } 
                                                        ?>
                                          
                                <!--end container-->
                         
                                          
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </section>
                          </div>
                        </div>
                        <!--START DELIVERED-->
                        <div id="delivered" name="delivered" class="tab-pane">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading" style="background-color: #00c853; color: white">
                                       Medicinal Supplies Released Requests 
                                    </header>

                                  <div class="panel-body">
                                    <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th>Request No.</th>
                                            <th>Date Requested</th>
                                            <th>Date Approved</th>
                                            <th>Date Released</th>
                                            <th>Status</th>
                                            <th>Requested By:</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_med_summary_request` 
                                                                                    WHERE Status_Req = 'RELEASED'  ORDER BY Batch_No DESC");
                                                while($row = mysqli_fetch_array($view_query))
                                                {
                                                        $bn = $row["Batch_No"];
                                                        $DR = $row["Date_Requested"];
                                                        $DRev = $row["Date_Revised"];
                                                        $Dapr = $row["Date_Approved"];
                                                        $Drels = $row["Date_Released"];
                                                        $acc = $row["Account_Name"];
                                                        $stat = $row["Status_Req"];

                                                            echo
                                                            "<tr>
                                                                    <td>  ".$bn."     </td>                                                           
                                                                    <td>  ".$DR." </td>
                                                                    <td>  ".$Dapr."   </td>
                                                                    <td>  ".$Drels."   </td>
                                                                    <td>  ".$stat." </td>
                                                                    <td>  ".$acc." </td>
                                                                    <td style='text-align:center'>
                                                                         <a href='DM_MEDReviewRels.php?viewrequests=$bn' class='btn btn-info'>Review</a> 
                                                                    </td>
                                                             ";
                                                                 
                                                                        
                                                }

                                                
                                                    ?>
                                          
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </section>



                                <!--Clinical-->
                              <section class="panel">
                                    <header class="panel-heading" style="background-color: #eeff41; color: black">
                                       Clinical Supplies Released Requests 
                                    </header>

                                  <div class="panel-body">
                                    <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="editable-sample">
                                     <thead>
                                        <tr>
                                            <th>Request No.</th>
                                            <th>Date Requested</th>
                                            <th>Date Approved</th>
                                            <th>Date Released</th>
                                            <th>Status</th>
                                            <th>Requested By:</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $view_query = mysqli_query($connection,"SELECT * FROM `ims_t_clinic_summary_request` 
                                                                                    WHERE Status_Req = 'RELEASED'  ORDER BY Batch_No DESC");
                                                while($row = mysqli_fetch_array($view_query))
                                                {
                                                        $bn = $row["Batch_No"];
                                                        $DR = $row["Date_Requested"];
                                                        $DRev = $row["Date_Revised"];
                                                        $Dapr = $row["Date_Approved"];
                                                        $Drels = $row["Date_Released"];
                                                        $acc = $row["Account_Name"];
                                                        $stat = $row["Status_Req"];

                                                            echo
                                                            "<tr>
                                                                    <td>  ".$bn."     </td>                                                           
                                                                    <td>  ".$DR." </td>
                                                                    <td>  ".$Dapr."   </td>
                                                                    <td>  ".$Drels."   </td>
                                                                    <td>  ".$stat." </td>
                                                                    <td>  ".$acc." </td>
                                                                    <td style='text-align:center'>
                                                                         <a href='DM_CLIReviewRels.php?viewrequests=$bn' class='btn btn-info'>Review</a> 
                                                                    </td>
                                                             ";
                                                                 
                                                                        
                                                }

                                                
                                                    ?>
                                          
                                              </tbody>
                                          </table>
                                          </table>
                                      </div>
                                  </div>
                              </section>
                          </div>
                          <!--END-->
                        </div>
                    </div>
                </div>
            </section>
            <!--tab nav start-->
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>


</body>
</html>
