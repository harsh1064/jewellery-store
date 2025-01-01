<?php
require('db.php');

    if (isset($_POST['confirm'])) {
        $name = $_POST['email'];
		$pas = $_POST['pass'];

		$result = "select * from `user_info` where email= '".$name."'";

		$final = mysqli_query($con,$result);

		$row = mysqli_num_rows($final);

		if (!$row=="")
		{
			
			$result1 = "UPDATE `user_info` SET password='".$pas."' WHERE email='".$name."'";

			$final1 = mysqli_query($con,$result1);

			if ($final1){
				echo "Success";
			}else{
				echo "Not succes";
			}
		}
		else
		{
			echo("wrong");
		}

        // $sql = "UPDATE user_info SET password='$pass' WHERE name='$name' ";

        // if ($conn->query($sql) === true) {
        //     echo 'your password is forgot ';
        //     header('Location: login.logic.php');
        //     exit;
        //     } else {
        //         echo 'Error updating record: '.$conn->error;
        //         }
    }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<title>Reset Password</title>
<body>
<?php 
require 'header.inc.php'; ?>


		<div class="w3l_banner_nav_right">
<!-- login -->

		<div class="w3_login">
			<h1>Reset Password</h1>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle">
					
				  </div>
				  <div class="form">
            
			<!-- <h2>Reset Password</h2> -->
					<form action="" method="post">
					  <input type="email" name="email" placeholder="Email" required><br><br>
					  <input type="password" name="pass" placeholder="Enter new password" required><br><br>
					  <input type="submit" value="Confirm" name="confirm">
					</form>
                  	  </div>
                      </div>
                      </div>
                      </div>
<!-- //login -->
		</div>
		<div class="clearfix"></div>
	</div>
<?php include 'footer.inc.php' ?>
</body>
</html>