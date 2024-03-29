<?php include $_SERVER["DOCUMENT_ROOT"]."/admin_area/functions/functions.php"; ?>
<header>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/index.php">Online Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/contact.php">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="addproduct.php">add product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="addcategory.php">Add category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="addbrand.php">Add brand</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-light btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>