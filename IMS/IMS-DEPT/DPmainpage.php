<?php
     include("DPJSHeader.php");
     include("DPJSCore.php");
     include("DPJSCustom.php");
     include("DPJSCharts.php");
    
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
                    <a class="active" href="DPmainpage.php">
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

  <!--mini statistics start-->
        <div class="row">
            <div class="col-md-4">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon orange"><i class="fa  fa-envelope"></i></span>
                    <div class="mini-stat-info">
                        <span>
                        <?php
                            $office = $_SESSION['DEPART'];
                            $sqlemp = "SELECT * FROM `pso_r_office` 
                                       WHERE O_ID = '$office' ";
                                       $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                       while($row = mysqli_fetch_assoc($results))
                                               {
                                                   $oname = $row['O_NAME'];
                                                                    
                            $sql = "SELECT * FROM ims_t_dept_summary_request WHERE Depart_Name = '$oname' ";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                        </span>
                        Total Batch Request of <?php echo $oname; ?> Requisitions
                      
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon tar"><i class="fa fa-download"></i></span>
                    <div class="mini-stat-info">
                        <span>
                            <?php
                           
                            $sql="SELECT * FROM ims_t_dept_summary_request WHERE Depart_Name = '$oname' AND Status_Req = 'RELEASED' ";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }

                        ?>
                      </span>
                        Total Batch of <?php echo $oname; ?> Procured Items
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon pink"><i class="fa fa-sign-in"></i></span>
                    <div class="mini-stat-info">
                        <span>
                        <?php
                            $EPID = $_SESSION['EmployeeID'];
                            $sql = "SELECT * FROM `pso_r_users_log` WHERE EP_ID='$EPID'";

                            if ($result=mysqli_query($connection,$sql))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              echo $rowcount;
                              }


                        ?>
                        </span>
                        Times this account is opened and used.<br>
                        Last Logged: 
                         <?php } ?>
                    </div>
                </div>
            </div>
            
        </div>
<!--mini statistics end-->
        
                    <div>
                    <script src="js/code/highcharts.js"></script>
                    <script src="js/code/modules/data.js"></script>
                    <script src="js/code/modules/exporting.js"></script>
                    <div class="col-md-6">
                        
         <div id="ReqRanking" style="width: 98%; height: 500px; margin: 0 auto"></div>

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
                                    ?> <br> Records of Procurement'
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

                    <div class="col-md-6">
                        <div id="inventory" style="width: 98%; height: 500px;"></div>

                        <script type="text/javascript">
                            Highcharts.chart('inventory', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Current Inventory Status of Available Items'
                            },
                            subtitle: {
                                text: 'Click the columns to view items within these categories.'
                            },
                            xAxis: {
                                type: 'category',
                                title: {
                                    text: null
                                },
                                min: 0,
                                scrollbar: {
                                    enabled: true
                                },
                                tickLength: 0
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
                                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> of total<br/>'
                            },

                            series: [
                                {
                                    name: "Current Inventory Status",
                                    colorByPoint: true,
                                    data: [
                                        <?php
                                            $view_query = mysqli_query($connection,"SELECT DISTINCT Item_Category FROM `ims_r_office_stock` where Quantity > Critical_Level");
                                                while($row = mysqli_fetch_assoc($view_query))
                                                    {   
                                                        $InvCategory = $row["Item_Category"];
                                                        //$InvQty = $row["Quantity"];
                                        ?> 
                                        {
                                            name: '<?php echo $InvCategory ?>',
                                            y: <?php
                                            $view_query2 = mysqli_query($connection,"SELECT SUM(`Quantity`) AS SumQuantity FROM `ims_r_office_stock` WHERE `Item_Category` = '".$InvCategory."'");
                                                while($row2 = mysqli_fetch_assoc($view_query2))
                                                    {   
                                                        $InvQty = $row2["SumQuantity"];
                                                        echo ($InvQty);
                                                    }
                                               ?>,
                                            drilldown: '<?php echo $InvCategory ?>',
                                        },
                                        <?php
                                        }
                                        ?>
                                    ]
                                }
                            ],
                            drilldown: {
                                series: [
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT Item_Category FROM `ims_r_office_stock` ");
                                            while($row = mysqli_fetch_assoc($view_query))
                                                {   
                                                   $InvCategory2 = $row["Item_Category"];
                                    ?>
                                    {
                                        name: '<?php echo $InvCategory2 ?>',
                                        id: '<?php echo $InvCategory2 ?>',
                                        data: [
                                            <?php
                                            $view_query2 = mysqli_query($connection,"SELECT * FROM `ims_r_office_stock` WHERE Quantity > Critical_Level and Item_Category = '".$InvCategory2."'");
                                            while($row2 = mysqli_fetch_assoc($view_query2))
                                                {
                                                    $InvQuantity = $row2["Quantity"];
                                                    $InvItems = $row2["Item_Name"];
                                                    $InvUnit = $row2["Unit"];
                                            ?>
                                            {
                                                name: '<?php echo $InvItems ?>',
                                                y: <?php echo $InvQuantity ?>,
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
                    </div>
                </div>

    </section>
</section>

</section>


</body>
</html>
