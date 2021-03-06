<?php
include('db.php');
$economy = new mysqli($ip, $user, $pass, "economyapi", $port);
$mod = new mysqli($ip, $user, $pass, "cucumber", $port);
$ranks = new mysqli($ip, $user, $pass, "perms", $port);

$playerName = $_POST['query'];
$economyQuery = "SELECT money from user_money WHERE username = '$playerName';";

$modgetPlayerIDQuery = "SELECT id from cucumber_players WHERE name = '$playerName';";
$modgetPlayerID = (int)$mod->query($modgetPlayerIDQuery)->fetch_array()[0];
$modQuery = "SELECT count(id) from cucumber_warnings WHERE player_id = '$modgetPlayerID';";

$ranksQuery = "SELECT userGroup from players WHERE userName = '$playerName';";
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Site made with Mobirise Website Builder v5.5.2, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.5.2, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/pmns-128x128.png" type="image/x-icon">
    <meta name="description" content="">


    <title>Find Result</title>
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/socicon/css/styles.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="preload"
          href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"
          as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap">
    </noscript>
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">


</head>
<body>

<!-- Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-12DD98SVDC"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-12DD98SVDC');
</script>
<!-- /Analytics -->


<section data-bs-version="5.1" class="menu menu1 cid-sRtWIYvwdk" once="menu" id="menu1-w">


    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                        <img src="assets/images/weblogo-160x96.png" alt="Mobirise" style="height: 3rem;">
                    </a>
                </span>

            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse"
                    data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-secondary text-primary display-4"
                                            href="events.html#top">Events</a></li>
                    <li class="nav-item"><a class="nav-link link text-secondary text-primary display-4"
                                            href="games.html#top">Games</a></li>
                    <li class="nav-item"><a class="nav-link link text-secondary text-primary display-4"
                                            href="about.html#top">About</a>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link link text-secondary dropdown-toggle display-4"
                                                     href="https://mobiri.se" data-toggle="dropdown-submenu"
                                                     data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                     aria-expanded="false">Open Source</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-undefined"><a
                                    class="text-secondary dropdown-item text-primary display-4"
                                    href="opensource.html#top">About
                                Open Sorce</a><a class="text-secondary show dropdown-item text-primary display-4"
                                                 href="pmnsop.html#top">PMnS as Open Source</a></div>
                    </li>
                    <li class="nav-item"><a class="nav-link link text-secondary show text-primary display-4"
                                            href="find.php#top">???? Find Player</a></li>
                </ul>


            </div>
        </div>
    </nav>
</section>

<section data-bs-version="5.1" class="header1 cid-sRP1QhVq30 mbr-fullscreen" id="header1-y">


    <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(97, 0, 0);"></div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong>Stats for
                        <?php echo $playerName; ?></strong></h1>

                <p class="mbr-text mbr-fonts-style display-7">Name: <?php echo $playerName; ?>
                    <br>Perms/Rank: <?php echo (string)$ranks->query($ranksQuery)->fetch_array()[0]; ?><br>Money:
                    P$<?php echo $economy->query($economyQuery)->fetch_array()[0]; ?>
                    <br>Warnings: <?php echo (int)$mod->query($modQuery)->fetch_array()[0]; ?>
                    <br></p>
                <div class="mbr-section-btn mt-3"><a class="btn btn-secondary display-4" href="find.php#header7-v">Find
                        Another</a></div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="footer3 cid-sRtWVgrixi" once="footers" id="footer3-x">


    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">


                    <li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white text-primary" href="about.html">About us</a>
                    </li>
                    <li class="foot-menu-item mbr-fonts-style display-7"><a href="games.html"
                                                                            class="text-white text-primary">Games</a>
                    </li>
                    <li class="foot-menu-item mbr-fonts-style display-7"><a href="find.php"
                                                                            class="text-white text-primary">Find
                            Player</a></li>
                    <li class="foot-menu-item mbr-fonts-style display-7"><a href="opensource.html"
                                                                            class="text-white text-primary">Open
                            Source</a></li>
                    <li class="foot-menu-item mbr-fonts-style display-7"><a href="https://forms.gle/ZdVyKmQSrUp7sEW77"
                                                                            class="text-white"
                                                                            target="_blank">Volunteer</a></li>
                </ul>
            </div>
            <div class="row social-row">
                <div class="social-list align-right pb-2">


                    <div class="soc-item">
                        <a href="https://facebook.com/pinakamalupetnaserver" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://instagram.com/pinakamalupetnaserver" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://discord.gg/AX7ammpcHQ" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-discord socicon"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://github.com/PinakaMalupetnaServer" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-github socicon"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    ?? Copyright 2021 PMnS, PPG, Mobirise. All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</section>
<section
        style="background-color: #232323; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#232323; font-size:12px; padding: 0; align-items: center; display: flex;">
    <a href="https://mobirise.site/h" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a>
</section>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/smoothscroll/smooth-scroll.js"></script>
<script src="assets/ytplayer/index.js"></script>
<script src="assets/dropdown/js/navbar-dropdown.js"></script>
<script src="assets/theme/js/script.js"></script>


</body>
</html>