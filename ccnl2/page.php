<?php get_header();?>
<div id="page-content">
<div id="page-content-main">
<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="posttitle">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<p class="post-info"><small><?php edit_post_link('Aanpassen', '', ''); ?></small></p>
				</div>
				
				<div class="entry">
					<?php the_content(); ?>	
					<?php wp_link_pages(); ?>				
																
				</div>
		
				<!--<p class="postmetadata"><?php //comments_popup_link('Geen reacties &#187;', '1 reactie &#187;', '% reacties &#187;'); ?></p>
				<?php //comments_template(); ?>-->
			</div>
	
		<?php endwhile; ?>

		<p align="center"><?php posts_nav_link(' - ','&#171; Vorige','Volgende &#187;') ?></p>
		
	<?php else : ?>

		<h2 class="center">Niks gevonden</h2>
		<p class="center">Sorry, maar hetgeen wat je zoekt kunnen we niet vinden.</p>
		

	<?php endif; ?>
</div><!-- end id:content-main -->
<?php get_sidebar('standaard')?>
<?php get_footer();?>
