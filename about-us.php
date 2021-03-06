<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Free responsive business website template</title>
    <link rel="stylesheet" href="static/css/components.css">
    <link rel="stylesheet" href="static/css/icons.css">
    <link rel="stylesheet" href="static/css/responsee.css">
    <link rel="stylesheet" href="static/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="static/owl-carousel/owl.theme.css">
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="static/css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext"
          rel="stylesheet">
    <script type="text/javascript" src="static/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="static/js/jquery-ui.min.js"></script>
</head>

<!--
   You can change the color scheme of the page. Just change the class of the <body> tag.
   You can use this class: "primary-color-white", "primary-color-red", "primary-color-orange", "primary-color-blue", "primary-color-aqua", "primary-color-dark"
   -->

<!--
Each element is able to have its own background or text color. Just change the class of the element.
You can use this class:
"background-white", "background-red", "background-orange", "background-blue", "background-aqua", "background-primary"
"text-white", "text-red", "text-orange", "text-blue", "text-aqua", "text-primary"
-->

<body class="size-1520 primary-color-red background-dark">
<!-- PREMIUM FEATURES BUTTON -->
<a target="_blank" class="hide-s" href="../template/bricker-premium-responsive-business-template/"
   style="position:fixed;top:120px;right:-14px;z-index:10;"><img src="img/premium-features.png" alt=""></a>
<!-- HEADER -->
<header class="grid">
    <!-- Top Navigation -->
    <?php include('template/topnav.php') ?>
</header>

<!-- MAIN -->
<main role="main">
    <!-- TOP SECTION -->
    <header class="grid">
        <div class="s-12 padding-2x">
            <h1 class="text-strong text-white text-center center text-size-60 text-uppercase margin-bottom-20">About
                Us</h1>
        </div>
    </header>


    <!-- SECTION 1 -->
    <section class="grid">
        <div class="m-12 l-6 padding-2x background-white">

                <?php

                    require_once ('models/Config.php');

                    $config = Config::object();

                    echo($config->getAboutText());
                ?>
        </div>

        <!-- Image-->
        <img class="l-6 hide-s hide-m" src="static/img/<?php echo($config->getAboutImage());?>">
    </section>
<!--



    <section class="grid margin margin-bottom padding-2x background-primary">
        <div class="s-12 m-6 l-3">
            <span class="timer text-size-50 text-white text-strong">1500</span>
            <h3 class="text-uppercase text-strong">Ultricies eros sociis</h3>
            <p class="text-size-16 margin-m-bottom-20">Eodem modo typi nonummy maecenas ultricies eros sociis hendrerit
                dictum.</p>
        </div>

        <div class="s-12 m-6 l-3">
            <span class="timer text-size-50 text-white text-strong">95</span> <span
                    class="text-size-50 text-white text-strong">%</span>
            <h3 class="text-uppercase text-strong">Magna condimentum suspendisse</h3>
            <p class="text-size-16 margin-m-bottom-20">Duis autem libero ullam magna condimentum suspendisse
                pellentesque.</p>
        </div>

        <div class="s-12 m-6 l-3">
            <span class="timer text-size-50 text-white text-strong">287</span>
            <h3 class="text-uppercase text-strong">Consequat phasellus orci</h3>
            <p class="text-size-16 margin-m-bottom-20">Mirum est notare dolor consequat phasellus orci pellentesque
                hendrerit.</p>
        </div>

        <div class="s-12 m-6 l-3">
            <span class="timer text-size-50 text-white text-strong">7</span> <span
                    class="text-size-50 text-white text-strong">milion</span>
            <h3 class="text-uppercase text-strong">Augue et venenatis</h3>
            <p class="text-size-16 margin-m-bottom-20">Nam liber tempor erat augue et venenatis lorem ipsum dolor si
                amet.</p>
        </div>
    </section>



-->

    <!-- SECTION 3 -->
    <section class="grid margin">
        <h2 class="s-12 text-white text-thin text-size-30 text-white text-uppercase margin-top-bottom-20 center text-center">
            Our <b>Dream Team</b></h2>


        <?php
        require_once 'models/Team.php';
            $team = Team::getMembers();

            foreach($team as $member)
            {


        ?>

                <div class="s-12 m-6 l-2 margin-bottom">
                    <img src="static/img/<?php echo $member->getImage();?>"/>
                    <h4 class="background-primary padding text-strong"><?php echo $member->getName();?></h4>
                    <p class="margin-bottom-10 text-primary text-uppercase"><?php echo $member->getTitle();?></p>
                </div>
        <?php
            }
        ?>


        <!--
        <div class="s-12 m-6 l-2 margin-bottom">
            <img src="static/img/team-01.jpg"/>
            <h4 class="background-primary padding text-strong">Frank Star</h4>
            <p class="margin-bottom-10 text-primary text-uppercase">Boss</p>
        </div>
        <div class="s-12 m-6 l-2 margin-bottom">
            <img src="static/img/team-02.jpg"/>
            <h4 class="background-primary padding text-strong">Jane Naismith</h4>
            <p class="margin-bottom-10 text-primary text-uppercase">Graphic Designer</p>
        </div>
        <div class="s-12 m-6 l-2 margin-bottom">
            <img src="static/img/team-03.jpg"/>
            <h4 class="background-primary padding text-strong">Mark Stoner</h4>
            <p class="margin-bottom-10 text-primary text-uppercase">Web Designer</p>
        </div>
        <div class="s-12 m-6 l-2 margin-bottom">
            <img src="static/img/team-04.jpg"/>
            <h4 class="background-primary padding text-strong">Steve Carpenter</h4>
            <p class="margin-bottom-10 text-primary text-uppercase">Web Developer</p>
        </div>
        <div class="s-12 m-6 l-2 margin-bottom">
            <img src="static/img/team-05.jpg"/>
            <h4 class="background-primary padding text-strong">Steff Kingston</h4>
            <p class="margin-bottom-10 text-primary text-uppercase">Account Manager</p>
        </div>
        <div class="s-12 m-6 l-2 margin-bottom">
            <img src="static/img/team-06.jpg"/>
            <h4 class="background-primary padding text-strong">John Sandman</h4>
            <p class="margin-bottom-10 text-primary text-uppercase">Account Manager</p>
        </div>
        -->
    </section>

</main>


<!-- FOOTER -->



    <!-- Footer - bottom -->
    <?php

    include_once 'template/footer.php'
    ?>

<script type="text/javascript" src="static/js/responsee.js"></script>
<script type="text/javascript" src="static/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="static/js/template-scripts.js"></script>

</body>
</html>