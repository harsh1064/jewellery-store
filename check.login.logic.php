<?php
     
      require('connection.php');
 
       $name = $_POST['name'];
       $pass = $_POST['password'];

       $q = "Select * from user_info Where name='" . $name . "' and Password = '" . $pass . "'" ;

    $result = mysqli_query($con,$q);

    $num = mysqli_num_rows($result);
      
         if($num == 1){
            $_SESSION['loggedin'] = true;
            $_SESSION['USER_ID'] = $row['id'];
            $_SESSION['name'] = $name;
             header('location:checkout.php');

         }
         else{
            echo "<script> alert('Invalid UserName or Password '); </script>" . "</br>";
         }  
?>
<html>
    <head>
        <title>Opps..Try Again&#10060;</title>
    </head>
    <style>
    .container{
             color: red;
             font-weight: 20px;
             text-align: center;
             margin-top:18%;
    }
    </style>
<body>
    <div class="container">
           <h1>Oppss...Try Again &#10060;</h1>
           <h1>Fill in Signin Form</h1>
    </div>
</body>
</html>