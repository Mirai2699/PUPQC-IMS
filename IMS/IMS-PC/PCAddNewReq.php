<?php 
     include ("PCHeader.php");
     include ("PCJSCore.php");
     include ("PCJSCustom.php");
     include ("PCJSCharts.php");
?>

<title>Add New Requests | PUPQC IMS</title>

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
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-envelope"></i>
                        <span>Requests</span>
                    </a>
                    <ul class="active" >
                        <li><a class="active" href="PCAddNewReq.php">Add New</a></li>
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
                    <li><a href="PCAddNewReq.php">Add New Request</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>


      <div class="row">
            <div class="col-sm-12">
         <!-- START CONTENT -->
         	<!--CHART-->
                <div>
                    <script src="js/code/highcharts.js"></script>
                    <script src="js/code/modules/data.js"></script>
                    <script src="js/code/modules/exporting.js"></script>

                    <div id="inventory" style="width: 99%; height: 290px;"></div>

                            <table style="display: none;" id="datatableinv">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT * FROM `ims_r_office_stock` where Quantity < Critical_level");
                                        while($row = mysqli_fetch_assoc($view_query))
                                            {   
                                                $name = $row["Item_Name"];
                                                $quan = $row["Quantity"];
                                    ?>      
                                    <tr>
                                        <th><?php echo $name?></th>
                                        <td><?php echo $quan; ?></td>
                                    </tr>
                                    
                                    <?php 
                                        }
                                    ?>
                                </tbody>
                            </table>

                    <script type="text/javascript">

                    Highcharts.chart('inventory', {
                        data: {
                            table: 'datatableinv'
                        },
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Items Recommended for Requisition'
                        },
                        yAxis: {
                            allowDecimals: false,
                            title: {
                                text: 'Quantity Level'
                            }
                        },
                        tooltip: {
                            formatter: function () {
                                return '<b>' + this.series.name + '</b><br/>' +
                                    this.point.y + ' ' + this.point.name.toLowerCase();
                            }
                        }
                    });
                    </script>
                </div>
                <hr>
                <!--End of Chart-->
            <section class="panel">
                    <header class="panel-heading" style="background-color: gray; color: white">
                        Requesting Form
                          <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped">                                
                                <tr>
                                    <td>                          
                                        <form action="Addrequest.php" method="POST">

                                            <div class="form-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><button type="button" id="btnAdd" class="btn btn-primary">Add</button></p>
                                                    </div>
                                                </div>

                                                <?php  

                                                     include('../../db.php');

                                                    {
                                                        
                                                    $result = mysqli_query($connection, "SELECT MAX(Sum_No) FROM ims_t_summary_request");
                                                    $row = mysqli_fetch_array($result);
                                                    $last = $row[0];
                                                    $finalid = $last + 1;

                                                ?>

                                                 <div class="form-group">
                                                    <input type="hidden" name="r_batch" value="<?php echo $finalid; ?>">
                                                </div> <?php } ?>

                                                

                                                <div class="form-group">
                                                    <input type="hidden" name="currentdate" value="<?php echo date('Y-m-d') ?>">
                                                </div>
                                                 
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                             
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="row group">                                                        
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Item Name</label>
                                                            <input maxlength="150" type="text" name="r_name[]" class="form-control" required="" style="color: black;"  />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                       <div class="form-group">
                                                            <label for="exampleInputEmail1">Category</label>
                                                            <select name="r_category[]" class="form-control" style="color: black;">
                                                                        <option value="" selected disabled></option>
                                                                                     <?php  
                                                                                        $sqlemp= "SELECT * FROM `ims_r_office_category`";
                                                                                        $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                           while($row = mysqli_fetch_assoc($results))
                                                                                           {
                                                                                                $cat = $row['Category_Name'];
                                                                                       ?>
                                                                                        <option value="<?php echo $cat ?>"><?php echo "$cat"; ?></option>
                                                                                       <?php 
                                                                                       } 
                                                                                    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                            <div class="form-group">
                                                               <label>Unit</label>
                                                               <select name="r_unit[]" class="form-control"  id="newunit" style="color: black;" >
                                                                  <option selected disabled value=""></option>
                                                                   <option value="Ream">Ream</option>
                                                                   <option value="Pad">Pad</option>
                                                                   <option value="Tube">Tube</option>
                                                                   <option value="Pack">Pack</option>
                                                                   <option value="Can">Can</option>
                                                                   <option value="Bottle">Bottle</option>
                                                                   <option value="Bundle">Bundle</option>
                                                                   <option value="Roll">Roll</option>
                                                                   <option value="Cartridge">Cartridge</option>
                                                                   <option value="Spool">Spool</option> 
                                                                   <option value="Box">Box</option>
                                                                   <option value="Piece">Piece</option>
                                                             </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input style="color: black; padding-right: 2px;" type="number" name="r_quantity[]" class="form-control" required="" minlength="3" min="1" max="100" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-danger btnRemove" style="margin-top: 23px;">Remove</button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                 
                                                        </div>
                                                    </div>

                                                </div>  
                                            </div>

                                           <a data-toggle="modal" href="#Continue" class="btn btn-success">Submit</a>   
                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="text-align: center;">
                                                            <div class="modal-header">
                                                                You are about to request the following item(s). Are you sure you want to proceed?
                                                            </div>
                                                            <br>
                                                            <img alt="" src="../../Resources/images/PUP/send.png" style="height: 14%; width: 14%">

                                                            <div class="panel" style="height: 50%; width: 100%">
                                                                <br>
                                                                <button type="submit" class="btn btn-success btn-lg" name="insertonly">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
                                                                <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                            </div>

                                          </form>  
                                    </td> 
                                </tr>
                            </table>
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

<!-- Placed js at the end of the document so the pages load faster -->
 <script>

        $('.form-content').multifield({
            section: '.group',
            btnAdd:'#btnAdd',
            btnRemove:'.btnRemove',
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=place]').val($(this).val());            
            });
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=reqperson]').val($(this).val());            
            });
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=asttypesss]').val($(this).val());            
            });
        });

</script>
</body>
</html>
