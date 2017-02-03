  <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title><?php bloginfo( 'wptitle' );?></title>
         <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
        <!--Let browser know website is optimized for mobile-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"> 
    </head>
    <body>
        <nav class="<?php echo get_option('renk'); ?>" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="<?php bloginfo( 'wpurl' );?>" class="brand-logo">Logo</a>
                <ul class="right hide-on-med-and-down">
                <li><a href="">Anasayfa</a></li>
                <li><?php wp_list_pages( '&title_li=' ); ?></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Start Travel Ad</a></li>
                </ul>
                 <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>