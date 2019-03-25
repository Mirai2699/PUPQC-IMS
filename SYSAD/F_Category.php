<?php
   
        $db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');
    // Office Supplies
            if(isset($_POST['addofficecat']))
            {

                              


                $name = $_POST['catname'];
                $desc = $_POST['catdesc'];

                $categoryinsert = "INSERT INTO ims_r_office_category(Category_Name, Category_Desc) VALUES ('$name','$desc')";
                
                mysqli_query($db,$categoryinsert);
                header('location: SA_Off_Category.php');


                
                                
            }
            else if(isset($_POST['editofficecat']))
            {

                $no = $_POST['editcatno'];
                $name = $_POST['editcatname'];
                $desc = $_POST['editcatdesc'];

                $categoryupdate = mysqli_query($db,"UPDATE ims_r_office_category SET Category_Name = '$name', Category_Desc = '$desc' WHERE Category_ID = '$no' "); 
                mysqli_query($db,$categoryupdate);
               
                header('location: SA_Off_Category.php');
            }

    // Clinical Supplies
            else if(isset($_POST['addcliniccat']))
            {

                              


                $name = $_POST['catname'];
                $desc = $_POST['catdesc'];

                $categoryinsert = "INSERT INTO ims_r_clinical_category(Category_Name, Category_Desc) VALUES ('$name','$desc')";
                
                mysqli_query($db,$categoryinsert);
                header('location: SA_Clinic_Category.php');


                
                                
            }
            else if(isset($_POST['editcliniccat']))
            {

                $no = $_POST['editcatno'];
                $name = $_POST['editcatname'];
                $desc = $_POST['editcatdesc'];

                $categoryupdate = mysqli_query($db,"UPDATE ims_r_clinical_category SET Category_Name = '$name', Category_Desc = '$desc' WHERE Category_ID = '$no' "); 
                mysqli_query($db,$categoryupdate);
               
                header('location: SA_Clinic_Category.php');
            }

    // Medicinal Supplies
            else if(isset($_POST['addmedcat']))
            {

                              


                $name = $_POST['catname'];
                $desc = $_POST['catdesc'];

                $categoryinsert = "INSERT INTO ims_r_medicine_category(Category_Name, Category_Desc) VALUES ('$name','$desc')";
                
                mysqli_query($db,$categoryinsert);
                header('location: SA_Med_Category.php');


                
                                
            }
            else if(isset($_POST['editmedcat']))
            {

                $no = $_POST['editcatno'];
                $name = $_POST['editcatname'];
                $desc = $_POST['editcatdesc'];

                $categoryupdate = mysqli_query($db,"UPDATE ims_r_medicine_category SET Category_Name = '$name', Category_Desc = '$desc' WHERE Category_ID = '$no' "); 
                mysqli_query($db,$categoryupdate);
               
                header('location: SA_Med_Category.php');
            }




?>