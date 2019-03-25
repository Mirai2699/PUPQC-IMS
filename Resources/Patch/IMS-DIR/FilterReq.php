<?php

if(isset($_POST['Filter']))
{
    $valueToSearch = $_POST['valueToSearch'];
    if($_POST['valueToSearch'] == 'PENDING'){
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `ims_t_summary_request` AS SUMREQ INNER JOIN `ims_t_requisition` AS REQ WHERE SUMREQ.Status_Req = 'PENDING' REQ.Batch_No = SUMREQ.Batch_No";
    $search_result = filterTable($query);
    header('location:DMReportReq.php');}
    
}
 else {
    $query = "SELECT * FROM `ims_t_requisition`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "pupqcims_db");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>