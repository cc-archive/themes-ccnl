<?php get_header();?>
<div id="content">
<div id="page-content-main">
<?php if (have_posts()) : ?>
    <?php 
          // Hack. Set $post so that the_date() works. 
          $post = $posts[0];
    ?>
    
		<h2 class="pagetitle-archive">Zoek resultaten voor <?php echo "'".$s."'";?></h2>
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
        <h2 class="frontpage-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <small class="frontpage-small"><?php echo ucfirst( get_the_author_firstname() ) . ' ' . ucfirst( get_the_author_lastname() ); ?>, <?php the_time('j M, Y') ?></small>
				<div class="entry">
					<?php the_excerpt(); ?>
					<p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanente link naar <?php the_title(); ?>">Lees het volledige bericht &#187;</a></p>
				</div>
			</div>
	
		<?php endwhile; ?>

		<p align="center"><?php posts_nav_link(' - ','&#171; Vorige','Volgende &#187;') ?></p>
		
	<?php else : ?>

		<h2 class="pagetitle-archive">Niks gevonden</h2>
		<p class="center">Sorry, maar hetgeen wat je zoekt kunnen we niet vinden.</p>
	<?php endif; ?>
</div><!-- end id:content-main -->
<?php get_sidebar();?>
<?php get_footer();?>
