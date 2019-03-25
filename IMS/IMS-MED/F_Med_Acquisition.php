
<?php
   
        $db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');


            if(isset($_POST['MEDEvaluateNEW'])) //FOR ACQUIRING NEW ITEMS FROM DIFFERENT MODES
            {

                $No = $_POST['a_No'];
                $DelDate = $_POST['a_date'];
                $mode = $_POST['a_mode'];
                $supplier = $_POST['a_supplier'];
                $name = $_POST['a_new_name'];
                $quan = $_POST['a_new_quan'];
                $cat = $_POST['a_new_category'];
                $sku = $_POST['a_new_sku'];
                $unit = $_POST['a_new_unit'];
                $expdate = $_POST['a_new_expdate'];



                // echo $name;
                // echo $quan;
                // echo $cat;
                // echo $sku;
                // echo $unit;
                // echo $expdate;
              
               
                $insert = "INSERT INTO ims_r_medicinal_stock(Med_Code, Med_Name, Med_Category, Unit, Quantity, Med_Expired)     
                             VALUES ('$sku', '$name', '$cat', '$unit', '$quan', '$expdate')";
                
                mysqli_query($db,$insert);


                $acqins = "INSERT INTO ims_t_acquisition_med(Date_Procured, Mode_Acquisition, Medicine_Name, Quantity, Supplier)     
                             VALUES ('$DelDate','$mode', '$name', '$quan', '$supplier')";
                   
                mysqli_query($db,$acqins);

                echo "<script type=\"text/javascript\">".
                        "alert
                        ('You have successfully added the item to the inventory!');".
                        "</script>";
                echo "<script>setTimeout(\"location.href = 'MEDEntry.php';\",0);</script>";
            }


            else if(isset($_POST['MEDEvaluateOLD'])) //FOR ACQUIRING EXISTING ITEMS FROM DIFFERENT MODES
            {


                $No = $_POST['a_No'];
                $DelDate = $_POST['a_date'];
                $mode = $_POST['a_mode'];
                $supplier = $_POST['a_supplier'];
                $name = $_POST['a_name'];
                $quan = $_POST['a_quan'];
                $expdate = $_POST['a_expdate'];

                $limiter = $_POST['a_name'];
                $sql = "SELECT DISTINCT Med_Code, Med_Name, Med_Category, Unit FROM `ims_r_medicinal_stock` WHERE Med_Name = '$limiter'";
                $results = mysqli_query($db, $sql) or die("Bad Query: $sql"); 
                while($row = mysqli_fetch_assoc($results))
                          {  
                               $sku = $row['Med_Code'];
                               $name = $row['Med_Name'];
                               $cat = $row['Med_Category']; 
                               $unit = $row['Unit'];

                                $insert = "INSERT INTO ims_r_medicinal_stock(Med_Code, Med_Name, Med_Category, Unit, Quantity,Med_Expired)     
                                                 VALUES ('$sku','$name', '$cat', '$unit', '$quan', '$expdate')";
                                  
                                mysqli_query($db,$insert);
                                

                                $acqins = "INSERT INTO ims_t_acquisition_med(Date_Procured, Mode_Acquisition, Medicine_Name, Quantity, Supplier)     
                                               VALUES ('$DelDate','$mode', '$name', '$quan', '$supplier')";

                                mysqli_query($db,$acqins);
                                
                                   

                          }
                                   echo "<script type=\"text/javascript\">".
                                            "alert
                                            ('You have successfully added the item to the inventory!');".
                                           "</script>";
                                   echo "<script>setTimeout(\"location.href = 'MEDEntry.php';\",0);</script>";                                     
              
               
            }

            
            else if(isset($_POST['MEDDevAcquireOLD'])) //FOR ACQUIRING PUP MAIN DELIVERY FROM REQUEST (OLD ITEM)
            {

                $batch = $_POST['a_batch'];
                $No = $_POST['a_No'];
                $DelDate = $_POST['a_procdate'];
                $name = $_POST['a_name'];
                $quan = $_POST['a_quan'];
                $cat = $_POST['a_category'];
                $sku = $_POST['a_old_sku'];
                $expdate = $_POST['a_expdate'];
              // $desc = $_POST['a_description'];
              //  $rem = $_POST['a_remarks']; 
                $limiter = $_POST['a_old_sku'];
                $sql = "SELECT DISTINCT Med_Code, Unit FROM `ims_r_medicinal_stock` WHERE Med_Code = '$limiter'";
                $results = mysqli_query($db, $sql) or die("Bad Query: $sql"); 
                while($row = mysqli_fetch_assoc($results))
                          {  
                              
                                $unit = $row['Unit'];

                                $statupdate = mysqli_query($db,"UPDATE ims_t_med_requisition SET Status = 'ACQUIRED' WHERE Requisition_No = '$No' "); 
                                mysqli_query($db,$statupdate);
                                
                                $insert = "INSERT INTO ims_r_medicinal_stock(Med_Code, Med_Name, Med_Category, Unit, Quantity,Med_Expired)     
                                            VALUES ('$sku','$name', '$cat', '$unit', '$quan', '$expdate')";
                                mysqli_query($db,$insert);
                                header("location: MEDAcquire.php");


                                $acqins = "INSERT INTO ims_t_acquisition_med(Date_Procured, Mode_Acquisition, Medicine_Name, Quantity, Supplier, Request_Batch_No)     
                                         VALUES ('$DelDate','DeliveryFromRequest', '$name', '$quan', 'PUP MAIN', '$batch')";
                                mysqli_query($db,$acqins);

                          }
                

                  $sql = "SELECT * FROM `ims_t_med_summary_request` AS SUMREQ  
                            INNER JOIN `ims_t_med_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                 WHERE SUMREQ.Status_Req = 'RELEASED' AND REQ.Batch_No = $batch";

                            $result = mysqli_query($db,$sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                                {
                                      $status = $row['Status'];
                                      if($status == "PENDING")
                                      {
                                        header("location: MEDReviewAcquire.php?viewrequests=$batch");
                                      }
                                      else if($status == "ACQUIRED")
                                      {
                                        header("location:MEDAcquire.php");
                                      }
                                }
            }







            else if(isset($_POST['MEDDevAcquireNEW'])) //FOR ACQUIRING PUP MAIN DELIVERY FROM REQUEST (NEW ITEM)
            {

                $batch = $_POST['a_batch'];
                $No = $_POST['a_No'];
                $DelDate = $_POST['a_procdate'];
                $name = $_POST['a_name'];
                $quan = $_POST['a_quan'];
                $cat = $_POST['a_category'];
                $sku = $_POST['a_new_sku'];
                $unit = $_POST['a_new_unit'];
                $expdate = $_POST['a_expdate'];
               // $desc = $_POST['a_description'];
               // $rem = $_POST['a_remarks']; 

              
                    $statupdate = mysqli_query($db,"UPDATE ims_t_med_requisition SET Status = 'ACQUIRED' WHERE Requisition_No = '$No' "); 
                                mysqli_query($db,$statupdate);
                                
                    $insert = "INSERT INTO ims_r_medicinal_stock(Med_Code, Med_Name, Med_Category, Unit, Quantity,Med_Expired)     
                                  VALUES ('$sku','$name', '$cat', '$unit', '$quan', '$expdate')";
                    mysqli_query($db,$insert);


                    $acqins = "INSERT INTO ims_t_acquisition_med(Date_Procured, Mode_Acquisition, Medicine_Name, Quantity, Supplier, Request_Batch_No)     
                                   VALUES ('$DelDate','DeliveryFromRequest', '$name', '$quan', 'PUP MAIN', '$batch')";
                    mysqli_query($db,$acqins);


              
                      $sql = "SELECT * FROM `ims_t_med_summary_request` AS SUMREQ  
                            INNER JOIN `ims_t_med_requisition` AS REQ ON REQ.Batch_No = SUMREQ.Batch_No
                                 WHERE SUMREQ.Status_Req = 'RELEASED' AND REQ.Batch_No = $batch";

                            $result = mysqli_query($db,$sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                                {
                                      $status = $row['Status'];
                                      if($status == "PENDING")
                                      {
                                        header("location: MEDReviewAcquire.php?viewrequests=$batch");
                                      }
                                      else if($status == "ACQUIRED")
                                      {
                                        header("location:MEDAcquire.php");
                                      }
                                }

            }



?>


