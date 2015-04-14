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

<footer id="footer" class="muted">
    <hr>
    <p class="pull-left"><a href="/">会读：少儿阅读指导</a></p>
    <p class="pull-right">© 2015</p>

    <p style="clear:both;"><?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?>  seconds.</p>
</footer>

		<?php do_action( 'wpbootstrap_after_footer' ); ?>

	</div><!-- .container -->

<?php do_action( 'wpbootstrap_before_wp_footer' ); ?>
<?php wp_footer(); ?>
<?php do_action( 'wpbootstrap_after_wp_footer' ); ?>

</body>
</html>