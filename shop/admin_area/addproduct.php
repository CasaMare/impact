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
                    <form id="contact-us" method="post">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input required type="text" class="form-control" id="title">
                        </div>
                        <div class="mb-3">
                            <label required for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input required type="text" class="form-control" id="price">
                        </div>
                        <div class="mb-3">
                            <label for="keywords" class="form-label">Keywords</label>
                            <input required type="text" class="form-control" id="keywords" >
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input required type="file" class="form-control" id="photo" >
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Select brand</label>
                            <select class="form-select" aria-label="Default select example">
                            
                                    <?php getbrands(); ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="photo" class="form-label">Select categorie</label>
                            <select class="form-select" aria-label="Default select example">
                               <?php getcats(); ?>  
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "php/footer.php"; ?>