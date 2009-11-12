<?php 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- 
************************************************ 
* Burobjorn.nl                                 *  
* digitaal vakmanschap | digital craftsmanship *
************************************************
-->
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<meta name="keywords" content="<?php bloginfo('description'); ?>" />
<meta name="description" content="<?php bloginfo('description'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript" language="javascript" src="<?php bloginfo('template_directory'); ?>/js/cc-functions.js"></script>
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pngfix.js"></script>
<![endif]-->

<!--[if IE]>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/style-ie.css" />
<![endif]-->
<?php
 // BjornW Mon Aug 20 22:36:05 CEST 2007 @900 /Internet Time/
    // Changed the header so that upon the 'extra' page the license button will be hidden
    // otherwise the license button will be shown. Nasty hack using an array, but it works.
    $nav            = createNavigation(); 
    $the_navigation = $nav['navigation'];
    $isExtra        = $nav['extra'];
?>    



<?php wp_head(); ?>
</head>
<body id="section-index">
<div id="horizon">
  <div id="wrapper">
    <div id="wrapper_abs">
      <div id="header">
	      <div id="header-content">	
          <div class="header_abs">
          <a name="boven"></a>
            <div id="navigation">
      	      <ul><?php echo $the_navigation ?></ul>
            </div>

            <div id="header_logo">
              <a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>">
                <img src="<?php bloginfo('template_url');?>/img/ccnl_logo_white_big.png" alt="<?php bloginfo('name');?>" />
              </a>
            </div>
            
            <div id="tagline">&nbsp;</div> 

            <div id="header-search">
            <form method="get" id="searchform" action="<?php bloginfo('siteurl');?>">
	              <label class="hidden" for="s">Zoeken:</label>
                <input type="text" value="" name="s" id="s" />
            	  <input type="submit" id="searchsubmit" value="Zoeken" />
	            </form>
            </div>

        </div><!-- /header_abs -->

   </div>
</div>
<div id="container">








