<?php get_header(); ?>
<div id="site-content">
				<?php breadcrumb(); ?>
				<div class="shadow"></div>
				<div id="wrapper" class="single">
				<section id="c" class="center">
					<section class="content">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="left">
							<div class="post-thumb"><a href="<?php the_permalink();?>">
								<?php if(has_post_thumbnail()):?>
									<?php $image=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'widget-image');?>
									<img class="blog-img" src="<?php echo $image[0];?>" alt="<?php the_title();?>" width="610" height="250">
								<?php else:?>
									<img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php bloginfo('template_directory');?>/images/thumbnail.png&w=610&h=250" alt="<?php the_title();?>" class="blog-img" width="548" height="267" />
								<?php endif;?>
							</a></div>
							<div class="post-entry"><?php the_content(); ?></div>
						</div>
						<aside class="sidebar">
							<ul class="social">
								<li class="fc mod">
									<a target="_blank" title="Cliquez pour partager sur Facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="share-facebook share-icon" rel="nofollow">Facebook</a>
								</li>
								<li class="tw mod">
									<a target="_blank" title="Cliquez pour partager sur Tweeter" href="http://twitter.com/home?status=En train de lire <?php echo urlencode( get_the_title() ); ?> => <?php echo urlencode( get_permalink() ); ?>&via=officialwoftec" class="share-twitter share-icon" via="officialwoftec" rel="nofollow">Twitter</a>
								</li>
								<li class="em mod">
									<a title="Cliquez pour envoyer l'article à un ami" href="mailto:?subject=<?php the_title(); ?>&amp;body=Salut, voici un article qui devrait t'intéresser : <?php the_permalink(); ?>" class="share-email share-icon" rel="nofollow">E-mail</a>
								</li>
							</ul>
							<div class="meta">
								<ul>
									<li class="post-author">
										<img width="45" height="45" alt="" class="avatar" src="<? echo get_avatar_url(get_avatar(get_the_author_meta('email'), '75')); ?>">                
										<p>
											Écrit par <strong><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author();?></a></strong><br>
											Publié le <strong><?php the_time('j F, Y');?></strong>
										</p>
									</li>
									<li class="post-cat"><span class="iconic">/</span>Publié dans » <?php the_category(', ') ?></li>
									<li class="post-comment"><span class="iconic">j</span> <a href="#disqus_thread">0</a></li>
									<li class="post-tags"><span class="iconic">g</span><?php the_tags('TAGS » '); ?></li>
								</ul>
							</div>
							<!-- Place this tag where you want the widget to render. -->
							<div id="googleplus_widget">
								<span>
									<div class="g-page" data-width="297" data-href="//plus.google.com/101941248715923612703" data-layout="landscape" data-rel="publisher"></div>
									<!-- Place this tag after the last widget tag. -->
									<script type="text/javascript">
									  window.___gcfg = {lang: 'fr'};

									  (function() {
										var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
										po.src = 'https://apis.google.com/js/plusone.js';
										var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
									  })();
									</script>
								</span>
							</div>
							<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<!-- WOFTEC-Single -->
							<ins class="adsbygoogle"
								 style="display:inline-block;width:300px;height:250px"
								 data-ad-client="ca-pub-7092646739578583"
								 data-ad-slot="1871890552"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>
						</aside>
						<div class="clearfix"></div>
						<div class="similar">
							<div class="title"><span class="iconic">r</span>Articles similaires</div>
							<?php $backup = $post;
								$tags = wp_get_post_tags($post->ID);
								$tagIDs = array();
								if ($tags) {
								$tagcount = count($tags);
								for ($i = 0; $i < $tagcount; $i++) {
								$tagIDs[$i] = $tags[$i]->term_id;
								}
								$args=array(
								'tag__in' => $tagIDs,
								'post__not_in' => array($post->ID),
								'showposts'=>4,
								'orderby'=>'date' 
								);
								$my_query = new WP_Query($args);
								if( $my_query->have_posts() ) {
								while ($my_query->have_posts()) : $my_query->the_post(); ?>
								<article class="article">
									<a href="<?php the_permalink(); ?>">
										<?php if(has_post_thumbnail()): ?>
											<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'related-thumb'); ?>
											<img class="thumb" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" width='232' height='164' />
										<?php else: ?>
											<img class="thumb" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/thumbnail.png&w=232&h=164" alt="<?php the_title(); ?>" width='232' height='164' />
										<?php endif; ?>                     
										<div class="bio">
											<h2><?php the_title(); ?></h2>
										</div>
									</a>
								</article>
								<?php endwhile; } } $post = $backup; wp_reset_query(); ?>
						</div>
						<div class="comments">
							<?php comments_template(); ?> 
						</div>
						<?php endwhile; endif; ?>
					</section>
				</section>
				</div>
			</div>
<?php get_footer(); ?>