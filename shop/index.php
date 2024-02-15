<?php include "assets/parts/header.php"; ?>
<?php include "assets/parts/nav.php"; ?>
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
<?php include "assets/parts/footer.php"; ?>