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

// search products
if (isset($_POST["search"])) {
    search_products();
}

function search_products()
{
    if (isset($_POST["search"])) {

        $query = $_POST['search'];

        global $con;
        $search_products = "SELECT * FROM products WHERE (`prd_title` LIKE '%" . $query . "%') OR (`prd_keyword` LIKE '%" . $query . "%')";
        $run_pro_cat = mysqli_query($con, $search_products);
        $count_row = mysqli_num_rows($run_pro_cat);
        

        if ($count_row > 0) {
            while ($row_pro_cat = mysqli_fetch_array($run_pro_cat)) {
                $product_id = $row_pro_cat["prd_id"];
                $product_category = $row_pro_cat["prd_cat"];
                $product_brand = $row_pro_cat["prd_brand"];
                $product_title = $row_pro_cat["prd_title"];
                $product_price = $row_pro_cat["prd_price"];
                $product_image = $row_pro_cat["prd_img"];

                echo <<<EOT
                <div class="col-12 col-lg-4 col-xl-4">
                <div class="card">
                    <img src="admin_area/product_images/$product_image" class="card-img-top" width="400" height="250"alt="...">
                    <div class="card-body">
                        <h5 class="card-title">$product_title</h5>
                        <p class="card-text">$product_price</p> <button onclick = "add_to_cart(this.id)"
                        class="btn btn-primary"id="product_$product_id" >Buy this product</button>
                    </div>
                </div>
            </div>
          EOT;
            }
        } else {
            echo "No results";
        }
    }
}

//getting categories
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
        <a href="../?cat=$cat_id">
        <li class='list-group-item d-flex justify-content-between align-items-center'>$cat_title
        <span class='badge badge-primary badge-pill'>$num</span>
        </li>
        </a>
        EOT;
    }
}
// counting brands


//getting brands
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
        <a href="../?brand=$brand_id">
        <li class='list-group-item d-flex justify-content-between align-items-center'>$brand_title
        <span class='badge badge-primary badge-pill'>$num</span>
        </li>
        </a>
        EOT;
    }
}


//getting products randomly
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
									<p class="card-text">$product_price</p> <button onclick = "add_to_cart(this.id)"
									class="btn btn-primary"id="product_$product_id" >Buy this product</button>
								</div>
							</div>
						</div>

            
EOT;
    }
}


