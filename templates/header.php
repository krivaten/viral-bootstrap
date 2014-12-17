<!DOCTYPE html>
<head>

	<meta charset="utf-8">
	<title><?php wp_title('|', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1, maximum-scale=1">

	<?php if (is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" />
	<?php } ?>

	<title><?php wp_title(''); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/css/css.css" />
	<!--[if lt IE 9]>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/html5shiv/dist/html5shiv.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/respond/dest/respond.min.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/img/logos/logo-16.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/assets/img/logos/logo-114.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/assets/img/logos/logo-114.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/assets/img/logos/logo-144.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/assets/img/logos/logo-144.png" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
	<?php wp_head(); ?>

	<script type="text/javascript" src="//use.typekit.net/leg7ved.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

</head>
<body <?php body_class('site-background'); ?>>

	<header class="navbar navbar-default navbar-fixed-top" role="banner">
		<div class="container">

			<div class="navbar-header">
				<a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>" class="navbar-brand">
					<img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.png" alt="<?php bloginfo('name'); ?>" />
				</a>
			</div>

			<button type="button" class="navbar-trigger" data-toggle="toggle-nav">
				<i class="fa fa-bars fa-3x"></i>
			</button>


			<div class="navbar-connect visible-md visible-lg">
				<div class="navbar-phone">
					<?php
						echo get_option("kvt_phone_num");
					?>
				</div>
				<div class="navbar-icons">
					<?php require(TEMPLATEPATH . '/templates/components/social-icons.php'); ?>
				</div>
				<div class="navbar-address">
					Sunday @ 10:30 AM<br />
					210 S 2nd Street<br />
					Hamilton, OH
				</div>
			</div>

		</div>

		<div class="navbar-inner">
			<?php
				if(has_nav_menu('main-menu')) {
					wp_nav_menu(array(
						'theme_location' => 'main-menu',
						'container' => 'nav',
						'container_class' => 'navbar-collapse',
						'menu_class' => 'nav navbar-nav',
						'depth' => '0',
						'walker' => new top_nav()
					));
				}
			?>
		</div>

		<div class="nav-sub">
			<a href="<?php echo site_url('contact'); ?>"><i class="fa fa-phone"></i> <span>contact</span></a>
			<a href="<?php echo site_url('directions'); ?>"><i class="fa fa-map-marker"></i> <span>directions</span></a>
			<a href="<?php echo site_url('give'); ?>"><i class="fa fa-usd"></i> <span>give</span></a>
		</div>
	</header>

	<div class="jumbotron <?php if(is_page('home')) {echo "masthead";} else {echo "subhead";} ?>">
		<div class="container">
			<?php if(is_page('home')) { ?>
				<h1><span>love</span><span>live</span><span>move</span></h1>
			<?php } elseif(is_tax()) { ?>
				<h1><?php single_tag_title(); ?></h1>
			<?php } elseif(is_category()) { ?>
				<h1><?php single_cat_title(); ?></h1>
			<?php } elseif(is_tag()) { ?>
				<h1><?php single_tag_title(); ?></h1>
			<?php } elseif(is_day()) { ?>
				<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
			<?php } elseif(is_month()) { ?>
				<h1>Archive for <?php the_time('F, Y'); ?></h1>
			<?php } elseif(is_year()) { ?>
				<h1>Archive for <?php the_time('Y'); ?></h1>
			<?php } elseif(is_author()) { ?>
				<h1>Author Archive</h1>
			<?php } elseif(isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1>Blog Archives</h1>
			<?php } elseif(is_home()) { ?>
				<h1>Blog</h1>
			<?php } elseif(is_post_type_archive('sermons')) { ?>
				<h1>Sermons</h1>
			<?php } elseif(is_search()) { ?>
				<h1>Search results for &quot;<?php the_search_query() ?>&quot;</h1>
			<?php } else { ?>
				<h1><?php the_title(); ?></h1>
			<?php } ?>
		</div>

		<?php if($sidebarLeft) { ?>
			<a href="#" class="btn-sidebar-toggle left" data-toggle="offcanvas">
				Toggle Sidebar <i class="fa fa-fw fa-angle-right"></i>
			</a>
		<?php } elseif($sidebarRight) { ?>
			<a href="#" class="btn-sidebar-toggle right" data-toggle="offcanvas">
				<i class="fa fa-fw fa-angle-left"></i> Toggle Sidebar
			</a>
		<?php } ?>
	</div>

	<!--[if lt IE 9]>
	<div class="container">
		<div class="alert alert-warning text-center">
			<h2 class="text-center">Outdated Browser Warning</h4>
			<p class="text-center">While this site will look and work fine for the most part, you are likely missing out on an optimal user experience.</p>
			<p class="text-center">Do yourself a favor and please upgrade to <a href="https://www.google.com/chrome" title="Google Chrome" target="_blank" style="color: black; font-weight: bold;">Google Chrome</a> or <a href="http://www.mozilla.org/" title="Mozilla Firefox" target="_blank" style="color: black; font-weight: bold;">Mozilla Firefox</a></p>
		</div>
	</div>
	<![endif]-->

	<div class="container" id="container">
