<?php
     include("MEDJSHeader.php");
     include("MEDJSCore.php");
     include("MEDJSCustom.php");
?>


<title>Add Requests | PUPQC IMS</title>
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a href="MEDmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-medkit"></i>
                        <span>Medicinal Items</span>
                    </a>
                    <ul class="sub">
                        <li><a href="javascript:;"><i class="fa  fa-envelope"></i>Requisition</a>
                            <ul class="sub">
                                <li><a href="MEDAddNewReq.php">Add New Items</a></li>
                                <li><a href="MEDPenReq.php">Pending Requests</a></li>
                                <li><a href="MEDRevReq.php">Requests for Revision</a></li>
                                <li><a href="MEDAprReq.php">Approved Requests</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:;"><i class="fa  fa-download"></i>Acquisition</a>
                            <ul class="sub">
                                <li><a href="MEDDelivery.php">Delivery</a></li>
                                <li><a href="MEDEntry.php">Entry Items</a></li>
                                <li><a href="MEDAcquire.php">Acquired Items</a></li>
                            </ul>
                        </li>
                         <li><a href="javascript:;"><i class="fa fa-tasks"></i>Inventory Management</a>
                            <ul class="sub">
                                <li><a href="MEDCategory.php">Setup Item Category</a></li>
                                <li><a href="MEDInvent.php">Manage Critical Level <br>and Items' Status</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                 <li>
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-plus-circle"></i>
                        <span>Clinical Items</span>
                    </a>
                    <ul cclass="active" >
                        <li><a class="active" href="javascript:;"><i class="fa  fa-envelope"></i>Requisition</a>
                            <ul class="active" >
                                <li><a class="active" href="CLIAddNewReq.php">Add New Items</a></li>
                                <li><a href="CLIPenReq.php">Pending Requests</a></li>
                                <li><a href="CLIRevReq.php">Requests for Revision</a></li>
                                <li><a href="CLIAprReq.php">Approved Requests</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:;"><i class="fa  fa-download"></i>Acquisition</a>
                            <ul class="sub">
                                <li><a href="CLIDelivery.php">Delivery</a></li>
                                <li><a href="CLIEntry.php">Entry Items</a></li>
                                <li><a href="CLIAcquire.php">Acquired Items</a></li>
                            </ul>
                        </li>
                         <li><a href="javascript:;"><i class="fa fa-tasks"></i>Inventory Management</a>
                            <ul class="sub">
                                <li><a href="CLICategory.php">Setup Item Category</a></li>
                                <li><a href="CLIInvent.php">Manage Critical Level <br>and Items' Status</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                    <li>
                            <a href="javascript:;"><i class="fa  fa-calendar"></i>PPMP</a>
                             <ul class="sub">
                                    <li><a href="MEDPPMP.php">Medicinal Stocks</a>
                                         <ul class="sub">
                                            <li><a href="MED_ADDPPMP.php">Create Plan</a></li>
                                            <li><a href="MED_VIEWPPMP.php">View Plans</a></li>
                                         </ul>
                                    </li>
                                    <li><a href="CLIPPMP.php">Clinical Stocks</a>
                                        <ul class="sub">
                                            <li><a href="CLI_ADDPPMP.php">Create Plan</a></li>
                                            <li><a href="CLI_VIEWPPMP.php">View Plans</a></li>
                                         </ul>
                                     </li>
                            </ul>
                        </li>
                <li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">
                         <li><a href="javascript:;"><i class="fa  fa-download"></i>Procurement</a>
                            <ul class="sub">
                                <li><a href="MEDProcRep.php">Medicinal Stocks</a></li>
                                <li><a href="CLIProcRep.php">Clinical Stocks</a></li>
                            </ul>
                        </li>   
                        <li><a href="javascript:;"><i class="fa  fa-tasks"></i>Inventory Status</a>
                            <ul class="sub">
                                <li><a href="MEDInventstat.php">Medicinal Stocks</a></li>
                                <li><a href="CLIInventstat.php">Clinical Stocks</a></li>
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
                    <li><a href="MEDmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="CLIAddNewReq.php">Add New Request</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>      




           
        <div class="col-md-12">
         <!-- START CONTENT -->

            <section class="panel">
                     <header class="panel-heading" style="background-color: gray; color: white">
                    Clinical Supplies that are recommended for Requisition and Procurement
                    </header>
                                    <div>
                                    <script src="js/code/highcharts.js"></script>
                                    <script src="js/code/modules/data.js"></script>
                                    <script src="js/code/modules/exporting.js"></script>    
                                    <center>
                                    <div id="inventory" style="width: 97%; height: 300px;"></div>

                                            <table style="display: none;" id="datatableinv">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Level of Quantity</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                        //$off = $_SESSION['DEPART'];
                                                        $view_query = mysqli_query($connection,"SELECT DISTINCT Item_Name, Quantity  FROM                                  `ims_r_clinical_stock`
                                                                                               WHERE Quantity <= Critical_level");
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
                                            text: 'Items that are near and currently on the critical level status'
                                        },
                                        yAxis: 
                                        {
                                            allowDecimals: false,
                                            title: {
                                                text: 'Quantity Level',
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
                            </center>   
                                </section>
                            </div>
                                
        
    
         <div class="col-md-12">
         <!-- START CONTENT -->

            <section class="panel">
                    <header class="panel-heading"  style="background-color: gray; color: white">
                        Requesting Form
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped">                                
                                <tr>
                                    <td>                            
                                        <form action="F_CLI_AddRequest.php" method="POST">

                                            <div class="form-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><button type="button" id="btnAdd" class="btn btn-primary">Add</button></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php  

                                                     include('../../db.php');

                                                    {
                                                        
                                                    $result = mysqli_query($connection, "SELECT MAX(Sum_No) FROM ims_t_clinic_summary_request");
                                                    $row = mysqli_fetch_array($result);
                                                    $last = $row[0];
                                                    $finalid = $last + 1;

                                                ?>

                                                 <div class="form-group">
                                                    <input type="hidden" name="r_batch" value="<?php echo $finalid; ?>">
                                                </div> <?php } ?>

                                             
                                                             

                                                                

                                                       <?php
                                                                 $acc = $_SESSION['AccountID'];
                                                                 $sqlemp= "SELECT * FROM `pso_r_employee_profile` AS EMP 
                                                                            INNER JOIN  `pso_r_user` AS ACC WHERE ACC.U_TYPE = 'Medical-Officer' and
                                                                            EMP.EP_ID = ACC.EP_ID and ACC.U_ID = '$acc' ";
                                                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                            while($row = mysqli_fetch_assoc($results))
                                                                                    {
                                                                                        $fname = $row['EP_FNAME'];
                                                                                        $lname = $row['EP_LNAME'];
                                                                      ?>
                                                                <div class="col-md-3" style="display:none;">
                                                                    <input type="text" class="form-control" name="r_account" value="<?php echo $fname.' '.$lname; ?>">
                                                                </div>
                                                                <div class="col-md-3" style="display:none;">
                                                                    <input type="text" class="form-control" name="r_user" value="<?php echo $acc; ?>">
                                                                </div>
                                                                <?php }
                                                                     ?>

                                                                <?php
                                                                 $office = $_SESSION['DEPART'];
                                                                 $sqlemp= "SELECT * FROM `pso_r_office` WHERE O_ID = '$office' ";
                                                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                            while($row = mysqli_fetch_assoc($results))
                                                                                    {
                                                                                        $oname = $row['O_NAME'];
                                                                      ?>
                                                                <div class="col-md-3" style="display:none;">
                                                                    <input type="text" class="form-control" name="reqdept" value="<?php echo $oname; ?>">
                                                                </div>

                                                                 <?php }
                                                                     ?>
                                                    
                                               

                                                <div class="form-group">
                                                    <input type="hidden" name="currentdate" value="<?php echo date('Y-m-d') ?>">
                                                </div>
                                                 <!--
                                                 <?php 
                                             $categoryName = '';
                                                ?>
                                                <script type="text/javascript">
                                                    function getCategory(val) {
                                                        console.log ("<?php echo $categoryName='"+ val + "';?>"); 
                                                        // alert(pass);
                                                        console.log("<?php echo $categoryName ?>");

                                                        document.getElementById('itemdiv').style.display = 'block'; 
                                                                $.ajax({

                                                                    url: 'retreiveItem.php'
                                                                    ,data:{
                                                                        category: val
                                                                    }
                                                                    ,type:'GET'
                                                                    ,dataType: 'json'
                                                                    ,success:function(data){ 
                                                                         document.getElementById('ddItem').innerHTML = data.option;
                                                                        // alert(data.option);
                                                                    },error: function(){

                                                                    }
                                                                });
                                                        /*$.ajax({
                                                            type: "POST",
                                                            url: "get_category.php",
                                                            data: "Item_Category="+val,
                                                            success: function(data){
                                                                $("#ddItem").html(data);
                                                            }
                                                        });*/
                                                    }
                                                </script>
                                                <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Category</label>
                                                            <select id="ddCategory" class="form-control" style="color: black;" required="" onchange="getCategory(this.value)" >
                                                                <option selected disabled value=""></option>
                                                                  <?php  
                                                                      $sqlemp= "SELECT * FROM `ims_r_medicine_category`";
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
                                                    </div> --> 
                                                 
                                               

                                                <div class="row group">
                                                     <!--
                                                     <div id="itemdiv" class="col-md-5">
                                                        <div class="form-group">
                                                            <label id="itemLabel">Item Name</label>
                                                            <select id="ddItem" name="r_sku[]" class="form-control" style="color: black;" required="">
                                                                <option selected disabled value=""> </option>
                                                            </select>
                                                        </div>
                                                    </div>-->
                                                    
                                                     <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Item Name</label>
                                                            <input maxlength="100" type="text" name="r_name[]" class="form-control" required="" style="color: black;"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Category</label>
                                                            <select name="r_category[]" class="form-control" style="color: black;" required="" >
                                                                <option selected disabled value=""></option>
                                                                  <?php  
                                                                      $sqlemp= "SELECT * FROM `ims_r_clinical_category`";
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
                                                              <select name="r_unit[]" class="form-control" id="newunit" style="color: black;" >
                                                                <option selected disabled value=""></option>
                                                                <option value="Tube">Tube</option>
                                                                <option value="Sachet">Sachet</option>
                                                                <option value="Roll">Roll</option>
                                                                <option value="Bottle">Bottle</option>
                                                                <option value="Box">Box</option>
                                                                <option value="Piece">Piece</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input style="color: black; padding-right: 2px;" type="number" name="r_quantity[]" class="form-control" required="" minlength="3" min="1" max="20" />
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
                                                            <img alt="" src="../../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                            <div class="panel" style="height: 50%; width: 100%">
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
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>


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
