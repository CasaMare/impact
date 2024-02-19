<?php include "assets/functions/functions.php"; ?>
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
                </ul>
                <a class="nav-link text-white" href="/cart.php"><i style="color:#FFF; font-size:30px;" class="bi bi-cart4 me-3"></i></a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-light btn-outline-success" type="submit">Search</button>
                </form>
                <a class="nav-link text-white" href="/admin_area/auth.php"><i style="color:#FFF; font-size:30px;" class="bi bi-box-arrow-in-right"></i></a>
                
            </div>
        </div>
    </nav>
</header>