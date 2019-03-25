<?php include('../../db.php') ;
$va = $_GET['category'];
$option ='';
$sql = "SELECT * FROM `ims_r_medicinal_stock` WHERE Med_Code = '".$va."'";
$results = mysqli_query($connection, $sql) or die("Bad Query: $sql"); 
while($row = mysqli_fetch_assoc($results))
                                                                       {  
                                                                          $no = $row['Med_No'];
                                                                          $sku = $row['Med_Code'];
                                                                          $name = $row['Med_Name'];
                                                                          $cat = $row['Med_Category']; 
                                                                         // $unit = $row['Unit'];
                                                                          $option =$option. "<option name='a_categ' value='$cat'>$cat</option>";
                                                                        // $optioncat =$optioncat. "<option name='a_categ' value='$cat'>$cat</option>";


                                                                      }

  echo json_encode(
          array("option" => $option)
     );
?>