<?php include('../../db.php') ;
$va = $_GET['category'];
$option ='';
$sql = "SELECT * FROM `ims_r_medicinal_stock` WHERE Med_Category = '".$va."'";
$results = mysqli_query($connection, $sql) or die("Bad Query: $sql"); 
while($row = mysqli_fetch_assoc($results))
                                                                       {  
                                                                          $no = $row['Med_No'];
                                                                          $sku = $row['Med_Code'];
                                                                          $name = $row['Med_Name'];
                                                                          $cat = $row['Med_Category']; 
                                                                          $option =$option. "<option name='r_sku[]' value='$sku'>$name</option>";

                                                                      }

  echo json_encode(
          array("option" => $option)
     );
?>