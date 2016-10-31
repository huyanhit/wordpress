<?php

function feature_image_fn( $atts ) {
	$images = get_field('images_group');
	$ouput = '';
	if (isset($images[0]['feature_image']['url'])) {
		$ouput .= '<div class="feature_image"><div class="row hidden-xs">';
			$data_modible = '<div class="carosel_mobile visible-xs">';
			foreach ($images as $key => $val) {
				$image = $val['feature_image'];
				if (isset($image['url'])) {
					$img_link = $image['sizes']['large'];
					$ouput .= '<div class="col-sm-4 col-md-4">
									<a href="'.$image['url'].'" class="center-block box-images">
										<img class="img-responsive" src="'.$img_link.'"/>
									</a>
								</div>';
					$data_modible .= '<div class="item-carosel">
										<img class="img-responsive center-block" src="'.$image['url'].'"/>
									</div>';
				}
			}
			$data_modible .='</div>';
		$ouput .= '</div>'.$data_modible.'</div>';
	}
    return $ouput;
}
add_shortcode( 'feature_image', 'feature_image_fn' );