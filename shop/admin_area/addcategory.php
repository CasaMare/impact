<?php include "php/header.php"; ?>
<?php include "php/nav.php"; ?>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-9">
                <div class="container">
                    <div class="row">
                        <form action="functions/functions.php" id="contact-us" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="form-label">Category name</label>
                                <input required type="text" name="categ_name" class="form-control">
                            </div>
                            <button id="submit" name="addCateg" type="submit" 
                            class="btn btn-primary">Add category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "php/footer.php"; ?>