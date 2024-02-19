<?php include "assets/parts/header.php"; ?>
<?php include "assets/parts/nav.php"; ?>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <?php //gen_product_cart(); ?>
                    <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Cnt</th>
                                <th scope="col">Total price</th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php gen_product_cart(); ?>
                                
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "assets/parts/footer.php"; ?>