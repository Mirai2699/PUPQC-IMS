<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>


<title>Manage Offices | PUPQC PSO</title>

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
                    <ul class="active" >
                        <li><a href="SAadddept.php">Add Office</a></li>
                        <li><a class="active" href="SAmngedept.php">Manage Office</a></li>         
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
                    <li><a href="SAmngedept.php">Manage Offices</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
      
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Offices
                    </header>
                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th style="display: none">No.</th>
                            <th>Office Code</th>
                            <th>Office Name</th>
                            <th>Office Description</th>
                            <th>Office Head</th>
                            <th>Campus Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $view_query = mysqli_query($connection,"SELECT * FROM `pso_r_office` AS OFFICE
                                                            INNER  JOIN `pso_r_employee_profile` AS EMP ON OFFICE.EP_ID = EMP.EP_ID
                                                            INNER JOIN `pso_r_campus` AS CAM ON OFFICE.C_ID = CAM.C_ID
                                                            ORDER BY OFFICE.O_NAME ASC ");
                            while($row = mysqli_fetch_assoc($view_query))
                            	//ETO PALA UNG START NG LOOP HAHA, NASA DULO NG MODAL DIVISION UNG ISA PA
                                {

                                	//VARIABLES FOR DISPLAYING THE DATA FROM THE TABLE
                                    $No = $row["O_ID"];    // ETO YUNG ID NA DAPAT MONG IPASA SA PANGALAN NG MODAL
                                    $code = $row["O_CODE"];
                                    $name = $row["O_NAME"];
                                    $desc = $row["O_DESCRIPTION"];       
                                    $head1 = $row["EP_FNAME"] ;
                                    $head2 = $row["EP_MNAME"] ;
                                    $head3 = $row["EP_LNAME"] ;
                                    $cid = $row["C_ID"];
                                    $campus = $row["C_NAME"];
                                
                        ?>      
                                 <tr class="gradeX">
                                        <td style="display: none;"><?php echo $No; ?></td>
                                        <td><?php echo $code; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $desc; ?></td>
                                        <td><?php echo $head1.' '.$head3; ?></td>
                                        <td><?php echo $campus; ?></td>
                                        <td style='width:100px'>
                                                <center>
                                                 <!--DITO MO SYA LALAGAY SA LOOB NG LINK BUTTON, UNG PANGALAN NG MODAL ATSKA UNG ID-->
                                                <a data-toggle="modal" href="#modify<?php echo $No; ?>" class="btn btn-warning">Edit</a>               
                                                </center>
                                       </td>
                                </tr> 
                                		<!--Modal Division-->
                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modify<?php echo $No; ?>" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                              <div style="text-align: right"> 
                                                                 <button data-dismiss="modal">x</button>
                                                             </div>

                                                                <h4 class="modal-title">Edit Details</h4>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form role="form" method="POST" action="F_Office.php">
                                                                   
                                                                	<!--KAILANGAN NETONG HIDDEN INPUT NA MAY VALUE NI ID, PARA PAG NAG VIEW AT EDIT KA DITO SYA BABASE-->
                                                                    <div class="form-group">
                                                                        <input style="display: none;" type="text" name="OID" value="<?php echo $No; ?>" class="form-control"/>
                                                                    </div>
                                                                    <!--ILALAGAY MO SA VALUE UNG ECHOED VALUE NA GALING SA TABLE, DAPAT KAPANGALAN NYA UNG VARIABLES SA TABLE
                                                                        PARA MAPASA, THEN SAME LNG DIN SA IBA-->
                                                                     <div class="form-group">
                                                                        <label for="exampleInputEmail1">Office Code</label>
                                                                        <input style="color: black;" type="text" name="OCode" value="<?php echo $code; ?>" class="form-control" />
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Office Name</label>
                                                                        <input style="color: black;" type="text" name="OName" value="<?php echo $name; ?>" class="form-control" />
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Office Description</label>
                                                                        <input style="color: black;" type="text" name="ODesc" value="<?php echo $desc; ?>" class="form-control"/>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Office Head</label>
                                                                         <select class="form-control m-bot15" name="OHead" style="color: black; padding-left: 10px;"required/>

                                                                            <option value="<?php echo $ID ?>" selected><?php echo $head1.' '.$head2.' '.$head3; ?></option>
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

                                                                     <div class="form-group">
                                                                        <label for="exampleInputEmail1">Office Campus Location</label>
                                                                        <select class="form-control m-bot15" name="OCampus" style="color: black; padding-left: 10px;" required=""/>
                                                                             <option value="<?php echo $cid ?>" selected><?php echo $campus; ?></option>
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
                                                                   
                                                                    <br><hr>
                                                              
                                                                    <button type="submit" class="btn btn-success" name="Updatedept">Save</button>
                                                                    &nbsp&nbsp
                                                                   
                                                                        <br>
                                                                    

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Modal Division-->
                                                    <?php
                                                 } //ETO UNG DULO NG LOOP, DAPAT ENCLOSED PARIN SYA NG PHP 
                                                    // KAILANGAN YAN PARA UNG DATA SA LOOB NG TABLE PATULOY NYANG PINAPASA 
                                            ?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>       
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
