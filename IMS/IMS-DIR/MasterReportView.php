<?php
       include("../../db.php");

        ////// REQUISITION REPORT FILTERATION
        if(isset($_POST['FilterOFFRequisition']))
        {
                       
                $Batch = $_POST['batchno'];

                        if($_POST['filterstat']=="ALL")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_requisition` AS REQ WHERE  
                                        REQ.Batch_No = SUMREQ.Batch_No ");
                                    
                                while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["OFF_Name"];
                                                $quan = $row["OFF_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="ALLWB")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_requisition` AS REQ WHERE  
                                       SUMREQ.Batch_No = '$Batch' AND REQ.Batch_No = SUMREQ.Batch_No ");
                                    
                                  while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["OFF_Name"];
                                                $quan = $row["OFF_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                       
                        else if($_POST['filterstat']=="PENDING")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_requisition` AS REQ WHERE SUMREQ.Status_Req = 'PENDING' 
                                       AND REQ.Batch_No = SUMREQ.Batch_No");
                                    
                                  while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["OFF_Name"];
                                                $quan = $row["OFF_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="REVISE")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_requisition` AS REQ WHERE SUMREQ.Status_Req = 'REVISE' 
                                       AND REQ.Batch_No = SUMREQ.Batch_No");
                                    
                                 while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["OFF_Name"];
                                                $quan = $row["OFF_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="APPROVED")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_requisition` AS REQ WHERE SUMREQ.Status_Req = 'APPROVED' 
                                       AND REQ.Batch_No = SUMREQ.Batch_No");
                                    
                                  while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["OFF_Name"];
                                                $quan = $row["OFF_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="RELEASE")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_requisition` AS REQ WHERE SUMREQ.Status_Req = 'RELEASE' 
                                       AND REQ.Batch_No = SUMREQ.Batch_No  ");
                                    
                                 while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["OFF_Name"];
                                                $quan = $row["OFF_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="DATE")
                        {
	                        $start = $_POST['StartDate'];
	                        $end = $_POST['EndDate'];
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_requisition` AS REQ WHERE  
                                        REQ.Batch_No = SUMREQ.Batch_No AND Date_Requested Between '$start' AND '$end' ");
                                    
                                while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["OFF_Name"];
                                                $quan = $row["OFF_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        
                          
        }
         ////// Medical REQUISITION REPORT FILTERATION
        if(isset($_POST['FilterMEDRequisition']))
        {
                       
                $Batch = $_POST['batchno'];

                        if($_POST['filterstat']=="ALL")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_med_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_med_requisition` AS REQ WHERE  
                                        REQ.Batch_No = SUMREQ.Batch_No ");
                                    
                                while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["Item_Name"];
                                                $quan = $row["MED_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="ALLWB")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_med_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_med_requisition` AS REQ WHERE  
                                       SUMREQ.Batch_No = '$Batch' AND REQ.Batch_No = SUMREQ.Batch_No ");
                                    
                                 while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["Item_Name"];
                                                $quan = $row["MED_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                       
                        else if($_POST['filterstat']=="PENDING")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_med_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_med_requisition` AS REQ WHERE  SUMREQ.Status_Req = 'PENDING' 
                                       AND REQ.Batch_No = SUMREQ.Batch_No");
                                    
                                 while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["Item_Name"];
                                                $quan = $row["MED_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="REVISE")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_med_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_med_requisition` AS REQ WHERE  SUMREQ.Status_Req = 'REVISE' 
                                       AND REQ.Batch_No = SUMREQ.Batch_No");
                                    
                                 while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["Item_Name"];
                                                $quan = $row["MED_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="APPROVED")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_med_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_med_requisition` AS REQ WHERE  SUMREQ.Status_Req = 'APPROVED' 
                                       AND REQ.Batch_No = SUMREQ.Batch_No");
                                    
                                  while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["Item_Name"];
                                                $quan = $row["MED_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="RELEASE")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_med_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_med_requisition` AS REQ WHERE   SUMREQ.Status_Req = 'RELEASED' 
                                       AND REQ.Batch_No = SUMREQ.Batch_No  ");
                                    
                                  while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["Item_Name"];
                                                $quan = $row["MED_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="DATE")
                        {
	                        $start = $_POST['StartDate'];
	                        $end = $_POST['EndDate'];
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_med_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_med_requisition` AS REQ WHERE  
                                        REQ.Batch_No = SUMREQ.Batch_No AND Date_Requested Between '$start' AND '$end' ");
                                    
                                 while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["Item_Name"];
                                                $quan = $row["MED_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        
                          
        }

         ////// CLINICAL REQUISITION REPORT FILTERATION
        if(isset($_POST['FilterCLIRequisition']))
        {
                       
                $Batch = $_POST['batchno'];

                        if($_POST['filterstat']=="ALL")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_clinic_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_clinic_requisition` AS REQ WHERE  
                                        REQ.Batch_No = SUMREQ.Batch_No ");
                                    
                                while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["CLI_Name"];
                                                $quan = $row["CLI_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="ALLWB")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_clinic_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_clinic_requisition` AS REQ WHERE  
                                       SUMREQ.Batch_No = '$Batch' AND REQ.Batch_No = SUMREQ.Batch_No ");
                                    
                                 while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["CLI_Name"];
                                                $quan = $row["CLI_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                       
                        else if($_POST['filterstat']=="PENDING")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_clinic_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_clinic_requisition` AS REQ WHERE SUMREQ.Status_Req = 'PENDING' 
                                       AND REQ.Batch_No = SUMREQ.Batch_No");
                                    
                                 while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["CLI_Name"];
                                                $quan = $row["CLI_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="REVISE")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_clinic_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_clinic_requisition` AS REQ WHERE SUMREQ.Status_Req = 'REVISE' 
                                       AND REQ.Batch_No = SUMREQ.Batch_No");
                                    
                                  while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["CLI_Name"];
                                                $quan = $row["CLI_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="APPROVED")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_clinic_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_clinic_requisition` AS REQ WHERE SUMREQ.Status_Req = 'APPROVED' 
                                       AND REQ.Batch_No = SUMREQ.Batch_No");
                                    
                                  while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["CLI_Name"];
                                                $quan = $row["CLI_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="RELEASE")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_clinic_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_clinic_requisition` AS REQ WHERE SUMREQ.Status_Req = 'RELEASED' 
                                       AND REQ.Batch_No = SUMREQ.Batch_No  ");
                                    
                                 while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["CLI_Name"];
                                                $quan = $row["CLI_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="DATE")
                        {
	                        $start = $_POST['StartDate'];
	                        $end = $_POST['EndDate'];
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_clinic_summary_request` AS SUMREQ 
                                       INNER JOIN  `ims_t_clinic_requisition` AS REQ WHERE
                                        REQ.Batch_No = SUMREQ.Batch_No AND Date_Requested Between '$start' AND '$end' ");
                                    
                                 while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Requested"];
                                                $stat = $row["Status_Req"];
                                                $bn = $row["Batch_No"]; 
                                                $name = $row["CLI_Name"];
                                                $quan = $row["CLI_Quantity"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td>                                                           
                                                    <td>  ".$stat." </td>
                                                    <td>  ".$bn."   </td>
                                                    <td>  ".$name." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        
                          
        }


       //////  OFFICE SUPPLY ACQUISITION REPORT FILTERATION
        if(isset($_POST['FilterAcquisition']))
        {
                        
                $mode = $_POST['MOA'];
                //$sply = $_POST['Supplier'];

                        if($_POST['filterstat']=="ALL")
                        {
                        
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition`");
                                    
                                while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="MOA")
                        {

                            if($mode == "ALL")
                            {
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition`");
                                        
                                    while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($mode == "PURCHASE")
                            {
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition`
                                                            WHERE Mode_Acquisition = 'Purchased' ");
                                        
                                   while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($mode == "DONATED")
                            {
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition`
                                                            WHERE Mode_Acquisition = 'Donated' ");
                                        
                                    while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($mode == "DELIVERED")
                            {
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition`
                                                            WHERE Mode_Acquisition = 'DeliveryFromRequest' ");
                                        
                                    while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                                
                        }
                        else if($_POST['filterstat']=="SUPPLY")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition` 
                                                WHERE Supplier LIKE %'$sply'% ");
                                    
                               while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                       
                       
                        
                          
        }
          //////  MEDICINAL ACQUISITION REPORT FILTERATION
        if(isset($_POST['FilterMEDAcquisition']))
        {
                        
                $mode = $_POST['MOA'];
                //$sply = $_POST['Supplier'];

                        if($_POST['filterstat']=="ALL")
                        {
                        
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_med`");
                                    
                                while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="MOA")
                        {

                            if($mode == "ALL")
                            {
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_med`");
                                        
                                    while($row = mysqli_fetch_array($query1))
                                {
                                               $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($mode == "PURCHASE")
                            {
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_med`
                                                            WHERE Mode_Acquisition = 'Purchased' ");
                                        
                                   while($row = mysqli_fetch_array($query1))
                                {
                                             $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($mode == "DONATED")
                            {
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_med`
                                                            WHERE Mode_Acquisition = 'Donated' ");
                                        
                                    while($row = mysqli_fetch_array($query1))
                                {
                                               $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($mode == "DELIVERED")
                            {
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_med`
                                                            WHERE Mode_Acquisition = 'DeliveryFromRequest' ");
                                        
                                    while($row = mysqli_fetch_array($query1))
                                {
                                              $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                                
                        }
                        else if($_POST['filterstat']=="SUPPLY")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_med` 
                                                WHERE Supplier LIKE %'$sply'% ");
                                    
                               while($row = mysqli_fetch_array($query1))
                                {
                                               $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                       
                        
                          
        }

         ////// CLINICAL ACQUISITION REPORT FILTERATION
        if(isset($_POST['FilterCLIAcquisition']))
        {
                        
                $mode = $_POST['MOA'];
                //$sply = $_POST['Supplier'];

                        if($_POST['filterstat']=="ALL")
                        {
                        
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_clinic`");
                                    
                                while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="MOA")
                        {

                            if($mode == "ALL")
                            {
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_clinic`");
                                        
                                    while($row = mysqli_fetch_array($query1))
                                {
                                               $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($mode == "PURCHASE")
                            {
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_clinic`
                                                            WHERE Mode_Acquisition = 'Purchased' ");
                                        
                                   while($row = mysqli_fetch_array($query1))
                                {
                                             $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($mode == "DONATED")
                            {
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_clinic`
                                                            WHERE Mode_Acquisition = 'Donated' ");
                                        
                                    while($row = mysqli_fetch_array($query1))
                                {
                                               $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($mode == "DELIVERED")
                            {
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_clinic`
                                                            WHERE Mode_Acquisition = 'DeliveryFromRequest' ");
                                        
                                    while($row = mysqli_fetch_array($query1))
                                {
                                              $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                                
                        }
                        else if($_POST['filterstat']=="SUPPLY")
                        {
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_clinic` 
                                                WHERE Supplier LIKE %'$sply'% ");
                                    
                               while($row = mysqli_fetch_array($query1))
                                {
                                               $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_SKU"];
                                                $quan = $row["Quantity"];
                                                $supplier = $row["Supplier"];

                                            echo
                                            "<tr>
                                                    <td>  $date  </td> 
                                                    <td>  ".$mode." </td>                                                        
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$supplier." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                       
                        
                          
        }


         //////  ISSUANCE REPORT FILTERATION
        if(isset($_POST['FilterIssuance']))
        {
                        
                
                $office = $_POST['Office'];
                $item = $_POST['Item'];

                        if($_POST['filterstat']=="ALL")
                        {
                        
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_dept_issuance`");
                                    
                                while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $Issno = $row["Issue_No"];
                                                $Dreq = $row["Date_Requested"]; 
                                                $Dapr = $row["Date_Approved"];
                                                $Drl = $row["Date_Issued"];
                                                $name = $row["Item_Name"];
                                                $quan = $row["Quantity"]; 
                                                $acc = $row["Account_Issued"];
                                                $dept = $row["Office_Request"];
                                                $bn = $row["Batch_No"];

                                            echo
                                            "<tr>                                                     
                                                   
                                                    <td>  ".$Dreq." </td>
                                                    <td>  ".$Dapr." </td>
                                                    <td>  ".$Drl." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$acc." </td>
                                                    <td>  ".$dept." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        else if($_POST['filterstat']=="OfficeRequest")
                        {
                                   $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_dept_issuance` 
                                   							WHERE Office_Request = '$office' ");
                                        
                                   while($row = mysqli_fetch_array($query1))
	                                {
	                                                
	                                                $Issno = $row["Issue_No"];
	                                                $Dreq = $row["Date_Requested"]; 
	                                                $Dapr = $row["Date_Approved"];
	                                                $Drl = $row["Date_Issued"];
	                                                $name = $row["Item_Name"];
	                                                $quan = $row["Quantity"]; 
	                                                $acc = $row["Account_Issued"];
	                                                $dept = $row["Office_Request"];
	                                                $bn = $row["Batch_No"];

	                                            echo
	                                            "<tr>                                                     
	                                                   
	                                                    <td>  ".$Dreq." </td>
	                                                    <td>  ".$Dapr." </td>
	                                                    <td>  ".$Drl." </td>
	                                                    <td>  ".$name."   </td>
	                                                    <td>  ".$quan." </td>
	                                                    <td>  ".$acc." </td>
	                                                    <td>  ".$dept." </td>
	                                            </tr>  ";
	                                                        
	                                }
        
                        }
                        else if($_POST['filterstat']=="Item")
                        {
                                   $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_dept_issuance` 
                                   							WHERE Item_Name = '$item' ");
                                        
                                   while($row = mysqli_fetch_array($query1))
	                                {
	                                                
	                                                $Issno = $row["Issue_No"];
	                                                $Dreq = $row["Date_Requested"]; 
	                                                $Dapr = $row["Date_Approved"];
	                                                $Drl = $row["Date_Issued"];
	                                                $name = $row["Item_Name"];
	                                                $quan = $row["Quantity"]; 
	                                                $acc = $row["Account_Issued"];
	                                                $dept = $row["Office_Request"];
	                                                $bn = $row["Batch_No"];

	                                            echo
	                                            "<tr>                                                     
	                                                   
	                                                    <td>  ".$Dreq." </td>
	                                                    <td>  ".$Dapr." </td>
	                                                    <td>  ".$Drl." </td>
	                                                    <td>  ".$name."   </td>
	                                                    <td>  ".$quan." </td>
	                                                    <td>  ".$acc." </td>
	                                                    <td>  ".$dept." </td>
	                                            </tr>  ";
	                                                        
	                                }
        
                        }
                        else if($_POST['filterstat']=="BOTH")
                        {
                                   $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_dept_issuance` 
                                   							WHERE Item_Name = '$item' AND Office_Request = '$office' ");
                                        
                                   while($row = mysqli_fetch_array($query1))
	                                {
	                                                
	                                                $Issno = $row["Issue_No"];
	                                                $Dreq = $row["Date_Requested"]; 
	                                                $Dapr = $row["Date_Approved"];
	                                                $Drl = $row["Date_Issued"];
	                                                $name = $row["Item_Name"];
	                                                $quan = $row["Quantity"]; 
	                                                $acc = $row["Account_Issued"];
	                                                $dept = $row["Office_Request"];
	                                                $bn = $row["Batch_No"];

	                                            echo
	                                            "<tr>                                                     
	                                                   
	                                                    <td>  ".$Dreq." </td>
	                                                    <td>  ".$Dapr." </td>
	                                                    <td>  ".$Drl." </td>
	                                                    <td>  ".$name."   </td>
	                                                    <td>  ".$quan." </td>
	                                                    <td>  ".$acc." </td>
	                                                    <td>  ".$dept." </td>
	                                            </tr>  ";
	                                                        
	                                }
        
                        }
                        
                          
        }
         //////OFFICE SUPPLY  INVENTORY REPORT FILTERATION
         if(isset($_POST['FilterOFFInventory']))
        {
                        
                
               

                        if($_POST['filterstat']=="ALL")
                        {
                        
                               $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_office_stock`");
                                    
                                while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        
                        else if($_POST['filterstat']=="CATEGORY")
                        {    


                             $cats = $_POST['Category'];
                             $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_office_stock`
                                                    WHERE Item_Category = '$cats' ");

                               while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                        }

                        else if($_POST['filterstat']=="UNIT")
                        {   
                            $unit = $_POST["Unit"];
                            
                           if($unit == 'Tube')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_office_stock` 
                                                WHERE Unit = 'Tube'");
                                    
                           while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($unit == 'Sachet')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_office_stock` 
                                                WHERE Unit = 'Sachet'");
                                    
                            while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($unit == 'Roll')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_office_stock` 
                                                WHERE Unit = 'Roll'");
                                    
                            while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($unit == 'Bottle')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_office_stock` 
                                                WHERE Unit = 'Bottle'");
                                    
                           while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($unit == 'Box')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_office_stock` 
                                                WHERE Unit = 'Box'");
                                    
                             while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($unit == 'Piece')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_office_stock` 
                                                WHERE Unit = 'Piece'");
                                    
                             while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                           
                        }
                     
                       
                        
                          
        }

        //////MEDICINAL  INVENTORY REPORT FILTERATION
         if(isset($_POST['FilterMEDInventory']))
        {
                        
                
               

                        if($_POST['filterstat']=="ALL")
                        {
                        
                               $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock`");
                                    
                                while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Med_Code"];
                                                $name = $row["Med_Name"]; 
                                                $cat = $row["Med_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];
                                                $exp = $row["Med_Expired"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$exp." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        
                        else if($_POST['filterstat']=="CATEGORY")
                        {    


                             $cats = $_POST['Category'];
                             $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock`
                                                    WHERE Med_Category = '$cats' ");

                                        while($row = mysqli_fetch_array($query1))
                                        {
                                                            
                                                $sku = $row["Med_Code"];
                                                $name = $row["Med_Name"]; 
                                                $cat = $row["Med_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];
                                                $exp = $row["Med_Expired"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$exp." </td>
                                            </tr>  ";

                                        }
                        }

                        else if($_POST['filterstat']=="UNIT")
                        {   
                            $unit = $_POST["Unit"];
                            if($unit == 'Tab')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock` 
                                                WHERE Unit = 'Tab'");
                                    
                              while($row = mysqli_fetch_array($query1))
                                        {
                                                            
                                                $sku = $row["Med_Code"];
                                                $name = $row["Med_Name"]; 
                                                $cat = $row["Med_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];
                                                $exp = $row["Med_Expired"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$exp." </td>
                                            </tr>  ";

                                        }
                            }
                            else if($unit == 'Tube')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock` 
                                                WHERE Unit = 'Tube'");
                                    
                              while($row = mysqli_fetch_array($query1))
                                        {
                                                            
                                                $sku = $row["Med_Code"];
                                                $name = $row["Med_Name"]; 
                                                $cat = $row["Med_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];
                                                $exp = $row["Med_Expired"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$exp." </td>
                                            </tr>  ";

                                        }
                            }
                            else if($unit == 'Sachet')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock` 
                                                WHERE Unit = 'Sachet'");
                                    
                              while($row = mysqli_fetch_array($query1))
                                        {
                                                            
                                                $sku = $row["Med_Code"];
                                                $name = $row["Med_Name"]; 
                                                $cat = $row["Med_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];
                                                $exp = $row["Med_Expired"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$exp." </td>
                                            </tr>  ";

                                        }
                            }
                            else if($unit == 'Vial')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock` 
                                                WHERE Unit = 'Vial'");
                                    
                              while($row = mysqli_fetch_array($query1))
                                        {
                                                            
                                                $sku = $row["Med_Code"];
                                                $name = $row["Med_Name"]; 
                                                $cat = $row["Med_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];
                                                $exp = $row["Med_Expired"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$exp." </td>
                                            </tr>  ";

                                        }
                            }
                            else if($unit == 'Bottle')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock` 
                                                WHERE Unit = 'Bottle'");
                                    
                              while($row = mysqli_fetch_array($query1))
                                        {
                                                            
                                                $sku = $row["Med_Code"];
                                                $name = $row["Med_Name"]; 
                                                $cat = $row["Med_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];
                                                $exp = $row["Med_Expired"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$exp." </td>
                                            </tr>  ";

                                        }
                            }
                            else if($unit == 'Box')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock` 
                                                WHERE Unit = 'Box'");
                                    
                              while($row = mysqli_fetch_array($query1))
                                        {
                                                            
                                                $sku = $row["Med_Code"];
                                                $name = $row["Med_Name"]; 
                                                $cat = $row["Med_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];
                                                $exp = $row["Med_Expired"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$exp." </td>
                                            </tr>  ";

                                        }
                            }
                            else if($unit == 'Piece')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock` 
                                                WHERE Unit = 'Piece'");
                                    
                              while($row = mysqli_fetch_array($query1))
                                        {
                                                            
                                                $sku = $row["Med_Code"];
                                                $name = $row["Med_Name"]; 
                                                $cat = $row["Med_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];
                                                $exp = $row["Med_Expired"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                                    <td>  ".$exp." </td>
                                            </tr>  ";

                                        }
                            }
                           
                        }
                     
                       
                        
                          
        }

         //////CLINICAL  INVENTORY REPORT FILTERATION
         if(isset($_POST['FilterCLIInventory']))
        {
                        
                
               

                        if($_POST['filterstat']=="ALL")
                        {
                        
                               $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_clinical_stock`");
                                    
                                while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                                
                        }
                        
                        else if($_POST['filterstat']=="CATEGORY")
                        {    


                             $cats = $_POST['Category'];
                             $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_clinical_stock`
                                                    WHERE Item_Category = '$cats' ");

                               while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                        }

                        else if($_POST['filterstat']=="UNIT")
                        {   
                            $unit = $_POST["Unit"];
                            
                           if($unit == 'Tube')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_clinical_stock` 
                                                WHERE Unit = 'Tube'");
                                    
                           while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($unit == 'Sachet')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_clinical_stock` 
                                                WHERE Unit = 'Sachet'");
                                    
                            while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($unit == 'Roll')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_clinical_stock` 
                                                WHERE Unit = 'Roll'");
                                    
                            while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($unit == 'Bottle')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_clinical_stock` 
                                                WHERE Unit = 'Bottle'");
                                    
                           while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($unit == 'Box')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_clinical_stock` 
                                                WHERE Unit = 'Box'");
                                    
                             while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                            else if($unit == 'Piece')
                            {
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_clinical_stock` 
                                                WHERE Unit = 'Piece'");
                                    
                             while($row = mysqli_fetch_array($query1))
                                {
                                                
                                                $sku = $row["Stock_Key_Unit"];
                                                $name = $row["Item_Name"]; 
                                                $cat = $row["Item_Category"];
                                                $unit = $row["Unit"];
                                                $quan = $row["Quantity"];

                                            echo
                                            "<tr>                                                     
                                                    <td>  ".$sku." </td>
                                                    <td>  ".$name."   </td>
                                                    <td>  ".$cat." </td>
                                                    <td>  ".$unit." </td>
                                                    <td>  ".$quan." </td>
                                            </tr>  ";
                                                        
                                }
                            }
                           
                        }
                     
                       
                        
                          
        }



?>