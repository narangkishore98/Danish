
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free responsive business website template</title>
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
<body class="size-1520 primary-color-red background-dark">
<!-- HEADER -->
<header class="grid">
    <!-- Top Navigation -->
    <?php include('template/topnav.php') ?>
</header>

<!-- MAIN -->
<main role="main">
    <!-- TOP SECTION -->
    <section class="grid">
        <!-- Main Carousel -->
        <div class="s-12 margin-bottom carousel-fade-transition owl-carousel carousel-main carousel-nav-white carousel-hide-arrows background-dark">      <?php require_once 'models/Slider.php'; $sliders = Slider::getSliders();  foreach($sliders as $slide){?>
            <div class="item background-image" style="background-image:url(static/img/<?php echo($slide->getImage());?>)">
                <p class="text-padding text-strong text-white text-s-size-30 text-size-60 text-uppercase background-primary"><?php echo($slide->getTitle());?></p><br/>
                <p class="text-padding text-size-20 text-dark text-uppercase background-white"><?php echo($slide->getSubtitle());?></p>
            </div>

            <?php } ?>

            <!--

            <div class="item background-image" style="background-image:url(static/img/carousel-02.jpg)">
                <p class="text-padding text-strong text-white text-s-size-30 text-size-60 text-uppercase background-primary">Inspired by Technologies</p>
                <p class="text-padding text-size-20 text-dark text-uppercase background-white">Con nonummy sem integer interdum volutpat dis eget eligendi aliquip dolorum magnam.</p>
            </div>
            <div class="item background-image" style="background-image:url(static/img/carousel-03.jpg)">
                <p class="text-padding text-strong text-white text-s-size-30 text-size-60 text-uppercase background-primary">CSS and HTML is our Playground</p>
                <p class="text-padding text-size-20 text-dark text-uppercase background-white">Con nonummy sem integer interdum volutpat dis eget eligendi aliquip dolorum magnam.</p>
            </div>
            -->
        </div>
    </section>

    <!-- SECTION 1 -->
    <section class="grid margin text-center">
        <a href="/" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-red">
            <i class="icon-sli-equalizer text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">User Customization</h3>
        </a>
        <a href="/" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-blue">
            <i class="icon-sli-layers text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">Affordable Packages</h3>
        </a>

        <!-- Image-->
        <img class="m-12 l-6 l-row-2 margin-bottom" src="static/img/img-06.jpg">

        <a href="/" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-orange">
            <i class="icon-sli-diamond text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">Premium Features on Demand</h3>
        </a>
        <a href="/" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-aqua">
            <i class="icon-sli-share text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">Share the Code</h3>
        </a>
    </section>

    <!-- SECTION 2 -->
    <section class="grid section margin-bottom background-dark">
        <h2 class="s-12 l-6 center text-thin text-size-30 text-white text-uppercase margin-bottom-30">Welcome to the <b>Danish CMS</b></h2>
        <p class="s-12 l-6 center"><?php require_once 'models/Config.php'; $config = Config::object(); echo($config->getWelcomeText());?> </p>
    </section>



    <!-- SECTION OUR TEAM -->


    <section class="grid margin">
        <h2 class="s-12 text-white text-thin text-size-30 text-white text-uppercase margin-top-bottom-20 center text-center">Our <b>Dream Team</b></h2>

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
        </div> -->
    </section>



    <!-- SECTION 3 -->
    <section class="grid margin">
        <!-- Image-->

        <?php require_once 'models/Service.php'; $services = Service::getItems();?>
        <h2 class="s-12 text-white text-thin text-size-30 text-white text-uppercase margin-top-bottom-20 center text-center">Our <b>Services</b></h2>
        <?php $count = count($services)>=3 ? 3 : count($services); for($i=0;$i<$count;$i++){

        ?>
            <div class="s-12 m-4">
                <div style="background-position: center; background-size: cover; background-image: url('static/img/<?php echo($services[$i]->getImage());?>'); padding: 30%; margin-bottom: 10px; "></div>
                <h3 class="text-center"><?php echo($services[$i]->getTitle());?></h3>
                <p class="text-center"><?php echo($services[$i]->getText());?></p>
            </div>

        <?php
        }



        ?>



    </section>
    <?php
    if($count == 0)
    {
        echo("<p class='text-center'>No services added by admin</p>");
    }
    ?>

    <!-- SECTION 4 -->
    <section class="grid margin margin-top-50 ">
        <h2 class="s-12 text-white text-thin text-size-30 text-white text-uppercase margin-top-bottom-20 center text-center"> <b>Portfolio</b></h2>


        <?php

            require_once 'models/Portfolio.php';
            $items = Portfolio::getItems();
            $count = count($items)>=6?6:count($items);

          for($i=0;$i<$count;$i++)
            {
                ?>


                <a href="#" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-blue">

                    <h1 class="text-size-60 text-white center margin-bottom-15"><?php echo($items[$i]->getTitle()); ?></php></h1>
                    <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase"><?php echo($items[$i]->getText());?></h3>
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



    <!-- SECTION 5 -->
    <section class="grid margin text-center margin-top-50">
        <div class="m-12 l-4 padding-2x background-dark margin-bottom text-right">
            <h3 class="text-strong text-size-25 text-uppercase margin-bottom-10">Let's keep in touch</h3>
            <p>Follow us on our social media platforms.</p>
        </div>
        <a href="/" class="s-12 m-6 l-2 padding vertical-center margin-bottom facebook hover-zoom">
            <i class="icon-sli-social-facebook text-size-60 text-white center"></i>
        </a>
        <a href="/" class="s-12 m-6 l-2 padding vertical-center margin-bottom twitter hover-zoom">
            <i class="icon-sli-social-twitter text-size-60 text-white center"></i>
        </a>
        <a href="/" class="s-12 m-6 l-2 padding vertical-center margin-bottom youtube hover-zoom">
            <i class="icon-sli-social-youtube text-size-60 text-white center"></i>
        </a>
        <a href="/" class="s-12 m-6 l-2 padding vertical-center margin-bottom linkedin hover-zoom">
            <i class="icon-sli-social-linkedin text-size-60 text-white center"></i>
        </a>
    </section>
</main>



   <?php
    include_once 'template/footer.php';
   ?>

<script type="text/javascript" src="static/js/responsee.js"></script>
<script type="text/javascript" src="static/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="static/js/template-scripts.js"></script>

</body>
</html>