<?php
    require('header.inc.php');
	
?>

<!--== Banner // Slider Area Start ==-->
<section id="banner-area">
    <div class="ruby-container">
        <div class="row">
            <div class="col-lg-12">
                <div id="banner-carousel" class="owl-carousel">
                    <!-- Banner Single Carousel Start -->
                    <div class="single-carousel-wrap slide-item-1">
                        <div class="banner-caption text-center text-lg-left">
                            <h4>Jewellery Store</h4>
                            <h2>Ring Solitaire Princess</h2>
                            
                            <a href="#" class="btn-long-arrow">Shop Now</a>
                        </div>
                    </div>
                    <!-- Banner Single Carousel End -->

                    <!-- Banner Single Carousel Start -->
                    <div class="single-carousel-wrap slide-item-2">
                        <div class="banner-caption text-center text-lg-left">
                            <h4>New Collection 2022</h4>
                            <h2>Beautiful Earrings</h2>
                            
                            <a href="#" class="btn-long-arrow">Shop Now</a>
                        </div>
                    </div>
                    <!-- Banner Single Carousel End -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Banner Slider End ==-->

<!--== About Us Area Start ==-->
<section id="aboutUs-area" class="pt-9">
    <div class="ruby-container">
        <div class="row">
            <div class="col-lg-6">
                <!-- About Image Area Start -->
                <div class="about-image-wrap">
                    <a href="about.html"><img src="assets/img/about-img.jpg" alt="About Us" class="img-fluid"/></a>
                </div>
                <!-- About Image Area End -->
            </div>

            <div class="col-lg-6 m-auto">
                <!-- About Text Area Start -->
                <div class="about-content-wrap ml-0 ml-lg-5 mt-5 mt-lg-0">
                    <h2>About Us</h2>
                    <h3>WE ARE VISIONARY</h3>
                    <div class="about-text">
                    <p>We are hear to connect you with our collection. We ensure that you like this products 
                           and connect with us for lifetime. </p>

                        <p>To improve and enrich lives everywhere by offering extraordinary lifestyle solutions
                           backed by incomparable value addition and innovation, adhering to globally approved 
                           processes and norms and creating a successful value - chain for our associates</p>

                    </div>
                </div>
                <!-- About Text Area End -->
            </div>
        </div>
    </div>
</section>

<section id="new-products-area" class="p-9">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2>New Products</h2>
                    <p>Trending stunning Unique</p>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="products-wrapper">
                    <div class="new-products-carousel owl-carousel">
<!--========================================================================================================-->
                  
						<?php
							$get_product=get_product($con);
							foreach($get_product as $list){
						?>

                        <!-- Single Product Item --> 
                        <div class="single-product-item text-center">
						
						    <figure class="product-thumb">
                                <a href="product.php?id=<?php echo $list['id']?>">
									<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" 	alt="Products"	class="img-fluid">
								</a>
                            </figure>
                                    
                            <div class="product-details">
                                <h2><a><?php echo $list['name']?></a></h2>
                                <span class="price">&#x20b9; <?php echo $list['price']?></span>
																<span ng-repeat="ribbon in catelogEntry.promoContent | limitTo: 2" class="text-center ng-binding ng-scope" ng-attr-style="background:{{ribbon.color}}" style="background:#e9c456">TRY ON AVAILABLE</span>
                               <!-- <a href="single-product.html" class="btn btn-add-to-cart">+ Add to Cart</a> -->
								<a href="product.php?id=<?php echo $list['id']?>" class="btn btn-add-to-cart">Quick View</a>
                                <span class="product-bedge">New</span>
                            </div>
						</div>	
						
					   <?php } ?>
						<!--End Single Product Item -->
<!--=====================================================================================================================-->
                
					</div>
				</div>
			</div>
		</div>
</section>
<!--== New Products Area End ==-->




<?php
   require('footer.inc.php');
?>

