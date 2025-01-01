<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from feedback where fid='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from feedback order by fid desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Feedback </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>ID</th>
							   <th>Name</th>
							   <th>Feedback</th>
							   
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							while($row=mysqli_fetch_assoc($res)){


								$result1 = $con->query('SELECT `name` FROM `user_info` WHERE `id` = "'.$row['uid'].'"');

                                $ord = $result1->fetch_assoc();
								
								
								?>
							<tr>
							   <td><?php echo $row['fid']?></td>
							   <td><?php echo $ord['name']?></td>
							   <td><?php echo $row['message']?></td>
							 
							   <td>
								<?php
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['fid']."'>Delete</a></span>";
								?>
							   </td>
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