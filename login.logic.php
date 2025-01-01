<?php
     
     //session_start();

      require('connection.php');
      require('functions.inc.php');



      $name =get_safe_value($con,$_POST['name']);
      $pass =get_safe_value($con,$_POST['password']);
      
 
    //    $name = $_POST['name'];
    //    $pass = $_POST['password'];
      
       $q = "Select * from user_info Where name='" . $name . "' and Password = '" . $pass . "'" ;

    $result = mysqli_query($con,$q);

    $num = mysqli_num_rows($result);

    if($num>0){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['loggedin'] = true;
		$_SESSION['USER_ID'] = $row['id'];
        $_SESSION['name'] = $name;
       // $_SESSION['pass'] = $row['pass'];
        header('location:index.php');
        //echo "valid";
    }else{
        echo "<script> alert('Invalid UserName or Password '); </script>" . "</br>";
        //echo "wrong";
    }
      
        //  if($num == 1){
        //     $_SESSION['loggedin'] = true;
		// 	$_SESSION['USER_ID'] = $row['id'];
        //     $_SESSION['name'] = $name;
        //      header('location:index.php');

        //  }
        //  else{
        //     echo "<script> alert('Invalid UserName or Password '); </script>" . "</br>";
        //  }  
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