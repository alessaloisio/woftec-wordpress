<?php get_header(); ?>
<div id="site-content">
				<?php breadcrumb(); ?>
				<div class="shadow"></div>
				<div id="wrapper">
				<section id="c" class="center">
					<div id="main" class="pages">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="post-heading">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="post-entry">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div>
						<?php endwhile; endif; ?>
					</div>
				</section>
				</div>
			</div>
<?php get_footer(); ?>