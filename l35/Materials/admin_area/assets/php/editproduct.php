<?php include "functions_admin.php" ?>
<?php
$id  = $_GET['id'];

$con = mysqli_connect("localhost", "root", "", "electronix");

echo $id;
$sql = "SELECT * FROM products where prd_id = '$id'";

$run_pro = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($run_pro)) {
    echo "ds";
    $prd_title = $row["prd_title"];
    $prd_brand = $row["prd_brand"];
    $prd_cat = $row["prd_cat"];
    $prd_price = $row["prd_price"];
    $prd_desc = $row["prd_desc"];
    $prd_keyword = $row["prd_keyword"];
}
echo $prd_title;
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <title>Edit product</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <?php
            include "header.php"
            ?>
        </header>
        <div class="nav-container">
            <?php
            include "nav.php"
            ?>
        </div>
        <div class="page-wrapper">
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pr-3">Product Info</div>
                        <div class="pl-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Product Info</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0">General Data</h4>
                            </div>
                            <hr />
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Name" value="<?php echo htmlspecialchars($prd_title) ?>" id="name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Price" value="<?php echo htmlspecialchars($prd_price) ?>" id="price">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Description" value="<?php echo htmlspecialchars($prd_desc) ?>" id="description">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Key words" value="<?php echo htmlspecialchars($prd_keyword) ?> " id="key_words">
                            </div>
                        </div>
                    </div>
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0">Image</h4>
                            </div>
                            <hr />
                            <form>
                                <input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card radius-15">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="mb-0">Brand and Categories</h4>
                        </div>
                        <hr />
                        <div class="form-group">
                            <select class="form-control" id="categories">
                                <option value="">Categories</option>
                                <?php
                                get_cat_option();
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="brands">
                                <option value="">Brand</option>
                                <?php
                                get_brands_options();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-light-success m-1 px-5 radius-30" onclick="add_pr()">Add</button>
            </div>
        </div>
    </div>
</body>

</html>