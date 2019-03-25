<?php
       include("../../db.php");


        $office = $_SESSION['DEPART'];
        $sqlemp = "SELECT * FROM `pso_r_office` 
        WHERE O_ID = '$office' ";
        $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
        while($row = mysqli_fetch_assoc($results))
        {
            $oname = $row['O_NAME'];
             //////  ISSUANCE REPORT FILTERATION
            if(isset($_POST['FilterIssuance']))
            {
                            
                    
                    $item = $_POST['Item'];

                            if($_POST['filterstat']=="ALL")
                            {
                            
                            $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_dept_issuance` WHERE Office_Request = '$oname' ");
                                        
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
                                                        <td>  ".$bn."   </td>
                                                        <td>  ".$acc." </td>
                                                </tr>  ";
                                                            
                                    }
                                    
                            }
                        
                            else if($_POST['filterstat']=="Item")
                            {
                                       $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_dept_issuance` 
                                                                WHERE Item_Name = '$item' AND Office_Request = '$oname' ");
                                            
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
                            else if($_POST['filterstat']=="DATE")
                            {           
                                        $start = $_POST['StartDate'];
                                         $end = $_POST['EndDate'];
                                       $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_dept_issuance` 
                                                                WHERE Office_Request = '$oname' AND Date_Issued Between '$start' AND '$end' ");
                                            
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
        }
?>