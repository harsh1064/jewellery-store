<?php
require('header.inc.php');

$price_high_selected="";
$price_low_selected="";
$new_selected="";
$old_selected="";
$sort_order="";

if(isset($_GET['sort'])){
    $sort=mysqli_real_escape_string($con,$_GET['sort']);
    if($sort=="price_high"){
        $sort_order="order by product.price desc ";
        $price_high_selected="selected";
    }
    if($sort=="price_low"){
        $sort_order="order by product.price asc ";
        $price_low_selected="selected";
    }
    if($sort=="new"){
        $sort_order="order by product.id desc ";
        $new_selected="selected";
    }
    if($sort=="old"){
        $sort_order="order by product.id asc ";
        $old_selected="selected";
    }
}

if(isset($_GET['id']) && $_GET['id']!=''){
	$cat_id=mysqli_real_escape_string($con,$_GET['id']);
	if($cat_id>0){
		$get_product=get_product($con,'',$cat_id,'','',$sort_order);
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

<!--== Search Box Area Start ==-->

<!--== Search Box Area End ==-->

<!--== Page Title Area Start ==-->
<div id="page-title-area">


<div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Shop</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#" class="active">Shop</a></li>
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
            <!-- Shop Page Content Start -->
			<?php if(count($get_product)>0){?>
            <div class="col-lg-12">
                <div class="shop-page-content-wrap">
                    <div class="products-settings-option d-block d-md-flex ">
                        <div class="product-cong-left d-flex align-items-center">
                            <ul class="product-view d-flex align-items-center">
                                <li class="current row-gird"><i class="fa fa-bars fa-rotate-90"></i></li>
       <!-- <li class="box-gird"><i class="fa fa-th"></i></li>-->
       
                            </ul>
                            <!-- <span class="show-items">Items 1 - 9 of 17</span> -->
                        </div>

                        <div class="product-sort_by d-flex align-items-center mt-3 mt-md-0">
                            <label for="sort">Sort By:</label>
                            <select class="ht_select" onchange="sort_product_drop('<?php echo $cat_id?>',
                            '<?php echo SITE_PATH?>')" id="sort_product_id">
                                <option value="">Default Softing</option>
                                <option value="price_low" <?php echo $price_low_selected?>>
                                Sort by price low to high</option>
                                <option value="price_high" <?php echo $price_high_selected?>>
                                Sort by price high to low</option>
                                <option value="new" <?php echo $new_selected?>>
                                Sort by new first</option>
                                <option value="old" <?php echo $old_selected?>>
                                Sort by old first</option>
                            </select>
                            <!-- <select name="sort" id="sort">
                                <option value="Position">Relevance</option>
                                <option value="Name Ascen">Name, A to Z</option>
                                <option value="Name Decen">Name, Z to A</option>
                                <option value="Price Ascen">Price low to heigh</option>
                                <option value="Price Decen">Price heigh to low</option>
                            </select> -->
                        </div>
                    </div>

                    <div class="shop-page-products-wrap">
                        <div class="products-wrapper">
                            <div class="row">
									
							
									<?php
										foreach($get_product as $list){
									?>

                                    <!-- Single Product Item -->
									<div class="col-lg-3 col-sm-6 ">
										<div class="single-product-item text-center   m-2">
													<figure class="product-thumb">
														<a href="product.php?id=<?php echo $list['id']?>">
														<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>"  alt="Products" class="img-fluid">
														</a>
													</figure>

											<div class="product-details">
														<h2><a><?php echo $list['name']?></a></h2>
														<span class="price">&#x20b9; <?php echo $list['price']?></span>
														<p class="products-desc">Ideal for cold-weathered training worked loremoutdoors, the Chaz Hoodie promises superior warmth with every wear.Thick material blocks out the wind as ribbed cuffs and bottom band sealin body heat.</p>
														<span ng-repeat="ribbon in catelogEntry.promoContent | limitTo: 2" class="text-center ng-binding ng-scope" ng-attr-style="background:{{ribbon.color}}" style="background:#e9c456">TRY ON AVAILABLE</span>
													<!--	<a href="single-product.html" class="btn btn-add-to-cart">+ Add to Cart</a> -->
													<a href="product.php?id=<?php echo $list['id']?>" class="btn btn-add-to-cart">Quick View</a>
														<span class="product-bedge">New</span>
											</div>
											
														<span class="product-bedge">New</span>
										</div>
									</div>
									<?php } ?>
                                    <!--  END Single Product Item -->                          
                            </div>
                            
                        </div>
                    </div>
                 </div>    
                    <div class="products-settings-option d-block d-md-flex">
                        <nav class="page-pagination">
                            <ul class="pagination">
                                <li><a href="#" aria-label="Previous">&laquo;</a></li>
                                <li><a class="current" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#" aria-label="Next">&raquo;</a></li>
                            </ul>
                        </nav>

                        <div class="product-per-page d-flex align-items-center mt-3 mt-md-0">
                            <label for="show-per-page">Show Per Page</label>
                            <select name="sort" id="show-per-page">
                                <option value="9">9</option>
                                <option value="15">15</option>
                                <option value="21">21</option>
                                <option value="6">27</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shop Page Content End -->
			<?php } else { 
						echo "Data not found";
					} ?>
		</div>
    </div>
</div>
<!--== Page Content Wrapper End ==-->

<?php
 require('footer.inc.php');
?>