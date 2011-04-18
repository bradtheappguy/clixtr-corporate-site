<?php
/**
 * Template Name: Team
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

     
     <div class="content">
             <div class="ProOverview"><h2>Team</h2>
                  <div class="ProImg"><a href="<?php bloginfo('template_directory'); ?>/images/fergus.png"><img src="<?php bloginfo('template_directory'); ?>/images/fergus.png"/></a></div> 
                       <div class="portfolio-txt">
                         <h3>Fergus Hurley &mdash; Founder</h3>
                             <p>Lorem ipsum dolor sit amet, <strong><a href="#">consectetur</a></strong> adipiscing elit. Fusce quis nisi lobortis sem viverra blandit. Etiam id justo augue, eu aliquam magna. Nunc id quam velit, id molestie nisi. Ut porta, neque porta tincidunt egestas, <strong><a href="#">lorem</a></strong> magna fermentum lorem, at pellentesque eros libero ac lorem. Ut congue, ligula at ultricies placerat, justo metus aliquam mauris, ut pharetra ipsum ligula id mauris. </p>
                       </div><!--port text-->
                 </div><!--proOverview-->
                 <div class="ProOverview more_margin">
                           <div class="ProImg"><img src="<?php bloginfo('template_directory'); ?>/images/brad.png"/></div> 
                       <div class="portfolio-txt">
                         <h3>Brad Smith &mdash; Co-Founder</h3>
                             <p>Lorem ipsum dolor sit amet, <strong><a href="#">consectetur</a></strong> adipiscing elit. Fusce quis nisi lobortis sem viverra blandit. Etiam id justo augue, eu aliquam magna. Nunc id quam velit, id molestie nisi. Ut porta, neque porta tincidunt egestas, <strong><a href="#">lorem</a></strong> magna fermentum lorem, at pellentesque eros libero ac lorem. Ut congue, ligula at ultricies placerat, justo metus aliquam mauris, ut pharetra ipsum ligula id mauris. </p>
                       </div><!--port text-->
                 </div><!--pro overview-->               
     </div><!--content-->
</div><!--wrapper-->
    
    	<?php get_footer(); ?>

    
</body>
</html>
