<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>


<title>Manage Accounts | PUPQC PSO</title>


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
                    <ul class="active" >
                        <li><a href="SAaddacc.php">Add User Account</a></li>
                        <li><a class="active" href="SAmngeacc.php">Manage User Accounts</a></li>         
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
                    <li><a href="SAmngeacc.php">Manage Accounts</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Manage Accounts
                    </header>
                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th style="display: none">No.</th>
                            <th>Account Type</th>
                            <th>Username</th>
                            <th>Name of Employee</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $view_query = mysqli_query($connection,"SELECT * FROM `pso_r_user` AS ACC
                                                                    INNER JOIN `pso_r_employee_profile` AS EMP ON ACC.EP_ID = EMP.EP_ID
                                                                    ");
                            while($row = mysqli_fetch_assoc($view_query))
                                {   
                                    $No = $row["U_ID"];
                                    $un = $row["U_USERNAME"];       
                                    $pass = $row["U_PASSWORD"];
                                    $type = $row["U_TYPE"];
                                    $empid = $row["EP_ID"];  
                                    $head1 = $row["EP_FNAME"] ;
                                    $head2 = $row["EP_MNAME"] ;
                                    $head3 = $row["EP_LNAME"] ;
                                    $act = $row["U_STATUS"];
                                
                        ?>      
                                 <tr class="gradeX">
                                        <td style="display: none;"><?php echo $No; ?></td>
                                        <td><?php echo $type; ?></td>
                                        <td><?php echo $un; ?></td>
                                        <td><?php echo $head1.' '.$head3; ?></td>
                                        <td><?php echo $act; ?></td>
                                        <td style='width:150px'>
                                                <center>
                                                    
                                                <a data-toggle="modal" href="#modify<?php echo $No; ?>" class="btn btn-warning">Edit</a>               
                                                </center>
                                       </td>
                                </tr> 

                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modify<?php echo $No; ?>" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                              <div style="text-align: right"> 
                                                                 <button data-dismiss="modal">x</button>
                                                             </div>

                                                                <h4 class="modal-title">Edit Account Details</h4>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form role="form" method="POST" action="F_Account.php">
                                                                   

                                                                    <div class="form-group">
                                                                        <input style="display: none;" type="text" name="accID"  value="<?php echo $No; ?>" class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Change Username</label>
                                                                        <input style="color: black;" type="text" name="accuser" value="<?php echo $un ?>" class="form-control"/>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label>Change Password</label>
                                                                        <input style="color: black;" type="password" name="accpass"  value="<?php echo $pass ?>" class="form-control"/>
                                                                    </div>
                                                                     <div class="form-group">
                                                                        <label>Confirm Password</label>
                                                                        <input style="color: black;" type="password" name="accconpass"  class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Change Account Type</label>
                                                                        <select name="acctype" class="form-control" style="color: black;" required="">
                                                                                <option selected value="<?php echo $type; ?>"><?php echo $type; ?></option>
                                                                                <option value="Property-Custodian">Property Custodian</option>
                                                                                <option value="Director">Director</option>
                                                                                <option value="Inspection-Officer">Inspection Officer</option>
                                                                                <option value="Departmental-User">Departmental User</option>
                                                                                <option value="Administrator">System Administrator</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label>Change Status</label>
                                                                            <select name="accstat" class="form-control" style="color: black;" required="">
                                                                                <option selected value="Active">Active</option>
                                                                                <option value="Not_Active">Not Active</option>
                                                                            </select>
                                                                    </div>
                                                                    
                                                                    <br><hr>
                                                                   
                                                                    <button type="submit" class="btn btn-success" name="Updateacc">Save</button>
                                                                    &nbsp&nbsp
                                                                   
                                                                        <br>
                                                                    

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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
