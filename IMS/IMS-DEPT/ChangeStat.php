<?php
    
    include('../../db.php');

        $No = $_POST['ReqNo'];
        $sku = $_POST['SKU'];
        $Batch = $_POST['r_batch'];
        // $name = $_POST['r_name'];
        // $unit = $_POST['r_unit'];
        $quan = $_POST['r_quan'];
        // $stat = $_POST['r_status'];
        // $rmrks = $_POST['r_rmrks'];
        // $reason = $_POST['r_reject'];
        // $deldate = $_POST['DeliveryDate'];
        // $delverd = $_POST['DeliveredDate'];
        // $rejdate = $_POST['RejectDate'];

        // $retrmks = $_POST['r_retrmks'];
        // $defect = $_POST['r_defect'];
        

    



    ////////  Departmental Requisition ///////
    if(isset($_POST['DPPENsave']))
    {
        
        $query1 = mysqli_query($connection,"UPDATE ims_t_dept_requisition SET Item_SKU = '$sku', DR_Quantity = '$quan'
                                    WHERE DeptReq_No = '$No' and Batch_No = '$Batch' ");
         
         $query2 = mysqli_query($connection,"UPDATE ims_t_dept_summary_request SET Date_Revised = CURRENT_TIMESTAMP  WHERE Batch_No = '$Batch' "); 

        // header("location:DPReviewPen.php?viewrequests=$Batch");
          echo "<script type=\"text/javascript\">".
                  "alert
                 ('You have successfully revised your request!');".
                  "</script>";
          echo "<script>setTimeout(\"location.href = 'DPReviewPen.php?viewrequests=$Batch';\",0);</script>";
    }
    // else if(isset($_POST['DPPenBatchSave']))
    // {
        
    //     $query = mysqli_query($connection,"UPDATE ims_t_dept_summary_request SET Date_Revised = CURRENT_TIMESTAMP,  Remarks = '$rmrks'  WHERE Batch_No = '$Batch' "); 

    //     header('location:DPPenReq.php');
    // }
    /*
    else if(isset($_POST['DPRevsave']))
    {
       
        $query = mysqli_query($connection,"UPDATE ims_t_dept_requisition SET Item_SKU = '$sku', DR_Quantity = '$quan'
                                    WHERE DeptReq_No = '$No' and Batch_No = '$Batch' ");
         
        header("location:DPReviewRev.php?viewrequests=$Batch");
    }
    else if(isset($_POST["DPRevBatchSave"]))
    {
       
        
        $query = mysqli_query($connection,"UPDATE ims_t_dept_summary_request SET Date_Revised = CURRENT_TIMESTAMP, Status_Req = 'PENDING', Remarks = '$rmrks' 
         WHERE Batch_No = '$Batch' "); 

        header('location:DPPenReq.php');
    }
    */

 
        

?>


