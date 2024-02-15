<?php include "assets/php/header.php"; ?>
<?php include "assets/php/nav.php"; ?>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
                <ul class="list-group">
                    <li class="list-group-item bg-dark text-white">Categories</li>
                    <?php getcats();?>
                </ul>
                <br>
                <ul class="list-group">
                    <li class="list-group-item bg-dark text-white">Brands</li>
                    <?php getbrands();?>
                </ul>
            </div>
            <div class="col-9">
                <div class="container">
                    <div class="row">
                        <?php get_products();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
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
</script>
<?php include "assets/php/footer.php"; ?>