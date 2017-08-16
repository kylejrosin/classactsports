<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap">
		
		<!--<div class="leaderboard leaderboard-mobile transition" id="leaderboard-mobile"><center>mobile leaderboard top</center></div>-->
		
		<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<?php
				if (null !== get_post_meta($post->ID,'clicky_title')) { $clicky_title = get_post_meta($post->ID,'clicky_title')[0]; };
				if (null !== get_post_meta($post->ID,'post_subtitle')) { $post_subtitle = get_post_meta($post->ID,'post_subtitle')[0]; };
				$post_title = $post->post_title;
				$author_id = $post->post_author;
				$author_name = get_the_author();
				$post_format = get_post_meta($post->ID,'content_type');
				?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
			
					<header class="article-header entry-header">
						
						<div class="article-header-top">
						
							<?php
							if (in_category('breaking-news')) {
								echo '<div class="lead-category"><span class="breaking-news">Developing Story</span></div>';
							}
							else {
								$cats = get_the_category(); $c = 1;
								foreach ($cats as $cat) {
									if (in_array($cat->cat_name, array('NBA','MLB','NHL','NFL','NCAAF','NCAAB','FANTASY','NASCAR','SOCCER'), true ) ) {
										if ($c == 1) {
											echo '<div class="lead-category"><a class="transition" href="'.get_category_link( $cat->term_id ).'">'.$cat->cat_name.'</a></div>';
										}
										$c++;
									}
								}

							}
							?>
							
							<h1 class="prox-bold"><?php echo $post_title; ?></h1>
													
							<?php if (!empty($post_subtitle)) { ?>
							
								<p><?php echo $post_subtitle; ?></p>
							
							<?php } ?>
							
							<div class="article-time">
							
								Posted on <time class="timestamp"><?php the_date(); ?> at <?php echo get_the_time(); ?></time>
	  						
	  						</div>
	  						
	  						<div class="article-author">
		  						<a class="author-avatar" title="View posts by <?php echo $author_name; ?>" href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_avatar($author_id, 128); ?></a>
		  						<div class="author-name-wrap">
			  						<a class="author-name prox-bold" title="View posts by <?php echo $author_name; ?>" href="<?php echo get_author_posts_url($author_id); ?>"><?php echo $author_name; ?></a>
			  						<div class="author-title">Contributor</div>
		  						</div>
		  						<div id="share-top"></div>
	  						</div>
	  						
						</div>
  						
  						<?php if ($post_format[0] == 'default') { ?>
  						
  							<div class="article-hero-img" style="background-image:url(<?php the_post_thumbnail_url('full') ?>);"></div>
  						
  						<?php } else if ($post_format[0] == 'video') { ?>
  						
  							<div class="article-hero-img article-hero-vid" style="background-image:url(<?php the_post_thumbnail_url('full') ?>);">
	  						
	  							<div id="featured-video"><?php echo get_field('video_html'); ?></div>
  							
  							</div>
  						
  						<?php } ?>
  						
					</header>
					
					<section class="entry-content cf" itemprop="articleBody">
						
						<div class="content-left">
							
							<div class="content-outer">
	
								<div class="content-wrap"><?php the_content(); ?></div>
								
								<div class="share-bottom">
									<!--<div class="share-text prox-bold">SHARE</div>-->
									<div id="share-bottom"></div>
								</div>
								
								<div class="comments-wrap">
									<div class="fb-comments" data-href="<?php echo get_permalink(); ?>" data-width="100%" data-numposts="10"></div>
								</div>
							
							</div>
							
						</div>
						
						<div class="content-right">
							
							<?php get_sidebar(); ?>
						
						</div>
						
					</section>
					
					<footer class="article-footer">
						
						<!--<div class="nativo" id="nativo-below"><center>[ Nativo - all sizes ]</center></div>
						
						<div class="leaderboard leaderboard-mobile leaderboard-bottom mobile-only transition" id="leaderboard-mobile"><center>mobile leaderboard bottom</center></div>
						
						<div class="rectangle rectangle-mobile rectangle-bottom mobile-only transition" id="rectangle-mobile"><center>mobile rectangle</center></div>-->
						
					</footer>
			
				</article>
			
			<?php endwhile; endif; ?>
			
			<!--<div class="after-post-module after-post-recirc">
				<center>[ Zergnet - all sizes ]</center>
			</div>-->
			
			<div class="after-post-module after-post-social mobile-only">
				<a class="sidebar-social-button sidebar-social-facebook jssocials-share-facebook transition" href="http://www.facebook.com/classactsports/" target="_blank"><i class="fa fa-facebook jssocials-share-logo"></i><span>Like Us On Facebook</span></a>
				<a class="sidebar-social-button sidebar-social-twitter jssocials-share-twitter transition" href="http://www.twitter.com/classactsports/" target="_blank"><i class="fa fa-twitter jssocials-share-logo"></i><span>Follow Us On Twitter</span></a>
			</div>
			
		</main>
		
	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>