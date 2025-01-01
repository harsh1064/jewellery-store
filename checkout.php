<?php
   
    require('header.inc.php');
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
	?>
	<script>
		window.location.href='index.php';
	</script>
	<?php
}

$cart_total=0;

if(isset($_POST['submit'])){
	$address=get_safe_value($con,$_POST['address']);
	$city=get_safe_value($con,$_POST['city']);
	$state=get_safe_value($con,$_POST['state']);
	$pincode=get_safe_value($con,$_POST['pincode']);
	$payment_type=get_safe_value($con,$_POST['payment_type']);
	$user_id=$_SESSION['USER_ID'];

    foreach($_SESSION['cart'] as $key=>$val){
        $productArr=get_product($con,'','',$key);
        $price=$productArr[0]['price'];
        $qty=$val['qty'];
        $cart_total=$cart_total+($qty*$price);
        }
	
	$total_price=$cart_total;
	$payment_status='pending';
	if($payment_type=='cod'){
		$payment_status='success';
	}
	$order_status='1';
	$added_on=date('Y-m-d h:i:s');

    // echo "insert into order(user_id,address,city,state,pincode,payment_type,payment_status,
    // order_status,added_on) values('$user_id','$address','$city','$state','$pincode','$payment_type',
    // '$payment_status','$order_status','$added_on')";
	
	
	mysqli_query($con,"insert into `order`(user_id,address,city,state,pincode,payment_type,payment_status,
    order_status,total_price) values('$user_id','$address','$city','$state','$pincode','$payment_type',
    '$payment_status','$order_status','$total_price')");

    $order_id=mysqli_insert_id($con);
	
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		
		mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,price,added_on)
        values('$order_id','$key','$qty','$price','$added_on')");
	}
    
	
	unset($_SESSION['cart']);

    //     if($payment_type=='payu'){
    //     $MERCHANT_KEY = "zkwS2k6B"; 
    //     $SALT = "k4BVoHAMY4";
    //     $hash_string = '';
    //     //$PAYU_BASE_URL = "https://secure.payu.in";
    //     $PAYU_BASE_URL = "https://www.payu.in";
    //     $action = '';
    //     $posted = array();
    //     if(!empty($_POST)) {
    //         foreach($_POST as $key => $value) {    
    //         $posted[$key] = $value; 
    //     }
    // }

    // $userarr=mysqli_fetch_assoc(mysqli_query($con,"select * from user_info where id='$user_id'"));
    
    //     $formError = 0;
    //     $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    //     $posted['txnid']=$txnid;
    //     $posted['amount']=$total_price;
    //     $posted['firstname']=$userarr['name'];
    //     $posted['email']=$userarr['email'];
    //     $posted['phone']=$userarr['mo_number'];
    //     $posted['productinfo']="productinfo";
    //     $posted['key']=$MERCHANT_KEY ;
    //     $hash = '';
    //     $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
    //     if(empty($posted['hash']) && sizeof($posted) > 0) {
    //     if(
    //         empty($posted['key'])
    //         || empty($posted['txnid'])
    //         || empty($posted['amount'])
    //         || empty($posted['firstname'])
    //         || empty($posted['email'])
    //         || empty($posted['phone'])
    //         || empty($posted['productinfo'])
            
    // ) {
    //     $formError = 1;
    // } else {    
    //     $hashVarsSeq = explode('|', $hashSequence);
    //     foreach($hashVarsSeq as $hash_var) {
    //     $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
    //     $hash_string .= '|';
    //     }
    //     $hash_string .= $SALT;
    //     $hash = strtolower(hash('sha512', $hash_string));
    //     $action = $PAYU_BASE_URL . '/_payment';
    // }
    // } elseif(!empty($posted['hash'])) {
    // $hash = $posted['hash'];
    // $action = $PAYU_BASE_URL . '/_payment';
    // }


    // $formHtml ='<form method="post" name="payuForm" id="payuForm" action="'.$action.'"><input type="hidden" 
    // name="key" value="'.$MERCHANT_KEY.'" /><input type="hidden" name="hash" value="'.$hash.'"/><input type="hidden" 
    // name="txnid" value="'.$posted['txnid'].'" /><input name="amount" type="hidden" value="'.$posted['amount'].'" />
    // <input type="hidden" name="firstname" id="firstname" value="'.$posted['firstname'].'" /><input type="hidden" 
    // name="email" id="email" value="'.$posted['email'].'" /><input type="hidden" name="phone" 
    // value="'.$posted['phone'].'" /><textarea name="productinfo" style="display:none;">'
    // .$posted['productinfo'].'</textarea><input type="hidden" name="surl"
    // value="http://localhost/jwe/payment_complete.php" /><input type="hidden" name="furl"
    // value="http://localhost/jwe/payment_fail.php"/><input type="submit" style="display:none;"/></form>';
    // echo $formHtml;
    // echo '<script>document.getElementById("payuForm").submit();</script>';
    //     }else{

    ?>
    <script>
		window.location.href='thank_you.php';
	</script>
	<?php
    }
	

//}
?>



<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Checkout</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#" class="active">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Page Title Area End ==-->

