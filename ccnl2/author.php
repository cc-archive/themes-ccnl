<?php get_header();?>
<div id="content-main">
<div class="post">
<?php
	global $wp_query;
	$curauth = $wp_query->get_queried_object();
?>
<h2>Over: <?php echo $curauth->nickname; ?></h2>
<dl>
<dt>Volledige naam:</dt>
<dd><?php echo $curauth->first_name. ' ' . $curauth->last_name ;?></dd>
<dt>Website</dt>
<dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
<dt>Details</dt>
<dd><?php echo $curauth->description; ?></dd>
</dl>

			<h2>Berichten door <?php echo $curauth->nickname; ?>:</h2>
			<ul class="authorposts">
			<!-- The Loop -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<li>
				<h4>
				<em><?php the_time('d M Y'); ?></em>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanente link naar: <?php the_title(); ?>"><?php the_title(); ?></a>
				</h4>
			</li>
			<?php endwhile; else: ?>
			<p><?php _e('No posts by this author.'); ?></p>

			<?php endif; ?>
			<!-- End Loop -->			
		</ul>
		<p align="center"><?php posts_nav_link($sep=' &#8212; ', $prelabel='&laquo; Vorige pagina', $nxtlabel='Volgende pagina &raquo;') ?></p>
        
	</div>
</div><!-- end id:content-main -->
<?php get_sidebar();?>
<?php get_footer();?>