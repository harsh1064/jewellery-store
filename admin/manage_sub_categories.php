<?php
require('top.inc.php');
$sub_categories='';
$categories_id='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from sub_categories where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
        $sub_categories=$row['sub_categories'];
        $categories_id=$row['categories_id'];
	}else{
		header('location:sub_categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
    $sub_categories=get_safe_value($con,$_POST['sub_categories']);
    $categories_id=get_safe_value($con,$_POST['categories_id']);
	$res=mysqli_query($con,"select * from sub_categories where sub_categories='$sub_categories' && categories_id='$categories_id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="sub_categories already exist";
			}
		}else{
			$msg="sub_categories already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update sub_categories set categories_id='$categories_id',sub_categories='$sub_categories' where id='$id'");
		}else{
			mysqli_query($con,"insert into sub_categories(categories_id,sub_categories,status) values('$categories_id','$sub_categories','1')");
		}
		header('location:sub_categories.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Sub_Categories</strong><small> Form</small></div>
                        <form method="post">
							<div class="card-body card-block">



                            <div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
									<select class="form-control" name="categories_id">
										<option>Select Category</option>
										<?php
										$res=mysqli_query($con,"select id,categories from categories order by categories asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['categories']."</option>";
											}
											
										}
										?>
									</select>
								</div>


                                
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Sub_Categories</label>
									<input type="text" name="sub_categories" placeholder="Enter Sub_Categories name" class="form-control" required>
								</div>


							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>