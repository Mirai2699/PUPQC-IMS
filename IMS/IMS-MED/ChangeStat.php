<?php
    
    include('../../db.php');

        
        
    ////////  MEDICINE Requisition ///////
   if(isset($_POST['MEDPENsave']))
    {
        $No = $_POST['ReqNo'];
        $Batch = $_POST['r_batch'];
        $quan = $_POST['r_quan'];

        $query = mysqli_query($connection,"UPDATE ims_t_med_requisition SET MED_Quantity = '$quan'
                                    WHERE Requisition_No = '$No' and Batch_No = '$Batch' ");
         
         echo "<script type=\"text/javascript\">".
             "alert
             ('You have successfully changed the quantity!');".
              "</script>";
         echo "<script>setTimeout(\"location.href = 'MEDReviewPen.php?viewrequests=$Batch'\",0);</script>";
    }

    else if(isset($_POST['MEDBatchSave']))
    {
        $Batch = $_POST['r_batch'];

        $query = mysqli_query($connection,"UPDATE ims_t_med_summary_request SET Date_Revised = CURRENT_TIMESTAMP WHERE Batch_No = '$Batch' "); 

        
        echo "<script type=\"text/javascript\">".
             "alert
             ('You have successfully save the details!');".
              "</script>";
        echo "<script>setTimeout(\"location.href = 'MEDPenReq.php'\",0);</script>";
    }

    else if(isset($_POST['MEDsave']))
    {
        $No = $_POST['ReqNo'];
        $Batch = $_POST['r_batch'];
        $quan = $_POST['r_quan'];

        $query = mysqli_query($connection,"UPDATE ims_t_med_requisition SET MED_Quantity = '$quan'
                                    WHERE Requisition_No = '$No' and Batch_No = '$Batch' ");
         
       echo "<script type=\"text/javascript\">".
             "alert
             ('You have successfully changed the quantity!');".
              "</script>";
       echo "<script>setTimeout(\"location.href = 'MEDReviewRev.php?viewrequests=$Batch'\",0);</script>";
    }

    else if(isset($_POST['MEDResend']))
    {
       
        $Batch = $_POST['r_batch'];
        $rmrks = $_POST['r_rmrks'];

        $query = mysqli_query($connection,"UPDATE ims_t_med_summary_request SET Date_Revised = CURRENT_TIMESTAMP, Status_Req = 'PENDING', Remarks = '$rmrks' 
         WHERE Batch_No = '$Batch' "); 

        echo "<script type=\"text/javascript\">".
             "alert
             ('You have successfully re-sent the request!');".
              "</script>";
       echo "<script>setTimeout(\"location.href = 'MEDPenReq.php'\",0);</script>";
    }


    ////////  MEDICINE ACQUISITION FUNCTIONS ///////
    else if(isset($_POST['MEDDelivered']))
    {
        $delverd = $_POST['DeliveredDate'];
        $Batch = $_POST['r_batch'];

        $query = mysqli_query($connection,"UPDATE ims_t_med_summary_request SET Date_Procured = '$delverd', Acquired_Status = 'ACQUIRED' 
                                  WHERE Batch_No = '$Batch' "); 

        header("location: MEDReviewAcquire.php?viewrequests=$Batch");
    }









   /////////////////  CLINICAL SUPPLIES Requisition ///////
    else if(isset($_POST['CLIPENsave']))
    {
        $No = $_POST['ReqNo'];
        $Batch = $_POST['r_batch'];
        $quan = $_POST['r_quan'];
        
        $query = mysqli_query($connection,"UPDATE ims_t_clinic_requisition SET CLI_Quantity = '$quan'
                                    WHERE Requisition_No = '$No' and Batch_No = '$Batch' ");
         
         echo "<script type=\"text/javascript\">".
             "alert
             ('You have successfully changed the quantity!');".
              "</script>";
         echo "<script>setTimeout(\"location.href = 'CLIReviewPen.php?viewrequests=$Batch'\",0);</script>";
        
    }
    else if(isset($_POST['CLIBatchSave']))
    {
        $Batch = $_POST['r_batch'];

        $query = mysqli_query($connection,"UPDATE ims_t_clinic_summary_request SET Date_Revised = CURRENT_TIMESTAMP WHERE Batch_No = '$Batch' "); 

        echo "<script type=\"text/javascript\">".
             "alert
             ('You have successfully save the details!');".
              "</script>";
        echo "<script>setTimeout(\"location.href = 'CLIPenReq.php'\",0);</script>";
       
    }
    else if(isset($_POST['CLIsave']))
    {
        $No = $_POST['ReqNo'];
        $Batch = $_POST['r_batch'];
        $quan = $_POST['r_quan'];

        $query = mysqli_query($connection,"UPDATE ims_t_clinic_requisition SET CLI_Quantity = '$quan'
                                    WHERE Requisition_No = '$No' and Batch_No = '$Batch' ");
        
        echo "<script type=\"text/javascript\">".
             "alert
             ('You have successfully changed the quantity!');".
              "</script>";
        echo "<script>setTimeout(\"location.href = 'CLIReviewRev.php?viewrequests=$Batch'\",0);</script>";
        
    }
    else if(isset($_POST['CLIResend']))
    {
       
        $Batch = $_POST['r_batch'];
        $rmrks = $_POST['r_rmrks'];

        $query = mysqli_query($connection,"UPDATE ims_t_clinic_summary_request SET Date_Revised = CURRENT_TIMESTAMP, Status_Req = 'PENDING', Remarks = '$rmrks' 
         WHERE Batch_No = '$Batch' "); 

        echo "<script type=\"text/javascript\">".
             "alert
             ('You have successfully re-sent the request!');".
              "</script>";
        echo "<script>setTimeout(\"location.href = 'CLIPenReq.php'\",0);</script>";
       
    }


    ////////  MEDICINE ACQUISITION FUNCTIONS ///////
    else if(isset($_POST['CLIDelivered']))
    {
        $delverd = $_POST['DeliveredDate'];
        $Batch = $_POST['r_batch'];

        $query = mysqli_query($connection,"UPDATE ims_t_clinic_summary_request SET Date_Procured = '$delverd', Acquired_Status = 'ACQUIRED' 
                                  WHERE Batch_No = '$Batch' "); 
        
        header("location: CLIReviewAcquire.php?viewrequests=$Batch");
    }


?>


