<?php include "php/header.php"; ?>
<?php include "php/nav.php"; ?>

<?php

$id  = $_GET['prd_id'];

$sql = "SELECT * FROM products where prd_id = '$id'";

if(!$item = db_query($sql,'select')){
    throw new Exception('some error happend');
}


$prd_title = $item[0]["prd_title"];
$prd_brand = $item[0]["prd_brand"];
$prd_cat = $item[0]["prd_cat"];
$prd_price = $item[0]["prd_price"];
$prd_desc = $item[0]["prd_desc"];
$prd_keyword = $item[0]["prd_keyword"];
$prd_id = $item[0]["prd_id"];

?>
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
                                <input value="<?php echo $prd_title; ?>" required type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input value="<?php echo $prd_desc; ?>" required type="text" name="description" id="description" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input value="<?php echo $prd_price; ?>" required type="text" name="price" id="price" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="keywords" class="form-label">Keywords</label>
                                <input value="<?php echo $prd_keyword; ?>" required type="text" name="keywords" id="keywords" class="form-control" >
                            </div>
                            <input value="<?php echo $prd_id; ?>" type="hidden" name="prd_id" >
                            <button id="submit" name="editProduct" type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "php/footer.php"; ?>