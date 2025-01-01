function manage_cart(pid,type){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			if(type=='update' || type=='remove'){
				window.location.href='cart.php';
			}
			jQuery('.count').html(result);
		}	
	});	
}

function sort_product_drop(cat_id,site_path) {
	var sort_product_id=jQuery('#sort_product_id').val();
	window.location.href=site_path+"/cat_product.php?id="+cat_id+"&sort="+sort_product_id;
	//alert(sort_product_id);
}