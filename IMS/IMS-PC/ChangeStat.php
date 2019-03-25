<?php
    
    include('../../db.php');
  


    ////////  Property Custodian Requisition ///////
   if(isset($_POST['PCPENsave']))
    {   
        $No = $_POST['ReqNo'];
        $quan = $_POST['r_quan'];
        $Batch = $_POST['r_batch'];
        
        $query = mysqli_query($connection,"UPDATE ims_t_requisition SET OFF_Quantity = '$quan'
                                    WHERE Requisition_No = '$No' and Batch_No = '$Batch' ");
         
        $query2 = mysqli_query($connection,"UPDATE ims_t_summary_request SET Date_Revised = CURRENT_TIMESTAMP, WHERE Batch_No = '$Batch' "); 

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully changed the details!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = 'PCReviewReq.php?viewrequests=$Batch';\",0);</script>";
    }

    else if(isset($_POST['PCBatchSave']))
    {
        
        $Batch = $_POST['r_batch'];
        $rmrks = $_POST['r_rmrks'];
        $query = mysqli_query($connection,"UPDATE ims_t_summary_request SET Date_Revised = CURRENT_TIMESTAMP,  Remarks = '$rmrks'  WHERE Batch_No = '$Batch' "); 
        
         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully revised your request!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = 'PCPenReq.php';\",0);</script>";
    }


    else if(isset($_POST['PCsave']))
    {
       
        $No = $_POST['ReqNo'];
        $quan = $_POST['r_quan'];
        $Batch = $_POST['r_batch'];
        
        $query = mysqli_query($connection,"UPDATE ims_t_requisition SET OFF_Quantity = '$quan'
                                    WHERE Requisition_No = '$No' and Batch_No = '$Batch' ");

        $query2 = mysqli_query($connection,"UPDATE ims_t_summary_request SET Date_Revised = CURRENT_TIMESTAMP, WHERE Batch_No = '$Batch' "); 

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully changed the details!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = 'PCReviewRev.php?viewrequests=$Batch';\",0);</script>";
         
       
    }


    else if(isset($_POST['Resend']))
    {
       
        $Batch = $_POST['r_batch'];
        $rmrks = $_POST['r_rmrks'];


        $query = mysqli_query($connection,"UPDATE ims_t_summary_request SET Date_Revised = CURRENT_TIMESTAMP, Status_Req = 'PENDING', Remarks = '$rmrks' 
         WHERE Batch_No = '$Batch' "); 

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully re-sent your request for approval!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = 'PCPenReq.php';\",0);</script>";
    }



    ////////////  PROPERTY CUSTODIAN DEPARTMENTAL REQUEST APPROVAL  ///////////////

    else if(isset($_POST['PCISScont']))
    {
        $Batch = $_POST['r_batch'];
        $query = mysqli_query($connection,"UPDATE ims_t_dept_summary_request SET Date_Approved = CURRENT_TIMESTAMP, Status_Req = 'APPROVED'  
                                  WHERE Batch_No = '$Batch' "); 
        
         echo "<script type=\"text/javascript\">".
                  "alert
                  ('By approving this request, you will be redirected to the releasing section.');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = 'PCIssReviewApr.php?viewrequests=$Batch';\",0);</script>";
      
    }

    // else if(isset($_POST['PCISSsave']))
    // {
    //     $Batch = $_POST['r_batch'];
    //     $query = mysqli_query($connection,"UPDATE ims_t_dept_summary_request SET Date_Revised = CURRENT_TIMESTAMP, Status_Req = 'REVISE', Remarks = '$rmrks'  
    //                               WHERE Batch_No = '$Batch' "); 
    //     header('location: PCIssuance.php');
    // }
    
    else if(isset($_POST['PCISSrelease']))
    {    
        $No = $_POST['ReqNo'];
        $dreq = $_POST['Drequest'];
        $dapr = $_POST['DApprove'];
        $diss = $_POST['DIssued'];
        $sku = $_POST['SKU'];
        $name = $_POST['r_name'];
        $quan = $_POST['r_quan'];
        $accname = $_POST['AccName'];
        $office = $_POST['Office'];
        $Batch = $_POST['r_batch'];

     
        
        $insert ="INSERT INTO ims_t_dept_issuance(Date_Requested, Date_Approved, Date_Issued, SKU, Item_Name, Quantity, Account_Issued, Office_Request, Batch_No) VALUES ('$dreq', '$dapr', '$diss', '$sku', '$name', '$quan', '$accname', '$office', '$Batch')";
             mysqli_query($connection,$insert);

        $statupdateret = mysqli_query($connection,"UPDATE ims_t_dept_requisition SET Status = 'RELEASED' WHERE DeptReq_No = '$No' "); 
        
        $update = mysqli_query($connection,"UPDATE ims_r_office_stock SET Quantity = (Quantity-$quan) WHERE Stock_Key_Unit = '$sku' "); 
        
        $query = mysqli_query($connection,"UPDATE ims_t_dept_summary_request SET Date_Released = CURRENT_TIMESTAMP, Status_Req = 'RELEASED'  WHERE Batch_No = '$Batch' ");

        header("location: PCISSReviewApr.php?viewrequests=$Batch");

                 // $sql = "SELECT * FROM  `ims_t_dept_requisition` WHERE Batch_No = $Batch ";

                 //            $result = mysqli_query($connection,$sql) or die("Bad Query: $sql");
                 //            while($row = mysqli_fetch_assoc($result))
                 //                {
                 //                      $status = $row['Status'];
                                       
                 //                      if($status == "PENDING")
                 //                      {
                 //                         header("location: PCISSReviewApr.php?viewrequests=$Batch");
                 //                      }
                 //                      else if($status == "RELEASED")
                 //                      {
                 //                         echo "<script type=\"text/javascript\">".
                 //                                  "alert
                 //                                  ('This request is considered released/issued.');".
                 //                                 "</script>";
                 //                         echo "<script>setTimeout(\"location.href = 'PCIssuance.php';\",0);</script>";
                 //                      }
                                     
                 //                }


         
        

        
    }


    ///////// END OF PROPERTY CUSTODIAN DEPARTMENTAL REQUEST APPROVAL  ///////////////  



?>


