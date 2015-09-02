<?php
/**
 * The template for displaying the footer.
 *
 */
?>
			</section><!-- #content -->
			<?php
				// Display the sidebar if enabled except the full page template.
				if ( wpbootstrap_get_setting('general_settings','display_sidebar') && (!is_page_template('page-fullwidth.php')) ) {
					do_action( 'wpbootstrap_get_sidebar' );
				}
			?>
		</div><!-- #main -->

		<?php
			if ( wpbootstrap_get_setting('general_settings','display_footer_widgets') ) {
				get_sidebar('footer-widgets');
			}
		?>

		<?php do_action( 'wpbootstrap_before_footer' ); ?>
<!-- old footer -->


		<?php do_action( 'wpbootstrap_after_footer' ); ?>

	</div><!-- .container -->

<footer id="footer" class="muted">

    <p class="pull-left">会读：少儿阅读指导</p>
    <p class="pull-right">© 2015</p>
</footer>

<?php do_action( 'wpbootstrap_before_wp_footer' ); ?>
<?php wp_footer(); ?>
<?php do_action( 'wpbootstrap_after_wp_footer' ); ?>

</body>
</html>