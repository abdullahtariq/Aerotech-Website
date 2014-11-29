<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Aerotech
 * @since Aerotech
 */

get_header(); ?>

	     <!-- Jumbotron -->
      <div class="jumbotron">
        <div id="wrapper" class="clearfix">

	<div id="featured" class="col-md-12">


		<div id="featured-image" class="col-md-7">

			
			<p><img class="aligncenter" src="./img/cover/01.jpg"  alt=""></p>

		</div>

		<div class="col-md-4 fit">

			<h2 class="featured-title">
				Welcome to the best 
				rounds of your life.			
			</h2>

			<h4 class="featured-subtitle">
				Stay on the leading edge of technology with 
SteelFiber’s game changing innovations.			</h4>

			<p>
				Sharpen your game while reducing injury and fatigue. By 
combining our innovative designs with our wide range of 
shaft options, you’ll t into a shaft that allows you to hit 
every shot straighter and longer with less effort and a 
reduced risk of injury or aggravation of existing injury			</p>

			
		</div>
		<!-- end of #featured-image -->

	</div><!-- end of #featured -->

      </div>

    </div> <!-- /jumbotron -->
     <div class="jumbotron widdget-wrap">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4 home-widget">
          <h3 class="title">What Players are Saying</h3>
          <p>"When I switched to Aerotech Golf shafts, I 
			was looking for a lighter weight iron shaft that 
			could provide me with consistent ball flight 
			and spot on distance control. Aerotech's 
			SteelFiber shafts fit the bill perfectly. The 
			SteelFiber technology has allowed me to take 
			advantage of all the benefits of a graphite 
			shaft yet still maintain complete control over 
			my golf ball."<br />
			— Matt Kuchar, PGA Tour pro</p><br />
			          <p>"I play the SteelFiber i95 iron shafts and really 
			love the feel and performance they give me. 
			Moving away from the x100's and into the 
			SteelFiber i95’s has allowed me to develop 
			three different shot trajectories, instead of 
			just a high and low. Plus, I've picked up a few 
			more yards in the process."<br />
			— Cameron Beckman, PGA Tour pro</p>
          
        </div>
        <div class="col-lg-4 home-widget">
          <h3 class="title">Choose the right shaft 
			for me. Find a Clubfitter</h3>
          <p><img class="aligncenter" src="./img/small_banner.png" width="100%;" alt=""></p>
       </div>
        <div class="col-lg-4 thirdwidget home-widget">
          <h3 class="title">Aerotech Tour News</h3>
          <p>SteelFiber Shafts Place on PGA and Champions 
			Tours</p><br/>
          <p id="NewsDate" class="NewsDate">10.08.12</p>
          <p>SteelFiber Shafts Win FedEx Cup Title and 
			TOUR Championship</p><br/>
			<p id="NewsDate" class="NewsDate">09.24.12</p>
          <p>SteelFiber Shafts Make Run at FedEx Cup Title</p><br/>
			<p id="NewsDate" class="NewsDate">09.19.12</p>
          <p>SteelFiber Shafts Draw Top 10 at Deutsche 
			Bank</p><br/>
			<p id="NewsDate" class="NewsDate">09.07.12</p>
          <p>SteelFiber Shafts Lock Up Second-Place at The 
			Barclays</p><br/>
			<p id="NewsDate" class="NewsDate">08.27.12</p>
          <p>SteelFiber Nets Top 10 at WGC-Bridgestone 
			Invitational</p><br/>
		<p class="thirdwidget-more">move></p>
        </div>
      </div>
    </div> <!-- /widget wrap -->
    </div> <!-- /container -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>