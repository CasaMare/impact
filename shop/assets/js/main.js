function add_to_cart(prd_id){

    $.ajax({
        url: "assets/functions/functions.php",
        type:"POST",
        data: {
            addcart: prd_id
        },
        succes: function(response){
            alert('success');
        }
    });
}
