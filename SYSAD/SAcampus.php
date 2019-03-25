<?php 
     //Intialization of UI

     //CSS 
     include ("SAHeader.php");
     //Core JS
     include ("SAJSCore.php");
     //Custom JS
     include ("SAJSCustom.php");
?>


<title>Campus Setup | PUPQC PSO</title>

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
                    <a class="active"  href="SAcampus.php">
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
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="SAmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="SAcampus.php">Campus Setup</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        

         <!--Add Campus-->
        <div class="panel">
             <form role="form" method="POST" action="F_Campus.php">
                <div class="heading" style="background-color:gray;  font-size: 15px; color: white">
                        <label style="margin: 10px">Add Campus</label>
                </div>
                <br>
                <div class="col-md-3">
                  <div class="form-group">
                     <label for="exampleInputEmail1">Campus Code</label>
                     <input style="color: black;" type="text" name="C_Code"  maxlength="50" class="form-control"required/>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Campus Name</label>
                       <input style="color: black;" type="text" name="C_Name"  maxlength="120" class="form-control"required/>
                  </div>
                </div>
                  <br><hr>
                  <div class="col-md-12">
                      <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;"></div>
                   </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div style="padding: 1px; margin: 10px; ">  
                                <a data-toggle="modal" href="#Continue" class="btn btn-success"><i class="fa  fa-save"></i>   Save</a>   
                                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="text-align: center;">
                                                <div class="modal-header">
                                                    You are about to input a new campus. Are you sure you want to proceed?
                                                </div>
                                                <img alt="" src="../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                <div class="panel" style="height: 50%; width: 100%">
                                                    <button type="submit" class="btn btn-success btn-lg" name="Addcampus">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
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
        <br>



        <!--Manage Campus-->
        <section id="content">
         <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                <div class="heading" style="background-color:gray; font-size: 15px; color: white">
                        <label style="margin: 10px">Manage Campus</label>
                </div>
                <form class="col s12">

                  <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th style="display: none">No.</th>
                            <th>Campus Code</th>
                            <th>Campus Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $view_query = mysqli_query($connection,"SELECT * FROM `pso_r_campus` ");
                            while($row = mysqli_fetch_assoc($view_query))
                            	//ETO PALA UNG START NG LOOP HAHA, NASA DULO NG MODAL DIVISION UNG ISA PA
                                {

                                	//VARIABLES FOR DISPLAYING THE DATA FROM THE TABLE
                                    $No = $row["C_ID"];    // ETO YUNG ID NA DAPAT MONG IPASA SA PANGALAN NG MODAL
                                    $code = $row["C_CODE"];
                                    $name = $row["C_NAME"];
                                
                        ?>      
                                 <tr class="gradeX">
                                        <td style="display: none;"><?php echo $No; ?></td>
                                        <td><?php echo $code; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td style='width:150px'>
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

                                                                <form role="form" method="POST" action="F_Campus.php">
                                                                   
                                                                	<!--KAILANGAN NETONG HIDDEN INPUT NA MAY VALUE NI ID, PARA PAG NAG VIEW AT EDIT KA DITO SYA BABASE-->
                                                                    <div class="form-group">
                                                                        <input style="display: none;" type="text" name="C_ID" value="<?php echo $No; ?>" class="form-control"/>
                                                                    </div>
                                                                    <!--ILALAGAY MO SA VALUE UNG ECHOED VALUE NA GALING SA TABLE, DAPAT KAPANGALAN NYA UNG VARIABLES SA TABLE
                                                                        PARA MAPASA, THEN SAME LNG DIN SA IBA-->
                                                                     <div class="form-group">
                                                                        <label>Campus Code</label>
                                                                        <input style="color: black;" type="text" name="C_Code" value="<?php echo $code; ?>" class="form-control"disabled/>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Campus Name</label>
                                                                        <input style="color: black;" type="text" name="C_Name" value="<?php echo $name; ?>" class="form-control" />
                                                                    </div>

                                                                   
                                                                    <br><hr>
                                                                   
                                                                    <button type="submit" class="btn btn-success" name="Updatecampus">Save</button>
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
