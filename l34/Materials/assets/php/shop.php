<?php
include("../../functions/functions.php");
?>

<html>

<head>
    <title>Contact</title>
</head>

<body>
    <!-- the header.php file -->
    <?php
    include "header.php"
    ?>

    <!-- the nav.php file -->
    <?php
    include "nav.php"
    ?>

    <div class="page-wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="row">

                    <div class="col">
                        <div class="card radius-15">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4 class="mb-0">Brands</h4>
                                </div>
                                <hr>
                                <ul class="list-group">
                                    <?php
                                    getbrands();
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row justify-content-center">
                            <?php
                             getpro();
                            ?>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card radius-15">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4 class="mb-0">Categories</h4>
                                </div>
                                <hr>
                                <ul class="list-group">
                                    <?php
                                    getcats();
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>