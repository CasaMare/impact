<?php
include "assets/php/functions_admin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">

        <!--header-->
        <header>
            <?php
            include "assets/php/header.php"
            ?>
        </header>
        <!--end header-->

        <!--nav-->
        <?php
        include "assets/php/nav.php"
        ?>
        <!--end nav-->

        <div class="page-wrapper">
            <!--page-content-wrapper-->
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
                            <div class="row ">
                                <?php
                                getpro_list();
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
    </div>
</body>

</html>