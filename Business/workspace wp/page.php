<?php get_header(); ?>

<h1>pagssse</h1>
    <!-- Page Content -->
<div class="container">
      <!-- Podpięcie zarejestorowanego menu w functions.php
       < ?php
      if (has_nav_menu('pierwsze')){
       wp_nav_menu(array('theme_location' => 'pierwsze')) ;}
       ? > -->
       <div class="row">
        <!-- Blog Entries Column -->
        <?php if(is_active_sidebar('sidebar-prawy')): ?>
       <!-- Blog Entries Column -->
       <div class="col-md-8">
       <?php else: ?>
          <div class="col-md-12">
          <?php endif;?>
        <?php while(have_posts()) : the_post();
        // przywolanie zawrtosci pojedynczego artykulu
        get_template_part('template_parts/content','single');
         // Jeśli komenatrze to je pokaz
         if(comments_open()):
            comments_template();
          endif;

         endwhile;
            ?>




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

        <?php if(is_active_sidebar('sidebar-strony')): ?>
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <?php get_sidebar('new');?>
            </div>
            <?php endif;?>


      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


<?php get_footer(); ?>
