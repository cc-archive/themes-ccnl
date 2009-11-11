<div id="page-sidebar-left">
    	    
        <?php
            if(function_exists('list_pages_by_category')) { 
                if(is_page()) {
                    // we want to display only the sub-pages and the corresponding categories of the selected page 
                    // if the selected page has a parent we will use the parent id to do this, otherwise we will use the 
                    // page id of the selected page.
                    global $wp_query; 
                    $post = $wp_query->post;
                    if($post->post_parent != 0) { 
                        $id = $post->post_parent; 
                    } else {
                        $id = $post->ID;
                    }
                }
                list_pages_by_category(0, true, true, '', '<strong>', '</strong>', true, false, true, true, $id);
            } else {
                echo 'installeer de Page Category Organiser plugin van Andy Staines. <a href="http://www.yellowswordfish.com/my-wordpress-plugin-library/page-category-organiser-wordpress-plugin/">Download hier</a>'; 
            }
        ?>
    
</div>
