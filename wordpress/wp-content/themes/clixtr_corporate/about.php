<?php
/**
 * Template Name: About
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

     <div id="content">
              <ul class="app">
              	<li class="app_img"><a href="http://clixtr.com"><img src="<?php bloginfo('template_directory'); ?>/images/clixtr_iphones.png"/></a></li>
                 <li class="app_info">
                    <div class="icon"><a href="http://clixtr.com"><img src="<?php bloginfo('template_directory'); ?>/images/clixtr_ico.png"/></a></div>
                    <div class="app_title"><h2><a href="http://clixter.com">Clixtr</a></h2></div>
                    <div class="desc"><a href="http://clixtr.com">Clixtr turns smartphones into smartcameras by leveraging location based technologies and the rapidly improving quality of camera phones.</a>  </div>
                 </li>
              </ul>
              <ul class="app">
               <li class="app_img"><a href="http://picbounce.com"><img src="<?php bloginfo('template_directory'); ?>/images/picbounce_iphones.png"/></a></li>
                 <li class="app_info">
                    <div class="icon"><a href="http://picbounce.com"><img src="<?php bloginfo('template_directory'); ?>/images/picbounce_ico.png"/></a></div>
                    <div class="app_title"><h2><a href="http://picbounce.com">PicBounce</a></h2></div>
                    <div class="desc"><a href="http://picbounce.com">PicBounce is the easiest and fastest way to upload a photo from an iPhone to Facebook or Twitter.</a> </div>
                 </li>
              </ul>  
     </div><!--content-->
 
    	<?php get_footer(); ?>

</body>
</html>
