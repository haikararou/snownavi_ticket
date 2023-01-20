<?php 
	 function wp_pagination() {
				global $wp_query;
				$big = 99999999;
				$page_format = paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages,
					'type'  => 'array',
					'prev_next'    => True,
					'prev_text'    => '前へ',
					'next_text'    => '次へ',
				) );
				if( is_array($page_format) ) {
					$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
					echo '<div class="pagination">';
					foreach ( $page_format as $page ) {
							echo "$page";
					}
				  echo '</div>';
				}
				wp_reset_query();
			}
		 wp_pagination();

?>