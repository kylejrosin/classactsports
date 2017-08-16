<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0"/>

	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/screenshot.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<![endif]-->
	<meta name="msapplication-TileColor" content="#f01d4f">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/screenshot.png">
    <meta name="theme-color" content="#11AC58">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    
    <?php include 'style.php'; ?>
    
	<?php wp_head(); ?>
	
	<?php include 'scripts-header.php'; ?>
	
	<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({
		google_ad_client: "ca-pub-5755155453260660",
		enable_page_level_ads: true
	});
	</script>-->
							
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<div id="container">

	<div id="fb-root" style="display:none;"></div>
	
	<header class="nav-container transition">
		
		<div class="wrap transition">
		
			<a class="nav-cell main-logo transition" href="<?php echo home_url(); ?>">
				<div class="main-logo-wrap transition">
					<img class="transition" src="<?php echo get_template_directory_uri(); ?>/library/images/classactsports-logo-400x311.png" alt="Class Act Sports" />
				</div>
			</a>
			
			<a class="nav-cell nav-item transition nav-new" href="/category/nfl/"><span>NFL</span></a>
			<a class="nav-cell nav-item transition nav-new" href="/category/nba/"><span>NBA</span></a>
			<a class="nav-cell nav-item transition nav-new" href="/category/mlb/"><span>MLB</span></a>
			<a class="nav-cell nav-item transition nav-new" href="/category/nhl/"><span>NHL</span></a>
			<a class="nav-cell nav-item transition nav-new" href="/category/ncaaf/"><span>NCAAF</span></a>
			<a class="nav-cell nav-item transition nav-new" href="/category/ncaab/"><span>NCAAB</span></a>
			<a class="nav-cell nav-item transition nav-new" href="/category/golf/"><span>GOLF</span></a>
			<a class="nav-cell nav-item transition nav-new" href="/category/videos/"><span>VIDEOS</span></a>
			
		</div>	
		
		<div class="mobile-nav">
			
			<a href="javascript:void(0);" class="home-burger">
				<div id="nav-icon3">
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
				</div>
			</a>
			
		</div>

	</header>