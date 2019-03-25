<?php
     include ("DMHeader.php");
     include ("DMJSCore.php");
     include ("DMJSCharts.php");
     include ("DMJSCustom.php");

?>

<title>Home | PUPQCIMS</title>


<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a class="active" href="DMmainpage.php">
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

  <!--mini statistics start-->
        <div class="row">
            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon orange"><i class="fa  fa-envelope"></i></span>
                    <div class="mini-stat-info">
                        <span>
                        <?php
                           
                            $sql="SELECT * FROM ims_t_summary_request";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Total Batch of Requisitions
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon green"><i class="fa  fa-truck"></i></span>
                    <div class="mini-stat-info">
                        <span>
                        <?php
                           
                            $sql="SELECT * FROM ims_t_summary_request where Accept_Status = 'DELIVERED' ";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Total Requisitions that are delivered
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon tar"><i class="fa fa-download"></i></span>
                    <div class="mini-stat-info">
                        <span>
                            <?php
                           
                            $sql="SELECT * FROM ims_t_acquisition       ";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                      </span>
                        Total Number of Acquisitions
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon pink"><i class="fa fa-upload"></i></span>
                    <div class="mini-stat-info">
                        <span>
                             <?php
                           
                            $sql="SELECT * FROM ims_t_dept_summary_request WHERE Status_Req = 'Released' ";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Total Batch of Departmental Issuance
                    </div>
                </div>
            </div>
            
            </div>
        </div>
