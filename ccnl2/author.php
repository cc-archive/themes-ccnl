<?php get_header();?>
<div id="content-main">
<div class="post">
<?php
	global $wp_query;
	$curauth = $wp_query->get_queried_object();
?>
<h2><?php _e('About: ', $cc_txt_domain); ?> <?php echo $curauth->nickname; ?></h2>
<dl>
<dt><?php _e('Full name:', $cc_txt_domain); ?></dt>
<dd><?php echo $curauth->first_name. ' ' . $curauth->last_name ;?></dd>
<dt><?php _e('Website:', $cc_txt_domain); ?></dt>
<dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
<dt><?php _e('Description:', $cc_txt_domain); ?></dt>
<dd><?php echo $curauth->description; ?></dd>
</dl>

      <h2><?php _e('Posts by', $cc_txt_domain); ?> <?php echo $curauth->nickname; ?>:</h2>
			<ul class="authorposts">
			<!-- The Loop -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<li>
				<h4>
				<em><?php the_time('d M Y'); ?></em>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php __('Permanent Link to', $cc_txt_domain); ?> Permanente link naar: <?php the_title(); ?>"><?php the_title(); ?></a>
				</h4>
			</li>
			<?php endwhile; else: ?>
			<p><?php _e('No posts by this author.'); ?></p>

			<?php endif; ?>
			<!-- End Loop -->			
		</ul>
		<p align="center"><?php posts_nav_link($sep=' &#8212; ', $prelabel='&laquo;' . __('Previous', $cc_txt_domain), $nxtlabel= __('Next', $cc_txt_domain) .'&raquo;') ?></p>
        
	</div>
</div><!-- end id:content-main -->
<?php get_sidebar();?>
<?php get_footer();?>
