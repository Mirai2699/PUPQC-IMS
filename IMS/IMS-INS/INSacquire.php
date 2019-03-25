<?php 
     include ("INSHeader.php");
     include ("INSJSCore.php");
     include ("INSJSCustom.php");
?>



    <title>Entry Items | PUPQC IMS</title>

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <br>
                <hr>
                <li>
                    <a href="INSmainpage.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="INSDelDet.php">
                        <i class="fa fa-truck"></i>
                        <span>Delivery</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="javascript:;">
                        <i class="fa  fa-download"></i>
                        <span>Acquisition</span>
                    </a>
                    <ul class="active" >
                        <li><a class="active" href="INSacquire.php">Entry Items</a></li>
                        <li><a href="INSAcqDet.php">Acquired</a></li>      
                    </ul>
                </li>
                <li>
                    <a href="INSInvStats.php">
                        <i class="fa fa-tasks"></i>
                        <span>Inventory Status</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-book"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">
                        <li><a href="INSrepacquired.php">Acquisition</a></li>  
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
                    <li><a href="INSmainpage.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="INSacquire.php">Add New Item</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="">
                            <a data-toggle="tab" href="#home">Delivery From Request</a>
                        </li>
                        <li class="active">
                            <a data-toggle="tab" href="#about">Other Modes of Acquisition</a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <!--Acquisition of Items by Delivery from Request -->
                        <div id="home" class="tab-pane">
                           <div class="row">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading" style="background-color: teal; margin: 5px; border-width: 2px; color: white">
                                        Acquisition of Items by Delivery from Request 
                                    </header>
                                <form class="col s12">

                                  <div class="panel-body">
                                    <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <th>Batch No.</th>
                                            <th>Date Requested</th>
                                            <th>Date Released</th>
                                            <th>Date Delivered</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           $view_query = mysqli_query($connection,
                                                           "SELECT *
                                                            FROM `ims_t_summary_request` AS SUMREQ  
                                                            INNER JOIN `ims_t_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                                                 WHERE SUMREQ.Status_Req = 'RELEASE' AND SUMREQ.Accept_Status = 'DELIVERED' 
                                                                 AND REQ.Status = 'PENDING'
                                                            ORDER BY SUMREQ.Date_Released DESC ");
                                            while($row = mysqli_fetch_array($view_query))
                                                {
                                                    $bn = $row["Batch_No"];
                                                    $DR = $row["Date_Requested"];
                                                    $DRev = $row["Date_Released"];       
                                                    $DApr = $row["Date_Delivered"]; 
                                                
                                        ?>      
                                                 <tr class="gradeX">
                                                        <td><?php echo $bn; ?></td>
                                                        <td><?php echo $DR; ?></td>
                                                        <td><?php echo $DRev; ?></td>
                                                        <td><?php echo $DApr; ?></td>
                                                        <td style='width:150px'>
                                                                <center>
                                                                    
                                                                <a href="INSReviewAcquire.php?viewrequests=<?php echo $bn; ?>" class="btn btn-success">View</a>               
                                                                </center>
                                                       </td>
                                                </tr>  

                                                <?php 
                                                  } 
                                                    ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </form>
                            </section>
                            </div>
                        </div>
                        </div>
                        <!--Other Modes of Acquisition -->
                        <div id="about" class="tab-pane active">
                           <!--tab nav start-->          
                            <header class="panel-heading" style="background-color: goldenrod; margin: 5px; border-width: 2px; color: white">
                                 Acquisition of Items from different Modes  (Single Entry Form) 
                            </header>    
                                  <div class="col-md-12">
                                                  <table class="display table table-bordered table-striped" style="width: 100%; ">                                
                                                                        <tr>
                                                                            <td>  
                                                                              <form role="form" method="POST" action="F_OFF_Acquisition.php">
                                                                                    <div class="form-group">
                                                                                        <input style="display: none;" type="text" name="a_No" value="<?php echo $No; ?>" class="form-control"/>
                                                                                    </div>
                                                                                     <div class="form-group">
                                                                                        <input style="display: none;" type="text" name="a_batch" value="<?php echo $ids; ?>" class="form-control"/>
                                                                                    </div>
                                                                                     
                                                                                    
                                                                                    <div class="col-md-12">
                                                                                        <div class="col-md-4">
                                                                                         <div class="form-group">
                                                                                             <label for="exampleInputEmail1">Date of Procurement</label>
                                                                                             <input style="color: black;" type="Date" name="a_date" value="<?php echo date('Y-m-d') ?>"  max="<?php echo date('Y-m-d')?>" class="form-control"required/>
                                                                                         </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                                <label for="exampleInputEmail1">Mode of Acquisition</label>
                                                                                                <select name="a_mode" class="form-control" style="color: black;"required>
                                                                                                         <option value="" selected disabled></option>
                                                                                                         <option value="Donated">Obtained from Donation</option>
                                                                                                         <option value="Purchased">Obtained from Purchased</option>             
                                                                                                </select>
                                                                                          </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                         <div class="form-group">
                                                                                             <label for="exampleInputEmail1">Supplier</label>
                                                                                             <input style="color: black;" type="text" name="a_supplier"  class="form-control" maxlength="50"required/>
                                                                                         </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                             <div class="col-md-12">
                                                                                                <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                    <div class="col-md-12" style="margin-bottom: 5px">
                                                                                        
                                                                                        <button id="btnSwitch" class="btn btn-warning" disabled="disabled" onclick="undisableTxt()" style="margin-bottom: 5px">For Existing Items</button>
                                                                                        <script>

                                                                                        function undisableTxt() {
                                                                                            document.getElementById("ddCategory").disabled = false;
                                                                                            document.getElementById("ddItem").disabled = false;
                                                                                            document.getElementById("ddquan").disabled = false;
                                                                                            document.getElementById("btnSwitch2").disabled = false;
                                                                                            document.getElementById("btnSwitch").disabled = true;
                                                                                            document.getElementById("btnold").disabled = false;  
                                                                                            document.getElementById("btnnew").disabled = true;
                                                                                            document.getElementById("newsku").disabled = true;
                                                                                            document.getElementById("newitem").disabled = true;
                                                                                            document.getElementById("newcategory").disabled = true;
                                                                                            document.getElementById("newunit").disabled = true;
                                                                                            document.getElementById("newquan").disabled = true;
                                                                                          }
                                                                                        </script>

                                                                                         <button id="btnSwitch2" class="btn btn-success" onclick="undisableTxt2()" style="margin-bottom: 5px">For New Items</button>
                                                                                        <script>

                                                                                        function undisableTxt2() {
                                                                                            document.getElementById("ddCategory").disabled = true;
                                                                                            document.getElementById("ddItem").disabled = true;
                                                                                            document.getElementById("ddquan").disabled = true; 
                                                                                            document.getElementById("btnSwitch").disabled = false;
                                                                                            document.getElementById("btnSwitch2").disabled = true;
                                                                                            document.getElementById("btnold").disabled = true;
                                                                                            document.getElementById("btnnew").disabled = false;
                                                                                            document.getElementById("newsku").disabled = false;
                                                                                            document.getElementById("newitem").disabled = false;
                                                                                            document.getElementById("newcategory").disabled = false;
                                                                                            document.getElementById("newunit").disabled = false;
                                                                                            document.getElementById("newquan").disabled = false;

                                                                                          }
                                                                                        </script>



                                                                                           <div class="col-md-12" style="background-color: #fff59d; border-style: solid; margin-right: 10px; ">

                                                                                             <?php 
                                                                                             $categoryName = '';
                                                                                                ?>
                                                                                                <script type="text/javascript">
                                                                                                    function getCategory(val) {
                                                                                                        console.log ("<?php echo $categoryName='"+ val + "';?>"); 
                                                                                                        // alert(pass);
                                                                                                        console.log("<?php echo $categoryName ?>");

                                                                                                        document.getElementById('itemdiv').style.display = 'block'; 
                                                                                                                $.ajax({

                                                                                                                    url: 'retreiveItem.php'
                                                                                                                    ,data:{
                                                                                                                        category: val
                                                                                                                    }
                                                                                                                    ,type:'GET'
                                                                                                                    ,dataType: 'json'
                                                                                                                    ,success:function(data){ 
                                                                                                                         document.getElementById('ddItem').innerHTML = data.option;

                                                                                                                    },error: function(){

                                                                                                                    }
                                                                                                                });
                                                                                                        /*$.ajax({
                                                                                                            type: "POST",
                                                                                                            url: "get_category.php",
                                                                                                            data: "Item_Category="+val,
                                                                                                            success: function(data){
                                                                                                                $("#ddItem").html(data);
                                                                                                            }
                                                                                                        });*/
                                                                                                    }
                                                                                                </script>
                                                                                            <br>
                                                                                            <label style="font-size: 15px">
                                                                                                    For Existing items, please enter the following: 
                                                                                            </label><br><br>
                                                                                             <div class="col-md-3">
                                                                                                <div class="form-group">
                                                                                                    <label>Category</label>
                                                                                                    <select id="ddCategory" class="form-control" style="color: black;" required="" onchange="getCategory(this.value)" >
                                                                                                        <option selected disabled value=""></option>
                                                                                                          <?php  
                                                                                                              $sqlemp= "SELECT * FROM `ims_r_office_category`";
                                                                                                              $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                                              while($row = mysqli_fetch_assoc($results))
                                                                                                               {  
                                                                                                                  $cat = $row['Category_Name'];
                                                                                                        ?>
                                                                                                        <option value="<?php echo $cat ?>"><?php echo "$cat"; ?></option>
                                                                                                         <?php
                                                                                                            }
                                                                                                        ?>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>  
                                                                                            <div id="itemdiv" class="col-md-5">
                                                                                                <div class="form-group">
                                                                                                    <label id="itemLabel">Item Name</label>
                                                                                                    <select id="ddItem" name="a_name" class="form-control" style="color: black;" required="">
                                                                                                        <option selected disabled value=""> </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-2">
                                                                                                <div class="form-group">
                                                                                                    <label for="exampleInputEmail1">Quantity</label>
                                                                                                    <input id="ddquan" style="color: black;" type="number" name="a_quan"  class="form-control" min="1" max="1000"required/>
                                                                                                </div>
                                                                                            </div>
                                                                                          
                                                                                            <div class="col-md-12" style="margin-bottom: 10px">
                                                                                                <button name="OFFEvaluateOLD" id="btnold" class="btn btn-warning"><i class="fa  fa-download"></i>  
                                                                                                Confirm Entry</button><br>
                                                                                            </div>
                                                                                        </div>
                                                                                        <br>



                                                                                    </div>


                                                                                    <div class="col-md-12" style="margin-bottom: 5px">
                                                                                       
                                                                                           <div class="col-md-12" style="background-color: #69f0ae; border-style: solid;">
                                                                                            <br>
                                                                                            <label style="font-size: 15px">
                                                                                                    For new items, please enter the following: 
                                                                                            </label><br><br>
                                                                                            <div class="col-md-4">
                                                                                               <div class="form-group">
                                                                                                    <label for="exampleInputEmail1">Stock Key Unit</label>
                                                                                                    <input style="color: black;" disabled="disabled" type="text" name="a_new_sku" class="form-control" id="newsku"  maxlength="10"required/>
                                                                                                </div>                                                        
                                                                                            </div>
                                                                                            
                                                                                             <div class="col-md-8">
                                                                                               <div class="form-group">
                                                                                                    <label for="exampleInputEmail1">Item Name</label>
                                                                                                    <input style="color: black;" type="text" name="a_new_name" class="form-control" maxlength="100" id="newitem" disabled="disabled"required/>
                                                                                                </div>                                                        
                                                                                            </div>
                                                                                             <div class="col-md-4">
                                                                                                <div class="form-group">
                                                                                                    <label>Category</label>
                                                                                                    <select name="a_new_category" id="newcategory"  class="form-control" style="color: black;" required="" disabled="disabled">
                                                                                                        <option selected disabled value=""></option>
                                                                                                          <?php  
                                                                                                              $sqlemp= "SELECT * FROM `ims_r_office_category`";
                                                                                                              $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                                                              while($row = mysqli_fetch_assoc($results))
                                                                                                               {  
                                                                                                                  $cat = $row['Category_Name'];
                                                                                                        ?>
                                                                                                        <option value="<?php echo $cat ?>"><?php echo "$cat"; ?></option>
                                                                                                         <?php
                                                                                                            }
                                                                                                        ?>
                                                                                                    </select>
                                                                                                </div>
                                                                                           </div>
                                                                                            <div class="col-md-2">
                                                                                                 <div class="form-group">
                                                                                                    <label>Unit</label>
                                                                                                    <select name="a_new_unit" class="form-control" disabled="disabled" id="newunit" style="color: black;"required>
                                                                                                       <option selected disabled value=""></option>
                                                                                                        <option value="Ream">Ream</option>
                                                                                                        <option value="Pad">Pad</option>
                                                                                                        <option value="Tube">Tube</option>
                                                                                                        <option value="Pack">Pack</option>
                                                                                                        <option value="Can">Can</option>
                                                                                                        <option value="Bottle">Bottle</option>
                                                                                                        <option value="Bundle">Bundle</option>
                                                                                                        <option value="Roll">Roll</option>
                                                                                                        <option value="Cartridge">Cartridge</option>
                                                                                                        <option value="Spool">Spool</option> 
                                                                                                        <option value="Box">Box</option>
                                                                                                        <option value="Piece">Piece</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                             </div>
                                                                                            <div class="col-md-2">
                                                                                                <div class="form-group">
                                                                                                    <label for="exampleInputEmail1">Quantity</label>
                                                                                                    <input style="color: black;" type="number" id="newquan"  name="a_new_quan"  class="form-control" disabled="disabled" maxlength="3" min="1" max="1000"required/>
                                                                                                </div>
                                                                                            </div>
                                                                                          
                                                                                             <br>
                                                                                             <div class="col-md-12" style="margin-bottom: 10px">
                                                                                                 <button  name="OFFEvaluateNEW" disabled="disabled" id="btnnew" class="btn btn-success"><i class="fa  fa-download"></i>  
                                                                                                 Confirm Entry</button> 
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    </form>
                                                                                       
                                                                                 
                                                                                        <br>
                                                                                        <div class="row">
                                                                                          <div class="col-md-12">
                                                                                            <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;"></div>
                                                                                         </div>
                                                                                        </div>
                                                                                        
                                                                                   
                                                                                     <!-- <button data-toggle="modal" href="#ContinueOLD"  id="btnold" class="btn btn-warning"><i class="fa  fa-refresh"></i>  
                                                                                      Evaluate (Existing Item)</button>&nbsp&nbsp
                                                                                      <button data-toggle="modal" href="#ContinueNEW" disabled="disabled" id="btnnew" class="btn btn-success"><i class="fa  fa-refresh"></i>  
                                                                                      Evaluate (New Item)</button> -->

                                                                                      
                                                                                    </div>
                                                                                     
                                                                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ContinueOLD" class="modal fade">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content" style="text-align: center;">
                                                                                                        <div class="modal-header">
                                                                                                            You are about to release the following item(s). Are you sure you want to proceed?
                                                                                                        </div>
                                                                                                        <img alt="" src="../../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                                                                        <div class="panel" style="height: 50%; width: 100%">
                                                                                                            <button type="submit" class="btn btn-success btn-lg" name="EvaluateOLD">   Yes   
                                                                                                            </button> &nbsp&nbsp&nbsp&nbsp
                                                                                                            <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                                                                        </div>
                                                                                                        <br>
                                                                                                    </div>
                                                                                                </div>
                                                                                        </div>
                                                                                    &nbsp&nbsp
                                                                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ContinueNEW" class="modal fade">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content" style="text-align: center;">
                                                                                                        <div class="modal-header">
                                                                                                            You are about to release the following item(s). Are you sure you want to proceed?
                                                                                                        </div>
                                                                                                        <img alt="" src="../../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                                                                        <div class="panel" style="height: 50%; width: 100%">
                                                                                                            
                                                                                                            <button type="submit" class="btn btn-success btn-lg" name="MEDEvaluateNEW">   Yes  
                                                                                                            </button> &nbsp&nbsp&nbsp&nbsp
                                                                                                            
                                                                                                            <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                                                                        </div>
                                                                                                        <br>
                                                                                                    </div>
                                                                                                </div>
                                                                                        </div>
                                                                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="acquired" class="modal fade">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content" style="text-align: center;">
                                                                                                        <label>
                                                                                                            The Item was evaluated and have been successfully acquired!
                                                                                                        </label>
                                                                                                        <img alt="" src="../../Resources/images/PUP/analysis1.png" style="height: 20%; width: 20%">
                                                                                                        <div class="panel" style="height: 50%; width: 100%">
                                                                                                            <button data-dismiss="modal" class="btn btn-success btn-lg">Ok</button>
                                                                                                        </div>
                                                                                                        <br>
                                                                                                    </div>
                                                                                                </div>
                                                                                        </div>
                                                                                    &nbsp&nbsp
                                                                                   
                                                                                        <br>
                                                                               
                                                                            </td> 
                                                                        </tr>
                                                  </table>
                                                </div>
                          </div>
                        <!--END OF MODES-->
                    </div>
                </div>
            </section>

        
            
            </div>
        </div>

      <div class="row">
            <div class="col-sm-12">
         <!-- START CONTENT -->
            <!--
             <section>
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading">
                                List of Available Items    
                            </header>
                        <form class="col s12">

                          <div class="panel-body">
                            <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th style="display: none;">No</th>
                                    <th style="width: 8%">Stock Key Unit</th>
                                    <th style="width: 15%">Name</th>
                                    <th style="width: 10%">Category</th>
                                    <th style="width: 15%">Description</th>
                                    <th style="width: 10%">Unit</th>
                                    <th style="width: 5%">Quantity</th>
                                    <th style="width: 7%">Critical level</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $view_query = mysqli_query($connection,"SELECT * FROM `ims_r_stock` WHERE DEF_Active = 1 ");
                                    while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["Item_No"];
                                            $SKU = $row["Stock_Key_Unit"];
                                            $name = $row["Item_Name"];       
                                            $category = $row["Item_Category"];  
                                            $desc = $row["Item_Desc"];
                                            $unit = $row["Unit"];  
                                            $quan = $row["Quantity"];
                                            $crit = $row["Critical_level"]; 
                                        
                                ?>      
                                         <tr class="gradeX">
                                                <td style="display: none;"><?php echo $No; ?></td>
                                                <td style="width: 8%"><?php echo $SKU; ?></td>
                                                <td style="width: 15%"><?php echo $name; ?></td>
                                                <td style="width: 10%"><?php echo $category; ?></td>
                                                <td style="width: 15%"><?php echo $desc; ?></td>
                                                <td style="width: 10%"><?php echo $unit; ?></td>
                                                <td style="width: 5%"><?php echo $quan; ?></td>
                                                <td style="width: 7%"><?php echo $crit; ?></td>
                                                
                                        </tr>  

                                        <?php 
                                          } 
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </form>

              
                        <!--end container-->
                    <!--</section>
                    </div>
                </div>
            </section> -->
            
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>

<!-- Placed js at the end of the document so the pages load faster -->



    <script src="../jquery.multifield.min.js"></script>
    <script>

        $('.form-content').multifield({
            section: '.group',
            btnAdd:'#btnAdd',
            btnRemove:'.btnRemove',
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=place]').val($(this).val());            
            });
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=reqperson]').val($(this).val());            
            });
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=asttypesss]').val($(this).val());            
            });
        });

    </script>

</body>
</html>
