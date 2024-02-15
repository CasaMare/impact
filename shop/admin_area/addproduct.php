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
                        <?php if(isset($_GET['success'])){ ?>
                            <div class="alert alert-success" role="alert">
                                Product was added
                            </div>
                        <?php } ?>
                        <?php if(isset($_GET['error'])){ ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['error']; ?>
                            </div>
                        <?php } ?>


                        <form action="functions/functions.php" id="contact-us" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input required type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input required type="text" name="description" id="description" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input required type="text" name="price" id="price" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="keywords" class="form-label">Keywords</label>
                                <input required type="text" name="keywords" id="keywords" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <input required type="file" name="photo" id="photo" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="brand" class="form-label">Select brand</label>
                                <select class="form-select" name="brand" id="brand">

                                        <?php getbrands(); ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="categ" class="form-label">Select categorie</label>
                                <select class="form-select" name="categ" id="categ">
                                   <?php getcats(); ?>
                                </select>
                            </div>
                            <button id="submit" name="addProduct" type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include $_SERVER["DOCUMENT_ROOT"]."/assets/parts/footer.php"; ?>