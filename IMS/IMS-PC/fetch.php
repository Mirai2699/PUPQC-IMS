<?php
//fetch.php;
$connect = mysqli_connect("localhost", "root", "", "pupqc_ams_ims_db");
if(isset($_POST["view"]))
{
 // include("connect.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE ims_t_dept_summary_returns SET Viewed = 1 WHERE Viewed = 0";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT * FROM ims_t_dept_summary_returns where Status = 'PENDING' ORDER BY Batch_No DESC  ";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
    $id = $row['Batch_No'];

    // if($row["URS_VIEW_BY_PO"] == 0) 
    // {
      $output .= '<a href="PCdepReviewRet.php?viewrequests='.$id.'">
                      <li style="margin-top: 10px;">
                        <div class="alert alert-warning clearfix">
                          Date of Issue of Return: <strong> '.$row["Date_IssueRet"].' </strong><br/>
                          Batch No. : <strong> '.$row["Batch_No"].' </strong><br/>
                          Returned By: <strong> '.$row["Depart_Name"].' </strong>
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
 
 $query_1 = "SELECT * FROM ims_t_dept_summary_returns WHERE Viewed = 0";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>