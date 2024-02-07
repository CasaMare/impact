<?php
$con = mysqli_connect("localhost", "root", "", "electronix");

if (mysqli_connect_errno()) {
    echo "Failed to connect : " . mysqli_connect_error();
}

function count_brands($id)
{
    global  $con;
    $count_ob = "select count(prd_id) from products where prd_brand = $id ";
    $brands_run = mysqli_query($con, $count_ob);
    $row_brands = mysqli_fetch_array($brands_run);
    $num = $row_brands["count(prd_id)"];

    return $num;
}

function count_cat($id)
{
    global  $con;
    $count_ob = "select count(prd_id) from products where prd_cat = $id ";
    $cat_run = mysqli_query($con, $count_ob);
    $row_cat = mysqli_fetch_array($cat_run);
    $num = $row_cat["count(prd_id)"];

    return $num;
}

function getcats()
{
    global $con;

    $get_cats = "select * from categories";
    $run_cats = mysqli_query($con, $get_cats);


    while ($row_cats = mysqli_fetch_array($run_cats)) {
        $cat_title = $row_cats["cat_title"];
        $cat_id = $row_cats["cat_id"];
        $num = count_cat($cat_id);

        echo <<<EOT
        <a href="/admin_area/productlist.php/?cat=$cat_id">
        <li class='list-group-item d-flex justify-content-between align-items-center'>$cat_title
        <span class='badge badge-primary badge-pill'>$num</span>
        </li>
        </a>
        EOT;
    }
}

function getbrands()
{
    global $con;

    $get_brands = "select * from brands ";
    $run_brands = mysqli_query($con, $get_brands);

    while ($row_brands = mysqli_fetch_array($run_brands)) {
        $brand_title = $row_brands["brand_title"];
        $brand_id = $row_brands["brand_id"];
        $num = count_brands($brand_id);

        echo
        <<<EOT
        <a href="/admin_area/productlist.php/?brand=$brand_id">
        <li class='list-group-item d-flex justify-content-between align-items-center'>$brand_title
        <span class='badge badge-primary badge-pill'>$num</span>
        </li>
        </a>
        EOT;
    }
}

function getpro()
{
    global $con;
    if (isset($_GET["cat"])) {
        $cat_id = $_GET["cat"];
        $get_pro = "select * from products where prd_cat='$cat_id' ";
    }
    if (isset($_GET["brand"])) {
        $brand_id = $_GET["brand"];
        $get_pro = "select * from products where prd_brand='$brand_id' ";
    }
    if (!isset($_GET["cat"]) && !isset($_GET["brand"])) {
        $get_pro = "select * from products";
    }

    $run_pro = mysqli_query($con, $get_pro);

    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $product_id = $row_pro["prd_id"];
        $product_category = $row_pro["prd_cat"];
        $product_brand = $row_pro["prd_brand"];
        $product_title = $row_pro["prd_title"];
        $product_price = $row_pro["prd_price"];
        $product_image = $row_pro["prd_img"];


        echo
        <<<EOT
                        <div class="col-12 col-lg-4 col-xl-4">
							<div class="card">
								<img src="admin_area/product_images/$product_image" class="card-img-top" width="400" height="250"alt="...">
								<div class="card-body">
									<h5 class="card-title">$product_title</h5>
									<p class="card-text">$product_price</p> <a href="#" 
									class="btn btn-primary">Buy</a>
								</div>
							</div>
						</div>

            
EOT;
    }
}

function get_pro_cat()
{
    if (isset($_GET["cat"])) {
        $cat_id = $_GET["cat"];

        global $con;
        $get_pro_cat = "select * from products where prd_cat ='$cat_id' ";
        $run_pro_cat = mysqli_query($con, $get_pro_cat);
        $count_row = mysqli_num_rows($run_pro_cat);

        if ($count_row == 0) {
            echo "<script>alert('OUT OF STOCK')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }

        while ($row_pro_cat = mysqli_fetch_array($run_pro_cat)) {
            $product_id = $row_pro_cat["prd_id"];
            $product_category = $row_pro_cat["prd_cat"];
            $product_brand = $row_pro_cat["prd_brand"];
            $product_title = $row_pro_cat["prd_title"];
            $product_price = $row_pro_cat["prd_price"];
            $product_image = $row_pro_cat["prd_img"];

            /*echo "<img src = 'admin_area/product_images/$row_pro[prd_img]' height=110 width=90>";*/

            echo "
                    <div class='prod_box'>
            <div class='top_prod_box'></div>
            <div class='center_prod_box'>
              <div class='product_title'><a href='details.php?pro_id=$product_id'>$product_title</a></div>
              <div class='product_img'><a href='details.php?pro_id=$product_id'><img src='admin_area/product_images/$product_image' alt='' border='0' width='90' height='110' /></a></div>
              <div class='prod_price'><span class='price'>Rs $product_price</span></div>
            </div>
            <div class='bottom_prod_box'></div>
            <div class='prod_details_tab'> <a href='index.php?pro_id=$product_id' title='header=[Add to cart] body=[&nbsp;] fade=[on]''><img src='images/cart.gif' alt='' border='0' class='left_bt' /></a>
              <a href='details.php?pro_id=$product_id' class='prod_details'>details</a> </div>
          </div>";

        }
    }
}

function getpro_list()
{
    global $con;
    if (isset($_GET["cat"])) {
        $cat_id = $_GET["cat"];
        $get_pro = "select * from products where prd_cat='$cat_id' ";
    }
    if  (isset($_GET["brand"])) {
        $brand_id = $_GET["brand"];
        $get_pro = "select * from products where prd_brand='$brand_id' ";
    }
    if (!isset($_GET["cat"]) && !isset($_GET["brand"])){
        $get_pro = "select * from products";
    }

    $run_pro = mysqli_query($con, $get_pro);

            while ($row_pro = mysqli_fetch_array($run_pro)) {
                $product_id = $row_pro["prd_id"];
                $product_category = $row_pro["prd_cat"];
                $product_brand = $row_pro["prd_brand"];
                $product_title = $row_pro["prd_title"];
                $product_price = $row_pro["prd_price"];
                $product_image = $row_pro["prd_img"];


                echo
                <<<EOT
                        <div class="col-12 col-lg-4 col-xl-4">
							<div class="card">
								<img src="/admin_area/product_images/$product_image" class="card-img-top" width="400" height="250"alt="...">
								<div class="card-body">
									<h5 class="card-title">$product_title</h5>
									<p class="card-text">$product_price</p> 
									<a href="/admin_area/assets/php/edit_product.php/?id=$product_id" 
									class="btn btn-primary">Edit</a>
									
									<button class="btn btn-danger" onclick="del_pro($product_id)">Delete</button>
									
								</div>
							</div>
						</div>
EOT;
            }

}
function get_cat_option(){
    global $con;

    $get_cats = "select * from categories";
    $run_cats = mysqli_query($con, $get_cats);


    while ($row_cats = mysqli_fetch_array($run_cats)) {
        $cat_title = $row_cats["cat_title"];
        $cat_id = $row_cats["cat_id"];
       

        echo <<<EOT
        <option value=$cat_id>$cat_title</option>
        EOT;
    }
}

function get_brands_options(){

    global $con;

    $get_brands = "select * from brands ";
    $run_brands = mysqli_query($con, $get_brands);

    while ($row_brands = mysqli_fetch_array($run_brands)) {
        $brand_title = $row_brands["brand_title"];
        $brand_id = $row_brands["brand_id"];
        
        echo
        <<<EOT
        <option value="$brand_id">$brand_title </option>
        EOT;
    }
}


?>