<?php
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");
?>


<title>Issuance Report | PUPQC IMS</title>


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
                    <a href="PCDelDet.php">
                        <i class="fa fa-truck"></i>
                        <span>Delivery Details</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="active" >
                        <li><a href="PCReportReqOff.php">Requisition</a></li>     
                        <li><a href="PCReportAcqOff.php">Procurement</a></li>
                        <li><a class="active" href="PCReportIss.php">Issuance</a></li> 
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
                    <li><a href="PCReportIss.php">Issuance Report</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="color: white; background-color: gray">
                        Issuance of Office Supplies Report
                    </header>
                <!--CHART-->

                <form class="col s12" method="POST">
                <div>
                    <script src="js/code/highcharts.js"></script>
                    <script src="js/code/modules/data.js"></script>
                    <script src="js/code/modules/exporting.js"></script>

                   <div id="ReqRanking" style="width: 97%; height: 70%; margin: 0 auto"></div>

                    <script type="text/javascript">
                    Highcharts.chart('ReqRanking', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: "Departments' Request and Issuance Tally Chart"
                    },
                    xAxis: {
                        type: 'category',
                    },
                    yAxis: {
                        title: {
                            text: null
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.0f}'
                          }
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: A total of Procured Requests<br/>'
                    },
                    series: [{
                                name: 'Departments',
                                colorByPoint: true,
                                data: [
                                <?php
                                $view_query = mysqli_query($connection,"SELECT DISTINCT Office_Request AS Offices from ims_t_dept_issuance");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                          $Office = $row["Offices"];
                                ?>
                                {
                                  name: '<?php echo ($Office) ?>',
                                  y: <?php 
                                       $view_query2 = mysqli_query($connection,"SELECT COUNT(*) AS OfficeReqCount from ims_t_dept_issuance where Office_Request = '".$Office."'");
                                    while($row2 = mysqli_fetch_assoc($view_query2))
                                        {
                                          $OfficeReqCount = $row2["OfficeReqCount"];
                                          echo($OfficeReqCount);
                                        }
                                     ?>,
                                  
                                },
                                <?php
                                  } 
                                ?>
                        ]
                    }]
                    });
                    </script>
                </div>
                <hr>
                <!--End of Chart-->

                  <div class="panel-body">
                    <div class="adv-table">
                        <div class="col-md-12" style="text-align: left">
                             <div class="col-md-3">
                                <div class="form-group">
                                <label>Filter Type:</label>
                                    <select class="form-control" name="filterstat" style="color: black;">
                                        <option selected value="ALL">All</option>
                                        <option value="OfficeRequest">By Office</option>
                                         <option value="Item">By Item</option>
                                        <option value="BOTH">By Office and Items</option>
                                   </select>
                                   <br>
                               </div>
                             </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                <label>Filter by Office</label>
                                    <select class="form-control" name="Office" style="color: black;">
                                         <option selected value="ALL">All</option>
                                                        <?php  
                                                                $sqlemp= "SELECT * FROM `pso_r_office`";
                                                                $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                while($row = mysqli_fetch_assoc($results))
                                                                {
                                                                    $name = $row['O_NAME'];
                                                                    $id = $row['O_ID'];
                                                         ?>
                                       <option value="<?php echo $name ?>"><?php echo $name; ?></option>
                                                        <?php 
                                                            } 
                                                        ?>
                                   </select>
                                   <br>
                               </div>
                             </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                <label>Filter by Item</label>
                                  <select class="form-control" name="Item" style="color: black;">
                                   <option selected value="ALL">All</option>
                                                        <?php  
                                                                $sqlemp= "SELECT DISTINCT Item_Name FROM `ims_t_dept_issuance`";
                                                                $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                while($row = mysqli_fetch_assoc($results))
                                                                {
                                                                    $name = $row['Item_Name'];
                                                         ?>
                                       <option value="<?php echo $name ?>"><?php echo "$name"; ?></option>
                                                        <?php 
                                                            } 
                                                        ?>
                                   </select>
                                   <br>
                               </div>
                             </div>
                             
                             <div class="col-md-2"  style="text-align: left; padding-top: 22px">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" name="FilterIssuance" style="">Filter</button> 
                                   
                                </div>
                             </div>
                             <div class="col-md-1"  style="text-align: right; padding-top: 22px">
                                <div class="form-group">
                                     <button class="btn btn-success" onclick="printDiv('printablearea')" name="Print"><i class="fa fa-print"></i>   Print</button><br>
                                </div>
                             </div>
                              
                              

                              
                        </div>
                         
                    </form>
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>Date Requested</th>
                                <th>Date Approved</th>
                                <th>Date Issued</th>
                                <th>Item Name</th>             
                                <th>Quantity</th>
                                <th>Account Requested</th>
                                <th>Office Requested</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                  include("MasterReportView.php");
                                        
                                ?>
                        </tbody>
                    </table>


                    <!--PRINTABLE FORM-->
                         <div style="display: none" id="printablearea">
                                <div class="">
                                     <img  src="../../Resources/images/PUP/QCheader.png" style="height:40%; width:60%; "> 
                                </div>
                                <div style="margin-top: 10px; margin-left: 15px">
                                    <div style="text-align: left; ">
                                        <h5 style="font-size: 15px; text-align: right">Report No. OIR-<?php echo date('m-d'); ?> </h5>
                                        <h5 style="font-size: 15px">Date Generated: <br>
                                            <?php echo date('F d, Y'); ?>
                                        </h5>
                                        <center>
                                            <b style="font-size: 20px">Issuance of Office Supplies Report</b>
                                        </center>
                                        <h5>Report Description:</h5> 
                                        <p style="text-align: justify; font-size: 14px">   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                            This report shows the details of the university campus' issuance of items within the university campus. This report is modified and filtered to specify the significant details of the said report.
                                        </p>
                                        <h5>Chart Description:</h5> 
                                        <p style="text-align: justify; font-size: 14px">   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                            The chart shows the graphical details of the issuance of items within the university campus.
                                        </p>
                                    </div>
                                    <div>
                                            <script src="js/code/highcharts.js"></script>
                                            <script src="js/code/modules/data.js"></script>
                                            <script src="js/code/modules/exporting.js"></script>

                                              <div id="ReqRanking1" style="width: 97%; height: 70%; margin: 0 auto"></div>

                                                <script type="text/javascript">
                                                Highcharts.chart('ReqRanking1', {
                                                chart: {
                                                    type: 'column'
                                                },
                                                title: {
                                                    text: "Departments' Request and Issuance Tally Chart"
                                                },
                                                xAxis: {
                                                    type: 'category',
                                                },
                                                yAxis: {
                                                    title: {
                                                        text: null
                                                    }
                                                },
                                                legend: {
                                                    enabled: false
                                                },
                                                plotOptions: {
                                                    series: {
                                                    borderWidth: 0,
                                                    dataLabels: {
                                                        enabled: true,
                                                        format: '{point.y:.0f}'
                                                      }
                                                    }
                                                },
                                                tooltip: {
                                                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: A total of Procured Requests<br/>'
                                                },
                                                series: [{
                                                            name: 'Departments',
                                                            colorByPoint: true,
                                                            data: [
                                                            <?php
                                                            $view_query = mysqli_query($connection,"SELECT DISTINCT Office_Request AS Offices from ims_t_dept_issuance");
                                                                while($row = mysqli_fetch_assoc($view_query))
                                                                    {
                                                                      $Office = $row["Offices"];
                                                            ?>
                                                            {
                                                              name: '<?php echo ($Office) ?>',
                                                              y: <?php 
                                                                   $view_query2 = mysqli_query($connection,"SELECT COUNT(*) AS OfficeReqCount from ims_t_dept_issuance where Office_Request = '".$Office."'");
                                                                while($row2 = mysqli_fetch_assoc($view_query2))
                                                                    {
                                                                      $OfficeReqCount = $row2["OfficeReqCount"];
                                                                      echo($OfficeReqCount);
                                                                    }
                                                                 ?>,
                                                              
                                                            },
                                                            <?php
                                                              } 
                                                            ?>
                                                    ]
                                                }]
                                                });
                                                </script>
                                        </div>
                                    <hr>
                                    <h5>Table Description:</h5> 
                                        <p style="text-align: justify; font-size: 14px">   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                            The table below shows the filtered details of the issuance of items within the university campus.
                                        </p>
                                     <table  class="display table table-bordered table-striped" id="dynamic-tabl">
                                              <thead>
                                                    <tr>
                                                        <th>Date Requested</th>
                                                        <th>Date Approved</th>
                                                        <th>Date Issued</th>
                                                        <th>Item Name</th>             
                                                        <th>Quantity</th>
                                                        <th>Account Requested</th>
                                                        <th>Office Requested</th>  
                                                    </tr>
                                                </thead>
                                            <tbody>
                                                <?php
                                                      include("MasterReportView.php");
                                                            
                                                    ?>

                                            </tbody>
                                        </table>
                                        <br>
                                    <div style="text-align: left;">
                                        <hr>
                                        <h5>Report Generated By: <br><br><br>
                                                             <?php
                                                                                         $id = $_SESSION['AccountID'];
                                                                                         $sqlemp= "SELECT * FROM `pso_r_employee_profile` AS EMP 
                                                                                                    INNER JOIN  `pso_r_user` AS ACC WHERE ACC.U_ID = '$id' and
                                                                                                    EMP.EP_ID = ACC.EP_ID";
                                                                                                    $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                                    while($row = mysqli_fetch_assoc($results))
                                                                                                            {
                                                                                                                $fname = $row['EP_FNAME'];
                                                                                                                $mname = $row['EP_MNAME'];
                                                                                                                $lname = $row['EP_LNAME'];
                                                                                                                $job = $row["EP_TYPE"];
                                                                                                            
                                                                      ?>
                                                                     
                                                                      <br>
                                                                                         <p><b><?php  echo $fname.' '.$mname.'. '.$lname; ?></b>
                                                                                            <br><br>
                                                                                         <?php echo $job.''.', PUPQC'; ?>
                                                                                         </p>
                                                                            <?php } ?>
                                                               </h5> 
                                            
                                    <br>
                                    <hr>
                                    <p>PUPQC Inventory Management System <?php echo date('Y')?></p>
                                    </div>
                                </div>
                            </div>
                      </div>
                    
                    </div>
            </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>




    <script> 
    function printDiv(printablearea)
    {
        var printContents = document.getElementById(printablearea).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        
        window.print();
        
        document.body.innerHTML = originalContents;
    }
    </script>

   
</body>
</html>
