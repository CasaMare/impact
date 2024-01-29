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
        <form method="post" action="assets/functions/functions.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name/Lastname</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </p>
    </section>
</div>
<?php include 'assets/php/footer.php'; ?>
</body>
</html>