<?php include "assets/functions/functions.php"; ?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>Whitesquare</title>
    <link rel="stylesheet" href="assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    <?php include 'assets/php/header.php'; ?>
    <div id="heading">
        <h1>ABOUT US</h1>
    </div>
    <aside>
        <?php include 'assets/php/nav.php'; ?>
        <nav>
            <ul>
                <?php getbrands(); ?>
            </ul>
        </nav>
        <nav>
            s <ul class="aside-menu">
                <?php getcats(); ?>
            </ul>
        </nav>

        <h2>OUR OFFICES</h2>
        <p>
            <img src="assets/images/sample.png" width="230" height="180" alt="Our offices">
        </p>
    </aside>
    <section>
        <blockquote>
            <p>
                &ldquo;QUISQUE IN ENIM VELIT, AT DIGNISSIM EST.
                NULLA UL CORPER, DOLOR AC PELLENTESQUE PLACERAT, JUSTO TELLUS GRAVIDA ERAT, VEL PORTTITOR LIBERO ERAT.&rdquo;
            </p>
            <cite>John Doe, Lorem Ipsum</cite>
        </blockquote>

        <?php get_products(); ?>

        <figure>
            <img src="assets/images/sample.png" width="320" height="175" alt="">
        </figure>
        <figure>
            <img src="assets/images/sample.png" width="320" height="175" alt="">
        </figure>

        <h2>OUR TEAM</h2>
        <div class="team-row">
            <figure>
                <img src="assets/images/sample.png" width="96" height="96" alt="">
                <figcaption>John Doe<span>ceo</span></figcaption>
            </figure>
            <figure>
                <img src="assets/images/sample.png" width="96" height="96" alt="">
                <figcaption>Saundra Pittsley<span>team leader</span></figcaption>
            </figure>
            <figure>
                <img src="assets/images/sample.png" width="96" height="96" alt="">
                <figcaption>Julio Simser<span>senior developer</span></figcaption>
            </figure>
            <figure>
                <img src="assets/images/sample.png" width="96" height="96" alt="">
                <figcaption>Margery Venuti<span>senior developer</span></figcaption>
            </figure>
            <figure>
                <img src="assets/images/sample.png" width="96" height="96" alt="">
                <figcaption>Fernando Tondrea<span>developer</span></figcaption>
            </figure>
        </div>
        <div class="team-row">
            <figure>
                <img src="assets/images/sample.png" width="96" height="96" alt="">
                <figcaption>Ericka Nobriga<span>art director</span></figcaption>
            </figure>
            <figure>
                <img src="assets/images/sample.png" width="96" height="96" alt="">
                <figcaption>Cody Rousselle<span>senior ui designer</span></figcaption>
            </figure>
            <figure>
                <img src="assets/images/sample.png" width="96" height="96" alt="">
                <figcaption>Erik Wollman<span>senior ui designer</span></figcaption>
            </figure>
            <figure>
                <img src="assets/images/sample.png" width="96" height="96" alt="">
                <figcaption>Dona Shoff<span>ux designer</span></figcaption>
            </figure>
            <figure>
                <img src="assets/images/sample.png" width="96" height="96" alt="">
                <figcaption>Darryl Brunton<span>ui designer</span></figcaption>
            </figure>
        </div>
    </section>
</div>
<?php include 'assets/php/footer.php'; ?>
</body>
</html>