<?php
// helper functions
  if ( function_exists('wp_list_bookmarks') ) //used to check WP 2.1 or not
    $numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='post' and post_status = 'publish'");
    else
    $numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'");
  if (0 < $numposts) $numposts = number_format($numposts); 
    $numcmnts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
        if (0 < $numcmnts) $numcmnts = number_format($numcmnts);
// ----------------


if( function_exists('register_sidebar') ) {
  register_sidebar(array(
    'name'          => 'standard',
    'before_widget' => '<li class="sidebox">', 
    'after_widget' => '</li>',
    'before_title' => '<h2>',
    'after_title' => '</h2>', 
	));

  register_sidebar(array(
    'name'          => 'homepage', 
    'before_widget' => '<li class="sidebox">', 
    'after_widget' => '</li>',
    'before_title' => '<h2>',
    'after_title' => '</h2>', 
  ));

  
  register_sidebar(array(
    'name'          => 'activiteiten', 
    'before_widget' => '<li class="sidebox">', 
    'after_widget' => '</li>',
    'before_title' => '<h2>',
    'after_title' => '</h2>', 
  ));


  register_sidebar(array(
    'name'          => 'activiteiten-buma-pilot', 
    'before_widget' => '<li class="sidebox">', 
    'after_widget' => '</li>',
    'before_title' => '<h2>',
    'after_title' => '</h2>', 
  ));

  register_sidebar(array(
    'name'          => 'licenties', 
    'before_widget' => '<li class="sidebox">', 
    'after_widget' => '</li>',
    'before_title' => '<h2>',
    'after_title' => '</h2>', 
  ));


  register_sidebar(array(
    'name'          => 'onderzoek', 
    'before_widget' => '<li class="sidebox">', 
    'after_widget' => '</li>',
    'before_title' => '<h2>',
    'after_title' => '</h2>', 
  ));
  
  register_sidebar(array(
    'name'          => 'over-ons', 
    'before_widget' => '<li class="sidebox">', 
    'after_widget' => '</li>',
    'before_title' => '<h2>',
    'after_title' => '</h2>', 
  ));

}
    

function ccnl_add_theme_page() {
    if ( $_GET['page'] == basename(__FILE__) ) {
        // save settings
        if ('save' == $_POST['action']) {
            update_option( 'cc-nl-cover-news-item', $_POST[ 'cc-nl-cover-news-item' ] );
            if( isset( $_POST[ 'cc-nl-exclude-pages' ] ) ) { update_option( 'cc-nl-exclude-pages', implode(',', $_POST['cc-nl-exclude-pages']) ); } else { delete_option( 'cc-nl-exclude-pages' ); }
            // goto theme edit page
            header("Location: themes.php?page=functions.php&saved=true");
            die;

        // reset settings
        } else if( 'reset' == $_POST['action'] ) {
            delete_option('cc-nl-cover-news-item');           
            delete_option('cc-nl-exclude-pages');
            // goto theme edit page
            header("Location: themes.php?page=functions.php&reset=true");
            die;
        }
    }
    add_theme_page("CC NL Opties", "CC NL Opties", 'edit_themes', basename(__FILE__), 'ccnl_theme_page');
}


function ccnl_theme_page() {
    if ( $_GET['saved'] ) echo '<div id="message" class="updated fade"><p><strong>Instellingen opgeslagen.</strong></p></div>';
    if ( $_GET['reset'] ) echo '<div id="message" class="updated fade"><p><strong>Instellingen gereset.</strong></p></div>';
?>  
    <div class="wrap">
        <h2>CC NL</h2>
        <p>
        Dit thema is gebaseerd op het thema <a href="http://wpthemes.info/misty-look/">MistyLook</a> van <a href="http://wpthemes.info/" target="_blank">Sadish Bala</a> en aangepast 
        voor <a href="http://www.creativecommons.nl">Creative Commons Nederland</a> door Bjorn Wijers van <a href="http://www.burobjorn.nl">Burobjorn.nl</a>.
        </p>
        
        <form name="cc-nl-options" method="post">
            <fieldset class="options">
                <legend>Thema instellingen</legend>
                <?php _ccnl_posts(); ?>    
                <br />                
                <input type="hidden" name="action" value="save" />
                <?php //_ccnl_exclude_pages(); ?>
                <?php _ccnl_input( "save", "submit", "", "Save Settings" ); ?>
            </fieldset>
        </form>

        <!--<form name="cc-nl-reset" method="post">
            <fieldset class="options">
                <legend>Reset</legend>
                <p>Als je om wat voor reden dan ook dit thema wil verwijderen of de opties weer helemaal fris en schoon wilt hebben,
                druk dan op de reset knop om alles in de database met betrekking tot dit thema op te schonen. Als je dit thema volledig wil verwijderen,
                vergeet dan niet het thema uit de folder wp-content/themes/ te verwijderen.
                </p>
                <input type="hidden" name="action" value="reset" />
                <?php //_ccnl_input( "reset", "submit", "", "Reset Settings" ); ?>
            </fieldset>        
        </form>-->
    </div>
<?php
}