//details data
function details()
{
    global $con;

    if (isset($_GET["pro_id"])) {
        $prod_id = $_GET["pro_id"];
        $get_pro = "select * from products where prd_id = '$prod_id'";
        $run_pro = mysqli_query($con, $get_pro);

        while ($row_pro = mysqli_fetch_array($run_pro)) {
            $product_id = $row_pro["prd_id"];
            $product_description = $row_pro["prd_desc"];
            $product_brand = $row_pro["prd_brand"];
            $product_title = $row_pro["prd_title"];
            $product_price = $row_pro["prd_price"];
            $product_image = $row_pro["prd_img"];

            echo "
     
                     <div class='center_title_bar'>$product_title</div>
                     <div class='prod_box_big'>
            <div class='top_prod_box_big'></div>
            <div class='center_prod_box_big'>
              <div class='product_img_big'> <a href='javascript:popImage('admin_area/product_images/$product_image','Some Title')' title='header=[<img src=admin_area/product_images/$product_image>] body=[&nbsp;] fade=[on]'><img src='admin_area/product_images/$product_image' height=200 width=185 alt='' border='0' /></a>
                </div>
              <div class='details_big_box'>
                <div class='product_title_big'>$product_title</div>
                <div class='specifications'>
                $product_description
                </div>
                <div class='prod_price_big'> <span class='price'>Rs $product_price</span></div>
                <a href='details.php?addcart=$product_id' class='addtocart'>add to cart</a> <a href='index.php' class='compare'>Home</a> </div>
            </div>
            <div class='bottom_prod_box_big'></div>
          </div>
    
        ";
        }
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



//special producr,whats new
function special()
{
    global $con;
    $get_pro = "select * from products order by RAND() LIMIT 0,1";
    $run_pro = mysqli_query($con, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $product_id = $row_pro["prd_id"];
        $product_title = $row_pro["prd_title"];
        $product_image = $row_pro["prd_img"];
        $product_price = $row_pro["prd_price"];

        echo "
        <div class='border_box'>
        <div class='product_title'>$product_title</div>
        <div class='product_img'><a href='details.php?pro_id=$product_id'><img src='admin_area/product_images/$product_image' alt='' border='0' width=90 height=110 /></a></div>
        <div class='prod_price'> <span class='price'>Rs $product_price</span></div>
      </div>
        ";
    }
}

function getpro_list()
{
    if (!isset($_GET["cat"])) {
        if (!isset($_GET["brand"])) {
            global $con;

            $get_pro = "select * from products ";
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
								<img src="product_images/$product_image" class="card-img-top" width="400" height="250"alt="...">
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
    }
}


function getip()
{
    $ip = $_SERVER["REMOTE_ADDR"];

    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }

    return $ip;
}
if (isset($_POST["addcart"])) {
    cart();
}

function cart()
{

    global $con;
    $ip = getip();
    $pro_id = $_POST["addcart"];

    $insertpro = "insert into cart (p_id,ip_add,qty) values ('$pro_id','$ip','1')";
    $run_insertpro = mysqli_query($con, $insertpro);
    echo $ip;

    echo "succes";
}


function total_items()
{
    if (isset($_GET["addcart"])) {
        global $con;

        $ip = getip();

        $getitems = "select * from cart where ip_add = '$ip'";
        $run_getitems = mysqli_query($con, $getitems);

        $count_items = mysqli_num_rows($run_getitems);
    } else {
        global $con;

        $ip = getip();

        $getitems = "select * from cart where ip_add = '$ip'";
        $run_getitems = mysqli_query($con, $getitems);

        $count_items = mysqli_num_rows($run_getitems);
    }

    echo $count_items;
}

function total_price()
{
    $total = 0;
    global $con;

    $ip = getip();

    $price = "select * from cart where ip_add = '$ip'";

    $run_price = mysqli_query($con, $price);

    while ($pprice = mysqli_fetch_array($run_price)) {
        $pro_id = $pprice["p_id"];

        $prod_price = "select * from products where prd_id = '$pro_id'";

        $run_pro_price = mysqli_query($con, $prod_price);

        while ($ppprice = mysqli_fetch_array($run_pro_price)) {
            $product_price = [$ppprice["prd_price"]];

            $price_sum = array_sum($product_price);

            $total += $price_sum;

            //echo  $product_price;
        }
    }

    echo $total . "&nbsp;Rs";
}

function gen_product_cart()
{

    global $con;

    $getitems = " select * from products where prd_id in (select p_id from cart)";
    $run_getitems = mysqli_query($con, $getitems);
    if (mysqli_num_rows($run_getitems) > 0) {
        $aux = 0;

        while ($row_pro = mysqli_fetch_array($run_getitems)) {
            $product_id = $row_pro["prd_id"];
            $product_category = $row_pro["prd_cat"];
            $product_brand = $row_pro["prd_brand"];
            $product_title = $row_pro["prd_title"];
            $product_price = $row_pro["prd_price"];
            $product_image = $row_pro["prd_img"];

            $get_q = "select qty from cart where p_id ='$product_id'";
            $q_result = mysqli_query($con, $get_q);
            $q = mysqli_fetch_array($q_result)["qty"];

            $aux = $aux + 1;
            echo
            <<<EOT
<tr>
                                                <th scope="row">$aux</th>
                                                <td>$product_title</td>
                                                <td>$q</td>
                                                <td>$product_price</td>
                                                <td name="bstable-actions"><div class="btn-group pull-right">
                                                        
                                                        <button id="bDel" type="button" class="btn btn-sm btn-default">
                                                            <span class="fa fa-trash"> </span>
                                                        </button>
                                                        <button id="bPlus" type="button" class="btn btn-sm btn-default" ">
                                                            <span class="fa fa-plus"> </span>
                                                        </button>
                                                        <button id="bMinus" type="button" class="btn btn-sm btn-default" >
                                                            <span class=" fa fa-minus"> </span>
                                                        </button>
                                                    </div></td></tr>

            
EOT;
        }
    }
}

function get_pay()
{
    $total = 0;
    global $con;

    $price = "select * from cart ";
    $number = "select count(p_id) from cart";
    $result = mysqli_query($con, $number);
    $pr_count = mysqli_fetch_array($result)["count(p_id)"];

    $run_price = mysqli_query($con, $price);

    while ($pprice = mysqli_fetch_array($run_price)) {
        $pro_id = $pprice["p_id"];

        $prod_price = "select * from products where prd_id = '$pro_id'";

        $run_pro_price = mysqli_query($con, $prod_price);

        while ($ppprice = mysqli_fetch_array($run_pro_price)) {
            $product_price = [$ppprice["prd_price"]];

            $price_sum = array_sum($product_price);

            $total += $price_sum;

            //echo  $product_price;
        }
    }

    echo
    <<<EOT
                        
				<div class="card radius-15">
                    <div class="card-body">
                         <div class="card-title">
                             <h4 class="mb-0">Pay</h4>
								<div class="card-body">
								    <ul class="list-group">
                                        <li class='list-group-item d-flex justify-content-between align-items-center'>Producs Amount
                                            <span class='badge badge-primary badge-pill'>$pr_count</span>
                                        </li>
                                        <li class='list-group-item d-flex justify-content-between align-items-center'>Total Cost
                                            <span class='badge badge-primary badge-pill'>$total</span>
                                        </li>
									
                                    </ul>
                                    </br>
                                    <a href="#" class="btn btn-primary">Pay</a>							
							</div>
						</div>
					</div>
				</div>				            
EOT;
}
