function add_to_cart(prd_id){

    $.ajax({
        url: "assets/functions/functions.php",
        type:"POST",
        data: {
            addcart: prd_id
        },
        success: function(response){
            alert('item was added to cart');
        },
        error: function(response){
            alert(response.statusText);
        }
    });
}

function delete_from_cart(id){

    $.ajax({
        url: "assets/functions/functions.php",
        type:"POST",
        data: {
            id: id,
            deleteItem: true
        },
        success: function(response){
            alert('item was deleted');
            window.location.href = "cart.php";
        },
        error: function(response){
            alert(response.statusText);
        }
    });
}

