<?php

  

    if (isset($_GET['viewrequests'])) 
    {
        $ids = $_GET['viewrequests'];
    } 
?>


    <title>Print Request | PUPQCIMS</title>

   

<body>

<section id="container" class="print" >

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body invoice">
                        
                        <div class="row invoice-to">
                            <div class="col-md-4 col-sm-4 text-center">
                                <img alt="" src="../../Resources/images/PUP/pupqclogo.png" style="height:50px;width: 50px">
                                <h2>Polytechnic University of the Philippines<br>Quezon City</h2>
                                <h3>Property and  Supplies Office</h3><br>
                                <p>
                                   Don Fabian St. Commonwealth, <br>
                                    Quezon City <br>
                                    NCR, Philippines<br>
                                    Phone: +639153257869 <br>
                                    Email : pup.edu.ph
                                </p>
                                <h2>Requisition Form</h2>
                                
                            </div>
                            <br>
                            <br>
                            
                            <div class="col-md-4 col-sm-5 pull-left">
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">Batch Request #:</div>
                                    <div class="col-md-8 col-sm-7"><?php echo $ids ?></div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-5 pull-left">
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">Date Released:</div>
                                    <div class="col-md-8 col-sm-7"><?php echo date('Y-m-d') ?></div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-invoice" >
                            <thead>
                                <tr>
                                     <tr>
                                        <th style="display: none;">No</th>
                                        <th>Item Name</th>
                                        <th style="width:250px">Category</th> 
                                        <th style="width:150px">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                            <?php  
                                                    $sql = "SELECT * FROM `ims_t_summary_request` AS SUMREQ  
                                                            INNER JOIN `ims_t_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                                                 WHERE SUMREQ.Status_Req = 'RELEASE' AND REQ.Batch_No = '$ids'";

                                                    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                      $No = $row['Requisition_No'];
                                                      $name = $row['Item_Name'];
                                                      $cat = $row['Item_Category'];    
                                                      $quantity = $row['Quantity'];

                                                ?>

                                                <tr class="gradeX">
                                                    <td style="display: none"> <?php echo $No; ?> </td>
                                                    <td> <?php echo $name; ?> </td>
                                                    <td> <?php echo $cat; ?> </td>
                                                    <td> <?php echo $quantity; ?> </td>
                                                </tr>

                                            
                                                    <?php
                                                 }
                                            ?>             
                            </tbody>
                        </table>
                        
                        
                        <hr>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-xs-7 payment-method">
                                <h4 class="inv-label ">Requested By:</h4>
                                <br><br>
                                <h3 class="inv-label ">Edgardo S. Delmo</h3>
                                <h3 class="inv-label "> Property Custodian</h3>
                                <br><br>
                            </div><br><br>
                            <div class="col-md-8 col-xs-7 payment-method">
                                <h4 class="inv-label ">Approved By:</h4>
                                <br><br>
                                <h3 class="inv-label ">Firmo Esguerra</h3>
                                <h3 class="inv-label ">University Campus Director</h3>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->

</section>


<script type="text/javascript">
    window.print();
</script>

</body>
</html>
