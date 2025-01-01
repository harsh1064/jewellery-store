<?php
require('top.inc.php');

$sql="select * from user_info order by id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Order Master </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
				   <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Order ID</th>
                                                <th class="product-name"><span class="nobr">Order Date</span></th>
                                                <th class="product-price"><span class="nobr"> Address </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
												<th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
												<th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
												<th class="text-nowrap">Bill</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											$res=mysqli_query($con,"select `order`.*,order_status.name as order_status
											from `order`,order_status where order_status.id=`order`.order_status");
											// $user_id=$_SESSION['USER_ID'];

											// $res=mysqli_query($con,"select `order`.*,order_status.name as 
                                            // order_status from `order`,order_status where `order`.user_id='$user_id'
                                            //  and order_status.id=`order`.order_status");

											//$res=mysqli_query($con,"select * from `order` where user_id='$user_id'");
											while($row=mysqli_fetch_assoc($res)){
											?>
                                            <tr>
												<td class="product-add-to-cart"><a href="order_master_detail.php?id=<?php 
                                                echo $row['id']?>"> <?php echo $row['id']?></a></td>
                                                <td class="product-name"><?php echo $row['added_on']?></td>
                                                <td class="product-name">
												<?php echo $row['address']?><br/>
												<?php echo $row['city']?><br/>
												<?php echo $row['pincode']?>
												</td>
												<td class="product-name"><?php echo $row['payment_type']?></td>
												<td class="product-name"><?php echo $row['payment_status']?></td>
												<td class="product-name"><?php echo $row['order_status']?></td>
												<td class="text-nowrap"><a class="btn btn-outline-success" 
												    target="_blank" href="bill.php?id=<?php  echo $row['id'];?>" >Print</a></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>



<?php
require('footer.inc.php');
?>
