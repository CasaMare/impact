<?php include "functions_admin.php" ?>

<html>

<head>
    <title>Add Brand</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <?php
            include "header.php"
            ?>
        </header>
        <?php
        include "nav.php"
        ?>
        <div class="page-wrapper">
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0">General Data</h4>
                            </div>
                            <hr />
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Name" id="brand-name">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-light-success m-1 px-5 radius-30" onclick="add_brand()">Add</button>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        function add_brand() {
            let input = document.getElementById("brand-name").value;

            $.ajax({
                url: "functions_admin.php",
                type: "POST",
                data: {
                    add_brand: "add_brand",
                    brand_name: input
                },
                success: function(response) {
                    console.log(response);
                    console.log("Brand added");
                }
            });
        }
    </script>
    
</body>

</html>