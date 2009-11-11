<?php
 // BjornW Mon Aug 20 22:36:05 CEST 2007 @900 /Internet Time/
    // Changed the header so that upon the 'extra' page the license button will be hidden
    // otherwise the license button will be shown. Nasty hack using an array, but it works.
    $nav            = createNavigation(); 
    $the_navigation = $nav['navigation'];
    $isExtra        = $nav['extra'];
?>  
<div id="footer">
  <div id="footer-content">	
    <div id="navigation-footer">
      <ul>
      <li><a href="#boven">Naar boven</a></li>
      <?php echo $the_navigation ?>

      </ul>
    </div>
    <br />  
    <p id="license">
      <a rel="license" href="http://creativecommons.org/licenses/by/2.5/nl/deed.nl">
        <img src="http://i.creativecommons.org/l/by/2.5/nl/88x31.png" width="88" height="31" alt="Creative Commons License" border="0" />
      </a> Mits niet anders <a href="http://creativecommons.org/policies#license" target="new">vermeld</a> valt de inhoud van deze pagina
      onder een <a rel="license" href="http://creativecommons.org/licenses/by/2.5/nl/deed.nl">Creative Commons Licentie</a>
    </p>
</div>
<?php // wp_loginout(); 
?>

<?php wp_footer();?>

</div>

</div><!-- /wrapper_abs -->
</div><!-- /wrapper -->
</div><!-- /horizon -->


</body>
</html>
