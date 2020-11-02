<?php
require('theme/'. $_Serveur_['General']['theme'] . '/preload.php');
require('include/version.php');
require('theme/'. $_Serveur_['General']['theme'] . '/config/configTheme.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="author" content="CraftMyWebsite, PinglsDzn, <?php echo $_Serveur_['General']['name']; ?>" />
        <meta name="keywords" content="<?=$_Serveur_['General']['name'];?>">
        <meta name="description" content="<?=$_Serveur_['General']['description']?>">
        <meta name="robots" content="follow, index">

        <?php if(isset($_GET['page'])){$nompage = ucfirst($_GET["page"]);}else{$nompage = "Accueil";}?>
        <title><?=$_Serveur_['General']['name'] ." | ". $nompage?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/css/forum.css" rel="stylesheet" type="text/css">
        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/css/animate.css" rel="stylesheet" type="text/css">
        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/css/style.css" rel="stylesheet" type="text/css">

        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/css/toastr.css" rel="stylesheet" type="text/css">
        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/css/snarl.min.css" rel="stylesheet" type="text/css">
        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/css/hover.min.css" rel="stylesheet" type="text/css">
        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/css/ionicons.min.css" rel="stylesheet" type="text/css">

        <meta name="theme-color" content="#<?=$_Theme_["All"]["Seo"]["color"];?>">
        <meta name="msapplication-navbutton-color" content="#<?=$_Theme_["All"]["Seo"]["color"];?>">
        <meta name="apple-mobile-web-app-statut-bar-style" content="#<?=$_Theme_["All"]["Seo"]["color"];?>">
        <meta name="apple-mobile-web-app-capable" content="#<?=$_Theme_["All"]["Seo"]["color"];?>">
        <meta property="og:title" content="<?=$_Theme_["All"]["Seo"]["name"];?>">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?=$_Theme_["All"]["Seo"]["description"];?>">
        <meta property="og:image" content="<?=$_Theme_["All"]["Seo"]["image"];?>">
        <meta property="og:url" content="<?=$_Serveur_['General']['url'];?>">

        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="<?=$_Serveur_['General']['url'];?>">
        <meta name="twitter:title" content="<?=$_Theme_["All"]["Seo"]["name"];?>">
        <meta name="twitter:description" content="<?=$_Theme_["All"]["Seo"]["description"];?>">
        <meta name="twitter:image" content="<?=$_Theme_["All"]["Seo"]["image"];?>">

        <?php 
        if(!empty($_Theme_['All']['Seo']['google'])){
            echo '<meta name="google-site-verification" content="'.$_Theme_["All"]['Seo']['google'].'" />';
        }
        if(!empty($_Theme_['All']['Seo']['bing'])){
            echo '<meta name="msvalidate.01" content="'.$_Theme_["All"]['Seo']['bing'].'" />';
        }
        if(file_exists('favicon.ico')){
            echo '<link rel="icon" type="image/x-icon" href="favicon.ico">';
        }
        if(file_exists('favicon.png')){
            echo '<link rel="icon" type="image/png" href="favicon.png">';
        }
        echo '<link rel="icon" type="image/png" href="'. $_Theme_['All']['Seo']['image'].'">';
        ?>


        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
        <script async src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
        <script>
        window.addEventListener("load", function(){
        window.cookieconsent.initialise({
        "palette": {
            "popup": {
            "background": "#<?php echo $_Theme_['cookies']['bg'];?>"
            },
            "button": {
            "background": "#<?php echo $_Theme_['cookies']['bouton'];?>"
            }
        },
        "position": "top",
        "static": true,
        "content": {
            "message": "<?php echo $_Theme_['cookies']['message'];?>",
            "dismiss": "Ok",
            "link": "En savoir plus"
        }
        })});
        </script>

    </head>
    <body class="h-100">
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div id="loader-text">Chargement en cours . . .</div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <?php 
        if(isset($_Joueur_)) { 
            setcookie('pseudo', $_Joueur_['pseudo'], time() + 86400, null, null, false, true);
        }
        tempMess();
        include('theme/' .$_Serveur_['General']['theme']. '/entete.php');   
        ?>

        <?php 
        include('controleur/page.php'); 
        include('theme/' .$_Serveur_['General']['theme']. '/pied.php');
        include('theme/' .$_Serveur_['General']['theme']. '/formulaires.php'); 
        ?>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/js/jquery.min.js"></script>
        <script src="theme/<?=$_Serveur_['General']['theme']?>/js/preloader.js"></script>
        <script src="theme/<?=$_Serveur_['General']['theme']?>/js/discord.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/js/popper.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/js/bootstrap.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/js/wow.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/js/custom.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/js/toastr.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/js/snarl.min.js"></script>
        <?php
        include('theme/'.$_Serveur_['General']['theme'].'/js/forum.php'); 
        if($_Serveur_['Payement']['dedipass'] == true) {
            echo '<script src="//api.dedipass.com/v1/pay.js"></script>';
        } 
        if(!isset($_Joueur_)){
            echo '
            <script src="theme/'. $_Serveur_['General']['theme'] .'/js/zxcvbn.js"></script>
            <script src="theme/'. $_Serveur_['General']['theme'] .'/js/securepass.js"></script>';
        } 
        include('theme/'. $_Serveur_['General']['theme'] .'/js/notif.php'); ?>
        <script>
        $(window).on('load',function(){
            $('#myModal').modal('show');
        });
        window.onscroll = function() {scrollPage()};

        $('[data-toggle="popover"]').popover();
        $('#copierip').popover();
        $('[data-toggle="popover"][data-timeout]').on('shown.bs.popover', function() {
            this_popover = $(this);
            setTimeout(function () {
                this_popover.popover('hide');
            }, $(this).data("timeout"));
        });

        function copierIP(){
            var copyText = document.getElementById("iptexteinput");
            copyText.select();
			document.execCommand("copy");
        }
        function scrollPage() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                if ($("#navbarheader").hasClass("smallnavbar")){
                }else{
                    $("#navbarheader").addClass("smallnavbar");
                }
            } else {
                if ($("#navbarheader").hasClass("smallnavbar")){
                    $("#navbarheader").removeClass("smallnavbar");
                }
            }
        }

        <?php
        if(isset($modal)){echo "$('#myModal').modal('toggle');";}
        ?>
        </script>
    </body>
</html>
<!-- 
    -- DarkTheme 0.1 BETA by PinglsDzn#1702 --
    >>> https://craftmywebsite.fr/forum/index.php?resources/supreme-b%C3%AAta.124/ <<<
    CraftMyWebsite.fr#1.7.3
-->