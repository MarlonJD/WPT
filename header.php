<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
  <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Sakarya54Emlak</title>
         <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
        <!--Let browser know website is optimized for mobile-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"> 
    </head>
    <body>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="<?php echo base_url(); ?>" class="brand-logo">Logo</a>
                <ul class="right hide-on-med-and-down">
                                <li><a href="<?php echo base_url("estate"); ?>">Anasayfa</a></li>
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
                <li><a href="<?php echo base_url("estate/#Hakkimizda"); ?>">Hakkımızda</a></li>
				<li><a href="<?php echo base_url("estate/#Iletisim"); ?>">İletişim</a></li>
                <li><a href="<?php echo base_url("user/logout"); ?>">Çıkış Yap</a></li>
                <?php } else {?>
                    <li><a href="<?php echo base_url("user/login"); ?>">Giriş Yap</a></li>
                    <li><a href="<?php echo base_url("user/register"); ?>">Üye Ol</a></li>
                <?php } ?>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Start Travel Ad</a></li>
                </ul>
                 <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>