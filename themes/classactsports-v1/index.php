<?php get_header(); ?>

<div id="content">
	
	<div class="featured-wrap-hero wrap">
	
		<div class="select-theme">
			<strong>Select theme:</strong><a href="#" class="theme-select theme-light active">Light</a> | <a href="#" class="theme-select theme-dark">Dark</a>
		</div>
		
		<div class="featured-posts-wrap">
			
			<div class="featured-video-wrapper transition">
				<a href="/" class="close-featured-video transition">X</a>
				<div class="table"><div class="table-cell"><div id="featured-video-html"></div></div></div>
			</div>
			
			<?php
			$c = 1; $row = 1; $h = 1; 
			
			$args = array( 'posts_per_page' => 6 );
			
			if (is_front_page()){
				$args['category_name'] = 'featured-homepage';
			}
			else if (is_category()) {
				$args['category_name'] = get_query_var('category_name');
			}
			else if (is_author()) {
				$args['author'] = get_query_var('author');
			}
			else if (is_tag()) {
				$args['tag'] = get_query_var('tag');
			}
			
			
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					
					$permalink = get_permalink();
					$image = get_the_post_thumbnail_url($post->ID,'standard-640-360');
					$classes = get_post_class();
					
					$post_classes = '';
					$lead_category = '';
					$breaking = '';
					$video_code = '';
					
					if (in_category('breaking-news')) {
						$breaking = '<span class="breaking-news">Developing Story</span>';
					}
					
					$cat_count = 1;
					$cats = get_the_category();
					foreach ($cats as $cat) {
						if (in_array($cat->cat_name, array('NBA','MLB','NHL','NFL','NCAAF','NCAAB','FANTASY','NASCAR','SOCCER'), true ) ) {
							if ($cat_count == 1) {
								$lead_category = '<div class="featured-category transition">'.$cat->cat_name.'</div>';
							}
							$cat_count++;
						}
					}
					
					if (null !== get_post_meta($post->ID,'post_subtitle')) {
						$post_subtitle = get_post_meta($post->ID,'post_subtitle');
						$subtitle = '<p class="post-subtitle">'.$post_subtitle[0].'</p>';
					}
					else {
						$post_subtitle = get_post_meta($post->ID,'post_subtitle');
						$subtitle = '<p class="post-subtitle">'.$post_subtitle[0].'</p>';
					}
					
					if (in_category('videos')) {
						$video_code = json_encode(get_field('video_html'));
					}
					
					foreach ($classes as $class) {
						$post_classes .= $class . ' ';
					}
					
					$post_classes .= 'transition featured-cell featured-cell-'.$c.' ';
					
					if ($c == 1){
						echo '<div class="featured-row featured-row-1">';
						
					}
					if ($c == 2) {
						$h++;
					}
					
					echo '<article class="'.$post_classes.'" style="background-image:url('.$image.');">' . 
						'<a href=\''.$permalink.'\' data-video=\''.$video_code.'\'>'.$breaking.'<div class="post-title-wrap">' . 
							$lead_category . '<h'.$h.' class="transition">'.$post->post_title.'</h'.$h.'>'.$subtitle.'</div></a></article>';
					
					if ($c == 3){
						$row = 2;
						echo '</div><div class="featured-row featured-row-2">';
					}
					
					if ($c == 6){
						echo '</div>';
					}
					
					$c++;
					
				}
			}
			wp_reset_query();
			?>
			
		</div>
		
	</div>

	<div id="inner-content" class="wrap" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
		
		<!--<div class="leaderboard leaderboard-mobile transition" id="leaderboard-mobile"><center>mobile leaderboard top</center></div>-->
		
		<main id="main" role="main" class="cards-wrap">

			<?php if (have_posts()) : while (have_posts()) : the_post();
				
				$permalink = get_permalink();
				$image = get_the_post_thumbnail_url($post->ID,'standard-640-360');
				$thumb = get_the_post_thumbnail_url($post->ID,'small-300-169');
				$lead_category = '';
					
				$classes = get_post_class();
				$post_classes = '';
				$video_code = '';
					
				$cat_count = 1;
				$cats = get_the_category();
				foreach ($cats as $cat) {
					if (in_array($cat->cat_name, array('NBA','MLB','NHL','NFL','NCAAF','NCAAB','FANTASY','NASCAR','SOCCER'), true ) ) {
						if ($cat_count == 1) {
							$lead_category = '<div class="featured-category card-category transition">'.$cat->cat_name.'</div>';
						}
						$cat_count++;
					}
				}
					
				if (null !== get_post_meta($post->ID,'post_subtitle')) {
					$post_subtitle = get_post_meta($post->ID,'post_subtitle');
					$subtitle = '<p class="post-card-subtitle">'.$post_subtitle[0].'</p>';
				}
				else {
					$post_subtitle = get_post_meta($post->ID,'post_subtitle');
					$subtitle = '<p class="post-card-subtitle">'.$post_subtitle[0].'</p>';
				}
					
				if (in_category('videos')) {
					$video_code = json_encode(get_field('video_html'));
				}
				
				foreach ($classes as $class) {
					$post_classes .= $class . ' ';
				}
					
				$post_classes .= 'transition table post-card post-card-'.$c.' ';
								
				echo '<article class="'.$post_classes.'"><div class="table">' . 
					'<div class="card-left table-cell"><a class="card-img b-lazy transition" style="background-image:url('.$thumb.')" data-src="'.$image.'" href=\''.$permalink.'\' data-video=\''.$video_code.'\'></a></div><div class="card-right table-cell"><div class="lead-category"><a class="transition" href="'.get_category_link( $cat->term_id ).'">'.$cat->cat_name.'</a></div><a href=\''.$permalink.'\' data-video=\''.$video_code.'\'><h3 class="transition">'.$post->post_title.'</h3>'.$subtitle.'</a></div></div></article>';
			
				$c++;
				
			endwhile; endif; ?>
			
		</main>
		
		<?php get_sidebar(); ?>
		
	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>