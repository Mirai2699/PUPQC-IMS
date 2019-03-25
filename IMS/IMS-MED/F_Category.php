<?php
   
        $db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');
    // Office Supplies
         
         

    // Clinical Supplies
            if(isset($_POST['addcliniccat']))
            {

                              


                $name = $_POST['catname'];
                $desc = $_POST['catdesc'];

                $categoryinsert = "INSERT INTO ims_r_clinical_category(Category_Name, Category_Desc) VALUES ('$name','$desc')";
                
                mysqli_query($db,$categoryinsert);

                echo "<script type=\"text/javascript\">".
                         "alert
                         ('You have successfully added a category!');".
                          "</script>";
                echo "<script>setTimeout(\"location.href = 'CLICategory.php'\",0);</script>";


                
                                
            }
            else if(isset($_POST['editcliniccat']))
            {

                $no = $_POST['editcatno'];
                $name = $_POST['editcatname'];
                $desc = $_POST['editcatdesc'];

                $categoryupdate = mysqli_query($db,"UPDATE ims_r_clinical_category SET Category_Name = '$name', Category_Desc = '$desc' WHERE Category_ID = '$no' "); 
                mysqli_query($db,$categoryupdate);
               
                echo "<script type=\"text/javascript\">".
                         "alert
                         ('You have successfully changed the details!');".
                          "</script>";
                echo "<script>setTimeout(\"location.href = 'CLICategory.php'\",0);</script>";
            }

    // Medicinal Supplies
            else if(isset($_POST['addmedcat']))
            {

                              


                $name = $_POST['catname'];
                $desc = $_POST['catdesc'];

                $categoryinsert = "INSERT INTO ims_r_medicine_category(Category_Name, Category_Desc) VALUES ('$name','$desc')";
                
                mysqli_query($db,$categoryinsert);

                echo "<script type=\"text/javascript\">".
                         "alert
                         ('You have successfully added a category!');".
                          "</script>";
                echo "<script>setTimeout(\"location.href = 'MEDCategory.php'\",0);</script>";

                
                                
            }
            else if(isset($_POST['editmedcat']))
            {

                $no = $_POST['editcatno'];
                $name = $_POST['editcatname'];
                $desc = $_POST['editcatdesc'];

                $categoryupdate = mysqli_query($db,"UPDATE ims_r_medicine_category SET Category_Name = '$name', Category_Desc = '$desc' WHERE Category_ID = '$no' "); 
                mysqli_query($db,$categoryupdate);
               
                echo "<script type=\"text/javascript\">".
                         "alert
                         ('You have successfully changed the details!');".
                          "</script>";
                echo "<script>setTimeout(\"location.href = 'MEDCategory.php'\",0);</script>";
            }




?>