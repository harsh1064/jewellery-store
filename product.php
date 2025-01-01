<?php
require('header.inc.php');
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>

<!--== Search Box Area Start ==-->
<div class="body-popup-modal-area">
    <span class="modal-close"><img src="assets/img/cancel.png" alt="Close" class="img-fluid"/></span>
    <div class="modal-container d-flex">
        <div class="search-box-area">
            <div class="search-box-form">
                <form action="#" method="post">
                    <input type="search" placeholder="type keyword and hit enter"/>
                    <button class="btn" type="button"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--== Search Box Area End ==-->

<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="cat_product.php?id=<?php echo $get_product['0']['categories_id']?>"><?php echo $get_product['0']['categories']?></a></li>
                        <li><a class="active"><?php echo $get_product['0']['name']?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Page Title Area End ==-->

<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="ruby-container">
        <div class="row">
            <!-- Single Product Page Content Start -->
            <div class="col-lg-12">
                <div class="single-product-page-content">
                    <div class="row">
                        <!-- Product Thumbnail Start -->
                        <div class="col-lg-5">
                            <div class="product-thumbnail-wrap">
                                <div class="product-thumb-carousel owl-carousel">
                                    <div class="single-thumb-item">
                                        <a><img class="img-fluid"
                                                src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>"
                                                alt="Product"/>
										</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Thumbnail End -->

                        <!-- Product Details Start -->
                        <div class="col-lg-7 mt-5 mt-lg-0">
                            <div class="product-details">
                                <h2><a><?php echo $get_product['0']['name']?></a></h2>
                                <span class="price">&#x20b9; <?php echo $get_product['0']['price']?></span>
								<p ng-repeat="ribbon in catalogEntryView.ribbons" ng-if="catalogEntryView.ribbons.length !== 0" class="quick-view-ribbon ng-scope">
								
											<span ng-repeat="ribbon in catelogEntry.promoContent | limitTo: 2" class="text-center ng-binding ng-scope" ng-attr-style="background:{{ribbon.color}}" style="background:#e9c456">TRY ON AVAILABLE</span>
                                </p>
								
							   <!-- <div class="product-info-stock-sku">
                                    <span class="product-stock-status">In Stock</span>
                                </div> -->

                                <!-- <p class="products-desc"><?php echo $get_product['0']['short_desc']?></p> -->
								
								<div class="product-info-stock-sku">
                                    <span class="product-stock-status">WEIGHT (G)  <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $get_product['0']['weight']?></span>
									
                                </div>	
								

                                <div class="product-quantity mt-5 d-flex align-items-center">
                                    <div class="quantity-field">
                                        <label for="qty">Qty</label>
                                        <input type="number" id="qty" name="qty" min="1" max="100" value="1"/>
                                    </div>

                                    <?php if (isset($_SESSION['name'])){ ?>
                                    <a href="cart.php" class="btn btn-add-to-cart" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')">Add to Cart</a>
                                    
                                </div>
								
								
								<div class="product-btn-group d-none d-sm-block">
                                    <a href="cart.php" class="btn btn-add-to-cart btn-whislist">Go to Cart</a>
                                </div>
								<?php } ?>
                            </div>
							
						
							
                        </div>
                        <!-- Product Details End -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Product Full Description Start -->
                            <div class="product-full-info-reviews">
                                <!-- Single Product tab Menu -->
                                <nav class="nav" id="nav-tab">
                                    <a class="active" id="description-tab" data-toggle="tab" href="#description">Description</a>
                                </nav>
                                <!-- Single Product tab Menu -->

                                <!-- Single Product tab Content -->
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="description">
                                        <p> <?php echo $get_product['0']['description']?> </p>

                                    </div>


                                </div>
                                <!-- Single Product tab Content -->
                            </div>
                            <!-- Product Full Description End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Product Page Content End -->
        </div>
    </div>
</div>
<!--== Page Content Wrapper End ==-->

<?php
	require('footer.inc.php');
?>