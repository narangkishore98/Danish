
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio</title>
    <link rel="stylesheet" href="static/css/components.css">
    <link rel="stylesheet" href="static/css/icons.css">
    <link rel="stylesheet" href="static/css/responsee.css">
    <link rel="stylesheet" href="static/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="static/owl-carousel/owl.theme.css">
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="static/css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">
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
<a target="_blank" class="hide-s" href="../template/bricker-premium-responsive-business-template/" style="position:fixed;top:120px;right:-14px;z-index:10;"><img src="img/premium-features.png" alt=""></a>
<!-- HEADER -->
<header class="grid">
    <!-- Top Navigation -->
    <?php
    include_once 'template/topnav.php';
    ?>
</header>

<!-- MAIN -->
<main role="main">
    <!-- TOP SECTION -->
    <header class="grid">
        <div class="s-12 padding-2x">
            <h1 class="text-strong text-white text-center center text-size-60 text-uppercase margin-bottom-20">Portfolio</h1>
        </div>
    </header>


    <!--

        <section class="grid">
            <div class="m-12 l-6 padding-2x background-white">
                <p class="text-strong text-size-80 text-red">01</p>

                <h2 class="text-size-50 text-line-height-1 text-dark"><b>Nonummy nibh euismod tincidunt ut laoreet</b></h2>

                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
                <p>Libero malesuada varius leo mollis laoreet error occaecat unde nostra harum. A morbi hymenaeos rhoncus ridiculus temporibus consectetur ducimus exercitation. Integer arcu adipiscing augue iusto nam duis facilisi senectus iaculis proin repudiandae nemo cupidatat. Ipsum donec enim leo ultricies pulvinar aute semper dolores habitant impedit harum. </p>
            </div>


            <img class="m-12 l-6" src="img/img-06.jpg">
        </section>

        <section class="grid">

            <img class="m-12 l-6" src="img/img-01.jpg">

            <div class="m-12 l-6 padding-2x background-dark">
                <p class="text-strong text-size-80 text-red">02</p>

                <h2 class="text-size-50 text-line-height-1 margin-bottom-30 text-white"><b>Libero malesuada varius leo mollis tincidunt</b></h2>

                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
                <p>Libero malesuada varius leo mollis laoreet error occaecat unde nostra harum. A morbi hymenaeos rhoncus ridiculus temporibus consectetur ducimus exercitation. Integer arcu adipiscing augue iusto nam duis facilisi senectus iaculis proin repudiandae nemo cupidatat. Ipsum donec enim leo ultricies pulvinar aute semper dolores habitant impedit harum. </p>
            </div>
        </section>
    -->


    <section class="grid margin margin-top-50 ">


        <?php

        require_once 'models/Portfolio.php';
        $items = Portfolio::getItems();
        $count = count($items)>=6?6:count($items);

        $colors = array("background-blue","background-green","background-dark", "background-aqua");

        for($i=0;$i<$count;$i++)
        {
            ?>


            <a href="#" class="s-12 m-6 l-6 padding-2x vertical-center margin-bottom <?php echo($colors[rand(0,count($colors))]);?>">

                <h1 class="text-size-60 text-white center margin-bottom-15"><?php echo($items[$i]->getTitle()); ?></php></h1>
                <h3 class="text-strong tex-center center text-size-20 text-line-height-1 margin-bottom-30 text-uppercase"><?php echo($items[$i]->getText());?></h3>
            </a>
            <?php
        }






        ?>




    </section>

    <?php
    if($count == 0)
    {
        echo("<p class='text-center'>No Portfolios added by admin</p>");
    }

    ?>


</main>
<span class="margin-top-30"></span>


<?php include_once 'template/footer.php';?>
<script type="text/javascript" src="static/js/responsee.js"></script>
<script type="text/javascript" src="static/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="static/js/template-scripts.js"></script>

</body>
</html>