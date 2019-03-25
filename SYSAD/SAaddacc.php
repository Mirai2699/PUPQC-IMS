<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>


<title>Add Account | PUPQC PSO</title>


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
                    <a class="active" href="javascript:;">
                        <i class="fa   fa-unlock-alt"></i>
                        <span>User Account Setup</span>
                    </a>
                    <ul class="active" class="sub">
                        <li><a class="active" href="SAaddacc.php">Add User Account</a></li>
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
                        <li><a href="SAaddacc.php">Add Account</a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
              

            <section class="panel">
                <div class="row">
                    <div class="col-sm-12">
                    
                        <br>
                        <div class="col-md-3">
                            <h4>Account Creation</h4>
                        </div>
                                  

                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">
                                    </div>
                                </div>
                                              
                                                    <form role="form" method="POST" action="F_Account.php">
                                                            <div class="col-md-10" style="margin: 10px">
                                                                
                                                                    
                                                                    <div class="col-md-5">
                                                                        <div class="form-group">
                                                                            <label>Username</label>
                                                                            <input style="color: black;" type="text" name="accuser" maxlength="25" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <div class="form-group">
                                                                            <label>Password</label>
                                                                            <input style="color: black;" type="password" name="accpass" maxlength="150" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <div class="form-group">
                                                                            <labe>Account Type</label>
                                                                            <select name="acctype" class="form-control" style="color: black;"required/>
                                                                                <option value="" selected></option>
                                                                                <option value="Property-Custodian">Property Custodian</option>
                                                                                <option value="Director">Director</option>
                                                                                <option value="Inspection-Officer">Inspection Officer</option>
                                                                                <option value="Departmental-User">Departmental User</option>
                                                                                 <option value="Medical-Officer">Medical Officer</option>
                                                                                <option value="Dental-Officer">Dental Officer</option>
                                                                                <option value="Administrator">System Administrator</option>
                                                                            </select>

                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-5">
                                                                        <div class="form-group">
                                                                            <label>Name of Employee</label>
                                                                            <select class="form-control m-bot15" name="accempID" style="color: black; padding-left: 10px;"required/>

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
                                                                                        $office = $row['O_NAME'];

                                                                                ?>
                                                                                <option value="<?php echo $ID ?>"><?php echo "$Fname  $Lname  ($Job)"; ?></option>
                                                                                  <?php 
                                                                                    } 
                                                                                ?>
                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-md-5">
                                                                        <div class="form-group">
                                                                            <label>Representing Office:</label>
                                                                            <select class="form-control m-bot15" name="accoffice" style="color: black; padding-left: 10px;"required/>

                                                                            <option value="" selected disabled></option>
                                                                               <?php  
                                                                                    $sqlemp= "SELECT * FROM pso_r_office ";
                                                                                    $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                    while($row = mysqli_fetch_assoc($results))
                                                                                    {   
                                                                                        $OID = $row['O_ID'];
                                                                                        $Oname = $row['O_NAME'];
                                                                                       

                                                                                ?>
                                                                                <option value="<?php echo $OID ?>"><?php echo $Oname; ?></option>
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
                                                        <div class="row" style="margin-left: 10px"> 
                                                            <div class="col-md-2">
                                                                <div style="padding: 1px; margin: 10px; ">  
                                                                    <a data-toggle="modal" href="#Continue" class="btn btn-success"> Create Account <i class="fa  fa-check"></i></a>   
                                                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content" style="text-align: center;">
                                                                                    <div class="modal-header">
                                                                                        You are about to provide a user account for the said employee. Are you sure you want to proceed?
                                                                                    </div>
                                                                                    <img alt="" src="../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                                                    <div class="panel" style="height: 50%; width: 100%">
                                                                                        <button type="submit" class="btn btn-success btn-lg" name="Addacc">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
                                                                                        <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                                                    </div>
                                                                                    <br>
                                                                                </div>
                                                                            </div>
                                                                      </div>                                           
                                                                  </div>
                                                            </div>            

                                                             <div class="col-md-2">
                                                                <div style="padding: 1px; margin: 10px; ">  
                                                                    <a data-toggle="modal" href="#skip" class="btn btn-info"> Skip  <i class="fa  fa-external-link"></i></i></a>   
                                                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="skip" class="modal fade">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content" style="text-align: center;">
                                                                                    <div class="modal-header">
                                                                                        Skipping the account creation means you are only about to save the employee details
                                                                                        without providing a user account. Are you sure you want to proceed?
                                                                                    </div>
                                                                                    <img alt="" src="../Resources/images/PUP/skip.png" style="height: 20%; width: 20%">
                                                                                    <div class="panel" style="height: 50%; width: 100%">
                                                                                        <a href="SAmngeperson.php" class="btn btn-success btn-lg">   Yes   </a> &nbsp&nbsp&nbsp&nbsp
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
