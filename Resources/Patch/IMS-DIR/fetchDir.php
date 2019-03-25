<?php
//fetch.php;
include("../../db.php");
if(isset($_POST["view"]))
{
 // include("connect.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE ims_t_summary_request SET Viewed = 1 WHERE Viewed = 0";
  mysqli_query($connection, $update_query);
 }
 $query = "SELECT * FROM ims_t_summary_request  where Status_Req = 'PENDING' ORDER BY Batch_No DESC";
 $result = mysqli_query($connection, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
    $id = $row['Batch_No'];

    // if($row["URS_VIEW_BY_PO"] == 0) 
    // {
      $output .= '<a href="DMReviewReq.php?viewrequests='.$id.'">
                      <li style="margin-top: 10px;">
                        <div class="alert alert-success clearfix">
                          Date Requested: <strong> '.$row["Date_Requested"].' </strong><br/>
                          Batch No. : <strong> '.$row["Batch_No"].' </strong><br/>
                          Remarks: <strong> '.$row["Remarks"].' </strong>
                        </div>
                      </li>
                    </a>
                    <li class="divider"></li>';
    // }
    // else
    // {
    //   $output .= '
    //   <a href="POViewRequestFromDU.php?viewrequests='.$id.'">
    //     <li style="margin-top: 10px;">
    //       <div class="alert clearfix" style="background-color: #EEEEEE;">
    //         Date: <strong> '.$row["URS_REQUEST_DATE"].' </strong><br/>
    //         Request No. : <strong> '.$row["URS_NO"].' </strong><br/>
    //         Request By: <strong> '.$row["O_NAME"].' </strong>
    //       </div>
    //     </li>
    //   </a>
    //   <li class="divider"></li>
    //    ';
    // }
  }
 }
 else
 {
  $output .= '<li style="margin-top: 10px;">
                <div class="alert alert-warning clearfix">
                  <center>No Notification Found</center>
                </div>
              </li>';
 }
 
 $query_1 = "SELECT * FROM ims_t_summary_request  WHERE Viewed = 0";
 $result_1 = mysqli_query($connection, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>