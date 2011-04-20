<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

</div><!-- #wrapper -->
	</div><!-- #main -->

	<div id="footer" class="foot" role="contentinfo">
		
			<div class="foot_links"><div class="foot_hilite"></div>
            <ul><li>Blog</li><li>Press</li><li>Legal</li></ul>
           <ul><li>Contact</li><li>About</li><li>Privacy</li></ul>
           <ul><li>Downloads</li><li>Team</li><li>&copy;Clixtr 2011</li></ul>
		</div>     

	</div><!-- #footer -->



<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
