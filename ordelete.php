<?php

//session_start();
// if (!isset($_SESSION['ADMIN_ID']) || empty($_SESSION['ADMIN_ID'])) {
//     header('Location: login.php');
//     exit;
// }
require 'connection.php';

// if (empty($_GET['id'])) {
//     $_SESSION['msg']['type'] = 'danger';
//     $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Nothing to delete !';
//     header('location: order.php');
//     exit;
// }

$id = $_GET['id'];

//print_r($oid);

$result = $con->query("DELETE FROM `order` WHERE `id` = $id");

if($result){
    header('Location: my_order.php');
}else{
    echo "Fail";
}

// if ($result) {
//     $_SESSION['msg']['type'] = 'success';
//     $_SESSION['msg']['msg'] = '<i class="fa fa-info-circle"></i> Deleted successfully !';
//     header('location: order.php');
//     exit;
// } else {
//     $_SESSION['msg']['type'] = 'danger';
//     $_SESSION['msg']['msg'] = '<i class="fa fa-info-circle"></i> Error: '.$conn->error;
//     header('location: order.php');
//     exit;
// }

?>
