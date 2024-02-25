<?php
include 'db.php';

if(isset($_POST['text'])){

    $text = htmlspecialchars($_POST['text']);
    /*if(empty($text)){
        echo 'text is empty';
        return false;
    }*/
    search($text);
}

function search(string $text)
{
    $sql = "select * from products  where prd_title like '%$text%' or prd_desc like '%$text%';";
    if( $result =  db_query($sql,'select') ){
        foreach ($result as $item) {
            $prd_title =$item["prd_title"];
            $prd_desc = $item["prd_desc"];
            $prd_price = $item["prd_price"];
            $prd_img = $item["prd_img"];
            $prd_id= $item["prd_id"];
    
            echo
            <<<EOT
                <div class="col-4 mb-3 product-item">
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
    }else{
        echo "<h3>Nothing was found</h3>";
    }
}