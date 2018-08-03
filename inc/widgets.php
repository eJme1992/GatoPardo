<?php
//Widget Top Ten NEW
class Topten_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'toptennew',
			'ToptenNew'
		);
	}
	function widget ( $args, $instance ) {
		global $cati;
		extract( $args, EXTR_SKIP );
		$i = 0;
		$time = '100 days ago';
		$time_cat = '60 days ago';
		$output  = $before_title.'M&aacute;s Le&iacute;das'.$after_title;
		$args = array(
			'posts_per_page' => 3,
			'type'=> 'list',
			'post_status' => 'publish',
			/*'meta_key' => 'views',
			'orderby' => 'meta_value_num'*/
		);
		if(is_home()):
			$args['date_query'] = array(
				array(
					'column' => 'post_date_gmt',
					'after'  => $time
				)
			);
		elseif(is_category()):
			$args['cat'] = $cati;
			$args['date_query'] = array(
				array(
					'column' => 'post_date_gmt',
					'after'  => $time_cat
				)
			);
		else:
			$args['date_query'] = array(
				array(
					'column' => 'post_date_gmt',
					'after'  => $time
				)
			);
		endif;
		query_posts( $args );
		$output .= '<div id="content_top">';
			while ( have_posts() ) : the_post(); $i++;
				$output .= '<article class="other">';
					$output .= '<a href="'.get_permalink().'">';
						$output .= get_the_post_thumbnail(get_the_ID(), 'thumbnail' , array( 'title' => get_the_title() ));
						$output .= '<div id="text_s">';
								$output .= '<div id="title">'.get_the_title().'</div>';
								$output .= '<div id="btn_vm">ver más</div>';
						$output .= '</div>';
					$output .= '</a>';
				$output .= '</article>';
			endwhile;
		$output .= '</div>';
		echo $before_widget, $output, $after_widget;
		wp_reset_query();
	}
	function update( $new_instance, $old_instance ) {}
	function form( $instance ) {}
}
//Widget Club Travesías
class Club_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'club_trav',
			'Club Travesías'
		);
	}
	function widget ( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		$output  = '<div id="club_t">';
			$output .= '<a href="https://www.clubtravesias.com/" target="_blank">';
				$output .= '<img src="'.THEME_URL.'/img/club.png" />';
			$output .= '</a>';
		$output .= '</div>';
		wp_reset_query();
		echo $before_widget, $output, $after_widget;
	}
	function update( $new_instance, $old_instance ) {}
	function form( $instance ) {}
}
//Widget Images_Posts
class Images_Post_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'images_post_trav',
			'Images Post Travesías'
		);
	}
	function widget ( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		global $post;
		$image_uno = get_field('primer_imagen');
		$image_dos = get_field('segunda_imagen');
		$output  = '<div id="images_post_a">';
			if($image_uno != '')
				$output .= '<div id="prim_img"><img src="'.$image_uno['sizes']['foto_uno'].'" /></div>';
			if($image_dos != '')
				$output .= '<div id="segu_img"><img src="'.$image_dos['sizes']['foto_uno'].'" /></div>';
		$output .= '</div>';
		wp_reset_query();
		echo $before_widget, $output, $after_widget;
	}
	function update( $new_instance, $old_instance ) {}
	function form( $instance ) {}
}
//Widget Leaderboard
class Ad_Leaderboard extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'ad_leaderboard',
			'Ad LeaderBoard'
		);
	}
	public function widget( $args, $instance ) {
		extract($args, EXTR_SKIP);
		$title = empty($instance['title_leader']) ? '' : $instance['title_leader'];
		$text = empty($instance['text_leader']) ? '' : $instance['text_leader'];
		echo (isset($before_widget)?$before_widget:'');		
		echo '<center style="margin-top:30px;display:block">';
			echo html_entity_decode($title, ENT_QUOTES);
		echo '</center>';
		echo (isset($after_widget)?$after_widget:'');
	}
	public function form( $instance ) {
		
	   $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
	   $title = $instance['title_leader'];
	   $text = $instance['text_leader'];   
	   ?>
	   <p>
			<label for="<?php echo $this->get_field_id('text'); ?>">Script Header: 
			<textarea class="widefat" id="<?php echo $this->get_field_id('text_leader'); ?>" name="<?php echo $this->get_field_name('text_leader'); ?>"><?php echo attribute_escape($text); ?></textarea>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Script Body:
			<textarea class="widefat" id="<?php echo $this->get_field_id('title_leader'); ?>" name="<?php echo $this->get_field_name('title_leader'); ?>"><?php echo attribute_escape($title); ?></textarea>
			</label>
		</p>
	   <?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title_leader'] = $new_instance['title_leader'];
		$instance['text_leader'] = $new_instance['text_leader'];
		return $instance;
	}
}
//Widget BoxBanner
class Ad_Boxbanner extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'ad_boxbanner',
			'Ad BoxBanner'
		);
	}
	public function widget( $args, $instance ) {
		extract($args, EXTR_SKIP);
		$title = empty($instance['title_box']) ? '' : $instance['title_box'];
		$text = empty($instance['text_box']) ? '' : $instance['text_box'];
		echo (isset($before_widget)?$before_widget:'');
			if($text!='')
			ad_script($text);
			echo '<center>';
				echo html_entity_decode($title, ENT_QUOTES);
			echo '</center>';
		echo (isset($after_widget)?$after_widget:'');
	}
	public function form( $instance ) {
		
	   $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
	   $title = $instance['title_box'];
	   $text = $instance['text_box'];   
	   ?>
	   <p>
			<label for="<?php echo $this->get_field_id('text'); ?>">Script Header: 
			<textarea class="widefat" id="<?php echo $this->get_field_id('text_box'); ?>" name="<?php echo $this->get_field_name('text_box'); ?>"><?php echo attribute_escape($text); ?></textarea>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Script Body:
			<textarea class="widefat" id="<?php echo $this->get_field_id('title_box'); ?>" name="<?php echo $this->get_field_name('title_box'); ?>"><?php echo attribute_escape($title); ?></textarea>
			</label>
		</p>
	   <?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title_box'] = $new_instance['title_box'];
		$instance['text_box'] = $new_instance['text_box'];
		return $instance;
	}
}
//Widget Halfpage
class Ad_Half_Page extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'ad_halfpage',
			'Ad HalfPage'
		);
	}
	public function widget( $args, $instance ) {
		extract($args, EXTR_SKIP);
		$title = empty($instance['title_half']) ? '' : $instance['title_half'];
		$text = empty($instance['text_half']) ? '' : $instance['text_half'];
		echo (isset($before_widget)?$before_widget:'');
		if($text!='')
		ad_script($text);
		echo html_entity_decode($title, ENT_QUOTES);
		echo (isset($after_widget)?$after_widget:'');
	}
	public function form( $instance ) {
		
	   $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
	   $title = $instance['title_half'];
	   $text = $instance['text_half'];   
	   ?>
	   <p>
			<label for="<?php echo $this->get_field_id('text'); ?>">Script Header: 
			<textarea class="widefat" id="<?php echo $this->get_field_id('text_half'); ?>" name="<?php echo $this->get_field_name('text_half'); ?>"><?php echo attribute_escape($text); ?></textarea>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Script Body:
			<textarea class="widefat" id="<?php echo $this->get_field_id('title_half'); ?>" name="<?php echo $this->get_field_name('title_half'); ?>"><?php echo attribute_escape($title); ?></textarea>
			</label>
		</p>
	   <?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title_half'] = $new_instance['title_half'];
		$instance['text_half'] = $new_instance['text_half'];
		return $instance;
	}
}
?>