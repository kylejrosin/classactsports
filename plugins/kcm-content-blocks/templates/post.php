<?php 
global $post;
$blocks = buildBlocks($post);
?>

<div class="content-main" itemscope itemtype="http://schema.org/Article" data-blocks='<?php echo htmlspecialchars(json_encode($blocks), ENT_QUOTES, 'UTF-8'); ?>' data-article="<?php echo $post->ID; ?>" class="content-<?php echo $post->ID; ?> content-data">
	
	<?php 
	$c = 1; $d = 1; $slidesCount = 0; $slideCount = 1;
	
	foreach ($blocks['blocks'] as $block) {
			
		if ($block['type'] == 'Divider') { ?>
		
		
			</div> <!-- end slide <?php echo $slideCount-1; ?> -->
			
			<div class="content-block-divider content-block-divider-<?php echo $d; ?>" data-index="<?php echo $block['index']; ?>"></div>
			
			<?php
		
			$d++;
			$slidesCount = 0;
		
		}
		else {
		
			if ($slidesCount == 0) { 	 
			?>
			
				<div class="content-slide content-slide-<?php echo $slideCount; ?> <?php if ($c == 1) { ?>active <?php } ?>transition">
			
				<?php
				$slideCount++;
			}
			
				if ($c == 1) {
				
					$intro = get_field('text_after_slideshow',$post->ID);
	
					if (isset($intro) && $intro != '') {
						?>
						
						<div class="article-hero-img" style="background-image:url(<?php the_post_thumbnail_url('full') ?>);"></div>
  						
  						<div class="content-intro">
							<div class="content-intro-wrap">
								<?php echo $intro; ?>
							</div>
						</div>
						
						<?php
					}
				
				}
				
				?>
			
				<figure class="transition content-block block-<?php echo $c; ?> <?php if ($block['type'] == 'Image') { ?>block-type-image<?php } else if ($block['type'] == 'Video') { ?>block-type-embed<?php } else if ($block['type'] == 'WYSIWYG') { ?>block-type-wysiwyg<?php }?>" data-index="<?php echo $block['index']; ?>" data-slide="<?php echo $c; ?>" itemprop="articleSection">
				
					<?php if (isset($block['title']) && $block['title'] != '') { ?>
				
						<div class="content-title block-<?php echo $c; ?>-title">
							<div class="content-title-wrap prox-bold">
								<?php echo str_replace('<p>','',str_replace('</p>','',$block['title'])); ?>
							</div>
						</div>
					
					<?php } ?>
					
					<?php if ($block['type'] == 'Image') { ?>
						
						<?php if ($block['thumbnail']) { ?>
							
							<!-- IMAGE BLOCK -->
							<div class="content-image block-<?php echo $c; ?>-image <?php if ($block['source_type'] == 'Library') { echo 'library-image'; } else if ($block['source_type'] == 'External'){ echo 'external-image'; } ?>">
								<div class="content-image-wrap">
									<img class="content-block-img transition" itemprop="image" src="<?php echo $block['thumbnail']; ?>" alt="<?php echo strip_tags(addslashes($block['title'])); ?> - f00dcoma" />
								</div>
							</div>
						
						<?php } ?>
					
					<?php } else if ($block['type'] == 'Video') { ?>
					
						<?php if ($block['html']) { ?>
					
							<!-- EMBED BLOCK -->
							<div class="content-embed block-<?php echo $c; ?>-embed">
								<div class="content-embed-wrap">
									<?php echo htmlspecialchars_decode($block['html']); ?>
								</div>
							</div>
						
						<?php } ?>
					
					<?php } else if ($block['type'] == 'WYSIWYG') { ?>
					
						<?php if (isset($block['description']) && $block['description'] != '') { ?>
							
							<!-- WYSIWYG BLOCK -->
							<div class="content-wysiwyg block-<?php echo $c; ?>-wysiwyg">
								<div class="content-wysiwyg-wrap">
									<?php echo $block['description']; ?>
								</div>
							</div>
						
						<?php } ?>
					
					<?php } ?>
					
					<?php if (isset($block['credit']) && $block['credit'] != '') { ?>
					
						<div class="content-credit block-<?php echo $c; ?>-credit">
							<div class="content-credit-wrap">
								<span class="credit-label">Credit:</span><span class="credit-text"><?php echo $block['credit']; ?></span>
							</div>
						</div>
					
					<?php } ?>
					
					<?php if ($block['type'] != 'WYSIWYG') { ?>
					
						<?php if (isset($block['description']) && $block['description'] != '') { ?>
					
							<figcaption class="content-description block-<?php echo $c; ?>-description">
								<div class="content-description-wrap">
									<?php echo $block['description']; ?>
								</div>
							</figcaption>
						
						<?php } else { ?>
							
							<div class="clear"></div>
						
						<?php } ?>
					
					<?php } ?>
					
					<?php
					if ($slidesCount == 0 || $slidesCount == 1) {
					?>
						<!--<div class="leaderboard leaderboard-<?php echo $c; ?> transition content-ad content-ad-<?php echo $c; ?> <?php if ($slidesCount != 0) { ?>mobile-only<?php } ?>" id="content-ad-<?php echo $c; ?>"><center>in-content <?php echo $c; ?></center></div>-->
					<?php
					}
					?>
									
				</figure>
		
			<?php	
			$c++;
			$slidesCount++;
		}
	}
	?>
	
				</div> <!-- end slide <?php echo $slideCount-1; ?> -->
	
	<div class="slides-nav slides-nav-bottom prox-bold">
		
		<a class="slides-nav-prev slides-nav-btn" data-postid="<?php echo $post->ID; ?>" href="<?php echo get_permalink($post->ID); ?>">Prev Page</a>
		<a class="slides-nav-next slides-nav-btn show" data-postid="<?php echo $post->ID; ?>" href="<?php echo get_permalink($post->ID); ?>">Next Page</a>
		
		<?php 
		$nextPost = get_next_post(true);
		if ($nextPost) {
		?>
			<a class="slides-nav-next-article slides-nav-next slides-nav-btn" data-postid="<?php echo $nextPost->ID; ?>" href="<?php echo get_permalink($nextPost->ID); ?>"><span class="prox-bold">Next Page</span></a>
		<?php } ?>
		
	</div>
	
</div>