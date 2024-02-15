<?php

include 'db.php';

if(isset($_POST['addcart'])){
    addToCart();
}

function addToCart(){
    $prd_id = htmlspecialchars($_POST['addcart']);
    //id, prd_id, cnt
    $sql = "INSERT INTO cart VALUES(null,$prd_id,1)";
    if(!db_query($sql,'insert')){
        header("HTTP/1.1 400 fail");
        echo 'error';
    }else{
        echo 'ok';
    }
}

function gen_product_cart()
{

    $sql = "select * from products where prd_id in (select prd_id from cart)";
    $run_getitems = db_query($sql,'select');

   // var_dump($run_getitems);

        $aux = 0;

        foreach ($run_getitems as $row_pro) {
            $product_id = $row_pro["prd_id"];
            $product_category = $row_pro["prd_cat"];
            $product_brand = $row_pro["prd_brand"];
            $product_title = $row_pro["prd_title"];
            $product_price = $row_pro["prd_price"];
            $product_image = $row_pro["prd_img"];

       /*     $get_q = "select qty from cart where p_id ='$product_id'";
            $q_result = mysqli_query($con, $get_q);
            $q = mysqli_fetch_array($q_result)["qty"];*/

           // $aux = $aux + 1;
           echo <<<EOT
           <tr>
           <th scope="row">1</th>
           <td>$product_title</td>
           <td>Otto</td>
           <td>@mdo</td>
           </tr>  
       EOT;
        }
    
}

if(isset($_POST['addContactUs'])){
    addContactUs();
}

function addContactUs()
{
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $created_at = time();

    $sql = "INSERT INTO contactus  VALUES (Null,'$name','$email','$phone','$created_at')";

    if(!db_query($sql, 'insert')){
        header('HTTP/1.1 500 Internal Server Error');
    }

}

function count_brands($id){
    $con = db_connection();
    $count_ob = "select count(prd_id) from products where prd_brand = $id ";
    $brands_run = mysqli_query($con, $count_ob);
    $row_brands = mysqli_fetch_array($brands_run);
    $num = $row_brands["count(prd_id)"];

    return $num;
}

function count_cat($id){
    $con = db_connection();
    $count_ob = "select count(prd_id) from products where prd_cat = $id ";
    $cat_run = mysqli_query($con, $count_ob);
    $row_cat = mysqli_fetch_array($cat_run);
    $num = $row_cat["count(prd_id)"];

    return $num;
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
                                    <a onclick="add_to_cart($prd_id);" href="#" class=" mt-auto align-bottom btn btn-primary ">Add to cart</a>
                                </div>
                            </div>
                        </div>
        EOT;
    }
}


function getcats()
{
    $con = db_connection();

    $get_cats = "select * from categories";
    $run_cats = mysqli_query($con, $get_cats);


    while ($row_cats = mysqli_fetch_array($run_cats)) {
        $cat_title = $row_cats["cat_title"];
        $cat_id = $row_cats["cat_id"];
        echo <<<EOT
        <a style="text-decoration: none;" href="/?cat=$cat_id">
        <li class="list-group-item">$cat_title</li>
        </a>
        EOT;
    }
}


function getbrands()
{
    $con =db_connection();

    $get_brands = "select * from brands";
    $run_brands = mysqli_query($con, $get_brands);

    while ($row_brands = mysqli_fetch_array($run_brands)) {
        $brand_title = $row_brands["brand_title"];
        $brand_id = $row_brands["brand_id"];
        $num = count_brands($brand_id);

        echo
        <<<EOT
        
        <a style="text-decoration: none;" href="../?brand=$brand_id">
        <li class="list-group-item">$brand_title</li>
        </a>
        EOT;
    }
}