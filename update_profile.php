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
$name=get_safe_value($con,$_POST['name']);
$uid=$_SESSION['USER_ID'];
mysqli_query($con,"update user_info set name='$name' where id='$uid'");
$_SESSION['name']=$name;
echo "Your name updated";
?>