function _ccnl_input( $var, $type, $description = "", $value = "", $selected="" ) {
    echo "\n";
    switch( $type ){
    
        case "text":
            echo "<input name=\"$var\" id=\"$var\" type=\"$type\" style=\"width: 60%\" class=\"textbox\" value=\"$value\" />";
            break;
            
        case "submit":
            echo "<p class=\"submit\"><input name=\"$var\" type=\"$type\" value=\"$value\" /></p>";
            break;

        case "option":
            if( $selected == $value ) { $extra = "selected=\"true\""; }
            echo "<option value=\"$value\" $extra >$description</option>";
            break;
    
        case "radio":
            if( $selected == $value ) { $extra = "checked=\"true\""; }
            echo "<label><input name=\"$var\" id=\"$var\" type=\"$type\" value=\"$value\" $extra /> $description</label><br/>";
            break;
            
        case "checkbox":
            if( $selected == $value ) { $extra = "checked=\"true\""; }
            echo "<label for=\"$var\"><input name=\"$var\" id=\"$var\" type=\"$type\" value=\"$value\" $extra /> $description</label><br/>";
            break;

        case "textarea":
            echo "<textarea name=\"$var\" id=\"$var\" style=\"width: 80%; height: 10em;\" class=\"code\">$value</textarea>";
            break;
    }
}

function _ccnl_exclude_pages() {
    global $wpdb;
    if (function_exists('wp_list_bookmarks')) { //WP 2.1 or greater
        $results = $wpdb->get_results("SELECT ID, post_title from $wpdb->posts WHERE post_type='page' AND post_parent=0 ORDER BY post_title");
    } else {
        $results = $wpdb->get_results("SELECT ID, post_title from $wpdb->posts WHERE post_status='static' AND post_parent=0 ORDER BY post_title");
    }       
    
    $excludepages = explode(',', get_settings('cc-nl-exclude-pages'));
    if($results) {              
        _e('<br/>Plaats geselecteerde pagina\'s niet in de hoofd navigatie <br/><br/>');
        foreach($results as $page) {
            echo '<input type="checkbox" name="cc-nl-exclude-pages[]" value="' . $page->ID . '"';
            if( in_array($page->ID, $excludepages) == true ) { echo ' checked="checked"'; }
            echo ' /> <a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a><br />';
        }       
    }
}


function _ccnl_posts() {
    global $wpdb;
    $now     = current_time('mysql');
    // only compatible with wp2.1 and up!
    $results = $wpdb->get_results("SELECT ID, post_title from $wpdb->posts WHERE post_status='publish' AND post_date < '{$now}' AND post_type <> 'page' ORDER BY post_title");
    if( is_array($results) ) {
        $output   = "<label for=\"cc-nl-cover-news-item\">Selecteer een nieuws item voor op de homepage:</label>\n";
        $output  .= "<select id=\"cc-nl-cover-news-item\" name=\"cc-nl-cover-news-item\">\n";
        $selected = get_settings('cc-nl-cover-news-item');
        foreach($results as $post) {
            if($selected == $post->ID) {
                $option = "<option selected=\"selected\" value=\"{$post->ID}\">{$post->post_title}</option>\n";
            } else {
                $option = "<option value=\"{$post->ID}\">{$post->post_title}</option>\n";
            }
            $output .= $option;
        }
        $output .= "</select>\n";
    } else {
        $output = "<p>Kon geen nieuws items vinden. Maak eerst een nieuws item aan</p>";
    }
    echo $output;

}


