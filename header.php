<!DOCTYPE html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo bloginfo("name") ?> <?php echo wp_title( '&ndash;', false, 'left' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/favicon.ico">
	<?php
		do_action( 'wpbootstrap_before_wp_head' );
		wp_head();
		do_action( 'wpbootstrap_after_wp_head' );
	?>
</head>

<body <?php body_class(); ?>>

	<?php do_action( 'wpbootstrap_before_container' ); ?>
	<div class="container">

		<?php
			if( wpbootstrap_get_setting('general_settings','display_header_widgets') ) {
				get_sidebar('header-widgets');
			}
		?>

		<?php do_action( 'wpbootstrap_before_header' ); ?>

		<?php if ( wpbootstrap_get_setting( 'general_settings', 'display_header_site_title' ) || wpbootstrap_get_setting('general_settings','display_header_nav') ): ?>
		<header id="header" class="row" role="banner">

			<?php if ( wpbootstrap_get_setting( 'general_settings', 'display_header_site_title' ) ): ?>
			<hgroup class="span12">
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>
			<?php endif; ?>

			<?php
				if ( wpbootstrap_get_setting('general_settings','display_header_nav') ):
					get_template_part('_navbar');
				endif
			?>

		</header><!-- #header -->
		<?php endif; ?>

		<?php do_action( 'wpbootstrap_after_header' ); ?>

		<div class="row" id="main">
			<?php do_action( 'wpbootstrap_before_content' ); ?>
			<section class="<?php echo wpbootstrap_get_content_width(); ?>" id="content" role="main">