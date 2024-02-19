<?php include $_SERVER["DOCUMENT_ROOT"]."/assets/parts/header.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/admin_area/parts/nav.php"; ?>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
               
            </div>
            <div class="col-9">
                <div class="container">
                    <div class="row">
                    <div style="display:none;" id="error" class="alert alert-danger" role="alert">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input required type="email" class="form-control" id="email" >
                        </div>
                        <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input required type="password" class="form-control" id="password" >   
                    </div>
                    <button onclick="auth();" type="submit" class="btn btn-primary">Auth</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function auth()
    {
        $('#error').hide();

        var email = $('#email').val();
        var password = $('#password').val();
        
        $.ajax({
        url: "functions/auth.php",
        type:"POST",
        data: {
            email: email,
            password: password
        },
        success: function(response){
            window.location.href = "admin.php";
        },
        error: function(response){
            $('#error').html(response.statusText);
            $('#error').show();
        }
       });
    }
</script>
<?php include $_SERVER["DOCUMENT_ROOT"]."/assets/parts/footer.php"; ?>