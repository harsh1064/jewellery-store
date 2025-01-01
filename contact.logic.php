<?php
      session_start();
      header('location:feedback.php');

      $con = mysqli_connect('localhost','root','','jewellery_shop');

       $message = $_POST['message'];
       $uid = $_SESSION['USER_ID'];

       $sql = "INSERT INTO feedback (`uid`,`message`) VALUES ('$uid','$message')";

    //    $q = "select * from feedback where name = '$name' && email = '$email' && mobile = '$number' && comment = '$message'";

    if ($con->query($sql)) {
        $msg = 'Feedback Saved';
    } else {
        $msg = 'Error: '.$conn->error;
    }

    // $result = mysqli_query($con,$q);

    // $num = mysqli_num_rows($result);

    // $ins = "insert into contact_us (name , email , mobile , comment) values ('$name' , '$email' , '$number' , '$message')";
    // mysqli_query($con ,$ins);
?>