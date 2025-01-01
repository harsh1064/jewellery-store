<?php
require('connection.php');
require('functions.inc.php');
if(!isset($_SESSION['loggedin'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$current_password=get_safe_value($con,$_POST['current_password']);
$new_password=get_safe_value($con,$_POST['new_password']);
$uid=$_SESSION['USER_ID'];

$row=mysqli_fetch_assoc(mysqli_query($con,"select password from user_info where id='$uid'"));

if($row['password']!=$current_password){
	echo "Please enter your current valid password";
}else{
	mysqli_query($con,"update user_info set password='$new_password' where id='$uid'");
	echo "Password updated";
}
?>