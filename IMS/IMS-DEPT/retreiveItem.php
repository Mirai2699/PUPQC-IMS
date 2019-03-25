<?php include('../../db.php') ;
$va = $_GET['category'];
$option ='';
$sql = "SELECT * FROM `ims_r_office_stock` WHERE Item_Category = '".$va."'";
$results = mysqli_query($connection, $sql) or die("Bad Query: $sql"); 
while($row = mysqli_fetch_assoc($results))
        {  
          $no = $row['Item_No'];
          $sku = $row['Stock_Key_Unit'];
          $name = $row['Item_Name'];
          $cat = $row['Item_Category']; 
          $option =$option. "<option name='r_sku[]' value='$sku'>$name</option>";

      }

  echo json_encode(
          array("option" => $option)
     );
?>