<?php get_header();?>
<div id="content">
<div id="content-main">
	<?php if ($posts) : foreach ($posts as $post) : start_wp(); ?>		
	<?php $attachment_link = get_the_attachment_link($post->ID, true, array(450, 800)); // This also populates the iconsize for the next line ?>
	<?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // This lets us style narrow icons specially ?>
			
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="posttitle">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanente link naar <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<p class="post-info">
						Geplaatst in <?php the_category(', ') ?>  op <?php the_time('j M, Y') ?> <?php edit_post_link('Aanpassen', '', ' | '); ?> <?php comments_popup_link('Geen reacties &#187;', '1 Reactie &#187;', '% Reacties &#187;'); ?> </p>
				</div>				
				<div class="entry">
					<p class="<?php echo $classname; ?>"><?php echo $attachment_link; ?><br /><?php echo basename($post->guid); ?></p>
					<?php the_content(); ?>
					<!--
						<?php trackback_rdf(); ?>
					-->
				</div>
				<?php comments_template(); ?>
			</div>
			<?php endforeach; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
</div><!-- end id:content-main -->
<?php get_sidebar();?>
<?php get_footer();?>