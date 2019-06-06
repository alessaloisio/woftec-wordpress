<?php get_header(); ?>
<div id="site-content">
				<?php breadcrumb();?>
				<div class="shadow"></div>
				<div id="wrapper" class="home">
				<section id="c" class="center">
					<?php 
						global $blog_id; 
						if ($blog_id == 1){
						//HOMEPAGE: www.woftec.com 
					?>
						<ul id="carousel" class="elastislide-list">
							<li class="microsoft"><a href="http://microsoft.woftec.com"></a></li>
							<li class="apple"><a href="http://apple.woftec.com"></a></li>
							<li class="samsung"><a href="http://samsung.woftec.com"></a></li>
							<li class="sony"><a href="http://sony.woftec.com"></a></li>
							<li class="asus"><a href="http://asus.woftec.com"></a></li>
							<li class="google"><a href="http://google.woftec.com"></a></li>
							<li class="lg"><a href="http://lg.woftec.com"></a></li>
							<li class="acer"><a href="http://acer.woftec.com"></a></li>															
						</ul>
						<div class="title"><span class="stripe"></span><a href="http://smartphone.woftec.com">Smartphone</a><span class="stripe"></span></div><div class="tbl row animated fadeInDown"><?php switch_to_blog(2);?><?php $recent_posts=new WP_Query('posts_per_page=3');while($recent_posts->have_posts()):$recent_posts->the_post();?><article class="col4"><a class="entry" href="<?php the_permalink();?>"><?php if(has_post_thumbnail()):?><?php $image=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'widget-image');?><img class="thumb" src="<?php echo $image[0];?>" alt="<?php the_title();?>" width='290' height='160'><?php else:?><img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php bloginfo('template_directory');?>/images/thumbnail.png&w=290&h=160" alt="<?php the_title();?>" width='290' height='160'/><?php endif;?><h2><?php the_title();?></h2><p><?php echo limite_mots(get_the_excerpt(), 15);?> ...</p><span class="meta"><span class="auteur"><?php the_author();?></span><span class="date"><?php the_time('j F, Y');?></span></span></a></article><?php endwhile;?><?php restore_current_blog();?></div>
						<div class="title"><span class="stripe"></span><a href="http://games.woftec.com">Jeux Vidéo</a><span class="stripe"></span></div><div class="tbl row animated fadeInDown"><?php switch_to_blog(3);?><?php $recent_posts=new WP_Query('posts_per_page=3');while ($recent_posts->have_posts()): $recent_posts->the_post();?><article class="col4"><a class="entry" href="<?php the_permalink();?>"><?php if(has_post_thumbnail()): ?><?php $image=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'widget-image');?><img class="thumb" src="<?php echo $image[0];?>" alt="<?php the_title();?>" width='290' height='160'><?php else: ?><img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php bloginfo('template_directory');?>/images/thumbnail.png&w=290&h=160" alt="<?php the_title();?>" width='290' height='160'/><?php endif;?><h2><?php the_title();?></h2><p><?php echo limite_mots(get_the_excerpt(), 15);?> ...</p><span class="meta"><span class="auteur"><?php the_author();?></span><span class="date"><?php the_time('j F, Y');?></span></span></a></article><?php endwhile;?><?php restore_current_blog();?></div>
						<div class="title"><span class="stripe"></span><a href="http://pcmac.woftec.com">PC/MAC</a><span class="stripe"></span></div><div class="tbl row animated fadeInDown"><?php switch_to_blog(4);?><?php $recent_posts=new WP_Query('posts_per_page=3');while ($recent_posts->have_posts()): $recent_posts->the_post();?><article class="col4"><a class="entry" href="<?php the_permalink();?>"><?php if(has_post_thumbnail()): ?><?php $image=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'widget-image');?><img class="thumb" src="<?php echo $image[0];?>" alt="<?php the_title();?>" width='290' height='160'><?php else: ?><img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php bloginfo('template_directory');?>/images/thumbnail.png&w=290&h=160" alt="<?php the_title();?>" width='290' height='160'/><?php endif;?><h2><?php the_title();?></h2><p><?php echo limite_mots(get_the_excerpt(), 15);?> ...</p><span class="meta"><span class="auteur"><?php the_author();?></span><span class="date"><?php the_time('j F, Y');?></span></span></a></article><?php endwhile;?><?php restore_current_blog();?></div>
						<div class="pub-home">
							<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<!-- WOFTEC-Home -->
							<ins class="adsbygoogle"
							     style="display:inline-block;width:728px !important;height:90px"
							     data-ad-client="ca-pub-7092646739578583"
							     data-ad-slot="5093468156"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>
						</div>
					<?php } elseif ($blog_id == 2 || ($blog_id == 3 || ($blog_id == 4))) { 
						//BLOGS: smartphone.woftec.com / games.woftec.com / pcmac.woftec.com
					?>
						<div class="main">
							<?php if (have_posts()) : while (have_posts()) : the_post();?>
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
							<?php endwhile;endif;?>
							<div class="pagination"><?php theme_pagination() ?></div>
						</div>
					<?php } ?>
				</section>
				</div>
			</div>
<?php get_footer(); ?>