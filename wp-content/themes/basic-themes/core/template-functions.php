<?php
/**
 * Template Functions
 * 
 * @package base-themes
 */

function get_dynamic_sidebar($index = 1)
{
	$sidebar_contents = "";
	ob_start();
	dynamic_sidebar($index);
	$sidebar_contents = ob_get_clean();
	
	return $sidebar_contents;
}

if (!function_exists('the_main_col')) {
	function the_main_col() 
	{
		if (get_dynamic_sidebar('sidebar-left') != '' && 
			get_dynamic_sidebar('sidebar-right') != '') {

			$main_col = 'col-md-6 col-sm-6 col-xs-12';

		}elseif(
			(get_dynamic_sidebar('sidebar-left') != '') || 
			(get_dynamic_sidebar('sidebar-right') != '')
		){

			$main_col = 'col-md-9 col-sm-9 col-xs-12';

		}else {

			$main_col = 'col-md-12 col-sm-12 col-xs-12';

		}
		echo $main_col;
	}
}


function excerpt_length($content,$length) {
    return wp_trim_words( $content, $length );
}

function theme_pagination() {
    global $wp_query;
    $big = 999999999;
    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?page=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_next' => false,
        'type' => 'array',
        'prev_next' => TRUE,
        'prev_text' => '&larr; Prev',
        'next_text' => 'Next &rarr;',
            ));
    if (is_array($pages)) {
        $current_page = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<ul class="pagination">';
        foreach ($pages as $i => $page) {
            if ($current_page == 1 && $i == 0) {
                echo "<li class='active'>$page</li>";
            } else {
                if ($current_page != 1 && $current_page == $i) {
                    echo "<li class='active'>$page</li>";
                } else {
                    echo "<li>$page</li>";
                }
            }
        }
        echo '</ul>';
    }
}
function theme_archive_title() {
    if ( is_category() ) {
        $title = sprintf( __( '%s' ), single_cat_title( '', false ) );
    } elseif ( is_tag() ) {
        $title = sprintf( __( 'Tag: %s' ), single_tag_title( '', false ) );
    } elseif ( is_author() ) {
        $title = sprintf( __( 'Author: %s' ), '<span class="vcard">' . get_the_author() . '</span>' );
    } elseif ( is_year() ) {
        $title = sprintf( __( 'Year: %s' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );
    } elseif ( is_month() ) {
        $title = sprintf( __( 'Month: %s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );
    } elseif ( is_day() ) {
        $title = sprintf( __( 'Day: %s' ), get_the_date( _x( 'F j, Y', 'daily archives date format' ) ) );
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = _x( 'Asides', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = _x( 'Galleries', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = _x( 'Images', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = _x( 'Videos', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = _x( 'Quotes', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = _x( 'Links', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = _x( 'Statuses', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = _x( 'Audio', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = _x( 'Chats', 'post format archive title' );
        }
    } elseif ( is_post_type_archive() ) {
        $title = sprintf( __( 'Archives: %s' ), post_type_archive_title( '', false ) );
    } elseif ( is_tax() ) {
        $tax = get_taxonomy( get_queried_object()->taxonomy );
        /* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
        $title = sprintf( __( '%1$s: %2$s' ), $tax->labels->singular_name, single_term_title( '', false ) );
    } else {
        $title = __( 'Archives' );
    }
    
    print str_replace('Category:', '', $title);
}