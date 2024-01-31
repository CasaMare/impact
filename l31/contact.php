<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>Whitesquare</title>
    <link rel="stylesheet" href="assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" type="text/css">
</head>
<body>
<div id="wrapper">
    <?php include 'assets/php/header.php'; ?>
    <div id="heading">
        <h1>CONTACT US</h1>
    </div>
    <aside>
        <?php include 'assets/php/nav.php'; ?>
        <h2>OUR OFFICES</h2>
        <p>
            <img src="assets/images/sample.png" width="230" height="180" alt="Our offices">
        </p>
    </aside>
    <section style="min-height:600px;">


        <p>
        <h2 id="message" style="display: none;">Message sent successfully</h2>
        <form id="contact-us" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name/Lastname</label>
                <input required type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label required for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input required type="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>

            function addContactUs()
            {
                $("#message").hide();

                let name = $("#name").val();
                let phone = $("#phone").val();
                let email = $("#email").val();

                $.ajax({
                    url: "assets/functions/functions.php",
                    type: "POST",
                    data: {
                        "addContactUs":"1",
                        name: name,
                        email: email,
                        phone: phone,
                    },
                    success: function(response) {
                        $("#message").show();
                    }/*,
                    error: function(xhr) {
                        alert('error happend'+xhr.responseText
                    }*/
                });
            }

            $('#contact-us').on('submit', function(e) {
                e.preventDefault();
                addContactUs();
            });

        </script>
        </p>
    </section>
</div>
<?php include 'assets/php/footer.php'; ?>
</body>
</html>