<?php
/*
* Template Name: frontpages
*/
?>
<?php get_header();?>
<div id="content">

   <div id="content-main">
        <div class="post">
            <h2>Van &quot;Alle rechten voorbehouden&quot; naar &quot;Sommige rechten voorbehouden&quot;.</h2>
            <div class="entry">
                <p>
                Deel je werk onder jouw voorwaarden. Behoud je auteursrechten maar geef anderen de mogelijkheid om je werk te gebruiken, op een manier die je zelf kiest.
                </p>
                <p>
                Creative Commons biedt auteurs, kunstenaars, wetenschappers en onderwijzers de vrijheid om op een flexibele manier met hun auteursrechten om te gaan. 
                Met een Creative Commons licentie behoud je al je rechten, maar geef je aan anderen toestemming om je werk te verspreiden, met anderen te delen of bij sommige licenties het ook te bewerken.
                Grote kans dat daardoor het werk sneller wordt verspreid, en dus bij meer mensen bekend. 
                </p> 
                <p>
                Kortom: Deel wat je wilt delen, behoud wat je wilt behouden.
                </p>
                <p>
                Voorbeelden? Gebruik onze <a href="http://search.creativecommons.org" title="ga naar de zoekmachine">zoekmachine</a> om gelicenseerd werk te zoeken. 
                Klik <a href="http://creativecommons.nl/newsite/?page_id=2" title="meer weten">hier als je meer wilt weten</a> over onze licenties, of het laatste Creative Commons <a href="http://creativecommons.nl/newsite/?page_id=6">nieuws</a> wilt lezen. 
                Voor nog meer informatie download ons <a href="http://creativecommons.nl/downloads/werkplan_cc-nl.pdf">werkplan</a> of neem contact met ons op via <a href="mailto:info@creativecommons.nl">info@creativecommons.nl</a>.
                Genoeg gelezen en meteen een licentie kiezen? Dat kan <a href="http://creativecommons.org/license">hier</a>.
                </p>
            </div>
        </div>
        
       <!-- display random cc image --> 
       <?php if (function_exists('c2c_random_file')) : ?>
            <img id="random-home-image" alt="willekeurig cc plaatje" src="<?php echo c2c_random_file('/wp-content/uploads/random-plaatjes-home/', 'jpg gif png jpeg'); ?>" />
       <?php endif; ?>     
        
       
       <?php 
          $selected = get_settings('cc-nl-cover-news-item'); 
          query_posts("p=$selected"); 
       ?>
       <?php if (have_posts()) : ?>
           <?php while (have_posts()) : the_post(); ?>
               <div class="post" id="post-<?php the_ID(); ?>">
                   <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanente link naar <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                   <small><?php the_time('j F, Y') ?> <!-- by <?php the_author() ?> --></small>
                   <div class="entry">
                       <?php the_content('Lees meer &raquo;'); ?>
                   </div>
                   <p class="postmetadata"><?php edit_post_link('Aanpassen', '', ' | '); ?>  <?php comments_popup_link('Geen reacties &#187;', '1 Reactie &#187;', '% Reacties &#187;'); ?></p>
               </div>
               <br />
           <?php endwhile; ?>
        <?php endif; ?>
        
   </div><!-- end id:content-main -->
 
<?php include (TEMPLATEPATH . '/home-sidebar-right.php'); ?>
<?php get_footer();?>
