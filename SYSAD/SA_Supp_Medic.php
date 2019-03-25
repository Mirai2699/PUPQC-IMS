<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>

<title>Manage Inventory Setup | PUPQC PSO</title>


<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a href="SAmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Personnel Setup</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAaddperson.php">Add Personnel</a></li>
                        <li><a href="SAmngeperson.php">Manage Personnel</a></li>              
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa   fa-unlock-alt"></i>
                        <span>User Account Setup</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAaddacc.php">Add User Account</a></li>
                        <li><a href="SAmngeacc.php">Manage User Accounts</a></li>         
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-building-o"></i>
                        <span>Office Setup</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAadddept.php">Add Office</a></li>
                        <li><a href="SAmngedept.php">Manage Office</a></li>         
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-qrcode"></i>
                        <span>Asset Management</span>
                    </a>
                    <ul class="sub">
                        <li><a href="SAAssetlib.php"> Setup Asset Library</a></li>
                        <li><a href="SADisloc.php"> Setup Disposal Location</a></li>         
                    </ul>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-tasks"></i>
                        <span>Inventory Management</span>
                    </a>
                    <ul class="active" >
                            <li><a href="javascript:;">Setup Item Category</a>
                                <ul class="sub">
                                    <li><a href="SA_Off_Category.php">------  Office Supplies</a></li>
                                    <li><a href="SA_Clinic_Category.php">------  Clinical Supplies</a></li>   
                                    <li><a href="SA_Med_Category.php">------  Medicinal Supplies</a></li>      
                                </ul>
                            </li>
                            <li><a class="active" href="javascript:;">Setup Items and Critical Level</a>
                                <ul class="active">
                                    <li><a href="SA_Supp_Office.php">------  Office Supplies</a></li>
                                    <li><a href="SA_Supp_Clinic.php">------  Clinical Supplies</a></li>   
                                    <li><a class="active" href="SA_Supp_Medic.php">------  Medicinal Supplies</a></li>      
                                </ul>
                            </li>         
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-cogs"></i>
                        <span>Miscellaneous</span>
                    </a>
                    <ul class="sub">
                            <li><a href="SAUserlog.php">Users' Logs</a></li>
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
                    <li><a href="SAmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="SAStocklevel.php">Inventory Setup</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>


             <section class="panel">
                    <header class="panel-heading">
                        Single Item Entry and Critical Level Modification Form for Medicinal Supplies
                          <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped">                                
                                <tr>
                                    <td>     
                                     <form action="F_Supplies.php" method="POST">

                                            <div class="form-content">
                                            <?php  
                                                        $sqlemp= "SELECT DISTINCT Critical_level FROM `ims_r_medicinal_stock`";
                                                        $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                        while($row = mysqli_fetch_assoc($results))
                                                        {
                                                                    $critlevel = $row['Critical_level'];
                                                     ?>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                            <label>Current Critical<br>Stock Level</label>
                                                            <input style="color: black; padding-right: 2px;" type="number" name="Critlevel" class="form-control" required="" minlength="3" min="1" max="100" value="<?php echo $critlevel; ?>" />
                                                            </div>
                                                        </div>
                                                     <?php 
                                                         } 
                                                     ?>

                                                    <div class="row">
                                                        <div class="col-md-11" style="margin-left: 20px">
                                                            <div style="padding: 1px; margin-bottom: 10px; ">  
                                                                <a data-toggle="modal" href="#Conts" class="btn btn-success"><i class="fa  fa-check-square"></i>   Confirm</a>   
                                                                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Conts" class="modal fade">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content" style="text-align: center;">
                                                                                <div class="modal-header">
                                                                                    You are about to change the critical stock level of all items. Are you sure you want to proceed?
                                                                                </div>
                                                                                <img alt="" src="../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                                                <div class="panel" style="height: 50%; width: 100%">
                                                                                    <button type="submit" class="btn btn-success btn-lg" name="MedicChangeCrit">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
                                                                                    <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                                                </div>
                                                                                <br>
                                                                            </div>
                                                                        </div>
                                                                </div>                                           
                                                              </div>
                                                        </div>
                                                    </div>

                                            </div>
                                     </form>    

                                        <form action="F_Supplies.php" method="POST">

                                            <div class="form-content">
                                                <div class="row group">   

                                                        <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                 
                                                        </div>
                                                        </div>
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Stock Key Unit</label>
                                                            <input maxlength="150" type="text" name="a_code" class="form-control" required="" style="color: black;"  />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Item Name</label>
                                                            <input maxlength="150" type="text" name="a_name" class="form-control" required="" style="color: black;"  />
                                                        </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Item Category</label>
                                                            <select name="a_category" class="form-control" style="color: black;" required="">
                                                                 <option value="" selected disabled></option>
                                                                                <?php  
                                                                                    $sqlemp= "SELECT * FROM `ims_r_medicine_category`";
                                                                                    $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                    while($row = mysqli_fetch_assoc($results))
                                                                                    {
                                                                                        $Dname = $row['Category_Name'];
                                                                                ?>
                                                                                    <option value="<?php echo $Dname ?>"><?php echo "$Dname"; ?></option>
                                                                                <?php 
                                                                                    } 
                                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Unit</label>
                                                            <select name="a_unit" class="form-control" style="color: black;" required="">
                                                                <option selected disabled value=""></option>
                                                                <option value="Tab">Tab</option>
                                                                <option value="Tube">Tube</option>
                                                                <option value="Sachet">Sachet</option>
                                                                <option value="Vial">Vial</option>
                                                                <option value="Bottle">Bottle</option>
                                                                <option value="Box">Box</option>
                                                                <option value="Piece">Piece</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input style="color: black; padding-right: 2px;" type="number" name="a_quan" class="form-control" required="" minlength="3" min="1" max="100" />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                 
                                                        </div>
                                                    </div>

                                                </div>  
                                            </div>
                                            <!--START-->
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div style="padding: 1px; margin-bottom: 10px; ">  
                                                        <a data-toggle="modal" href="#Continue" class="btn btn-success"><i class="fa  fa-save"></i>    Save</a>   
                                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content" style="text-align: center;">
                                                                        <div class="modal-header">
                                                                            You are about to input a new item. Are you sure you want to proceed?
                                                                        </div>
                                                                        <img alt="" src="../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                                        <div class="panel" style="height: 50%; width: 100%">
                                                                            <button type="submit" class="btn btn-success btn-lg" name="MEDICINVinsert">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
                                                                            <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                        </div>                                           
                                                      </div>
                                                </div>
                                                <!--END-->
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



         <!-- START CONTENT -->
             <section>
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading">
                              Medicinal Supplies Inventory Management     
                            </header>
                          <div class="panel-body">
                            <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th style="display: none;">No</th>
                                    <th style="width: 8%">Code</th>
                                    <th style="width: 15%">Name</th>
                                    <th style="width: 10%">Category</th>
                                    <th style="width: 10%">Unit</th>
                                    <th style="width: 5%">Quantity</th>
                                    <th style="width: 7%">Critical level</th>
                                    <th style="width: 7%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $view_query = mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["Med_No"];
                                            $code = $row["Med_Code"];
                                            $name = $row["Med_Name"];       
                                            $category = $row["Med_Category"]; 
                                            $unit = $row["Unit"];  
                                            $quan = $row["Quantity"];
                                            $crit = $row["Critical_level"]; 

                                       
                                        
                                ?>      
                                         <tr class="gradeX">
                                                <td style="display: none;"><?php echo $No; ?></td>
                                                <td style="width: 8%"><?php echo $code; ?></td>
                                                <td style="width: 15%"><?php echo $name; ?></td>
                                                <td style="width: 10%"><?php echo $category; ?></td>
                                                <td style="width: 10%"><?php echo $unit; ?></td>
                                                
                                                    <?php 
                                                        if($quan <= $crit)
                                                        {  ?>
                                                            <td style="width: 5%; background-color: red; color: white"><?php echo $quan; ?></td>

                                                    <?php    }
                                                    ?>
                                                     <?php 
                                                        if($quan > $crit)
                                                        {  ?>
                                                            <td style="width: 5%"><?php echo $quan; ?></td>

                                                    <?php    }
                                                    ?>
                                                
                                                <td style="width: 7%"><?php echo $crit; ?></td>
                                                <td style="width: 7%">
                                                        <center>
                                                            
                                                        <a data-toggle="modal" href="#Change<?php echo $No; ?>" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i>  Modify</a>               
                                                        </center>
                                               </td>
                                        </tr>   
                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Change<?php echo $No; ?>" class="modal fade">
                                                <div class="modal-dialog">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <div style="text-align: right"> 
                                                                 <button data-dismiss="modal">x</button>
                                                             </div>
                                                            <h4 class="modal-title">Edit Details</h4>
                                                         </div>
                                                         <div class="modal-body">
                                                          <form action="F_Supplies.php" method="POST">

                                                                <div class="form-content">
                                                                    
                                                                   
                                                                   
                                                                    <div class="row group">                                                        
                                                                         <input type="hidden" name="item_No" class="form-control" required="" style="color: black;"  
                                                                                value="<?php echo $No; ?>" />

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Medicine Code</label>
                                                                                <input maxlength="150" type="text" name="item_code" class="form-control" required="" style="color: black;"  
                                                                                value="<?php echo $code; ?>"disabled/>
                                                                            </div>
                                                                        </div>
                                                                      
                                                                        <div class="col-md-8">
                                                                            <div class="form-group">
                                                                                <label>Item Name</label>
                                                                                <input maxlength="150" type="text" name="item_name" class="form-control" required="" style="color: black;" 
                                                                                value="<?php echo $name; ?>" />
                                                                            </div>
                                                                        </div>

                                                                         <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Item Category</label>
                                                                                <input maxlength="150" type="text" name="item_cat" class="form-control" required="" style="color: black;"  
                                                                                value="<?php echo $category; ?>" />
                                                                            </div>
                                                                        </div>

                                                                    
                                                                         <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label>Quantity</label>
                                                                                <input maxlength="150" type="text" name="item_quan" class="form-control" required="" style="color: black;"  
                                                                                value="<?php echo $quan; ?>" />
                                                                            </div>
                                                                        </div>
                                                                       
                                                                        <div class="col-md-12">
                                                                            <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                 
                                                                            </div>
                                                                        </div>

                                                                    </div>  
                                                                </div>
                                                                
                                                                 <div class="panel" style="height: 50%; width: 100%">
                                                                    <button type="submit" class="btn btn-success " name="MEDICChangeInv"><i class="fa  fa-save"></i>   Save</button> &nbsp&nbsp&nbsp&nbsp
                                                                </div>
                                                                
                                                                </div>
                                                            </form>  
                                                         </div>
                                                         
                                                         <br>
                                                    </div>
                                                </div>
                                            </div>                 
                                        <?php 
                                          } 
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>

              
                        <!--end container-->
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
