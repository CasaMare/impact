<?php include "assets/functions/functions.php"; ?>
<style>
    
.loader {
  width: fit-content;
  font-weight: bold;
  font-family: monospace;
  font-size: 30px;
  background: radial-gradient(circle closest-side,#000 94%,#0000) right/calc(200% - 1em) 100%;
  animation: l24 1s infinite alternate linear;
}
.loader::before {
  content: "Loading...";
  line-height: 1em;
  color: #0000;
  background: inherit;
  background-image: radial-gradient(circle closest-side,#fff 94%,#000);
  -webkit-background-clip:text;
          background-clip:text;
}

@keyframes l24{
  100%{background-position: left}
}
</style>
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
                    <input id="search_field"  class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <!--<button onclick="search(); return false;" 
                    class="btn btn-light btn-outline-success" type="button">Search</button>-->
                </form>
                <a class="nav-link text-white" href="/admin_area/auth.php"><i style="color:#FFF; font-size:30px;" class="bi bi-box-arrow-in-right"></i></a>
                
            </div>
        </div>
    </nav>
</header>
<script>
    $('#search_field').on( "keyup", function() {
           search();
    } );

    function search(){
      
        var searchText = $('#search_field').val();
        $('.product-item').hide();
        
        $('#products').html('<div class="loader"></div>');

        setTimeout(function(){
            $.ajax({
                url: "assets/functions/search.php",
                type:"POST",
                data: {
                    text: searchText
                },
                success: function(response){
                    $('#products').html(response);
                },
                error: function(response){
                    $('#error').html(response.statusText);
                    $('#error').show();
                }
            });
        }, 1000);
        
      

    }
</script>