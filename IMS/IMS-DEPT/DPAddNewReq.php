<?php
     include("DPJSHeader.php");
     include("DPJSCore.php");
     include("DPJSCustom.php");
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
                    <a  href="DPmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-envelope"></i>
                        <span>Requests</span>
                    </a>
                    <ul class="active">
                        <li><a class="active" href="DPAddNewReq.php">Add New</a></li>
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
        <!-- page start-->

         <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="DPmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="DPAddNewReq.php">Add New Request</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>      



           
        <div class="col-md-12">
         <!-- START CONTENT -->

            <section class="panel">
                    <header class="panel-heading" style="background-color: gray; color: white">
                    Available Stocks of Office Sullpies
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">         
                            <table  class="display table table-bordered table-striped" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display: none;">No</th>
                                        <th style="width: 15%">Name</th>
                                        <th style="width: 15%">Category</th>
                                        <th style="width: 10%">Unit</th>
                                        <th style="width: 5%">Quantity</th>
                                        <th style="width: 5%">Critical Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT * FROM `ims_r_office_stock` where Quantity > Critical_level ");
                                        while($row = mysqli_fetch_assoc($view_query))
                                            {
                                                $No = $row["Item_No"];
                                                $SKU = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"];       
                                                $category = $row["Item_Category"];  
                                                $unit = $row["Unit"];  
                                                $quan = $row["Quantity"];
                                                $crit = $row["Critical_level"]; 

                                           
                                            
                                    ?>      
                                             <tr class="gradeX">
                                                    <td style="display: none;"><?php echo $No; ?></td>
                                                    <td style="width: 20%"><?php echo $name; ?></td>
                                                    <td style="width: 10%"><?php echo $category; ?></td>
                                                    <td style="width: 5%"><?php echo $unit; ?></td>
                                                    <td style="width: 5%"><?php echo $quan; ?></td>
                                                    <td style="width: 5%"><?php echo $crit; ?></td>
                                                
                                                   
                                            </tr>  
                                             
                                                     <?php
                                                             }
                                                        ?>             
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>    
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
                                        <form action="DeptAddrequest.php" method="POST">

                                            <div class="form-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><button type="button" id="btnAdd" class="btn btn-primary">Add</button></p>
                                                    </div>
                                                </div>

                                                <?php  

                                                     include('../../db.php');

                                                    {
                                                        
                                                    $result = mysqli_query($connection, "SELECT MAX(DeptSum_No) FROM ims_t_dept_summary_request");
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
                                                                            INNER JOIN  `pso_r_user` AS ACC WHERE ACC.U_TYPE = 'Departmental-User' and
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
                                                 
                                                
                                                 
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row group">
                                                     
                                                     <div id="itemdiv" class="col-md-6">
                                                        <div class="form-group">
                                                            <label id="itemLabel">Item Name</label>
                                                           <select id="ddCategory" class="form-control" style="color: black;" required="" name="r_sku[]" >
                                                                <option selected disabled value=""></option>
                                                                  <?php  
                                                                      $sqlemp= "SELECT * FROM `ims_r_office_stock` WHERE Quantity > Critical_level";
                                                                      $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                      while($row = mysqli_fetch_assoc($results))
                                                                       {  
                                                                          $sku = $row['Stock_Key_Unit'];
                                                                          $name = $row['Item_Name'];
                                                                          $cat = $row['Item_Category'];
                                                                ?>
                                                                <option value="<?php echo $sku ?>"><?php echo $cat.' --- '.$name; ?></option>
                                                                 <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                     
                                                    
                                                   

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input style="color: black; padding-right: 2px;" type="number" name="r_quantity[]" class="form-control" required="" minlength="2" min="1" max="20" />
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
                                                                <button type="submit" class="btn btn-success btn-lg" name="deptreq">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
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