// instead of usig javascript such as cc hq uses we will do this on the server side.. 
function cc_jurisdictions() { 
    $jurisdiction = '';
    
    $jurisdiction .= "<option value =\"http://creativecommons.org/worldwide/ar/\">Argentini&euml;</option>\n";
    $jurisdiction .= "<option value =\"http://www.creativecommons.org.au\">Australi&euml;</option>\n";
    $jurisdiction .= "<option value =\"http://www.creativecommons.at\">Oostenrijk</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org/worldwide/be/\">Belgi&euml;</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org/worldwide/br/\">Brazili&euml;</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org/worldwide/bg/\">Bulgarije</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.ca\">Canada</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org/worldwide/ch/\">Zwitserland</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.cl\">Chili</option>\n";
    $jurisdiction .= "<option value =\"http://cn.creativecommons.org\">China</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org/worldwide/co/\">Colombia</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org/worldwide/hr/\">Kroati&euml;</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org/worldwide/hu/\">Hongarije</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org/worldwide/dk/\">Dennemarken</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.fi\">Finland</option>\n";
    $jurisdiction .= "<option value =\"http://fr.creativecommons.org\">Frankrijk</option>\n";
    $jurisdiction .= "<option value =\"http://de.creativecommons.org\">Duitsland</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org.il\">Isra&euml;l</option>\n";
    $jurisdiction .= "<option value =\"http://cc-india.org\">India</option>\n";
    $jurisdiction .= "<option value =\"http://www.creativecommons.it\">Itali&euml;</option>\n";
    $jurisdiction .= "<option value =\"http://www.creativecommons.jp\">Japan</option>\n";
    $jurisdiction .= "<option value =\"http://www.creativecommons.or.kr/\">Korea</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org/worldwide/my/\">Malaysi&euml;</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org/worldwide/mt/\">Malta</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org.mx\">Mexico</option>\n";
    $jurisdiction .= "<option value =\"http://www.creativecommons.nl\">Nederland</option>\n";
    $jurisdiction .= "<option value =\"http://pe.creativecommons.org\">Peru</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.pl\">Polen</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org/worldwide/pt/\">Portugal</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.si\">Sloveni&euml;</option>\n";
    $jurisdiction .= "<option value =\"http://za.creativecommons.org\">Zuid-Afrika</option>\n";
    $jurisdiction .= "<option value =\"http://es.creativecommons.org/\">Spanje</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org/worldwide/se/\">Zweden</option>\n";
    $jurisdiction .= "<option value =\"http://www.creativecommons.org.tw\">Taiwan</option>\n";
    $jurisdiction .= "<option value =\"http://www.creativecommons.org.uk\">UK: Engeland &amp; Wales</option>\n";
    $jurisdiction .= "<option value =\"http://www.creativecommons.org.uk\">UK: Schotland</option>\n";
    $jurisdiction .= "<option value =\"http://creativecommons.org/worldwide/us/\">Verenigde Staten</option>\n";
    echo $jurisdiction;
}

    /**
     * Nasty hack to make sure the news page which contains the wp posts and is therefor not a page will also be highlighted when selected..
     * We'll presume that if no other page has been given the current_page_item class has not been set and therefor we may set it ourselves
     * on the page containing the items. In this case this page is called 'nieuws' and we'll use the name to find it 
     *
     * 
    **/
    function createNavigation() {
        $the_pages   = wp_list_pages('title_li=&depth=1&sort_column=menu_order&echo=0');
        $pages_array = explode("\n", $the_pages);
        if(is_array($pages_array)) {
            $nr_pages              = sizeof($pages_array);
            $pageIsSelected        = FALSE;
            $selectedExtra         = FALSE;
            $class_selected_page   = 'current_page_item';
            $class_selected_parent = 'current_page_parent';
            $extra_page            = 'extra'; 
            // full name of the page under which will put pages to be used in short-term actions / campaigns and which we will remove from the main navigation
            // So it does NOT show up in the navigation!
            
                                              
            // check if there are any pages selected and make sure the extra_page does not show up
            // in the navigation
            for($i = 0; $i < $nr_pages; $i++) {
                $a_page            = strtolower($pages_array[$i]);
                $hasSelectedPage   = strpos($a_page, $class_selected_page);   
                $hasSelectedParent = strpos($a_page, $class_selected_parent); 
                $hasExtraPage      = strpos($a_page, $extra_page);
                // see if any of the pages are selected
                if($hasSelectedPage !== FALSE || $hasSelectedParent !== FALSE) {
                    $pageIsSelected = TRUE;    
                }
    
                // remove the extra page from the main navigation
                if($hasExtraPage !== FALSE) {
                    $pages_array[$i] = '';
                }
                
                // check if the extra page was selected
                if($hasExtraPage !== FALSE && ($hasSelectedPage !== FALSE || $hasSelectedParent !== FALSE) ) {
                    $selectedExtra = TRUE;
                }
                
            }
            
           
            
            // if no page was selected we presume that we are on the news item page and we will set it's corresponding navigation item to selected
            if($pageIsSelected == FALSE) {
                // none selected so we presume it's the news section and highlight it
                $the_nr_of_pages = sizeof($pages_array);
                $news_items_page = 'nieuws';
                $pattern         = '/page_item/';
                $replacement     = 'page_item current_page_item';
                for($j = 0; $j < $the_nr_of_pages; $j++) {
                    $hasNewsItemPage = strpos($pages_array[$j], $news_items_page);
                    if($hasNewsItemPage !== FALSE) {
                        $pages_array[$j] = preg_replace($pattern, $replacement, $pages_array[$j]);
                    }
                }
            }
            
            // we'll process the updated and changed pages_array into a string and echo this as the navigation
            $pages = '';
            foreach($pages_array as $page) {
                $pages .= $page;
            }
        } else {
            $pages = "Helaas geen pagina's gevonden, dus ook geen mogelijkheid om een navigatie menu te bouwen";
        }
        $result = array('navigation' => $pages, 'extra' => $selectedExtra);
        return $result;
        
    }
    
   




// wp hooks
add_action('admin_menu', 'ccnl_add_theme_page');

?>
