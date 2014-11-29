<?php
/**
 * The template for displaying all Newsman Post
 */

get_header(); ?>

<?php $postType = get_post_type( get_the_ID() ); ?>
<div class="jumbotron center-image">
        <div id="wrapper" class="">

  <div id="featured" class="">


    <div id="featured-banner" class="">

      
      <?php 
     the_post_thumbnail( 'full' );
      ?>

    </div>

    <div class="lower-main-div">  

      <div class="row">
        <div class="col-md-8 col-md-8-modify" style="<?php if($postType == 'newsmedia'): ?>width:95%; <?php endif;?>"> <!-- 8 column div -->
			<?php /* The loop */ ?>
			<div class="heading">
            <h3 class="title">
              
              <?php the_title(); ?>
            </h3>
          </div>

          <div class="row-detail">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php //twentythirteen_post_nav(); ?>
				<?php //comments_template(); ?>

			<?php endwhile; ?>

  		</div>
          
          

        </div> <!-- 8 columns div ends -->
        
      </div>
      
      
    </div>

  </div><!-- end of #featured -->

      </div>
    </div>
<style type="text/css">
    .row-detail a {
      display: none !important;
    }
    .lower-main-div {
    border-top: none;
  }
</style>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>