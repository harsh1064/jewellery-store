<?php
   require('header.inc.php');
?>

<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Shopping Cart</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop-left-full-wide.html">Shop</a></li>
                        <li><a href="cart.html" class="active">Cart</a></li>
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
        <!-- Cart Page Content Start -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="pro-thumbnail">Product Image</th>
                            <th class="pro-title">Product Name</th>
                            <th class="pro-price">Price</th>
                            <th class="pro-quantity">Quantity</th>
							<th class="pro-quantity">Update</th>
                            <th class="pro-subtotal">Total</th>
                            <th class="pro-remove">Remove</th>
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
                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>"
                                                                       alt="Product"/></a></td>
                            <td class="pro-title"><a href="#"><?php echo $pname?></a></td>
                            <td class="pro-price"><span>&#x20b9; <?php echo $price?></span></td>
                            <td class="pro-quantity">
                                <div class="pro-qty"><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>"></div>
                            </td>
							<td class="pro-subtotal"><a href="javascript:void(0)"  onclick="manage_cart('<?php echo $key?>','update')" class="btn-add-to-cart" >Update Cart</a></span></td>
                            <td class="pro-subtotal"><span>&#x20b9; <?php echo $qty*$price?></span></td>
                            <td class="pro-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="fa fa-trash-o"></i></a></td>
							<?php } } ?>
                        </tr>
  
  
                        </tbody>
                    </table>
                </div>

                <!-- Cart Update Option -->
               <!-- <div class="cart-update-option d-block d-lg-flex">
                    <div class="cart-update">
                        <a href="javascript:void(0)"  onclick="manage_cart('<?php echo $key?>','update')" class="btn-add-to-cart" style="margin-left:435px">Update Cart</a>
                    </div>
                </div>-->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 ml-auto">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <h3>Cart Totals</h3>
                    <div class="cart-calculate-items">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Sub Total</td>
                                    <td>&#x20b9; <?php echo $cart_total ?></td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>FREE</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td class="total-amount">&#x20b9; <?php echo $cart_total ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="checkout.php" class="btn-add-to-cart">Proceed To Checkout</a>
                </div>
            </div>
        </div>
        <!-- Cart Page Content End -->
    </div>
</div>
<!--== Page Content Wrapper End ==-->

<?php
      require('footer.inc.php');
?>