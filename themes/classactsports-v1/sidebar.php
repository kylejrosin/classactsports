<section id="sidebar" class="right-rail" role="complementary">
	
	<div class="sidebar-inner">
	
		<div class="sidebar-module sidebar-rectangle-1">
			
			<div class="rectangle rectangle-1 transition">
				<center>[ ad - rectangle 1 ]</center>
			</div>
			
		</div>
		
		<div class="sidebar-module sidebar-social">
			
			<a class="sidebar-social-button sidebar-social-facebook jssocials-share-facebook transition" href="http://www.facebook.com/f00dcoma/" target="_blank"><i class="fa fa-facebook jssocials-share-logo"></i><span>Like Us On Facebook</span></a>
			<a class="sidebar-social-button sidebar-social-twitter jssocials-share-twitter transition" href="http://www.twitter.com/f00dcoma/" target="_blank"><i class="fa fa-twitter jssocials-share-logo"></i><span>Follow Us On Twitter</span></a>
			
		</div>
		
		<?php if (is_single()) { ?>
		
			<!--<div class="sidebar-module sidebar-rectangle-2">
				
				<div class="rectangle rectangle-2 transition">
					<center>rectangle 2</center>
				</div>
				
			</div>-->
			
		<?php } ?>
		
		<div class="sidebar-module sidebar-recirc">
			
			<?php
			$args = array(
				'posts_per_page' => 4,
				'post__not_in' => array($post->ID),
			);
			
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();	
					
					if (null !== get_post_meta($post->ID,'clicky_title')) { $title = get_post_meta($post->ID,'clicky_title')[0]; } else { $title = $post->post_title; };
					
					?>
					
					<article <?php post_class('recirc-article'); ?>>
						<a href="<?php echo get_permalink(); ?>" class="prox-bold">
							<div class="recirc-thumb transition b-lazy" data-src="<?php the_post_thumbnail_url('full'); ?>"></div>
							<div class="recirc-title transition"><?php echo $title; ?></div>
							<?php if (in_category('breaking-news')) { ?>
									<span class="breaking-news">Developing Story</span>
							<?php } ?>
						</a>
					</article>
										
					<?php
				}
			}
			wp_reset_query();
			?>
			
		</div>
		
		<?php if (is_single()) { ?>
		
			<div class="sidebar-module sidebar-rectangle-3">
				
				<div class="rectangle rectangle-3 transition">
					<center>[ ad - rectangle 2 ]</center>
				</div>
				
			</div>
		
		<?php } ?>

	
	</div>
	
</section>