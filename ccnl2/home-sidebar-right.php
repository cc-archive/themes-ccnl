<div id="home-sidebar-right">
<ul>    
    <li class="sidebox">
	    <h2>Agenda</h2>
        <?php if( function_exists('ec3_get_events') ){ ec3_get_events(4,'<a href="%LINK%">%TITLE%</a>','%DATE%:','j F Y'); } ?>
    </li>
    <li class="sidebox">
	    <h2>Laatste nieuws</h2>
        <ul>
            <?php if( function_exists('c2c_get_recent_posts') ) { 
                        c2c_get_recent_posts( $num_posts = 7,
                                              $format = "<li>%post_URL%</li>",
                                              $categories = '1 3',
                                              $orderby = 'date',
                                              $order = 'DESC',
                                              $offset = 0,
                                              $date_format = 'm/d/Y',
                                              $authors = '',
                                              $post_type = 'post',
                                              $post_status = 'publish',
                                              $include_passworded_posts = false,
                                              $extra_sql_where_clause = '' );
                    } else {
                    echo '44';
                    } 

            
            ?>
        </ul>
    </li>
    <li class="sidebox">
        <ul>
        <?php if( function_exists('ec3_get_events') ): ?>
            <li><a title="Agenda via rss" href="<?php bloginfo('siteurl')?>/wp-rss.php?ec3_days=365"><img src="<?php bloginfo('template_directory'); ?>/img/feed.png" alt="feed icoontje" /> agenda rss</a></li>
            <li><a title="Agenda via iCal" href="<?php bloginfo('siteurl')?>?ec3_ical"><img src="<?php bloginfo('template_directory'); ?>/img/feed.png" alt="feed icoontje" /> agenda ical</a></li>
            <li><a title="Recent nieuws" href="<?php bloginfo('rss2_url');?>"><img src="<?php bloginfo('template_directory'); ?>/img/feed.png" alt="feed icoontje" /> laatste nieuws rss</a></li>
       <?php endif; ?>     
       </ul>
    </li>
</ul>
</div>
</div><!-- end id:content -->
</div><!-- end id:container -->
