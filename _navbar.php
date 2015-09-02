<div class="clearfix <?php echo wpbootstrap_get_nav_menu_classes(); ?>">
	<div class="navbar-inner">
		<div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/huidu_logo.png" class="site-logo">
            </a>

			<div class="nav-collapse collapse">
				<nav id="nav-main" role="navigation">
					<?php
                        //byfj
                        if ( is_user_logged_in() ) {
                            wp_nav_menu( array( 'theme_location' => 'user-menu', 'menu_class' => 'nav' ) );
                        } else {
                            wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'nav' ) );
                        }
					?>
				</nav> <!-- #nav-main -->
			</div>
		</div>
	</div>
</div><!-- .navbar -->


