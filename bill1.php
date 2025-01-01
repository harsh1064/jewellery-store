<?php
require 'connection.php';
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: order_master.php');
    exit;
}
$id = (int) $_GET['id'];

$result = $con->query('SELECT * FROM `order_detail` WHERE `id` = '.$id);
$total_items = $result->num_rows;

$order = $con->query('SELECT * FROM `order` WHERE `id` = '.$id)
              ->fetch_assoc();

$user = $con->query('SELECT * FROM `user_info` WHERE `id` = '.$order['user_id'])
              ->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
    $title = 'All Orders | Admin';
   // require 'include/head.php';
?>
</head>

<body id="page-top">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Order Items </h1>
            <!--<a href="category-add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            	<i class="fa fa-plus-circle"></i> Create New
            </a>-->
          </div>

          <!-- Content Row -->
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="form-group m-t-40">
                        <?php
                        if (!isset($_SESSION['msg']) || $_SESSION['msg'] == '') {
                        } else {
                            ?>
				        <div class="alert alert-<?=$_SESSION['msg']['type']?> alert-dismissable">
					        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					        <?=$_SESSION['msg']['msg']?>
				        </div>
                        <?php
                            $_SESSION['msg'] = '';
                            unset($_SESSION['msg']);
                        }
                        ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Bill no. SW<?php echo str_pad($_GET['id'],"8","0",STR_PAD_LEFT); ?><br> 
                                Order ID: <?=$id?><br>
                                Name: <?=ucwords($user['name'])?><br>
                                Address: <?=ucwords($order['address'])?><br>
                                Mobile No: <?=$user['mo_number']?><br>
                                Total amount: ₹ <?=$order['total_price']?>
                            </h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,
									product.name,product.image,`order`.address,`order`.city,`order`.pincode 
									from order_detail,product ,`order` where order_detail.order_id='$id'
									 and  order_detail.product_id=product.id GROUP by order_detail.id");
									$total_price=0;
									
									$userInfo=mysqli_fetch_assoc(mysqli_query($con,"select * from `order` 
									where id='$id'"));
									
									$address=$userInfo['address'];
									$city=$userInfo['city'];
									$pincode=$userInfo['pincode'];
									
									while($row=mysqli_fetch_assoc($res)){
									
									$total_price=$total_price+($row['qty']*$row['price']);
									?>
									<tr>
                                        
										<td class="product-name"> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
										<td class="product-name"><?php echo $row['name']?></td>
										<td class="product-name"><?php echo $row['qty']?></td>
										<td class="product-name"><?php echo $row['price']?></td>
										
									</tr>
									<?php } ?>
									<tr>
										<td colspan="3"></td>
										<td class="product-name">Total Price:</td>
										<td class="product-name"><?php echo $total_price?></td>
										
									</tr>
								</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

</body>

</html>

<script>
  window.print();
</script>

