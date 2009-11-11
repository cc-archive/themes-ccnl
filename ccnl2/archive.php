<?php get_header();?>
<div id="content">
<div id="page-content-main">
<?php if (have_posts()) : ?>
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    
    <?php /* If this is a category archive */ if (is_category()) { ?>				
		<h2 class="pagetitle-archive">Archief voor de '<?php echo single_cat_title(); ?>' Categorie</h2>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle-archive">Archief voor <?php the_time('F jS, Y'); ?></h2>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle-archive">Archief voor <?php the_time('F Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle-archive">Archief voor <?php the_time('Y'); ?></h2>
		
	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<h2 class="pagetitle-archive">Zoek resultaten</h2>
		
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle-archive">Schrijvers Archief</h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle-archive">Blog Archieven</h2>

		<?php } ?>
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
			  <h2 class="frontpage-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <small class="frontpage-small"><?php echo ucfirst( get_the_author_firstname() ) . ' ' . ucfirst( get_the_author_lastname() ); ?>, <?php the_time('j M, Y') ?></small>
				<div class="entry">
					<?php the_excerpt(); ?>
					<p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Lees meer &#187;</a></p>
				</div>
				<?php comments_template(); ?>
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
