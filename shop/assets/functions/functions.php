<?php




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

        echo
        <<<EOT
            <div class="col-4 mb-3">
                            <div class="card" style="width: 18rem;">
                                <img style="width:200px;" src="assets/images/$prd_img" class="card-img-top align-self-center" alt="...">
                                <div class="card-body d-flex flex-column" style="height: 300px;">
                                    <h5 class="card-title">$prd_title</h5>
                                    <p class="card-text">$prd_desc</p>
                                    <p class="card-text">Price: $prd_price</p>
                                    <a href="#" class=" mt-auto align-bottom btn btn-primary ">Add to cart</a>
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



function db_query(string $sql, string $type): array|bool
{
    if(!in_array($type,['select','insert','update','delete'])){
        throw new Exception('Invalid query type');
    }

    $conn = db_connection();

    $result = mysqli_query($conn, $sql, MYSQLI_USE_RESULT);

    if (!$result) {
        echo json_encode([
            "status" => "error",
            "message" => "Error: " . $sql . "<br>" . $conn->error
        ]);
        return false;
    }
    if('select' === $type){
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    return true;
}


function db_connection()
{
    /*
$servername = "localhost";
$username = "root";
$password = "";
$db="impact_test";*/

    $servername = "db4free.net";
    $username = "impact";
    $password = "1cIGrYFGNB";
    $db="impact";



    $conn = mysqli_connect($servername, $username, $password, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}