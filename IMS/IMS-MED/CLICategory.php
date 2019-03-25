<?php
     include("MEDJSHeader.php");
     include("MEDJSCore.php");
     include("MEDJSCustom.php");
?>

<title>Manage Clinic Supplies Category | PUPQC PSO</title>


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
                    <ul >
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
                    <ul class="active" >
                        <li><a href="javascript:;"><i class="fa  fa-envelope"></i>Requisition</a>
                            <ul class="sub">
                                <li><a href="CLIAddNewReq.php">Add New Items</a></li>
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
                         <li><a class="active" href="javascript:;"><i class="fa fa-tasks"></i>Inventory Management</a>
                            <ul class="active">
                                <li><a class="active" href="CLICategory.php">Setup Item Category</a></li>
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
                    <li><a href="CLICategory.php">Manage Medicine Category</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>


        <section class="panel">
                    <header class="panel-heading" style="color: white; background-color: gray">
                        Add Medicinal Supply Category Type
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
                                                                        <img alt="" src="../../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
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
                            <header class="panel-heading" style="color: white; background-color: gray">
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
