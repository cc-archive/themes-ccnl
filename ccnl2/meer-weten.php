<?php 
/*
* Template Name: Meer weten
*/
?>
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
        
       <!-- display random cc image --> 
       <?php if (function_exists('c2c_random_file')) : ?>
            <img id="random-meer-weten-image" alt="willekeurig cc plaatje" src="<?php echo c2c_random_file('/wp-content/uploads/random-plaatjes-meer-weten/', 'jpg gif png jpeg'); ?>" />
       <?php endif; ?> 
       <h2>De Creative Commons licenties</h2> 
       <p>
       De zes beschikbare Creative Commons licenties zijn, van meest vrijgevende tot meest restrictieve licentie:
       </p>
       <ul class="nobullet">
            <li><img id="CC-BY" alt="Naamsvermelding licentie icoon" src="<?php bloginfo('template_directory'); ?>/img/licenses/BY.png" /> <strong>Naamsvermelding</strong><br /> 
            Het werk - of een afgeleide werk ervan - kan worden gekopieerd, veranderd, verspreid en vertoond, onder de enkele voorwaarde dat de naam van de maker wordt vermeld.
            -<a title="bekijk de licentie samenvatting" href="http://creativecommons.org/licenses/by/2.5/nl/">samenvatting</a>-	-<a title="bekijk de volledige licentie" href="http://creativecommons.org/licenses/by/2.5/nl/legalcode">volledige tekst</a>-
            </li>
            
            <li><img id="CC-BY-SA" alt="Naamsvermelding-GelijkDelen licentie icoon" src="<?php bloginfo('template_directory'); ?>/img/licenses/BY-SA.png" /> <strong>Naamsvermelding-GelijkDelen</strong><br />
            Deze licentie geeft anderen dezelfde rechten als een BY licentie, met de toevoeging dat elke nieuwe ontstane creatie onder dezelfde licentie wordt aangeboden.<br />
            -<a title="bekijk de licentie samenvatting" href="http://creativecommons.org/licenses/by-sa/2.5/nl/">samenvatting</a>-	-<a title="bekijk de volledige licentie" href="http://creativecommons.org/licenses/by-sa/2.5/nl/legalcode">volledige tekst</a>-
            </li>
            
            <li><img id="CC-BY-ND" alt="Naamsvermelding-GeenAfgeleidenWerken licentie icoon" src="<?php bloginfo('template_directory'); ?>/img/licenses/BY-ND.png" /> <strong>Naamsvermelding-GeenAfgeleideWerken</strong><br />
            Het werk mag worden verspreid, commercieel en niet-commercieel, mits in de originele staat en met vermelding van de naam van de maker.<br />
            -<a title="bekijk de licentie samenvatting" href="http://creativecommons.org/licenses/by-nd/2.5/nl/">samenvatting</a>-  -<a title="bekijk de volledig licentie" href="http://creativecommons.org/licenses/by-nd/2.5/nl/legalcode">volledige tekst</a>-
            </li>
            
            <li><img id="CC-BY-NC" alt="Naamsvermelding-NietCommercieel licentie icoon" src="<?php bloginfo('template_directory'); ?>/img/licenses/BY-NC.png" /> <strong>Naamsvermelding-NietCommercieel</strong><br />
            Anderen mogen het werk gebruiken en veranderen zolang ze dit niet-commercieel doen en onder vermelding van de maker.<br />
            -<a title="bekijk de licentie samenvatting" href="http://creativecommons.org/licenses/by-nc/2.5/nl/">samenvatting</a>-	-<a title="bekijk de volledige licentie" href="http://creativecommons.org/licenses/by-nc/2.5/nl/legalcode">volledige tekst</a>-
            </li>
            
            <li><img id="CC-BY-NC-SA" alt="Naamsvermelding-NietCommercieel-GelijkDelen licentie icoon" src="<?php bloginfo('template_directory'); ?>/img/licenses/BY-NC-SA.png" /> <strong>Naamsvermelding-NietCommercieel-GelijkDelen</strong><br />
            Anderen mogen het werk gebruiken en veranderen zolang ze dit niet-commercieel doen, onder vermelding van de naam van de maker en onder de voorwaarde dat elke nieuwe creatie onder dezelfde licentie wordt aangeboden.<br />
            -<a title="bekijk de licentie samenvatting" href="http://creativecommons.org/licenses/by-nc-sa/2.5/nl/">samenvatting</a>-	-<a title="bekijk de volledige licentie" href="http://creativecommons.org/licenses/by-nc-sa/2.5/nl/legalcode">volledige tekst</a>-
            </li>
            
            <li><img id="CC-BY-NC-ND" alt="Naamsvermelding-NietCommercieel-GeenAfgeleideWerken licentie icoon" src="<?php bloginfo('template_directory'); ?>/img/licenses/BY-NC-ND.png" /> <strong>Naamsvermelding-NietCommercieel-GeenAfgeleideWerken</strong><br />
            Dit is de meest restrictieve licentie. Anderen mogen het werk verspreiden - niet veranderen-, zolang ze dit niet-commercieel doen en onder vermelding van de naam van de maker.<br />
            -<a title="bekijk de licentie samenvatting" href="http://creativecommons.org/licenses/by-nc-nd/2.5/nl/">samenvatting</a>-	-<a title="bekijk de volledige licentie" href="http://creativecommons.org/licenses/by-nc-nd/2.5/nl/legalcode">volledige tekst</a>-
            </li>
        </ul>
       
		<p align="center"><?php posts_nav_link(' - ','&#171; Vorige','Volgende &#187;') ?></p>
		
	<?php else : ?>

		<h2 class="center">Niks gevonden</h2>
		<p class="center">Sorry, maar hetgeen wat je zoekt kunnen we niet vinden.</p>
		

	<?php endif; ?>
</div><!-- end id:content-main -->
<?php get_sidebar();?>
<?php get_footer();?>
