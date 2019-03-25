<?php
    
    include('../../db.php');

        $No = $_POST['ReqNo'];
        $sku = $_POST['SKU'];
        $Batch = $_POST['r_batch'];
        $name = $_POST['r_name'];
        $unit = $_POST['r_unit'];
        $quan = $_POST['r_quan'];
        $stat = $_POST['r_status'];
        $rmrks = $_POST['r_rmrks'];
        $reason = $_POST['r_reject'];
        $deldate = $_POST['DeliveryDate'];
        $delverd = $_POST['DeliveredDate'];
        $rejdate = $_POST['RejectDate'];


    


    ////  MEDICAL OFFICE AND HEALTH OFFICE REQUESTS
    if(isset($_POST['CLI_Cont']))
    {
       
       if($_POST['r_status']=="APPROVED") 
        {
            $query = mysqli_query($connection,"UPDATE ims_t_clinic_summary_request SET Date_Approved = CURRENT_TIMESTAMP, Status_Req = 'APPROVED'  
                                  WHERE Batch_No = '$Batch' "); 
        
        header('location: DMAprReq.php#delivered');
        
        }
        else if($_POST['r_status']=="REVISE") 
        {
            $query = mysqli_query($connection,"UPDATE ims_t_clinic_summary_request SET Date_Revised = CURRENT_TIMESTAMP, Status_Req = 'REVISE', Remarks = '$rmrks'  
                                  WHERE Batch_No = '$Batch' "); 
        header('location: DMRevReq.php#delivered');
        }
    

    }
    else if(isset($_POST['CLIBatchSave']))
    {
        
        $query = mysqli_query($connection,"UPDATE ims_t_clinic_summary_request SET Date_Revised = CURRENT_TIMESTAMP,  Remarks = '$rmrks'  WHERE Batch_No = '$Batch' "); 

        header('location:DMPenReq.php');
    }
    else if(isset($_POST['CLIBatchRevSave']))
    {
        
        $query = mysqli_query($connection,"UPDATE ims_t_clinic_summary_request SET Date_Revised = CURRENT_TIMESTAMP,  Remarks = '$rmrks'  WHERE Batch_No = '$Batch' "); 

        header('location:DMRevReq.php');
    }
    else if(isset($_POST['CLIsave']))
    {
       
        $query = mysqli_query($connection,"UPDATE ims_t_clinic_requisition SET CLI_Name = '$name', CLI_Unit = '$unit', CLI_Quantity = '$quan'
                                    WHERE Requisition_No = '$No' and Batch_No = '$Batch' ");
         
        header("location:DM_CLIReviewRev.php?viewrequests=$Batch");
    }
    else if (isset($_GET['viewrequests'])) 
    {  


            $ids = $_GET['viewrequests'];
            $query = mysqli_query($connection,"UPDATE ims_t_clinic_summary_request SET  Date_Released = CURRENT_TIMESTAMP, Status_Req = 'RELEASED', Acquired_Status = 'PENDING', Remarks = '$rmrks' WHERE Batch_No = '$ids' "); 

            header("location:DM_CLIReviewRels.php?viewrequests=$ids");
    }

   







        

?>


