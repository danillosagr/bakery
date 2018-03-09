<!DOCTYPE html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" xml:lang="en-gb" class="no-js"> <!--<![endif]-->


<!-- Mirrored from ignitionthemes.co/template/bakery/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jan 2018 11:21:24 GMT -->
<head>
	<meta charset="utf-8">
    <!--[if lt IE 9]> 
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Aleš Trunda alestrunda.cz">
    <meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1">    
    
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/logo.png" type="image/png">
    <!--
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>

    

    <link rel="stylesheet" href="font-awesome/font-awesome/css/font-awesome.min.css" type="text/css">

    	<link rel="stylesheet" href="font-awesome/font-awesome/css/font-awesome-ie7.min.css" type="text/css">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600italic,700%7CMontserrat:400,700%7CLato' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="masterslider/style/masterslider.css" type="text/css">
    <link rel="stylesheet" href="masterslider/skins/default/style.css" type="text/css">
    <link rel="stylesheet" href="styles/main.css" type="text/css">
    
    <script type="text/javascript" src="js/modernizr.js"></script> -->
    
	<title><?php my_title(); ?></title>
    
    <style>
		#theme-customizer {
			position: fixed;
			width: 225px;
			left: 0;
			top: 40%;
			background-color: #f7f7f7;
			border: 1px #e5e5e5 solid;
			z-index: 9999;
			padding: 30px 0 30px 30px;
			color: #696969;
			font-size: 18px;
			-webkit-transition: all 0.2s ease-out;
			-moz-transition: all 0.2s ease-out;
			-o-transition: all 0.2s ease-out;
			transition: all 0.2s ease-out;
		}
		
		#theme-customizer.slide-out {
			left: -225px;
		}
		
		#theme-customizer a {
			color: #696969;
			-webkit-transition: all 0.1s ease-out;
			-moz-transition: all 0.1s ease-out;
			-o-transition: all 0.1s ease-out;
			transition: all 0.1s ease-out;
		}
		
		#theme-customizer a:hover {
			text-decoration: underline;
			color: #feb822;
		}
		
		#theme-customizer p {
			margin-bottom: 5px;
		}
		
		#theme-customizer .theme-customizer-header {
			color: #000;
			margin-bottom: 25px;
		}
		
		#theme-customizer .theme-customizer-subheader {
			font-style: italic;
			font-size: 14px;
			color: #000;
		}
			
		#theme-customizer .theme-customizer-icon {
			position: absolute;
			right: -31px;
			top: -1px;
			height: 32px;
			width: 32px;
			font-size: 15px;
			line-height: 30px;
			border: 1px #e5e5e5 solid;
			border-left: none;
			background-color: #f7f7f7;
			text-align: center;
			padding-left: 2px;
			cursor: pointer;
		}
	</style>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php
        wp_head();
        wp_enqueue_script('jquery');
    ?> 
</head>

<body>