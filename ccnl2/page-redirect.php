<?php
/*
 * Template Name: Page Redirect
 *
 * Makes it easy to redirect a page to another url, using the parameter redirect_url
 */
$redirect_url = get_post_meta($post->ID, "redirect_url", true); 

// Defaults if no options we're given
if( ! empty($redirect_url) ) {  header("Location: $redirect_url"); } else { echo "<!-- redirect not active, use redirect_url parameter -->"; } 
/* Make sure that code below does not get executed when we redirect. */

exit;?>
