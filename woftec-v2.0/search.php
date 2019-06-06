<?php get_header(); ?>
<div id="site-content">
				<?php breadcrumb();?>
				<div id="wrapper">
				<section id="c" class="center">
				<div class="shadow"></div>
				<div class="main">
					<h3 class="searchblock">
						<p>Résultats de la recherche pour "<?php echo get_search_query(); ?>"</p>
					</h3>
					<?php
						if ($blog_id == 1){
							$query_string=esc_attr($query_string);
							$blogid = blogs_list();		
							$tab_id = array(2,3,4);
							foreach ( $tab_id as $blogid ):
							switch_to_blog($blogid);
							$search = new WP_Query($query_string);
							if ($search->found_posts>0) {
								foreach ( $search->posts as $post ) {
								setup_postdata($post);
								$author_data = get_userdata(get_the_author_meta('ID'));
								?>
								<article>
									<a href="<?php the_permalink();?>">
										<?php if(has_post_thumbnail()):?>
											<?php $image=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'widget-image');?>
											<img class="blog-img" src="<?php echo $image[0];?>" alt="<?php the_title();?>" width="548" height="267">
										<?php else:?>
											<img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php bloginfo('template_directory');?>/images/thumbnail.png&w=290&h=160" alt="<?php the_title();?>" class="blog-img" width="548" height="267" />
										<?php endif;?>
									</a>
									<div class="infos">
										<h2><a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a></h2>
										<p><?php echo limite_mots(get_the_excerpt(), 28);?> ...</p>
									</div>
									<div class="blog-meta">
										<span class="heading-comment"><p class="iconic">J</p><?php comments_popup_link('0','1','%');?></span>
										<span class="heading-date"><p class="iconic">a</p><?php the_time('j F, Y');?></span>
										<span class="heading-author"><p class="iconic">u</p> Par : <?php the_author();?></span>
									</div>
								</article>
								<?php }}endforeach;restore_current_blog();
						}else{
							 if (have_posts()) : while (have_posts()) : the_post(); ?>
							<article>
								<a href="<?php the_permalink();?>">
									<?php if(has_post_thumbnail()):?>
										<?php $image=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'widget-image');?>
										<img class="blog-img" src="<?php echo $image[0];?>" alt="<?php the_title();?>" width="548" height="267">
									<?php else:?>
										<img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php bloginfo('template_directory');?>/images/thumbnail.png&w=290&h=160" alt="<?php the_title();?>" class="blog-img" width="548" height="267" />
									<?php endif;?>
								</a>
								<div class="infos">
									<h2><a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a></h2>
									<p><?php echo limite_mots(get_the_excerpt(), 28);?> ...</p>
								</div>
								<div class="blog-meta">
									<span class="heading-comment"><p class="iconic">J</p><?php comments_popup_link('0','1','%');?></span>
									<span class="heading-date"><p class="iconic">a</p><?php the_time('j F, Y');?></span>
									<span class="heading-author"><p class="iconic">u</p> Par : <?php the_author();?></span>
								</div>
							</article>
							<?php endwhile; endif;
						}
						?>
					<div class="pagination"><?php theme_pagination() ?></div>
				</div>
				</section>
				</div>
			</div>
<?php get_footer(); ?>
				