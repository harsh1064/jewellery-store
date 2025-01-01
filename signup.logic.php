<?php
     
      session_start();
      header('location:login-register.php');

      $con = mysqli_connect('localhost','root','','jewellery_shop');
 
       $name = $_POST['name'];
       $number = $_POST['number'];
       $email = $_POST['email'];
       $pass = $_POST['password'];

       $q = "select * from user_info where name = '$name' && email = '$email' && mo_number = '$number' && password = '$pass'";

    $result = mysqli_query($con,$q);

    $num = mysqli_num_rows($result);
      
         if($num == 1){
             echo "<script> alert('You have already signup'); </script>";
         }else
         {
             $ins = "insert into user_info (name , email , mo_number , password) values ('$name' , '$email' , '$number' , '$pass')";
             mysqli_query($con ,$ins);
         }
?>
