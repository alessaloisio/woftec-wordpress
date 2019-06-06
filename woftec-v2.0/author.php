<?php get_header(); ?>
<div id="site-content">
				<?php breadcrumb();?>
				<div id="wrapper">
				<section id="c" class="center">
				<div class="shadow"></div>
				<div class="main">
				<?php
					if(isset($_GET['author_name'])) :
					$curauth = get_userdatabylogin($author_name);
					else :
					$curauth = get_userdata(intval($author));
					endif;
				?>
				<div id='meta_auteur'>
					<div class="bio_auteur">
						<div class="img_auteur"><img width="140" height="140" alt="" class="avatar" src="<? echo get_avatar_url(get_avatar(get_the_author_meta('email'), '140')); ?>"></div>
						<div class="desc_auteur">
							<h2><?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?> (<?php echo $curauth->nickname; ?>)</h2>
							
							<p><?php echo $curauth->user_description; ?></p>
							<a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a>
						</div>
					</div>
					<div class="social_auteur">
						<?php if(get_the_author_meta('twitter') || get_the_author_meta('googleplus') || get_the_author_meta('facebook')): ?>
							<p>
								<?php if(get_the_author_meta('twitter')): ?>
								<a class="twitter" href='http://twitter.com/<?php echo get_the_author_meta('twitter'); ?>' target="_blank">Twitter</a>
								<?php endif; ?>
								
								<?php if(get_the_author_meta('googleplus')): ?>
								<a class="google" href='https://plus.google.com/<?php echo get_the_author_meta('googleplus'); ?>' rel="me" target="_blank">Google+</a>
								<?php endif; ?>
								
								<?php if(get_the_author_meta('facebook')): ?>
								<a class="facebook" href='https://facebook.com/<?php echo get_the_author_meta('facebook'); ?>' target="_blank">Facebook</a>
								<?php endif; ?>
							</p>
						<?php endif; ?>
					</div>
				</div>
				
				<?php if ($blog_id == 1){ 
					$blogs = blogs_list();
					if (isset($blogs) && is_array($blogs)) {      
					foreach ($blogs as $blog) {
					switch_to_blog( $blog->blog_id );
					$nombrearticle = 'showposts=0';
					if ( $blog->blog_id == 27) $nombrearticle = '';
					$multi_user = new WP_Query('' . $nombrearticle . '');
				?>
					<?php if ( $multi_user->have_posts() ) : while($multi_user->have_posts()):$multi_user->the_post(); ?>
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
					<?php endwhile;else: ?>
						<p><?php echo'Aucun posts pour cette auteur.'; ?></p>
					<?php endif;restore_current_blog(); }}}else{ ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
					<?php endwhile; else: ?>
					<p><?php if ($blog_id == 27){}else{echo'Aucun posts pour cette auteur.';} ?></p>
					<?php endif; ?>
				<?php } ?>
					<div class="pagination"><?php theme_pagination() ?></div>
				</div>
				</section>
				</div>
			</div>
<?php get_footer(); ?>