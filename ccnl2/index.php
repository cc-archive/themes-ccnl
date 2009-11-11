<?php get_header();?>
<div id="content">
  <div id="content-main">
    <div id="promo-wide">
	    <a href="http://creativecommons.org/choose/?lang=nl" title="Naar de licentie kiezer">
		    <img src="<?php bloginfo('template_url');?>/img/promo/promo_wide.png" alt="promo" />
	    </a>
    </div>
        <?php if (have_posts()) : ?>
    
            <?php while (have_posts()) : the_post(); ?>
  
                <div class="post" id="post-<?php the_ID(); ?>">
                    <h2 class="frontpage-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanente link naar <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <small class="frontpage-small"><?php echo ucfirst( get_the_author_firstname() ) . ' ' . ucfirst( get_the_author_lastname() ); ?>, <?php the_time('j M, Y') ?></small>
    
                    <div class="entry">
                        <?php the_content('Lees meer &raquo;'); ?>
                    </div>
    
                    <p class="frontpage-postmetadata"><?php edit_post_link('Aanpassen', '', ' | '); ?>  <?php comments_popup_link('Reageer &#187;', '1 Reactie &#187;', '% Reacties &#187;'); ?></p>
                </div>
                <div class="frontpage-divider"></div> 
            <?php endwhile; ?>
            <br />
            <div id="navigation-footer">
                <div class="alignleft"><?php next_posts_link('&laquo; Oudere berichten') ?>  </div>
                <div class="alignright"><?php previous_posts_link('Nieuwere berichten &raquo;') ?></div>
            </div>
    
        <?php else : ?>
    
            <h2 class="center">Niks gevonden</h2>
            <p class="center">Sorry, maar hetgeen wat je zoekt kunnen we niet vinden. Wellicht kan de zoek je verder helpen.</p>
            <?php include (TEMPLATEPATH . "/searchform.php"); ?>
    
        <?php endif; ?>
    </div><!-- end id:content-main -->
 
<?php get_sidebar('homepage');?>
<?php get_footer();?>
