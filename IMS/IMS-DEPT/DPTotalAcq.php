    <?php
     include("DPJSHeader.php");
     include("DPJSCore.php");
     include("DPJSCustom.php");

?>



<title>Procurement Report | PUPQC IMS</title>


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
                    <a href="DPAcquired.php">
                        <i class="fa  fa-download"></i>
                        <span>Claimed Items</span>
                    </a>
                </li>
                
                <li>
                    <a class="active"  href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="active" >    
                        <li><a class="active" href="DPTotalAcq.php">Procurement</a></li>               
                    </ul>
                </li>
                <hr>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
    <!--main content start-->/
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="DPmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DPTotalAcq.php">Procurement Report</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        



         <!--tab nav start-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#home">Local Supplies Procurement</a>
                        </li>
                       
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <!-- 1st Tab STARTS HERE-->
                        <div id="home" class="tab-pane active">
                            <!-- TABLE START -->

                            <section id="content">
                             <div class="row">
                                <div class="col-sm-12">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            Actual Procurement from Actual Releases Report
                                        </header>
                                          <div>
                    <script src="js/code/highcharts.js"></script>
                    <script src="js/code/modules/data.js"></script>
                    <script src="js/code/modules/exporting.js"></script>



         <div id="ReqRanking" style="width: 98%; height: 90%; margin: 0 auto"></div>

                    <script type="text/javascript">
                    Highcharts.chart('ReqRanking', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: '<?php 
                                               $office = $_SESSION['DEPART'];
                                               $sqlemp = "SELECT * FROM `pso_r_office` 
                                               WHERE O_ID = '$office' ";
                                               $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                               while($row = mysqli_fetch_assoc($results))
                                                       {
                                                           $oname = $row['O_NAME'];
                                                                            
                                   echo $oname;}
                                    ?> Records of Procurement'
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
                            enabled: false,
                            format: '{point.y:.0f}'
                          }
                        }
                    },
                    tooltip: {
                        // headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: 'A Total Frequency Average of <b>{point.y:.0f}</b> {point.name}<br/>'
                    },
                    series: [    
                                <?php 
                                    $office = $_SESSION['DEPART'];
                                    $sqlemp = "SELECT * FROM `pso_r_office` 
                                    WHERE O_ID = '$office' ";
                                    $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                    while($row = mysqli_fetch_assoc($results))
                                            {
                                                $Office = $row['O_NAME'];
                                ?>
                              {  
                                name: 'Departments',
                                colorByPoint: true,
                                data: [
                                          <?php
                                          $view_query2 = mysqli_query($connection,"SELECT DISTINCT Item_Name AS Item_Requested from ims_t_dept_issuance WHERE Office_Request = '".$Office."'");
                                              while($row2 = mysqli_fetch_assoc($view_query2))
                                                  {
                                                    $Items = $row2["Item_Requested"];
                                          ?>
                                                {
                                                  name: '<?php echo($Items) ?>',
                                                  y: <?php 
                                                      $view_query3 = mysqli_query($connection,"SELECT COUNT(*) AS Item_Count from ims_t_dept_issuance where Item_Name = '".$Items."' AND Office_Request = '".$Office."'");
                                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                                      {
                                                        $ItemCount = $row3["Item_Count"];
                                                        echo($ItemCount);
                                                      }
                                                     ?>,
                                                },
                                          <?php 
                                            }
                                          ?>
                                     ]
                            <?php
                                } 
                            ?>
                          }]
                    });
                    </script>
               </div>
               <br>
                                            <form class="col s12" method="POST">

                                              <div class="panel-body">
                                                <div class="adv-table">
                                                    <div class="col-md-12" style="text-align: left">
                                                         <div class="col-md-2">
                                                            <div class="form-group">
                                                            <label>Filter Type:</label>
                                                                <select class="form-control" name="filterstat" style="color: black;">
                                                                    <option selected value="ALL">All</option>
                                                                    <option value="Item">By Item</option>
                                                                    <option value="DATE">By Date Procured</option>
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
                                                                                            $sqlemp= "SELECT DISTINCT Item_Name FROM `ims_t_dept_issuance` ";
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
                                                       <div class="col-md-5" style="border-style: solid; border-width: 1px">
                                                            <label>Filter by Date Requested</label>
                                                            <div class="form-group">
                                                              <div class="col-md-6">
                                                                <input id="startdate" style="color: black;" type="date" name="StartDate" class="form-control"/>
                                                              </div>
                                                              <div class="col-md-6">
                                                                <input id="enddate" style="color: black;" type="date" name="EndDate" class="form-control"/>
                                                              </div>
                                                           </div>
                                                         </div>
                                                         
                                                      
                                                            <div class="col-md-1" style="margin-top: 21px">
                                                                <button type="submit" class="btn btn-info" name="FilterIssuance"><i class="fa fa-refresh"></i>   Filter</button> 
                                                            </div>
                                                            <div class="col-md-1" style="margin-top: 21px">
                                                                  <button class="btn btn-success" onclick="printDiv('printablearea')" name="Print"><i class="fa fa-print"></i>   Print</button><br>
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
                                                            <th>DR No.</th>
                                                            <th>Account Used</th>
                                                                              
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
                                        <h5 style="font-size: 15px; text-align: right">Report No. DP-<?php echo date('m-d'); ?> </h5>
                                        <h5 style="font-size: 15px">Date Generated: <br>
                                            <?php echo date('F d, Y'); ?>
                                        </h5>
                                        <center>
                                            <b style="font-size: 20px"> Actual Procurement from Actual Releases Report</b>
                                        </center>
                                        <h5>Report Description:</h5> 
                                        <p style="text-align: justify; font-size: 14px">   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                       This report shows the details of the 
                                                        <?php 
                                                                   $office = $_SESSION['DEPART'];
                                                                   $sqlemp = "SELECT * FROM `pso_r_office` 
                                                                   WHERE O_ID = '$office' ";
                                                                   $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                   while($row = mysqli_fetch_assoc($results))
                                                                           {
                                                                               $oname = $row['O_NAME'];
                                                                                                
                                                       echo $oname;}
                                                        ?>'s

                                     most procured or most requested items from the property and supply office of the university campus. Details may be filtered by the one who generated this report in order to specify the significant details of the said report.
                                        </p>
                                        <h5>Chart Description:</h5> 
                                        <p style="text-align: justify; font-size: 14px">   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                            The chart shows the graphical details of the most procured items of the department.
                                        </p>
                                    </div>
                                    <div>
                                            <script src="js/code/highcharts.js"></script>
                                            <script src="js/code/modules/data.js"></script>
                                            <script src="js/code/modules/exporting.js"></script>

                                          
         <div id="ReqRanking1" style="width: 98%; height: 80%; margin: 0 auto"></div>

                    <script type="text/javascript">
                    Highcharts.chart('ReqRanking1', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: '<?php 
                                               $office = $_SESSION['DEPART'];
                                               $sqlemp = "SELECT * FROM `pso_r_office` 
                                               WHERE O_ID = '$office' ";
                                               $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                               while($row = mysqli_fetch_assoc($results))
                                                       {
                                                           $oname = $row['O_NAME'];
                                                                            
                                   echo $oname;}
                                    ?> Records of Procurement'
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
                            enabled: false,
                            format: '{point.y:.0f}'
                          }
                        }
                    },
                    tooltip: {
                        // headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: 'A Total Frequency Average of <b>{point.y:.0f}</b> {point.name}<br/>'
                    },
                    series: [    
                                <?php 
                                    $office = $_SESSION['DEPART'];
                                    $sqlemp = "SELECT * FROM `pso_r_office` 
                                    WHERE O_ID = '$office' ";
                                    $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                    while($row = mysqli_fetch_assoc($results))
                                            {
                                                $Office = $row['O_NAME'];
                                ?>
                              {  
                                name: 'Departments',
                                colorByPoint: true,
                                data: [
                                          <?php
                                          $view_query2 = mysqli_query($connection,"SELECT DISTINCT Item_Name AS Item_Requested from ims_t_dept_issuance WHERE Office_Request = '".$Office."'");
                                              while($row2 = mysqli_fetch_assoc($view_query2))
                                                  {
                                                    $Items = $row2["Item_Requested"];
                                          ?>
                                                {
                                                  name: '<?php echo($Items) ?>',
                                                  y: <?php 
                                                      $view_query3 = mysqli_query($connection,"SELECT COUNT(*) AS Item_Count from ims_t_dept_issuance where Item_Name = '".$Items."' AND Office_Request = '".$Office."'");
                                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                                      {
                                                        $ItemCount = $row3["Item_Count"];
                                                        echo($ItemCount);
                                                      }
                                                     ?>,
                                                },
                                          <?php 
                                            }
                                          ?>
                                     ]
                            <?php
                                } 
                            ?>
                          }]
                    });
                    </script>

                                        </div>
                                    <hr>
                                    <h5>Table Description:</h5> 
                                        <p style="text-align: justify; font-size: 14px">   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                                            The table below shows the filtered details of the office's most procured/requested items.
                                        </p>
                                     <table  class="display table table-bordered table-striped" id="dynamic-tabl">
                                              <thead>
                                                    <tr>
                                                            <th>Date Requested</th>
                                                            <th>Date Approved</th>
                                                            <th>Date Issued</th>
                                                            <th>Item Name</th>
                                                            <th>Quantity</th>
                                                            <th>DR No.</th>
                                                            <th>Account Used</th>
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