<!--mini statistics end-->
        

        <br/>
        <script src="../../code/highcharts.js"></script>
        <script src="../../code/modules/exporting.js"></script>
        <script src="../../code/modules/data.js"></script>
        <script src="../../code/modules/drilldown.js"></script>

        <div id="daterep" style="min-width: 50%; height: 99%; margin: 0 auto"></div>

        <script type="text/javascript">
            Highcharts.chart('daterep', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Trends of Inventory Management (Office Supplies)'
            },
            subtitle: {
                text: 'Click the points to view details'
            },
            xAxis: {
                type: 'category',
                title: {
                    text: null
                }
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
                line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: true
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: A total of <b>{point.y:.0f}</b> {point.name} data<br/>'
            },
            series: [{
                        name: 'Categories',
                        data: [
                        {
                                name: 'Acquisition',
                                y: <?php
                                    $Atemp = 0;
                                    $view_query = mysqli_query($connection,"SELECT COUNT(*) AS Req_Count from ims_t_acquisition");  
                                      while($row = mysqli_fetch_assoc($view_query))
                                        {
                                          $AReqCount = $row["Req_Count"];
                                          $Atemp = $Atemp + $AReqCount;
                                        }
                                    $view_query = mysqli_query($connection,"SELECT COUNT(*) AS Clinic_Count from ims_t_acquisition_clinic");  
                                      while($row = mysqli_fetch_assoc($view_query))
                                        {
                                          $AClinicCount = $row["Clinic_Count"];
                                          $Atemp = $Atemp + $AClinicCount;
                                        }
                                    $view_query = mysqli_query($connection,"SELECT COUNT(*) AS Med_Count from ims_t_acquisition_med");  
                                      while($row = mysqli_fetch_assoc($view_query))
                                        {
                                          $AMedCount = $row["Med_Count"];
                                          $Atemp = $Atemp + $AMedCount;
                                        }
                                          echo ($Atemp);        
                                    ?>,
                                drilldown: 'Acquisition'
                        },
                        {
                                name: 'Requisition',
                                y: <?php
                                    $temp = 0;
                                    $view_query = mysqli_query($connection,"SELECT COUNT(*) AS Req_Count from ims_t_summary_request");  
                                      while($row = mysqli_fetch_assoc($view_query))
                                        {
                                          $ReqCount = $row["Req_Count"];
                                          $temp = $temp + $ReqCount;
                                        }
                                    $view_query = mysqli_query($connection,"SELECT COUNT(*) AS Clinic_Count from ims_t_clinic_summary_request");  
                                      while($row = mysqli_fetch_assoc($view_query))
                                        {
                                          $ClinicCount = $row["Clinic_Count"];
                                          $temp = $temp + $ClinicCount;
                                        }
                                    $view_query = mysqli_query($connection,"SELECT COUNT(*) AS Med_Count from ims_t_med_summary_request");  
                                      while($row = mysqli_fetch_assoc($view_query))
                                        {
                                          $MedCount = $row["Med_Count"];
                                          $temp = $temp + $MedCount;
                                        }
                                          echo ($temp);        
                                    ?>,
                                drilldown: 'Requisition'
                        },
                        {
                                name: 'Issuance',
                                y: <?php
                                    $view_query = mysqli_query($connection,"SELECT COUNT(DISTINCT(Batch_No)) AS Rel_Count from ims_t_dept_issuance");  
                                      while($row = mysqli_fetch_assoc($view_query))
                                        {
                                          $RelCount = $row["Rel_Count"];
                                          echo($RelCount);
                                        }
                                    ?>,
                                drilldown: 'Issuance'
                        },
                ]
            }],
            drilldown: {
                series: [
                    //requisition types
                    {
                      name: 'Requisition Types',
                      id: 'Requisition',
                      data: [
                        {
                            name: 'Office Supplies',
                            y: <?php
                                $view_query = mysqli_query($connection,"SELECT COUNT(*) AS Req_Count from ims_t_summary_request");  
                                  while($row = mysqli_fetch_assoc($view_query))
                                    {
                                      $ReqCount = $row["Req_Count"];
                                      echo($ReqCount);
                                    }
                               ?>,
                            drilldown: 'RSupplies'
                        },
                        {
                            name: 'Medicinal Supplies',
                            y: <?php
                                $view_query = mysqli_query($connection,"SELECT COUNT(*) AS Med_Count from ims_t_med_summary_request");  
                                  while($row = mysqli_fetch_assoc($view_query))
                                    {
                                      $MedCount = $row["Med_Count"];
                                      echo($MedCount);
                                    }
                               ?>,
                            drilldown: 'RMedical'
                        },
                        {
                            name: 'Clinical Supplies',
                            y: <?php
                                $view_query = mysqli_query($connection,"SELECT COUNT(*) AS Clinic_Count from ims_t_clinic_summary_request");  
                                  while($row = mysqli_fetch_assoc($view_query))
                                    {
                                      $ClinicCount = $row["Clinic_Count"];
                                      echo($ClinicCount);
                                    }
                               ?>,
                            drilldown: 'RClinical'
                        },
                      ]
                    },
                    //requisition types
                    //requisition supplies
                    {
                      name: 'Yearly Data',
                      id: 'RSupplies',
                      data: [
                      <?php
                            //$temp = "null";
                        $view_query = mysqli_query($connection,"SELECT DISTINCT year(Date_Requested) AS Year_Requested from ims_t_summary_request ORDER BY year(Date_Requested) ASC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $ReqYear = $row["Year_Requested"];
                      ?>
                    {
                            name: '<?php echo $ReqYear ?>',
                            y: <?php 
                                  $view_query3 = mysqli_query($connection,"SELECT year(Date_Requested) AS Year_Requested, COUNT(year(Date_Requested)) AS Year_Quantity from ims_t_summary_request WHERE year(Date_Requested) = ".$ReqYear."  ORDER BY year(Date_Requested) ASC");
                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                      {
                                        $ReqYearQty = $row3["Year_Quantity"];
                                        echo($ReqYearQty);
                                      }
                               ?>,
                            drilldown: 'R<?php echo $ReqYear ?>'
                    },
                      <?php
                      }
                      ?>
                      ]
                    },

                    <?php
                        $view_query = mysqli_query($connection,"SELECT year(Date_Requested) AS Year_Requested from ims_t_summary_request  ORDER BY year(Date_Requested) ASC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $ReqYear = $row["Year_Requested"];
                      ?>
                    {
                      name: 'Monthly Data',
                      id: 'R<?php echo($ReqYear) ?>',
                      data: [
                      <?php
                            //$temp = "null";
                        $view_query2 = mysqli_query($connection,"SELECT month(Date_Requested) AS Month_Requested, monthname(Date_Requested) AS Month_Name from ims_t_summary_request WHERE year(Date_Requested) = ".$ReqYear." ORDER BY month(Date_Requested) ASC");
                            while($row2 = mysqli_fetch_assoc($view_query2))
                                {   
                                    $ReqMonth = $row2["Month_Requested"];
                                    $ReqMonthName = $row2["Month_Name"];
                      ?>
                    {
                            name: '<?php
                                      echo $ReqMonthName; 
                                   ?>',
                            y: <?php 
                                  $view_query3 = mysqli_query($connection,"SELECT month(Date_Requested) AS Month_Requested, COUNT(month(Date_Requested)) AS Month_Quantity from ims_t_summary_request WHERE month(Date_Requested) = ".$ReqMonth." AND year(Date_Requested) = ".$ReqYear." ");
                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                      {
                                        $ReqMonthQty = $row3["Month_Quantity"];
                                        echo($ReqMonthQty);
                                      }
                               ?>
                    },
                      <?php
                      }
                      ?>
                      ]
                    },
                    <?php
                    }
                    ?>
                    //Requisition Supplies
                    //Requisition Medical
                    {
                      name: 'Yearly Data',
                      id: 'RMedical',
                      data: [
                      <?php
                            //$temp = "null";
                        $view_query = mysqli_query($connection,"SELECT DISTINCT year(Date_Requested) AS Year_Requested from ims_t_med_summary_request ORDER BY year(Date_Requested) ASC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $ReqYear = $row["Year_Requested"];
                      ?>
                    {
                            name: '<?php echo $ReqYear ?>',
                            y: <?php 
                                  $view_query3 = mysqli_query($connection,"SELECT year(Date_Requested) AS Year_Requested, COUNT(year(Date_Requested)) AS Year_Quantity from ims_t_med_summary_request WHERE year(Date_Requested) = ".$ReqYear."  ORDER BY year(Date_Requested) ASC");
                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                      {
                                        $ReqYearQty = $row3["Year_Quantity"];
                                        echo($ReqYearQty);
                                      }
                               ?>,
                            drilldown: 'RM<?php echo $ReqYear ?>'
                    },
                      <?php
                      }
                      ?>
                      ]
                    },

                    <?php
                        $view_query = mysqli_query($connection,"SELECT year(Date_Requested) AS Year_Requested from ims_t_med_summary_request  ORDER BY year(Date_Requested) ASC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $ReqYear = $row["Year_Requested"];
                      ?>
                    {
                      name: 'Monthly Data',
                      id: 'RM<?php echo($ReqYear) ?>',
                      data: [
                      <?php
                            //$temp = "null";
                        $view_query2 = mysqli_query($connection,"SELECT month(Date_Requested) AS Month_Requested, monthname(Date_Requested) AS Month_Name from ims_t_med_summary_request WHERE year(Date_Requested) = ".$ReqYear." ORDER BY month(Date_Requested) ASC");
                            while($row2 = mysqli_fetch_assoc($view_query2))
                                {   
                                    $ReqMonth = $row2["Month_Requested"];
                                    $ReqMonthName = $row2["Month_Name"];
                      ?>
                    {
                            name: '<?php
                                      echo $ReqMonthName; 
                                   ?>',
                            y: <?php 
                                  $view_query3 = mysqli_query($connection,"SELECT month(Date_Requested) AS Month_Requested, COUNT(month(Date_Requested)) AS Month_Quantity from ims_t_med_summary_request WHERE month(Date_Requested) = ".$ReqMonth." AND year(Date_Requested) = ".$ReqYear." ");
                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                      {
                                        $ReqMonthQty = $row3["Month_Quantity"];
                                        echo($ReqMonthQty);
                                      }
                               ?>
                    },
                      <?php
                      }
                      ?>
                      ]
                    },
                    <?php
                    }
                    ?>
                    //Requisition Medical
                    //Requisition Clinical
                    {
                      name: 'Yearly Data',
                      id: 'RClinical',
                      data: [
                      <?php
                            //$temp = "null";
                        $view_query = mysqli_query($connection,"SELECT DISTINCT year(Date_Requested) AS Year_Requested from ims_t_clinic_summary_request ORDER BY year(Date_Requested) ASC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $ReqYear = $row["Year_Requested"];
                      ?>
                    {
                            name: '<?php echo $ReqYear ?>',
                            y: <?php 
                                  $view_query3 = mysqli_query($connection,"SELECT year(Date_Requested) AS Year_Requested, COUNT(year(Date_Requested)) AS Year_Quantity from ims_t_clinic_summary_request WHERE year(Date_Requested) = ".$ReqYear."  ORDER BY year(Date_Requested) ASC");
                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                      {
                                        $ReqYearQty = $row3["Year_Quantity"];
                                        echo($ReqYearQty);
                                      }
                               ?>,
                            drilldown: 'RC<?php echo $ReqYear ?>'
                    },
                      <?php
                      }
                      ?>
                      ]
                    },

                    <?php
                        $view_query = mysqli_query($connection,"SELECT year(Date_Requested) AS Year_Requested from ims_t_clinic_summary_request  ORDER BY year(Date_Requested) ASC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $ReqYear = $row["Year_Requested"];
                      ?>
                    {
                      name: 'Monthly Data',
                      id: 'RC<?php echo($ReqYear) ?>',
                      data: [
                      <?php
                            //$temp = "null";
                        $view_query2 = mysqli_query($connection,"SELECT month(Date_Requested) AS Month_Requested, monthname(Date_Requested) AS Month_Name from ims_t_clinic_summary_request WHERE year(Date_Requested) = ".$ReqYear." ORDER BY month(Date_Requested) ASC");
                            while($row2 = mysqli_fetch_assoc($view_query2))
                                {   
                                    $ReqMonth = $row2["Month_Requested"];
                                    $ReqMonthName = $row2["Month_Name"];
                      ?>
                    {
                            name: '<?php
                                      echo $ReqMonthName; 
                                   ?>',
                            y: <?php 
                                  $view_query3 = mysqli_query($connection,"SELECT month(Date_Requested) AS Month_Requested, COUNT(month(Date_Requested)) AS Month_Quantity from ims_t_clinic_summary_request WHERE month(Date_Requested) = ".$ReqMonth." AND year(Date_Requested) = ".$ReqYear." ");
                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                      {
                                        $ReqMonthQty = $row3["Month_Quantity"];
                                        echo($ReqMonthQty);
                                      }
                               ?>
                    },
                      <?php
                      }
                      ?>
                      ]
                    },
                    <?php
                    }
                    ?>
                    //Requisition Clinical

                    //Issuance
                    {
                      name: 'Yearly Data',
                      id: 'Issuance',
                      data: [
                      <?php
                            //$temp = "null";
                        $view_query = mysqli_query($connection,"SELECT DISTINCT year(Date_Issued) AS Year_Released from ims_t_dept_issuance ORDER BY year(Date_Issued) ASC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $RelYear = $row["Year_Released"];
                      ?>
                    {
                            name: '<?php echo $RelYear ?>',
                            y: <?php 
                                  $view_query3 = mysqli_query($connection,"SELECT year(Date_Issued) AS Year_Released, COUNT(DISTINCT(Batch_No)) AS Year_Quantity from ims_t_dept_issuance WHERE year(Date_Issued) = ".$RelYear." ORDER BY year(Date_Issued) ASC");
                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                      {
                                        $RelYearQty = $row3["Year_Quantity"];
                                        echo($RelYearQty);
                                      }
                               ?>,
                            drilldown: 'I<?php echo $RelYear ?>'
                    },
                      <?php
                      }
                      ?>
                      ]
                    },

                    <?php
                        $view_query = mysqli_query($connection,"SELECT year(Date_Issued) AS Year_Requested from ims_t_dept_issuance ORDER BY year(Date_Issued) ASC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $RelYear = $row["Year_Requested"];
                      ?>
                    {
                      name: 'Monthly Data',
                      id: 'I<?php echo($RelYear) ?>',
                      data: [
                      <?php
                            //$temp = "null";
                        $view_query2 = mysqli_query($connection,"SELECT month(Date_Issued) AS Month_Requested, monthname(Date_Issued) AS Month_Name from ims_t_dept_issuance WHERE year(Date_Issued) = ".$RelYear." ORDER BY month(Date_Issued) ASC");
                            while($row2 = mysqli_fetch_assoc($view_query2))
                                {   
                                    $RelMonth = $row2["Month_Requested"];
                                    $RelMonthName = $row2["Month_Name"];
                      ?>
                    {
                            name: '<?php
                                      echo $RelMonthName; 
                                   ?>',
                            y: <?php 
                                  $view_query3 = mysqli_query($connection,"SELECT month(Date_Issued) AS Month_Requested, COUNT(DISTINCT(Batch_No)) AS Month_Quantity from ims_t_dept_issuance WHERE month(Date_Issued) = ".$ReqMonth." AND year(Date_Issued) = ".$RelYear." AND Date_Issued IS NOT NULL");
                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                      {
                                        $RelMonthQty = $row3["Month_Quantity"];
                                        echo($RelMonthQty);
                                      }
                               ?>
                    },
                      <?php
                        }
                      ?>
                      ]
                    },
                    <?php
                    }
                    ?>
                    //Issuance


                    //acquisition types
                    {
                      name: 'Acquisition Types',
                      id: 'Acquisition',
                      data: [
                        {
                            name: 'Office Supplies',
                            y: <?php
                                $view_query = mysqli_query($connection,"SELECT COUNT(*) AS Supply_Count from ims_t_acquisition");  
                                  while($row = mysqli_fetch_assoc($view_query))
                                    {
                                      $SupplyCount = $row["Supply_Count"];
                                      echo($SupplyCount);
                                    }
                               ?>,
                            drilldown: 'ASupplies'
                        },
                        {
                            name: 'Medicinal Supplies',
                            y: <?php
                                $view_query = mysqli_query($connection,"SELECT COUNT(*) AS Supply_Count from ims_t_acquisition_med");  
                                  while($row = mysqli_fetch_assoc($view_query))
                                    {
                                      $SupplyCount = $row["Supply_Count"];
                                      echo($SupplyCount);
                                    }
                               ?>,
                            drilldown: 'AMedical'
                        },
                        {
                            name: 'Clinical Supplies',
                            y: <?php
                                $view_query = mysqli_query($connection,"SELECT COUNT(*) AS Supply_Count from ims_t_acquisition_clinic");  
                                  while($row = mysqli_fetch_assoc($view_query))
                                    {
                                      $SupplyCount = $row["Supply_Count"];
                                      echo($SupplyCount);
                                    }
                               ?>,
                            drilldown: 'AClinical'
                        },
                      ]
                    },
                    //acquisition types
                    //acquisition supplies
                    {
                      //wheeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeere mode = mode
                      name: 'Yearly Data',
                      id: 'ASupplies',
                      data: [
                      <?php
                            //$temp = "null";
                        $view_query = mysqli_query($connection,"SELECT DISTINCT year(Date_Procured) AS Year_Requested from ims_t_acquisition ORDER BY year(Date_Procured) ASC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $ReqYear = $row["Year_Requested"];
                      ?>
                    {
                            name: '<?php echo $ReqYear ?>',
                            y: <?php 
                                  $view_query3 = mysqli_query($connection,"SELECT year(Date_Procured) AS Year_Requested, COUNT(*) AS Year_Quantity from ims_t_acquisition WHERE year(Date_Procured) = ".$ReqYear."  ORDER BY year(Date_Procured) ASC");
                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                      {
                                        $ReqYearQty = $row3["Year_Quantity"];
                                        echo($ReqYearQty);
                                      }
                               ?>,
                            drilldown: 'AS<?php echo $ReqYear ?>'
                    },
                      <?php
                      }
                      ?>
                      ]
                    },

                    <?php
                        $view_query = mysqli_query($connection,"SELECT year(Date_Procured) AS Year_Requested from ims_t_acquisition  ORDER BY year(Date_Procured) ASC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $ReqYear = $row["Year_Requested"];
                      ?>
                    {
                      name: 'Monthly Data',
                      id: 'AS<?php echo($ReqYear) ?>',
                      data: [
                      <?php
                            //$temp = "null";
                        $view_query2 = mysqli_query($connection,"SELECT month(Date_Procured) AS Month_Requested, monthname(Date_Procured) AS Month_Name from ims_t_acquisition WHERE year(Date_Procured) = ".$ReqYear." ORDER BY month(Date_Procured) ASC");
                            while($row2 = mysqli_fetch_assoc($view_query2))
                                {   
                                    $ReqMonth = $row2["Month_Requested"];
                                    $ReqMonthName = $row2["Month_Name"];
                      ?>
                    {
                            name: '<?php
                                      echo $ReqMonthName; 
                                   ?>',
                            y: <?php 
                                  $view_query3 = mysqli_query($connection,"SELECT month(Date_Procured) AS Month_Requested, COUNT(*) AS Month_Quantity from ims_t_acquisition WHERE month(Date_Procured) = ".$ReqMonth." AND year(Date_Procured) = ".$ReqYear." ");
                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                      {
                                        $ReqMonthQty = $row3["Month_Quantity"];
                                        echo($ReqMonthQty);
                                      }
                               ?>
                    },
                      <?php
                      }
                      ?>
                      ]
                    },
                    <?php
                    }
                    ?>
                    //Acquisition Supplies
                    //Acquisition Medical
                    {
                      //wheeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeere mode = mode
                      name: 'Yearly Data',
                      id: 'AMedical',
                      data: [
                      <?php
                            //$temp = "null";
                        $view_query = mysqli_query($connection,"SELECT DISTINCT year(Date_Procured) AS Year_Requested from ims_t_acquisition_med ORDER BY year(Date_Procured) ASC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $ReqYear = $row["Year_Requested"];
                      ?>
                    {
                            name: '<?php echo $ReqYear ?>',
                            y: <?php 
                                  $view_query3 = mysqli_query($connection,"SELECT year(Date_Procured) AS Year_Requested, COUNT(*) AS Year_Quantity from ims_t_acquisition_med WHERE year(Date_Procured) = ".$ReqYear."  ORDER BY year(Date_Procured) ASC");
                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                      {
                                        $ReqYearQty = $row3["Year_Quantity"];
                                        echo($ReqYearQty);
                                      }
                               ?>,
                            drilldown: 'AM<?php echo $ReqYear ?>'
                    },
                      <?php
                      }
                      ?>
                      ]
                    },

                    <?php
                        $view_query = mysqli_query($connection,"SELECT year(Date_Procured) AS Year_Requested from ims_t_acquisition_med  ORDER BY year(Date_Procured) ASC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $ReqYear = $row["Year_Requested"];
                      ?>
                    {
                      name: 'Monthly Data',
                      id: 'AM<?php echo($ReqYear) ?>',
                      data: [
                      <?php
                            //$temp = "null";
                        $view_query2 = mysqli_query($connection,"SELECT month(Date_Procured) AS Month_Requested, monthname(Date_Procured) AS Month_Name from ims_t_acquisition_med WHERE year(Date_Procured) = ".$ReqYear." ORDER BY month(Date_Procured) ASC");
                            while($row2 = mysqli_fetch_assoc($view_query2))
                                {   
                                    $ReqMonth = $row2["Month_Requested"];
                                    $ReqMonthName = $row2["Month_Name"];
                      ?>
                    {
                            name: '<?php
                                      echo $ReqMonthName; 
                                   ?>',
                            y: <?php 
                                  $view_query3 = mysqli_query($connection,"SELECT month(Date_Procured) AS Month_Requested, COUNT(*) AS Month_Quantity from ims_t_acquisition_med WHERE month(Date_Procured) = ".$ReqMonth." AND year(Date_Procured) = ".$ReqYear." ");
                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                      {
                                        $ReqMonthQty = $row3["Month_Quantity"];
                                        echo($ReqMonthQty);
                                      }
                               ?>
                    },
                      <?php
                      }
                      ?>
                      ]
                    },
                    <?php
                    }
                    ?>
                    //Acquisition Medical
                    //Acquisition Clinical
                    {
                      name: 'Yearly Data',
                      id: 'AClinical',
                      data: [
                      <?php
                            //$temp = "null";
                        $view_query = mysqli_query($connection,"SELECT DISTINCT year(Date_Procured) AS Year_Requested from ims_t_acquisition_clinic ORDER BY year(Date_Procured) ASC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $ReqYear = $row["Year_Requested"];
                      ?>
                    {
                            name: '<?php echo $ReqYear ?>',
                            y: <?php 
                                  $view_query3 = mysqli_query($connection,"SELECT year(Date_Procured) AS Year_Requested, COUNT(*) AS Year_Quantity from ims_t_acquisition_clinic WHERE year(Date_Procured) = ".$ReqYear."  ORDER BY year(Date_Procured) ASC");
                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                      {
                                        $ReqYearQty = $row3["Year_Quantity"];
                                        echo($ReqYearQty);
                                      }
                               ?>,
                            drilldown: 'AC<?php echo $ReqYear ?>'
                    },
                      <?php
                      }
                      ?>
                      ]
                    },

                    <?php
                        $view_query = mysqli_query($connection,"SELECT year(Date_Procured) AS Year_Requested from ims_t_acquisition_clinic  ORDER BY year(Date_Procured) ASC");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $ReqYear = $row["Year_Requested"];
                      ?>
                    {
                      name: 'Monthly Data',
                      id: 'AC<?php echo($ReqYear) ?>',
                      data: [
                      <?php
                            //$temp = "null";
                        $view_query2 = mysqli_query($connection,"SELECT month(Date_Procured) AS Month_Requested, monthname(Date_Procured) AS Month_Name from ims_t_acquisition_clinic WHERE year(Date_Procured) = ".$ReqYear." ORDER BY month(Date_Procured) ASC");
                            while($row2 = mysqli_fetch_assoc($view_query2))
                                {   
                                    $ReqMonth = $row2["Month_Requested"];
                                    $ReqMonthName = $row2["Month_Name"];
                      ?>
                    {
                            name: '<?php
                                      echo $ReqMonthName; 
                                   ?>',
                            y: <?php 
                                  $view_query3 = mysqli_query($connection,"SELECT month(Date_Procured) AS Month_Requested, COUNT(*) AS Month_Quantity from ims_t_acquisition_clinic WHERE month(Date_Procured) = ".$ReqMonth." AND year(Date_Procured) = ".$ReqYear." ");
                                  while($row3 = mysqli_fetch_assoc($view_query3))
                                      {
                                        $ReqMonthQty = $row3["Month_Quantity"];
                                        echo($ReqMonthQty);
                                      }
                               ?>
                    },
                      <?php
                      }
                      ?>
                      ]
                    },
                    <?php
                    }
                    ?>
                    //Acquisition Clinical
                  ]
                }
            });
            </script>

            <br><br>
            <div id="ReqRanking" style="min-width: 50%; height: 99%; margin: 0 auto"></div>

            <script type="text/javascript">
            Highcharts.chart('ReqRanking', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Departmental Request Ranking'
            },
            subtitle: {
                text: 'Click the columns to view details'
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
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: A total of <b>{point.y:.0f}</b> {point.name} data<br/>'
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
                          drilldown: '<?php echo ($Office) ?>'
                        },
                        <?php
                          } 
                        ?>
                ]
            }],
            drilldown: {
                series: [
                <?php
                $view_query = mysqli_query($connection,"SELECT DISTINCT Office_Request AS Offices from ims_t_dept_issuance");
                    while($row = mysqli_fetch_assoc($view_query))
                        {
                          $Office = $row["Offices"];
                ?>
                {
                  name: '<?php echo($Office) ?> Requests',
                  id: '<?php echo($Office) ?>',
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
                },
                <?php
                  } 
                ?>
                ]
              }
            });
            </script>
    </section>
</section>

</section>
<script id="DMNotif" src="DMNotification.js"></script>
</body>
</html>
