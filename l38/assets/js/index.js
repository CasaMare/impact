function add_to_cart(pr_id){
	id = pr_id.replace("product_"," ");
	id = parseInt(id);
	$.ajax({
		url: "../functions/functions.php",
		type: "POST",
		data: {
			addcart: id,
		
		},
		success: function(response) {
			console.log(response);
			console.log("Product added to cart");
		}
	});
}

function search_prd(){
	text = document.getElementById("search_bar").value

	$.ajax({
		url: "../../functions/functions.php",
		type: "POST",
		data: {
			search: text,
		
		},
		success: function(response) {
			console.log(response);
			document.getElementById("product_list").innerHTML = response;
		
		}
	});
}
