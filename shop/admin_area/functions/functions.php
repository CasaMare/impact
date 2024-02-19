<?php

include $_SERVER['DOCUMENT_ROOT'].'/assets/functions/db.php';

if(isset($_POST['addProduct'])){
//    var_dump($_POST); exit();
    addProduct();
}


if(isset($_POST['editProduct'])){
    editProduct();
}

if(isset($_POST['addCateg'])){
    $categ_name = htmlspecialchars($_POST['categ_name']);
    $id = time();
    $sql = "INSERT INTO categories values($id,'$categ_name')";
    if(!db_query($sql,'insert')){
        echo 'some error hapened';
    }else{
        header('Location: ../addcategory.php');
    }
}

if(isset($_POST['addBrand'])){
    $brand_name = htmlspecialchars($_POST['brand_name']);
    $id = time();
    $sql = "INSERT INTO brands values($id,'$brand_name')";
    if(!db_query($sql,'insert')){
        echo 'some error hapened';
    }else{
        header('Location: ../addbrand.php');
    }
}


function editProduct()
{
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $price = htmlspecialchars($_POST['price']);
    $keywords = htmlspecialchars($_POST['keywords']);
    $id = htmlspecialchars($_POST['prd_id']);
    $sql = "UPDATE products set prd_title='$title' where prd_id=$id";

    if(!db_query($sql, 'update')){
        header('HTTP/1.1 500 Internal Server Error');
    }
}


function addProduct()
{
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $price = htmlspecialchars($_POST['price']);
    $keywords = htmlspecialchars($_POST['keywords']);
    $brand = htmlspecialchars($_POST['brand']);
    $categ = htmlspecialchars($_POST['categ']);

    $img = uploadImage();
    if(!empty($img['error'])){
        header("Location: ../addproduct.php?error=".$img['error']);
    }
//    var_dump($img); exit();
    $file_name = $img['file_name'];

    $sql = "INSERT INTO products  VALUES (Null,'$categ','$brand','$title','$price','$description','$file_name','$keywords')";

    if(!db_query($sql, 'insert')){
        header('HTTP/1.1 500 Internal Server Error');
    }

    header("Location: ../addproduct.php?success=1");
}

function uploadImage(): array
{
    $response = [
        'file_name' => ''
    ];
    $img_name = $_FILES['photo']['name'];
    $img_size = $_FILES['photo']['size'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $error = $_FILES['photo']['error'];

    if ($error !== 0) {
        $response['error'] = "unknown error occurred!";
        return $response;
    }

    if ($img_size > 125000000) {
        $response['error'] = "Sorry, your file is too large.";
        return $response;
    }

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $allowed_exs = ["jpg", "jpeg", "png"];

    if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $img_upload_path = '../../assets/images/' . $new_img_name;

        if(!move_uploaded_file($tmp_name, $img_upload_path)){
            $response['error'] = "can't upload file";
            return $response;
        }
        $response['file_name'] = $new_img_name;
        return $response;
    } else {
        $response['error'] = "You can't upload files of this type";
        return $response;
    }

}

function getcats()
{
    $con = db_connection();

    $sql = "select * from categories";
    $row_cats = db_query($sql,'select');


    foreach ($row_cats as $item) {
        $cat_title = $item["cat_title"];
        $cat_id = $item["cat_id"];
        echo <<<EOT
              <option value="$cat_id">$cat_title</option>
        EOT;
    }
}


function getbrands()
{
    $con = db_connection();

    $sql = "select * from brands";
    $row_brands = db_query($sql, 'select');

    foreach ($row_brands as $item) {
        $brand_title = $item["brand_title"];
        $brand_id = $item["brand_id"];

        echo
        <<<EOT
            <option value="$brand_id">$brand_title</option>
        EOT;
    }
}


function get_products()
{

    $con =db_connection();

    $get_brands = "select * from products";
    $run_brands = mysqli_query($con, $get_brands);

    while ($row_brands = mysqli_fetch_array($run_brands)) {
        $prd_title = $row_brands["prd_title"];
        $prd_desc = $row_brands["prd_desc"];
        $prd_price = $row_brands["prd_price"];
        $prd_img = $row_brands["prd_img"];
        $prd_id= $row_brands["prd_id"];

        echo
        <<<EOT
            <div class="col-4 mb-3">
                            <div class="card" style="width: 18rem;">
                                <img style="width:200px;" src="assets/images/$prd_img" class="card-img-top align-self-center" alt="...">
                                <div class="card-body d-flex flex-column" style="height: 300px;">
                                    <h5 class="card-title">$prd_title</h5>
                                    <p class="card-text">$prd_desc</p>
                                    <p class="card-text">Price: $prd_price</p>
                                    <a href="edit_product.php?prd_id=$prd_id" class=" mt-auto align-bottom btn btn-success ">Edit</a>
                                    <a href="#" class=" mt-auto align-bottom btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
        EOT;
    }
}