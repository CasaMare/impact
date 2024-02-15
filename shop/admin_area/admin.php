<?php include $_SERVER["DOCUMENT_ROOT"]."/assets/parts/header.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/admin_area/parts/nav.php"; ?>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
               
            </div>
            <div class="col-9">
                <div class="container">
                    <div class="row">
                        <?php  get_products(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include $_SERVER["DOCUMENT_ROOT"]."/assets/parts/footer.php"; ?>