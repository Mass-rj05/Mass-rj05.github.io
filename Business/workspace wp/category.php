<?php get_header(); ?>
    <!-- Page Content -->
<div class="container">
      <!-- Podpięcie zarejestorowanego menu w functions.php
       < ?php
      if (has_nav_menu('pierwsze')){
       wp_nav_menu(array('theme_location' => 'pierwsze')) ;}
       ? > -->


          <h1 class="my-4">
            <!-- <?php bloginfo('name');?> -->
            <small style="color:white;"><?php bloginfo('description');?> </small>
          </h1>
          <h2>   <small style="color:white;">Twoja kategoria : <?php single_cat_title();?></small></h2>

  <div class="row" >

    <?php if(is_active_sidebar('sidebar-prawy')):?>
   <!-- Blog Entries Column -->
   <div class="col-md-8">

<?php else: ?>
   <div class="col-md-12">
  <?php endif;?>
                <!-- Wordpress loop -->
                <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                get_template_part('template_parts/content');  edit_post_link();

                 endwhile;
                 else :  ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>
            <?php if(is_active_sidebar('sidebar-prawy')): ?>
                <!-- Sidebar Widgets Column -->
                <div class="col-md-4">
                    <?php get_sidebar('prawy');?>
                </div>
                <?php endif;?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <?php get_footer(); ?>
