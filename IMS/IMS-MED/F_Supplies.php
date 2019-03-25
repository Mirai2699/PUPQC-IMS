
<?php
   
        $db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');
    


    /////  CRITICAL LEVEL SETUP

            //Clinical Supplies Critical Level
            if(isset($_POST['ClinicChangeCrit']))
            {
                $crit = $_POST['Critlevel'];

                $critupdate = mysqli_query($db,"UPDATE ims_r_clinical_stock SET Critical_level = '$crit' "); 
                mysqli_query($db,$critupdate);
                $critchange = mysqli_query($db,"ALTER TABLE `ims_r_clinical_stock` CHANGE `Critical_level` `Critical_level` int(11) NOT NULL DEFAULT '$crit'");
                mysqli_query($db,$critchange);

                    echo "<script type=\"text/javascript\">".
                         "alert
                         ('You have successfully changed the critical level!');".
                          "</script>";
                    echo "<script>setTimeout(\"location.href = 'CLIInvent.php'\",0);</script>";
                


            }
            //Medicine Supplies Critical Level
            else if(isset($_POST['MedicChangeCrit']))
            {
                $crit = $_POST['Critlevel'];

                $critupdate = mysqli_query($db,"UPDATE ims_r_medicinal_stock SET Critical_level = '$crit' "); 
                mysqli_query($db,$critupdate);
                $critchange = mysqli_query($db,"ALTER TABLE `ims_r_medicinal_stock` CHANGE `Critical_level` `Critical_level` int(11) NOT NULL DEFAULT '$crit'");
                mysqli_query($db,$critchange);
               
               
                    echo "<script type=\"text/javascript\">".
                         "alert
                         ('You have successfully changed the critical level!');".
                          "</script>";
                    echo "<script>setTimeout(\"location.href = 'MEDInvent.php'\",0);</script>";


            }



    /////  INVENTORY SETUP

   
             else if(isset($_POST['CLINICINVinsert']))
            {

                $sku = $_POST['a_code'];
                $name = $_POST['a_name'];
                $cat = $_POST['a_category'];
                $unit = $_POST['a_unit'];
                $quan = $_POST['a_quan'];
                               
                $itemsins = "INSERT INTO ims_r_clinical_stock(Stock_Key_Unit, Item_Name, Item_Category, Unit, Quantity) 
                             VALUES ('$sku','$name','$cat','$unit' ,'$quan')";
                   

                 mysqli_query($db,$itemsins);

                   echo "<script type=\"text/javascript\">".
                         "alert
                         ('You have successfully added the item in the inventory!');".
                          "</script>";
                    echo "<script>setTimeout(\"location.href = 'CLIInvent.php'\",0);</script>";

            }

            else if(isset($_POST['MEDICINVinsert']))
            {

                $code = $_POST['a_code'];
                $name = $_POST['a_name'];
                $cat = $_POST['a_category'];
                $unit = $_POST['a_unit'];
                $quan = $_POST['a_quan'];
                $expdate = $_POST['a_expdate'];
                               
                $itemsins = "INSERT INTO ims_r_medicinal_stock(Med_Code, Med_Name, Med_Category, Unit, Quantity, Med_Expired) 
                             VALUES ('$code','$name','$cat','$unit' ,'$quan' ,'$expdate')";
                   

                 mysqli_query($db,$itemsins);

                   echo "<script type=\"text/javascript\">".
                         "alert
                         ('You have successfully added the item in the inventory!');".
                          "</script>";
                    echo "<script>setTimeout(\"location.href = 'MEDInvent.php'\",0);</script>";

            }




           

           else if(isset($_POST['CLINICChangeInv']))
            {

                $no = $_POST['item_No'];
                $name = $_POST['item_name'];
                $cat = $_POST['item_cat'];
                $quan = $_POST['item_quan'];
                               
                $itemsins = mysqli_query($db,"UPDATE ims_r_clinical_stock SET Item_Name = '$name', 
                                                                     Item_Category = '$cat',
                                                                     Quantity = '$quan'
                                                    WHERE Item_No = '$no' "); 
                   

                 mysqli_query($db,$itemsins);

                    echo "<script type=\"text/javascript\">".
                         "alert
                         ('You have successfully changed the details!');".
                          "</script>";
                    echo "<script>setTimeout(\"location.href = 'CLIInvent.php'\",0);</script>";

            }

             else if(isset($_POST['MEDICChangeInv']))
            {

                $no = $_POST['item_No'];
                $name = $_POST['item_name'];
                $cat = $_POST['item_cat'];
                $quan = $_POST['item_quan'];
                               
                $itemsins = mysqli_query($db,"UPDATE ims_r_medicinal_stock SET Med_Name = '$name', 
                                                                     Med_Category = '$cat',
                                                                     Quantity = '$quan'
                                                    WHERE Med_No = '$no' "); 
                   

                 mysqli_query($db,$itemsins);

                    echo "<script type=\"text/javascript\">".
                         "alert
                         ('You have successfully changed the details!');".
                          "</script>";
                    echo "<script>setTimeout(\"location.href = 'MEDInvent.php'\",0);</script>";

            }
            

//Medicine Supplies Disposal
            else if(isset($_POST['MEDICDispose']))
            {
               
                $No = $_POST['item_No'];
                $dispose = mysqli_query($db,"UPDATE ims_r_medicinal_stock SET Med_Status = 'Disposed' WHERE Med_No = '$No'"); 
                mysqli_query($db,$dispose);
                
               
                   echo "<script type=\"text/javascript\">".
                         "alert
                         ('The item is disposed!');".
                          "</script>";
                    echo "<script>setTimeout(\"location.href = 'MEDInvent.php'\",0);</script>";


            }
                        


?>


