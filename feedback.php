<?php
  
  require('header.inc.php');

  $con = mysqli_connect('localhost','root','','jewellery_shop');

  if (isset($_POST['submit'])){
    if (isset($_POST['message'])){

        //session_start();

        $message = $_POST['message'];
        $uid = $_SESSION['USER_ID'];

        $sql = "INSERT INTO feedback (`uid`,`message`) VALUES ('$uid','$message')";

        if ($con->query($sql)) {
            $msg = 'Feedback Saved';
        } else {
            $msg = 'Error: '.$conn->error;
        }

    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>

    <!--Stylesheet--------------------------->
    <link rel="stylesheet" href="assets/css/contact.css" />
    <!--Fav-icon------------------------------>
    <link rel="shortcut icon" href="images/fav-icon.png" />
    <!--poppins-font-family------------------->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!--using-Font-Awesome-------------------->
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="row">
            <!-- Contact Form Start -->
            <div class="col-lg-9 m-auto">
            <?php
		        if (isset($_SESSION['USER_ID']) && !empty($_SESSION['USER_ID']))
                {
	        ?>
                <div class="contact-form-wrap">

                <h2 style="margin-left:1em;">Write a Feedback</h2>

                    <form id="contact-form" action="" method="post">
						
                        <div class="single-input-item">
                                <!-- <label for="text" class="required">Enter Message</label> -->
                                <textarea name="message" placeholder="Enter Message" maxlength="200" required></textarea>
                                <!-- <input type="textarea" id="message"  name="message" placeholder="Enter Message"/ required> -->
                        </div>
						<br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="submit" class="btn-add-to-cart" name="submit" onclick="send_message()">Submit</button>
                    </form>

                    <div class="testimonial-box-container">
                    <?php
									$result = $con->query('SELECT * FROM `feedback` ');

									if ($result) {
										while ($row = $result->fetch_assoc()) {
											$result1 = $con->query('SELECT `name` FROM `user_info` WHERE `id` = "'.$row['uid'].'"');

                                        	$ord = $result1->fetch_assoc();
								?>

                    <div class="testimonial-box">
                        <!--top------------------------->
                        <div class="box-top">
                            <!--profile----->
                            <div class="profile">
                                <!--img---->
                                <div class="profile-img">

                                </div>
                                <!--name-and-username-->
                                <div class="name-user">
                                    <strong><?=$ord['name']?></strong>

                                </div>
                            </div>
                            <!--reviews------>

                        </div>
                        <!--Comments---------------------------------------->
                        <div class="client-comment">
                            <p><?=$row['message']?></p>
                        </div>
                    </div>



                    <?php }} ?>
                </div>

                </div>
            </div>
            <?php 
		        } 
		        else {  
		    ?>

            <div class="contact-form-wrap">
                <h2 style="margin-left:1em;">Feedback</h2>

                <div class="testimonial-box-container">
                    <?php
									$result = $con->query('SELECT * FROM `feedback` ');

									if ($result) {
										while ($row = $result->fetch_assoc()) {
											$result1 = $con->query('SELECT `name` FROM `user_info` WHERE `id` = "'.$row['uid'].'"');

                                        	$ord = $result1->fetch_assoc();
								?>

                    <div class="testimonial-box">
                        <!--top------------------------->
                        <div class="box-top">
                            <!--profile----->
                            <div class="profile">
                                <!--img---->
                                <div class="profile-img">

                                </div>
                                <!--name-and-username-->
                                <div class="name-user">
                                    <strong><?=$ord['name']?></strong>

                                </div>
                            </div>
                            <!--reviews------>

                        </div>
                        <!--Comments---------------------------------------->
                        <div class="client-comment">
                            <p><?=$row['message']?></p>
                        </div>
                    </div>



                    <?php }} ?>
                </div>
                    
                </div>

            <?php } ?>
            <!-- Contact Form End -->
</div>
</body>
</html>