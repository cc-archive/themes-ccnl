<?php get_header();?>
<div id="content">
<div id="page-content-main">
<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="posttitle" style="padding: 14px 0pt 0pt;">
          <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanente link naar <?php the_title(); ?>"><?php the_title(); ?></a></h2>
          <br />
          <p class="post-info">
            <?php echo ucfirst( get_the_author_firstname() ) . ' ' . ucfirst( get_the_author_lastname() ); ?>, <?php the_time('j M, Y') ?><?php edit_post_link('Aanpassen', ' | ', ''); ?> 
          </p>
				</div>
				
				<div class="entry">
					<?php the_content(); ?>
        </div>
		
				
			</div>
			<?php comments_template(); ?>	
		<?php endwhile; ?>

		<p align="center"><?php posts_nav_link(' - ','&#171; Vorige','Volgende &#187;') ?></p>
		
	<?php else : ?>

		<h2 class="center">Niks gevonden</h2>
		<p class="center">Sorry, maar hetgeen wat je zoekt kunnen we niet vinden.</p>		

	<?php endif; ?>
</div><!-- end id:content-main -->
<?php get_sidebar();?>
<?php get_footer();?>
