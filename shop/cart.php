<?php include "assets/php/header.php"; ?>
<?php include "assets/php/nav.php"; ?>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
               
            </div>
            <div class="col-9">
                <div class="container">
                    <div class="row">
                        <?php //gen_product_cart(); ?>
                    <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
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
<?php include "assets/php/footer.php"; ?>