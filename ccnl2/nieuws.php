<?php
/*
Template Name: nieuws
*/
?>


<?php get_header();?>
<div id="content">
   <?php include (TEMPLATEPATH . '/sidebar-left.php'); ?> 
    <?php
        query_posts(null); // using param null as we apparently need to submit at least one paramter
    ?>
    <div id="content-main">
        <?php if (have_posts()) : ?>
    
            <?php while (have_posts()) : the_post(); ?>
    
                <div class="post" id="post-<?php the_ID(); ?>">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanente link naar <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <small><?php the_time('j F, Y') ?> <!-- by <?php the_author() ?> --></small>
    
                    <div class="entry">
                        <?php the_content('Lees meer &raquo;'); ?>
                    </div>
    
                    <p class="postmetadata">Geplaatst in <?php the_category(', ') ?> | <?php edit_post_link('Aanpassen', '', ' | '); ?>  <?php comments_popup_link('Geen reacties &#187;', '1 Reactie &#187;', '% Reacties &#187;'); ?></p>
                </div>
    
            <?php endwhile; ?>
    
            <div class="navigation">
                <div class="alignleft"><?php next_posts_link('&laquo; Oudere berichten') ?></div>
                <div class="alignright"><?php previous_posts_link('Nieuwere berichten &raquo;') ?></div>
            </div>
    
        <?php else : ?>
    
            <h2 class="center">Niks gevonden</h2>
            <p class="center">Sorry, maar hetgeen wat je zoekt kunnen we niet vinden. Wellicht kan de zoek je verder helpen.</p>
            <?php include (TEMPLATEPATH . "/searchform.php"); ?>
    
        <?php endif; ?>
    </div><!-- end id:content-main -->
 
<?php get_sidebar();?>
<?php get_footer();?>
