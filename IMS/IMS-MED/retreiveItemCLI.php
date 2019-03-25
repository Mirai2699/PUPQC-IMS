<?php include('../../db.php') ;
$va = $_GET['category'];
$option ='';
$sql = "SELECT * FROM `ims_r_clinical_stock` WHERE Item_Category = '".$va."'";
$results = mysqli_query($connection, $sql) or die("Bad Query: $sql"); 
while($row = mysqli_fetch_assoc($results))
                                                                       {  
                                                                          $no = $row['Item_No'];
                                                                          $sku = $row['Stock_Key_Unit'];
                                                                          $name = $row['Item_Name'];
                                                                          $cat = $row['Item_Category']; 
                                                                         // $unit = $row['Unit'];
                                                                          $option =$option. "<option name='a_name' value='$sku'>$name</option>";
                                                                        // $optioncat =$optioncat. "<option name='a_categ' value='$cat'>$cat</option>";


                                                                      }

  echo json_encode(
          array("option" => $option)
     );
?>