<?php 
     //Intialization of UI
     include ("SAHeader.php");
     include ("SAJSCore.php");
     include ("SAJSCustom.php");
?>


<title>Manage Clinical Supplies Category | PUPQC PSO</title>


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
                    <ul class="active" class="sub">
                            <li><a class="active" href="SAcategory.php">Setup Item Category</a>
                                <ul class="active">
                                    <li><a href="SA_Off_Category.php">------  Office Supplies</a></li>
                                    <li><a class="active" href="SA_Clinic_Category.php">------  Clinical Supplies</a></li>   
                                    <li><a href="SA_Med_Category.php">------  Medicinal Supplies</a></li>      
                                </ul>
                            </li>
                             <li><a href="javascript:;">Setup Items and Critical Level</a>
                                <ul class="sub">
                                    <li><a href="SA_Supp_Office.php">------  Office Supplies</a></li>
                                    <li><a href="SA_Supp_Clinic.php">------  Clinical Supplies</a></li>   
                                    <li><a href="SA_Supp_Medic.php">------  Medicinal Supplies</a></li>      
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
                    <li><a href="SAcategory.php">Manage Item Category</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>


        <section class="panel">
                    <header class="panel-heading">
                        Add Clinical Supply Category Type
                          <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped">                                
                                <tr>
                                    <td>                          
                                        <form action="F_Category.php" method="POST">

                                            <div class="form-content">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                             
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="row group">                                                        
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Category Name</label>
                                                            <input maxlength="49" type="text" name="catname" maxlength="50" class="form-control" required="" style="color: black;"  />
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <label>Category Description</label>
                                                            <input maxlength="99" type="text" name="catdesc" maxlength="100" class="form-control" required="" style="color: black;"  />
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                 
                                                        </div>
                                                    </div>

                                                </div>  
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div style="padding: 1px; margin-bottom: 10px; ">  
                                                        <a data-toggle="modal" href="#Continue" class="btn btn-success"><i class="fa  fa-save"></i>   Save</a>   
                                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content" style="text-align: center;">
                                                                        <div class="modal-header">
                                                                            You are about to input a new category type. Are you sure you want to proceed?
                                                                        </div>
                                                                        <img alt="" src="../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                                        <div class="panel" style="height: 50%; width: 100%">
                                                                            <button type="submit" class="btn btn-success btn-lg" name="addcliniccat">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
                                                                            <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                        </div>                                           
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

      <div class="row">
            <div class="col-sm-12">
         <!-- START CONTENT -->
             <section>
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Category Types    
                            </header>
                          <div class="panel-body">
                            <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th style="width: 40%">Category Name</th>
                                    <th style="width: 50%">Category Description</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $view_query = mysqli_query($connection,"SELECT * FROM `ims_r_clinical_category` WHERE DEF_Active = 1 ");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["Category_ID"];
                                            $name = $row["Category_Name"];       
                                            $desc = $row["Category_Desc"];  
                                        
                                ?>      
                                         <tr class="gradeX">
                                                <td style="display: none;"><?php echo $No; ?></td>
                                                <td style="width: 15%"><?php echo $name; ?></td>
                                                <td style="width: 15%"><?php echo $desc; ?></td>
                                                <td style="width: 15%">
                                                    <a data-toggle="modal" href="#edit<?php echo $No; ?>" class="btn btn-warning"><i class="fa  fa-pencil"></i>   Edit</a>  
                                                </td>
                                                
                                        </tr>  
                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?php echo $No; ?>" class="modal fade">
                                                <div class="modal-dialog">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <div style="text-align: right"> 
                                                                 <button data-dismiss="modal">x</button>
                                                             </div>
                                                            <h4 class="modal-title">Edit Details</h4>
                                                         </div>
                                                         <div class="modal-body">
                                                          <form action="F_Category.php" method="POST">

                                                                <div class="form-content">
                                                                    
                                                                   
                                                                   
                                                                    <div class="row group">                                                        
                                                                         <input type="hidden" name="editcatno" class="form-control" required="" style="color: black;"  
                                                                                value="<?php echo $No; ?>" />
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Category Name</label>
                                                                                <input maxlength="150" type="text" name="editcatname" class="form-control" required="" style="color: black;"  
                                                                                value="<?php echo $name; ?>" />
                                                                            </div>
                                                                        </div>
                                                                      
                                                                        <div class="col-md-7">
                                                                            <div class="form-group">
                                                                                <label>Category Description</label>
                                                                                <input maxlength="150" type="text" name="editcatdesc" class="form-control" required="" style="color: black;" 
                                                                                value="<?php echo $desc; ?>" />
                                                                            </div>
                                                                        </div>
                                                                       
                                                                        <div class="col-md-12">
                                                                            <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                 
                                                                            </div>
                                                                        </div>

                                                                    </div>  
                                                                </div>
                                                                
                                                                 <div class="panel" style="height: 50%; width: 100%">
                                                                    <button type="submit" class="btn btn-success " name="editcliniccat"><i class="fa  fa-save"></i>   Save</button> &nbsp&nbsp&nbsp&nbsp
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
