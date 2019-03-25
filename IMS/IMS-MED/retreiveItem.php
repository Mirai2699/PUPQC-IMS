<?php include('../../db.php') ;
$va = $_GET['category'];
$option ='';
$sql = "SELECT DISTINCT Med_Name FROM `ims_r_medicinal_stock` WHERE Med_Category = '".$va."'";
$results = mysqli_query($connection, $sql) or die("Bad Query: $sql"); 
while($row = mysqli_fetch_assoc($results))
                                                                       {  
                                                                          $name = $row['Med_Name'];
                                                                         // $unit = $row['Unit'];
                                                                          $option =$option. "<option name='a_name' value='$name'>$name</option>";
                                                                        // $optioncat =$optioncat. "<option name='a_categ' value='$cat'>$cat</option>";


                                                                      }

  echo json_encode(
          array("option" => $option)
     );
?>