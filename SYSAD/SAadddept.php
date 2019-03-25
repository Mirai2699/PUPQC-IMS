<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>

<title>Add Department | PUPQC PSO</title>

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
                    <a  href="SAcampus.php">
                        <i class="fa  fa-sitemap"></i>
                        <span>Campus Setup</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-building-o"></i>
                        <span>Office Setup</span>
                    </a>
                    <ul class="active" class="sub">
                        <li><a class="active" href="SAadddept.php">Add Office</a></li>
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
                    <a href="javascript:;">
                        <i class="fa  fa-tasks"></i>
                        <span>Inventory Management</span>
                    </a>
                    <ul class="sub">
                            <li><a href="SAcategory.php">Setup Item Category</a></li>
                            <li><a href="SAStocklevel.php">Setup Items and Critical Level</a></li>         
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
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="SAmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="SAadddept.php">Add Office</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
              

         <section class="panel">
            <div class="row">
                <div class="col-sm-12">
                <div class="heading" style="background-color:gray; font-size: 15px; color: white">
                        <label style="margin: 10px">Add Office</label>
                </div>
                   
                               
                                                        <form role="form" method="POST" action="F_Office.php">
                                                            <div class="col-md-12" style="margin: 10px">
                                                                     <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Office Code</label>
                                                                            <input style="color: black;" type="text" name="OCode" class="form-control" required="" maxlength="49" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Office Name</label>
                                                                            <input style="color: black;" type="text" name="OName" class="form-control" required="" maxlength="149" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Office Description</label>
                                                                            <input style="color: black;" type="text" name="ODesc" class="form-control" required="" maxlength="299" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Office Head</label>
                                                                             <select class="form-control m-bot15" name="OHead" style="color: black; padding-left: 10px;" required=""/>
                                                                             <option value="" selected disabled></option>
                                                                                <?php  
                                                                                    $sqlemp= "SELECT * FROM `pso_r_employee_profile`";
                                                                                    $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                    while($row = mysqli_fetch_assoc($results))
                                                                                    {   
                                                                                        $ID = $row['EP_ID'];
                                                                                        $Fname = $row['EP_FNAME'];
                                                                                        $Lname = $row['EP_LNAME'];
                                                                                        $Job = $row['EP_TYPE'];

                                                                                ?>
                                                                                <option value="<?php echo $ID ?>"><?php echo "$Fname  $Lname  ($Job)"; ?></option>
                                                                                <?php 
                                                                                    } 
                                                                                ?>
                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Office Campus Location</label>
                                                                             <select class="form-control m-bot15" name="OCampus" style="color: black; padding-left: 10px;" required=""/>
                                                                             <option value="" selected disabled></option>
                                                                                <?php  
                                                                                    $sqlemp= "SELECT * FROM `pso_r_campus`";
                                                                                    $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                    while($row = mysqli_fetch_assoc($results))
                                                                                    {   
                                                                                        $CID = $row['C_ID'];
                                                                                        $Cname = $row['C_NAME'];

                                                                                ?>
                                                                                <option value="<?php echo $CID ?>"><?php echo "$Cname "; ?></option>
                                                                                <?php 
                                                                                    } 
                                                                                ?>
                                                                                </select>
                                                                        </div>
                                                                    </div>

                                                                    
                                                                </div>
                                                                    <div class="col-md-12">
                                                                            <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;"></div>
                                                                    </div>
                                                                <div class="col-md-3">
                                                                 <div class="row">
                                                                    <div class="col-md-2">
                                                                        <div style="padding: 1px; margin: 10px; ">  
                                                                            <a data-toggle="modal" href="#Continue" class="btn btn-success"><i class="fa  fa-save"></i>   Save</a>   
                                                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content" style="text-align: center;">
                                                                                            <div class="modal-header">
                                                                                                You are about to input a new office. Are you sure you want to proceed?
                                                                                            </div>
                                                                                            <img alt="" src="../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                                                            <div class="panel" style="height: 50%; width: 100%">
                                                                                                <button type="submit" class="btn btn-success btn-lg" name="Adddept">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
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
