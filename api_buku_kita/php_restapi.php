<?php
require_once "koneksi.php";
if(function_exists($_GET['function'] )){
    $_GET['function']();
}

function get_buku(){

    global $connect;
    $query = $connect->query("SELECT * FROM buku");
    while ($row=mysqli_fetch_assoc($query)){
        $data[] = $row;
    }
$response=array(
    'status'=> 1,
    'message'=>'success',
    'data'=> $data
);
header ('Content-Type: application /json');
echo json_encode($response);
}

// global $connect;
// if (!empty($_GET["id"])){
//     $id =$_GET["id"];
// }
// $query ="SELECT * FROM buku WHERE id= $id";
// $result =$connect ->query ($query);
// while($row = msqli_fetch_object($result))
// {
//     $data [] =$row;

// }
// header('content-Type:application/json');
// echo json_encode($response);

?>