<?php


if(isset($_POST['addProduct'])){
//    var_dump($_POST); exit();
    addProduct();
}


if(isset($_POST['editProduct'])){
    editProduct();
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
    $servername = "db4free.net";
    $username = "impact";
    $password = "1cIGrYFGNB";
    $db="impact";

    $con = mysqli_connect($servername, $username, $password, $db);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}