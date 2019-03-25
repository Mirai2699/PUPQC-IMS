<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>

 <title>Manage Personnel  | PUPQC PSO</title>


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
                    <a class="active" href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Personnel Setup</span>
                    </a>
                    <ul class="active" class="sub">
                        <li><a href="SAaddperson.php">Add Personnel</a></li>
                        <li><a class="active" href="SAmngeperson.php">Manage Personnel</a></li>              
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
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-cogs"></i>
                        <span>Miscellaneous</span>
                    </a>
                    <ul class="active" >
                            <li><a class="active"  href="SAUserlog.php">Users' Logs</a></li>
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
                    <li><a href="SAmngeperson.php">Manage Personnel</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Manage Personnel
                    </header>
                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th style="display: none">No.</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Gender</th>
                            <th>Job Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $view_query = mysqli_query($connection,"SELECT * FROM `pso_r_employee_profile` AS EP
                                                                  -- INNER JOIN pso_r_office AS O ON EP.O_ID = O.O_ID");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $Id = $row["EP_ID"];
                                    $Fname = $row["EP_FNAME"];
                                    $Mname = $row["EP_MNAME"];       
                                    $Lname = $row["EP_LNAME"]; 
                                    $Gender = $row["EP_GENDER"];       
                                    $Mobile= $row["EP_MOBILE"];
                                    $Email = $row["EP_EMAIL"];
                                    $Bday = $row["EP_BIRTHDATE"];
                                    $Hadd = $row["EP_HOME_ADDRESS"];
                                    $Type = $row["EP_TYPE"];
                                    $Tdesc = $row["EP_TYPE_DESC"];
                                    $Stat = $row["EP_STATUS"];
                                    $Pic = $row["EP_PICTURE"];
                                    $Office = $row["O_ID"];
                                
                        ?>      
                                 <tr class="gradeX">
                                        <td style="display: none;"><?php echo $Id; ?></td>
                                        <td><?php echo $Lname; ?></td>
                                        <td><?php echo $Fname; ?>
                                        <td><?php echo $Gender; ?></td>
                                        <td><?php echo $Type; ?></td>
                                        <td><?php echo $Stat; ?></td>
                                        <td style='width:150px'>
                                                <center>             
                                                    <a data-toggle="modal" href="#modify<?php echo $Id; ?>" class="btn btn-warning">Edit</a>               
                                                </center>
                                       </td>
                                </tr> 
                                    <!--Modal Division-->
                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modify<?php echo $Id; ?>" class="modal fade" >
                                                    <div class="modal-dialog" style="width: 70%; height: 100%">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                              <div style="text-align: right"> 
                                                                 <button data-dismiss="modal">x</button>
                                                             </div>

                                                                <h4 class="modal-title">Edit Employee Details</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form role="form" method="POST" action="F_Personnel.php">
                                                                    <div class="panel">
                                                                                        <div class="form-group">
                                                                                            <input style="display: none;" type="text" name="C_ID" value="<?php echo $Id; ?>" class="form-control"/>
                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <div class="form-group">
                                                                                                <label>First Name</label>
                                                                                                <input style="color: black;" type="text" name="EMP_Fname" value="<?php echo $Fname?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label>Midddle Name</label>
                                                                                                <input style="color: black;" type="text" name="EMP_Mname" value="<?php echo $Mname?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <label>Last Name</label>
                                                                                                <input style="color: black;" type="text" name="EMP_Lname" value="<?php echo $Lname?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label>Contact Number (Mobile)</label>
                                                                                                <input style="color: black;" type="text" name="EMP_Contact" value="<?php echo $Mobile?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label>Birthdate</label>
                                                                                                <input style="color: black;" type="date" name="EMP_Bday" value="<?php echo $Bday?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label>E-mail Address</label>
                                                                                                <input style="color: black;" type="text" name="EMP_EmAdd" value="<?php echo $Email?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label>Home Address</label>
                                                                                                <input style="color: black;" type="text" name="EMP_HomeAdd" value="<?php echo $Hadd?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <label>Job Title</label>
                                                                                                <input style="color: black;" type="text" name="EMP_Jt" value="<?php echo $Type?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-8">
                                                                                            <div class="form-group">
                                                                                                <label>Job Description</label>
                                                                                                <input style="color: black;" type="text" name="EMP_Jd" value="<?php echo $Tdesc?>" class="form-control"required/>
                                                                                            </div>
                                                                                        </div>
                                                                                         <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <label>Identity Picture</label>
                                                                                                <input style="color: black;" type="file" name="EMP_IDpic"  class="form-control"/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
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
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Status</label>
                                                                                                <select class="form-control m-bot15" name="EMP_Office" style="color: black; padding-left: 10px;" />
                                                                                                    <option value="Active" selected>Active</option>
                                                                                                    <option value="Not Active">Not Active</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                      <button type="submit" class="btn btn-success" name="Updateperson" style="padding-left: 10px; margin-left: 12px">
                                                                                         <i class="fa  fa-save"></i>   Save 
                                                                                      </button>
                                                                                      </div>
                                                                                     
                                                                                </div>
                                                                            </div>
                                                                        </form>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Modal Division-->

                                                    <?php
                                                 }
                                            ?>    

      
                <!--end container-->
            </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>



</body>
</html>
