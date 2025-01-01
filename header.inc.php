<?php
   require('connection.php');
   require('functions.inc.php');
   require('add_to_cart.inc.php');
   $cat_res = mysqli_query($con,"select * from categories where status=1");
   $cat_arr=array();
   while($row=mysqli_fetch_assoc($cat_res)){
    $cat_arr[]=$row;
   }
   
   $obj=new add_to_cart();
   $totalProduct=$obj->totalProduct();
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <title>Jewellery Store</title>

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"/>

    <!--== Google Fonts ==-->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700"/>
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i"/>

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/vendor/bootstrap.min.css" rel="stylesheet">
    <!--=== Font-Awesome CSS ===-->
    <link href="assets/css/vendor/font-awesome.css" rel="stylesheet">
    <!--=== Plugins CSS ===-->
    <link href="assets/css/plugins.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
	<script src="assets/js/main.js"></script>


    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!--== Header Area Start ==-->
<header id="header-area">
    <div class="ruby-container">
        <div class="row">
            <!-- Logo Area Start -->
            <div class="col-3 col-lg-1 col-xl-2 m-auto">
                <a href="index.php" class="logo-area">
                    <img src="assets/img/logo.png" alt="Logo" class="img-fluid"/>
                </a>
            </div>
            <!-- Logo Area End -->

            <!-- Navigation Area Start -->
            <div class="col-3 col-lg-9 col-xl-8 m-auto">
                <div class="main-menu-wrap">
                    <nav id="mainmenu">
                        <ul>
                            <li ><a href="index.php">Home</a></li> <!--Home section-->

                            <?php    //This code is dynamic header and subcategory fatching code
                                 foreach($cat_arr as $list){
                            ?>
                                       <li><a href="cat_product.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
							<?php
								 }
							?>	 
                            <li><a href="contact.php">Contact Us</a></li>

                            <li><a href="feedback.php">Feedback</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Navigation Area End -->


        <!--This part is home page logged username show -->
        <?php
        
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
              
               echo  ' <div class="col-6 col-lg-2 m-auto">
                <div class="header-right-meta text-right">
                    <ul>
                    
                        <li><a href="#" class="modal-active"><i class="fa fa-search"></i></a></li>

                        <li class="shop-cart"><a href="cart.php" ><i class="fa fa-shopping-bag"></i> <span
                                class="count"> ' . $totalProduct . '</span></a>
                           <!-- <div class="mini-cart">
                                <div class="mini-cart-body">
                                    
									
									
                                  
                              
                                </div>
                                <div class="mini-cart-footer">
                                    <a href="checkout.php" class="btn-add-to-cart">Checkout</a>
                                </div>
                            </div>-->
                           
                            
                        </li>
                        

                        <li><a style="margin-left:10px;" href="logout.php">Logout</a><a href="my_order.php">My Order</a></li>

                        <li class="modal-active"> Welcome, ' . $_SESSION['name'] . '</li>
                        <li><a style="margin-left:10px;" href="profile.php">Your Profile</a></li>
                    </ul>
                </div>
            </div>';
            }
        else{

         echo  '<div class="col-6 col-lg-2 m-auto">
            <div class="header-right-meta text-right">
                <ul>
                    <li><a href="#" class="modal-active"><i class="fa fa-search"></i></a></li> <!--Search icon-->
					
                    

                    <li class="shop-cart"><a href=""><i class="fa fa-shopping-bag"></i> <span
                            class="count">0</span></a>
                        <div class="mini-cart">
                            <div class="mini-cart-body">
                                
                               
                                
                            </div>
                            <div class="mini-cart-footer">
                                <a href="checkout.php" class="btn-add-to-cart">Checkout</a>
                            </div>
                        </div>
                    </li>
					
					
					<li><a style="margin-left: 10px;" href="login-register.php">Login</a></li> <!--Login/Sign related-->

                </ul>
            </div>
        </div>';
        }   
        
        ?>
<!-------------------------------------------------------------------------------------------->
            <!-- Header Right Meta Start -->
          
            <!-- Header Right Meta End -->
        </div>
    </div>
</header>
<!--== Header Area End ==-->

<!--== Search Box Area Start ==-->
<!-- <div class="body__overlay"></div>
		<div class="offset__wrapper">
            <div class="search__area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search__inner">
                                <form action="search.php" method="get">
                                    <input placeholder="Search here... " type="text" name="str">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
<div class="body-popup-modal-area">
    <span class="modal-close"><img src="assets/img/cancel.png" alt="Close" class="img-fluid"/></span>
    <div class="modal-container d-flex">
        <div class="search-box-area">
            <div class="search-box-form">
                <form action="search.php" method="get">
                    <input type="text" placeholder="Search Here...." name="str"/>
                    <button type="submit"></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--== Search Box Area End ==-->