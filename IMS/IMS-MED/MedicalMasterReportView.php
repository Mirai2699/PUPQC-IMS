<?php
       include("../../db.php");


        //////  ACQUISITION REPORT FILTERATION
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
                                                $sku = $row["Medicine_Name"];
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
                                                $sku = $row["Medicine_Name"];
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
                                                $sku = $row["Medicine_Name"];
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
                                                $sku = $row["Medicine_Name"];
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
                                                $sku = $row["Medicine_Name"];
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
                                                $sku = $row["Medicine_Name"];
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

         //////  ACQUISITION REPORT FILTERATION
        if(isset($_POST['FilterCLIAcquisition']))
        {
                        
                $mode = $_POST['MOA'];
                //$sply = $_POST['Supplier'];

                        if($_POST['filterstat']=="ALL")
                        {
                        
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_clinic` AS CLI 
                                                        INNER JOIN ims_r_clinical_stock AS CLISTK ON CLI.Item_SKU = CLISTK.Stock_Key_Unit");
                                    
                                while($row = mysqli_fetch_array($query1))
                                {
                                                $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_Name"];
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
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_clinic` AS CLI 
                                                        INNER JOIN ims_r_clinical_stock AS CLISTK ON CLI.Item_SKU = CLISTK.Stock_Key_Unit`");
                                        
                                    while($row = mysqli_fetch_array($query1))
                                {
                                               $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_Name"];
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
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_clinic` AS CLI 
                                                        INNER JOIN ims_r_clinical_stock AS CLISTK ON CLI.Item_SKU = CLISTK.Stock_Key_Unit
                                                            WHERE Mode_Acquisition = 'Purchased' ");
                                        
                                   while($row = mysqli_fetch_array($query1))
                                {
                                             $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_Name"];
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
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_clinic` AS CLI 
                                                        INNER JOIN ims_r_clinical_stock AS CLISTK ON CLI.Item_SKU = CLISTK.Stock_Key_Unit
                                                            WHERE Mode_Acquisition = 'Donated' ");
                                        
                                    while($row = mysqli_fetch_array($query1))
                                {
                                               $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_Name"];
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
                                    $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_clinic` AS CLI 
                                                        INNER JOIN ims_r_clinical_stock AS CLISTK ON CLI.Item_SKU = CLISTK.Stock_Key_Unit
                                                            WHERE Mode_Acquisition = 'DeliveryFromRequest' ");
                                        
                                    while($row = mysqli_fetch_array($query1))
                                {
                                              $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_Name"];
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
                        $query1 =  mysqli_query($connection,"SELECT * FROM `ims_t_acquisition_clinic` AS CLI 
                                                        INNER JOIN ims_r_clinical_stock AS CLISTK ON CLI.Item_SKU = CLISTK.Stock_Key_Unit
                                                WHERE Supplier LIKE %'$sply'% ");
                                    
                               while($row = mysqli_fetch_array($query1))
                                {
                                               $date = $row["Date_Procured"];
                                                $mode = $row["Mode_Acquisition"];
                                                $sku = $row["Item_Name"];
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

                //////MEDICINAL  INVENTORY REPORT FILTERATION
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
                                                    WHERE Item_Name_Category = '$cats' ");

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
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock` 
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
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock` 
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
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock` 
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
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock` 
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
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock` 
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
                              $query1 =  mysqli_query($connection,"SELECT * FROM `ims_r_medicinal_stock` 
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