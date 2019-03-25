<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>

<title>Add Personnel | PUPQC PSO</title>

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a  href="SAmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Personnel Setup</span>
                    </a>
                    <ul cclass="active">
                        <li><a class="active" href="SAaddperson.php">Add Personnel</a></li>
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
                    <li><a href="SAaddperson.php">Add Personnel</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
              

        <section class="panel">
            <div class="row">
                <div class="col-sm-12">
                    
                        <br>
                        <div class="col-md-3">
                            <h4>Add Personnel</h4>
                        </div>
                                  

                                            <div class="col-md-12">
                                                <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">
                                                </div>
                                            </div>

                                            <form role="form" method="POST" action="F_Personnel.php">
                                                <div class="col-md-11" style="margin: 10px">
                                                       
                                                                
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>First Name</label>
                                                                            <input style="color: black;" type="text" name="EMP_Fname" maxlength="50" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Midddle Name</label>
                                                                            <input style="color: black;" type="text" name="EMP_Mname" maxlength="35" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Last Name</label>
                                                                            <input style="color: black;" type="text" name="EMP_Lname" maxlength="35" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Gender</label>
                                                                            <select name="EMP_Gender" class="form-control" style="color: black;" required="">
                                                                                <option selected disabled value=""></option>
                                                                                <option value="Male">Male</option>
                                                                                <option value="Female">Female</option>
                                                                            </select>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Contact Number (Mobile)</label>
                                                                            <input style="color: black;" type="text" name="EMP_Contact" maxlength="11" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>E-mail Address</label>
                                                                            <input style="color: black;" type="text" name="EMP_EmAdd" maxlength="75" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Birthdate</label>
                                                                            <input style="color: black;" type="date" name="EMP_Bday" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Home Address</label>
                                                                            <input style="color: black;" type="text" name="EMP_HomeAdd" maxlength="300" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Job Title</label>
                                                                            <input style="color: black;" type="text" name="EMP_Jt" maxlength="50" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Job Description</label>
                                                                            <input style="color: black;" type="text" name="EMP_Jd" maxlength="150" class="form-control"required/>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Identity Picture</label>
                                                                            <input style="color: black;" type="file" name="EMP_IDpic" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Assigned at Office</label>
                                                                            <select class="form-control m-bot15" name="EMP_Office" style="color: black; padding-left: 10px;" />

                                                                            <option value="" selected disabled></option>
                                                                                <?php  
                                                                                    $sqlemp= "SELECT * FROM `pso_r_office`";
                                                                                    $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                    while($row = mysqli_fetch_assoc($results))
                                                                                    {   
                                                                                        $OID = $row['O_ID'];
                                                                                        $Oname = $row['O_NAME'];

                                                                                ?>
                                                                                <option value="<?php echo $OID ?>"><?php echo "$Oname "; ?></option>
                                                                                <?php 
                                                                                    } 
                                                                                ?>
                                                                                </select>
                                                                        </div>
                                                                    </div>

                                                            </div>
                                                              <div class="col-md-12">
                                                                 <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">
                                                                 </div>
                                                             </div>
                                                             <div class="col-md-3" style="margin: 10px; margin-left: 30px">
                                                                  <button type="submit" class="btn btn-success" name="Addperson" style="padding-left: 10px">
                                                                     Save and Continue  <i class="fa  fa-angle-double-right"></i>
                                                                  </button>
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
