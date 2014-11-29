<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php $postType = get_post_type( get_the_ID() ); ?>
<div class="jumbotron">
        <div id="wrapper" class="">

  <div id="featured" class="">


    <div id="featured-banner" class="single-product-image-wrap">

      
      <?php 
     the_post_thumbnail('full', array( 'class'  => "img-responsive attachment-post-thumbnail"));
      ?>

    </div>
</div> <!-- Featured-->
</div> <!-- Wrapper -->
</div> <!-- Jumbotron -->
<div class="jumbotron single-product-jumbotron" style="padding: 0 15px !important;">
        <div id="wrapper" class="">

  <div id="featured" class="">
    <div class="single-product-details">  

      <div class="row">
        <div class="col-md-8 col-md-8-modify <?php if($postType != 'newsmedia'): ?>product-item <?php endif;?>" style="<?php if($postType == 'newsmedia'): ?>width:95%; <?php endif;?>"> <!-- 8 column div -->
			<?php /* The loop */ ?>
			<div class="heading">
            
          <div  class="breadCrum">
                    <h3 class="title">
              <a href="<?php echo site_url( '/products/', 'http' ); ?>" class="title">Products</a><span> / </span><a class="bdactive title" href="<?php echo get_permalink( $blog->ID ); ?>"><?php the_title(); ?></a>
            </h3>
          </div><!-- Breadcrums  -->
  
            
          </div>

          <div class="row-detail single-product-detailed-section">
            <h5 class="title product-title"><?php the_title(); ?>:</h5>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php //twentythirteen_post_nav(); ?>
				<?php //comments_template(); ?>

			<?php endwhile; ?>

  		</div>
          
          

        </div> <!-- 8 columns div ends -->
        <?php if($postType != 'newsmedia'): ?>
        <div class="col-md-4 col-md-4-modify"> <!-- 4 column div starts here -->
          
          <div class="col-md-4-divs"> <!-- Upper div -->

            <h3 class="title">
              Downloads
            </h3>

            <a href="<?php echo get_field('pdf_link_1'); ?>" target="_blank"><p class="title download-file"><span class="pdf">PDF</span>Spec Chart</p></a><br />
            <a href="<?php echo get_field('pdf_link_2'); ?>" target="_blank"><p class="title download-file"><span class="pdf">PDF</span>Trimming Instructions</p></a><br />
            <a href="<?php echo get_field('pdf_link_3'); ?>" target="_blank"><p class="title download-file"><span class="pdf">PDF</span>Swing Speed Chart</p></a><br />

          </div> <!-- Upper div Ends here -->

          <div class="col-md-4-divs design-tech-wrap"> <!-- Lower div -->

            <h3 class="title">
              Design & Technology
            </h3>

            <p>
              <ul>
                <li class="title">High modular graphite core</li><br />
                <li class="title">Over 59 miles of steel fiber covers 
                    the entire surface of the each shafts</li>
              </ul>
            </p>

          </div> <!-- Lower div ends here -->

        </div> <!-- 4 column div ends here -->
    <?php endif; ?>
      </div>
      
      
    </div>

  </div><!-- end of #featured -->

      </div>
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>