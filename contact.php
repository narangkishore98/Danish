
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
  <?php
    include_once 'template/topnav.php';
  ?>
</header>

<!-- MAIN -->
<main role="main">
    <!-- TOP SECTION -->
    <header class="grid">
        <div class="s-12 padding-2x">
            <h1 class="text-strong text-white text-center center text-size-60 text-uppercase margin-bottom-20">Contact Us</h1>
        </div>
    </header>
<?php  require_once 'models/Config.php'; $config = Config::object(); ?>
    <!-- SECTION 1 -->
    <section class="grid margin-bottom-20">
        <div class="m-12 l-7 center">
            <!-- Contact Information-->
            <div class="s-12 padding-2x background-white text-center">
                <h2 class="text-size-20 margin-bottom-10 text-strong text-uppercase text-dark">Address</h2>
               <p><?php echo($config->getAddress());?></p>

                <h2 class="text-size-20 margin-top-30 margin-bottom-10 text-strong text-uppercase text-dark">E-mail</h2>
                <?php
                    foreach ($config->getEmails() as $email)
                    {
                ?>
                        <p><a class="text-primary-hover" href="mailto:<?php echo($email);?>"><?php echo($email);?></a></p>

                        <?php
                    }

                ?>

                <h2 class="text-size-20 margin-top-30 margin-bottom-10 text-strong text-uppercase text-dark">Phone Numbers</h2>
                <?php
                foreach ($config->getPhoneNumbers() as $email)
                {
                    ?>
                    <p><a class="text-primary-hover" href="tel:<?php echo($email);?>"><?php echo($email);?></a></p>

                    <?php
                }

                ?>
            </div>

        </div>

        <!-- SECTION 5 -->
        <section class="grid margin text-center margin-top-50">
            <div class="m-12 l-4 padding-2x background-dark margin-bottom">
                <h3 class="text-strong text-size-25 text-uppercase margin-bottom-10">Let's keep in touch</h3>
                <p>Follow us on our social media platforms.</p>
            </div>
            <a href="<?php echo($config->getInstagram());?>" class="s-12 m-6 l-2 padding vertical-center margin-bottom facebook hover-zoom">
                <i class="icon-sli-social-facebook text-size-60 text-white center"></i>
            </a>
            <a href="<?php echo($config->getInstagram());?>" class="s-12 m-6 l-2 padding vertical-center margin-bottom instagram hover-zoom">
                <i class="icon-sli-social-instagram text-size-60 text-white center"></i>
            </a>
            <a href="<?php echo($config->getGithub());?>" class="s-12 m-6 l-2 padding vertical-center margin-bottom background-blue hover-zoom">
                <i class="icon-sli-social-github text-size-60 text-white center"></i>
            </a>
            <a href="<?php echo($config->getLinkedin());?>" class="s-12 m-6 l-2 padding vertical-center margin-bottom linkedin hover-zoom">
                <i class="icon-sli-social-linkedin text-size-60 text-white center"></i>
            </a>

    </section>
</main>


<!-- FOOTER -->
<?php include_once 'template/footer.php';?>
<script type="text/javascript" src="static/js/responsee.js"></script>
<script type="text/javascript" src="static/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="static/js/template-scripts.js"></script>

</body>
</html>