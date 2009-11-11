<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Vraag deze pagina niet direct op. Bedankt!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?><p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('Geen reacties', 'Een reactie', '% Reacties' );?> to &#8220;<?php the_title(); ?>&#8221;</h3> 

	<ol class="commentlist">
	<?php $commentcounter = 0; ?>
	<?php foreach ($comments as $comment) : ?>
		<?php $commentcounter++; ?>
		<li class="<?php echo $oddcomment; /* Style differently if comment author is blog author */ if ($comment->comment_author_email == get_the_author_email()) { echo ' authorcomment'; } ?>" id="comment-<?php comment_ID() ?>">
			<div class="cmtinfo"><em><?php edit_comment_link('pas dit aan','',''); ?> op <?php comment_date('d M Y') ?> om <?php comment_time() ?></em><small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><span class="commentnum"><?php echo $commentcounter; ?></span></a></small><cite><?php comment_author_link() ?></cite></div>
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Je reactie is in moderatie.</em><br />
			<?php endif; ?>			
			<?php comment_text() ?>			
		</li>

	<?php /* Changes every other comment to a different class */	
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post-> comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Het geven van reacties staat uit.</p>
		
	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post-> comment_status) : ?>

<h3 id="respond">Laat een reactie achter</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Je dient te zijn <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">aangemeld</a> om een reactie te kunnen geven.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Aangemeld als <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>">Afmelden &raquo;</a></p>

<?php else : ?>

<p><label for="author"><small>Naam <?php if ($req) _e('(required)'); ?></small></label>
<input class="textbox" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
</p>

<p><label for="email"><small>Email <?php if ($req) _e('(required)'); ?></small></label>
<input class="textbox" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
</p>

<p><label for="url"><small>Website </small></label>
<input class="textbox" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
</p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Verstuur reactie" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