<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="container">
        <!--== Checkout Page Content Area ==-->
        <div class="row">
            <div class="col-12">
                <!-- Checkout Login Coupon Accordion Start -->
				
				<?php if(!isset($_SESSION['loggedin'])) {
					?>
				
                <div class="checkoutaccordion" id="checkOutAccordion">
                    <div class="card">
                        <h3>Returning Customer? <span data-toggle="collapse" data-target="#logInaccordion">Click Here To Login</span>
                        </h3>

                        <div id="logInaccordion" class="collapse" data-parent="#checkOutAccordion">
                            <div class="card-body">
                                <p>If you have shopped with us before, please enter your details in the boxes below. If
                                    you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <div class="login-reg-form-wrap">
                                    <form action="check.login.logic.php" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="single-input-item">
                                                    <input type="text" name="name" placeholder="Enter your Email" required/>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-input-item">
                                                    <input type="password" name="password" placeholder="Enter your Password" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-input-item">
                                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                                <div class="remember-meta">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="rememberMe">
                                                        <label class="custom-control-label" for="rememberMe">Remember
                                                            Me</label>
                                                    </div>
                                                </div>

                                                <a href="#" class="forget-pwd">Forget Password?</a>
                                            </div>
                                        </div>

                                        <div class="single-input-item">
                                            <button class="btn-login">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                  <!--  <div class="card">
                        <h3>Have A Coupon? <span data-toggle="collapse" data-target="#couponaccordion">Click Here To Enter Your Code</span>
                        </h3>
                        <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                            <div class="card-body">
                                <div class="cart-update-option">
                                    <div class="apply-coupon-wrapper">
                                        <form action="#" method="post" class=" d-block d-md-flex">
                                            <input type="text" placeholder="Enter Your Coupon Code"/>
                                            <button class="btn-add-to-cart">Apply Coupon</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- Checkout Login Coupon Accordion End -->
            </div>
			<?php } ?>
        </div>

        <div class="row">
            <!-- Checkout Billing Details -->
            <div class="col-lg-6">
                <div class="checkout-billing-details-wrap">
                    <h2>Billing Details</h2>
                    <div class="billing-form-wrap">
                        <form method="POST">
                            
                            <!--   <div class="single-input-item">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">Full Name</label>
                                        <input type="text" id="f_name" name="name" placeholder="name" required/>
                                    </div>
                                </div>-->
                            

                            <div class="single-input-item">
                                <label for="street-address" class="required">Street address</label>
                                <input type="text" id="street-address" name="address" placeholder="Street address Line 1" required/>
                            </div>


                            <div class="single-input-item">
                                <label for="town" class="required">Town / City</label>
                                <input type="text" id="town" name="city" placeholder="Town / City" required/>
                            </div>

                            <div class="single-input-item">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" placeholder="State / Divition" required/>
                            </div>

                            <div class="single-input-item">
                                <label for="postcode" class="required">Postcode / ZIP</label>
                                <input type="text" id="postcode" name="pincode" placeholder="Postcode / ZIP" required/>
                            </div>

                          <!--  <div class="single-input-item">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" placeholder="Phone" required/>
                            </div>-->
							
							   <!-- Order Payment Method -->
                        <div class="order-payment-method">
                           <div class="single-payment-method show">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
									
                                        COD <input  type="radio" name="payment_type" value="COD"/>
										
										<!-- &nbsp;&nbsp;PayU <input type="radio" name="payment_type" value="PayU"/> -->
										
                                    </div>
                                </div>
                            </div>
							
							
						<?php if(isset($_SESSION['loggedin'])) {
							?>
                            <div class="summary-footer-area">
						
                                <button type="submit" class="btn-add-to-cart" name="submit"> Place Order</button>
                            </div>
							
						<?php } ?>	
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary Details -->
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="order-summary-details">
                    <h2>Your Order Summary</h2>
                    <div class="order-summary-content">
                        <!-- Order Summary Table -->
                        <div class="order-summary-table table-responsive text-center">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Products</th>
                                    <th>Total</th>
                                </tr>
                                </thead>

                                <tbody>
								
								<?php
									if(isset($_SESSION['cart'])){
										$cart_total=0;
										foreach($_SESSION['cart'] as $key=>$val){
										$productArr=get_product($con,'','',$key);
										$pname=$productArr[0]['name'];
										$mrp=$productArr[0]['mrp'];
										$price=$productArr[0]['price'];
										$image=$productArr[0]['image'];
										$qty=$val['qty'];
										$cart_total=$cart_total+($qty*$price);
						        ?>
								
                                <tr>
                                    <td><a href="#"><?php echo $pname?> <strong> × <?php echo $qty?></strong></a></td>
                                    <td>&#x20b9; <?php echo $qty*$price?></td>
                                </tr>

								<?php } } ?>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>Sub Total</td>
                                    <td><strong>&#x20b9; <?php echo $cart_total ?></strong></td>
                                </tr>

                                <tr>
                                    <td>Shipping</td>
                                    <td class="d-flex justify-content-center">
                                        <ul class="shipping-type">
                                            <!--<li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="flatrate" name="shipping"
                                                           class="custom-control-input" checked/>
                                                    <label class="custom-control-label" for="flatrate">Flat Rate:
                                                        $70.00</label>
                                                </div>
                                            </li>-->
                                            <li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="freeshipping" name="shipping"
                                                           class="custom-control-input"/>
                                                    <label class="custom-control-label" for="freeshipping">Free
                                                        Shipping</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Amount</td>
                                    <td><strong>&#x20b9; <?php echo $cart_total ?></strong></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                     
                    </div>
                </div>
            </div>
        </div>
        <!--== Checkout Page Content End ==-->
    </div>
</div>
<!--== Page Content Wrapper End ==-->


<?php
   require('footer.inc.php');
?>