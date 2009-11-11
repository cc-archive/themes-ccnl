<?php
if(function_exists('c2c_obfuscate_email')) {
    $email = '<a href="mailto:info@creativecommons.nl">info@creativecommons.nl</a>';
    $cc_email = c2c_obfuscate_email($email);
} else {
    $cc_email = '';
}
?>
<div id="home-sidebar-left">
<ul>    
    <li class="sidebox">
        <h2>Kies een licentie</h2>
        <p><strong><a href="http://creativecommons.org/license/" title="Ga naar de licentie kiezer">Licenseer</a></strong> je werk onder een van de zes -gratis- aangeboden licenties van Creative Commons.    
        <!--<img alt="Licenseer uw werk" id="" src="<?php bloginfo('template_directory'); ?>/img/publish.png" border="0" /> <br /> -->
        </p>
        <p>
        <strong><a href="<?php bloginfo('siteurl'); ?>/?page_id=2" title="meer weten over creative commons">Meer weten?</a></strong>
        </p>
    </li>
    <li class="sidebox">
        <h2>Nieuwsbrief</h2>
        <p>Je kunt je hieronder abonneren op de CC NL nieuwsbrief. Oude nieuwsbrieven kun je <a href="http://creativecommons.nl/pipermail/nieuwsbrief/">hier</a> lezen.</p>
        <form name="newsletter" id="newsletterform" method="post" action="<?php bloginfo('template_directory'); ?>/nws_letter.php">
        <label for="home-newsletter">email adres:</label><br />
            <input type="text" size="15" maxlength="255" name="newsletter" id="home-newsletter" /><br />
            <input type="hidden" name="hash" value="<?php echo $_SESSION['nws_letter_hash']; ?>" />
            <input type="submit" value="aanmelden" />
        </form>
        <p> Heb je een vraag? Email naar: <?php echo $cc_email; ?>
        </p>
    </li>
    <li>
    <img id="image-map" src="<?php bloginfo('template_directory'); ?>/img/license_links_stroke_hidden.png" usemap="#map" alt="cc licenties collage" border="0" />
    <map name="map" id="map">
    <!-- #$-:Image Map file created by GIMP Imagemap Plugin -->
    <!-- #$-:GIMP Imagemap Plugin by Maurits Rijk -->
    <!-- #$-:Please do not edit lines starting with "#$" -->
    <!-- #$VERSION:2.0 -->
    <!-- #$AUTHOR:Burobjorn -->
    <area shape="poly" coords="49,0,7,-2,13,32,45,28,52,17" href="http://creativecommons.org/licenses/by-nc-sa/3.0/nl/legalcode" alt="CC BY-NC-SA licentie" />
    <area shape="poly" coords="55,28,88,50,117,23,114,0,52,0" href="http://creativecommons.org/licenses/by-nd/3.0/nl/legalcode" alt="CC BY-ND licentie" />
    <area shape="poly" coords="132,8,104,45,127,80,157,90,161,8,152,4" href="http://creativecommons.org/licenses/by-nc/3.0/nl/legalcode" alt="CC BY-NC licentie" />
    <area shape="poly" coords="1,36,51,30,81,57,87,91,72,118,2,117,2,116,-3,74" href="http://creativecommons.org/licenses/by-sa/3.0/nl/legalcode" alt="CC BY-SA licentie" />
    <area shape="poly" coords="104,44,80,53,91,83,119,71" href="http://creativecommons.org/licenses/by-nc-nd/3.0/nl/legalcode" alt="CC BY-NC-ND licentie" />
    <area shape="poly" coords="74,119,88,88,116,70,153,94,161,119,114,119" href="http://creativecommons.org/licenses/by/3.0/nl/legalcode" alt="CC BY licentie" />
    </map>
    </li>
    <!--
    <li class="sidebox">
        <p>
            <a href="" title=""><img src="<?php bloginfo('template_directory'); ?>/img/btn_120x60.png" alt="button" /></a>
        </p>
    </li>
    -->
</ul>
</div>

