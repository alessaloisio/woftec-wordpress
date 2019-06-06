<?php
// Get parent categories with schema.org data
function woftec_content_get_category_parents($id, $link = false,$nicename = false,$visited = array()) {
	$final = '';
	$parent = get_category($id);
	if (is_wp_error($parent))
		return $parent;
	if ($nicename)
		$name = $parent->name;
	else
		$name = $parent->cat_name;
	if ($parent->parent && ($parent->parent != $parent->term_id ) && !in_array($parent->parent, $visited)) {
		$visited[] = $parent->parent;
		$final .= woftec_content_get_category_parents( $parent->parent, $link, $nicename, $visited );
		}
	if ($link)
		$final .= '<div typeof="v:Breadcrumb"><a href="' . get_category_link( $parent->term_id ) . '" title="Voir tous les articles de la catégorie '.$parent->cat_name.'" rel="v:url" property="v:title" class="bc"><span>'.$name.'</span></a></div>';
	else
		$final .= $name;
	return $final;
}
// Breadcrumb
function breadcrumb(){
	global $wp_query;
	global $blog_id;
	$paged = get_query_var('paged');
	$sep = '';
	$data = '<div typeof="v:Breadcrumb">';
	$dataend = '</div>';
	$final = '';  
	// Breadcrumb start
	?>
	<section id="b" class="animated fadeIn"><div class="center">
	<?php
		echo '<nav class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">';
		echo '<div typeof="v:Breadcrumb"><a title="Accueil" rel="v:url" property="v:title" href="http://www.woftec.com" class="bc"><span>Accueil</span></a></div>';
		if($blog_id == 2){echo '<div typeof="v:Breadcrumb"><a title="Smartphone" rel="v:url" property="v:title" href="http://smartphone.woftec.com" class="bc" ><span>Smartphone</span></a></div>';}
		if($blog_id == 3){echo '<div typeof="v:Breadcrumb"><a title="Jeux Vidéo" rel="v:url" property="v:title" href="http://games.woftec.com" class="bc"><span>Jeux Vidéo</span></a></div>';}
		if($blog_id == 4){echo '<div typeof="v:Breadcrumb"><a title="PC/Mac" rel="v:url" property="v:title" href="http://pcmac.woftec.com" class="bc"><span>PC/Mac</span></a></div>';}
			//Attachment
			if ( is_attachment()){
				global $post;
				$parent = get_post($post->post_parent);
				$id = $parent->ID;
				$category = get_the_category($id);
				$category_id = get_cat_ID( $category[0]->cat_name );
				$permalink = get_permalink( $id );
				$title = $parent->post_title;
				$final .= woftec_content_get_category_parents($category_id,TRUE,$sep).$data."<a href='$permalink' rel='v:url' property='v:title' title='$title' class='bc'><span>$title</span></a>".$dataend.$data.'<span>'.the_title('','',FALSE).'</span>'.$dataend;
			}
			// Post type
			if ( is_single() && !is_singular('post')){
				global $post;
				$nom = get_post_type($post);
				$archive = get_post_type_archive_link($nom);
				$mypost = $post->post_title;
				$final .= $data.'<a href="'.$archive.'" rel="v:url" property="v:title" title="'.$nom.'" class="bc"><span>'.$nom.'</span></a>'.$dataend.$data.'<span>'.$mypost.'</span>'.$dataend;
			}
			//post
			if ( is_single()){
				// Post categories
				$category = get_the_category();
				$category_id = get_cat_ID( $category[0]->cat_name );
				if ($category_id != 0)
					$final .= woftec_content_get_category_parents($category_id,TRUE,$sep);
				elseif ($category_id == 0) {
					$post_type = get_post_type();
					$tata = get_post_type_object( $post_type );
					$titrearchive = $tata->labels->menu_name;
					$urlarchive = get_post_type_archive_link( $post_type );
					$final .= $data.'<a class="breadl" href="'.$urlarchive.'" title="'.$titrearchive.'" rel="v:url" property="v:title" class="bc"><span>'.$titrearchive.'</span></a>'.$dataend;
				}
				// With Comments pages
				$cpage = get_query_var( 'cpage' );
				if (is_single() && $cpage > 0) {
					global $post;
					$permalink = get_permalink( $post->ID );
					$title = $post->post_title;
					$final .= $data."<a href='$permalink' rel='v:url' property='v:title' title='$title' class='bc'><span>$title</span></a>".$dataend;
					$final .= $data."<span>Commentaires page $cpage</span>".$dataend;
				}
				// Without Comments pages
				else $final .= $data.'<span>'.the_title('','',FALSE).'</span>'.$dataend;
			}
			// Categories
			if ( is_category() ){
				$categoryid       = $GLOBALS['cat'];
				$category         = get_category($categoryid);
				$categoryparent   = get_category($category->parent);
				if ($category->parent != 0)
					$final .= woftec_content_get_category_parents($categoryparent, true, $sep, true);
				if ( $paged <= 1 )
					$final .= $data.'<span>'.single_cat_title("", false).'</span>'.$dataend;
				else
					$final .= $data.'<a href="' . get_category_link( $category ) . '" title="Voir tous les articles de '.single_cat_title("", false).'" rel="v:url" property="v:title">'.single_cat_title("", false).'</a>'.$dataend;
			}
			// Page
			if ( is_page() && !is_home() ) {
				$post = $wp_query->get_queried_object();
				// Simple page
				if ( $post->post_parent == 0 )
					$final .= $data.'<span>'.the_title('','',FALSE).'</span>'.$dataend;
				// Page with ancestors
				elseif ( $post->post_parent != 0 ) {
					$title = the_title('','',FALSE);
					$ancestors = array_reverse(get_post_ancestors($post->ID));
					array_push($ancestors, $post->ID);
					$count = count ($ancestors);$i=0;
					foreach ( $ancestors as $ancestor ){
						if( $ancestor != end($ancestors) ){
							$name = strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) );
							$final .= $data.'<a title="'.$name.'" href="'. get_permalink($ancestor) .'" rel="v:url" property="v:title" class="bc"><span>'.$name.'</span></a>'.$dataend;
							$i++;
							if ($i < $ancestors) 
								$final .= $sep;
						}
						else
							$final .= strip_tags(apply_filters('single_post_title',get_the_title($ancestor)));
					}
				}
			}
			// authors
			if ( is_author() ) {
				if(get_query_var('author_name'))
					$curauth = get_user_by('slug', get_query_var('author_name'));
				else
					$curauth = get_userdata(get_query_var('author'));
					$final .= $data.'<span>Articles de l\'auteur "'.$curauth->nickname.'"</span>'.$dataend;
			}  
			// tags
			if ( is_tag() ){
				$final .= $data.'<span>Articles sur le th&egrave;me '.single_tag_title("",FALSE).'</span>'.$dataend;
			}
			// Search
			if ( is_search() ) {
				$final .= $data.'<span>R&eacute;sultats de votre recherche sur "'.get_search_query().'"</span>'.$dataend;
			}    
			// Dates
			if ( is_date() ){
				if ( is_day() ) {
					$year = get_year_link('');
					$final .= $data.'<a title="'.get_query_var("year").'" href="'.$year.'" rel="v:url" property="v:title" class="bc"><span>'.get_query_var("year").'</span></a>'.$dataend;
					$month = get_month_link( get_query_var('year'), get_query_var('monthnum') );
					$final .= $data.'<a title="'.single_month_title(' ',false).'" href="'.$month.'" rel="v:url" property="v:title" class="bc"><span>'.single_month_title(' ',false).'</span></a>'.$dataend;
					$final .= $data.'<span>Archives pour '.get_the_date().'</span>'.$dataend;
				} elseif ( is_month() ){
					$year = get_year_link('');
					$final .= $data.'<a title="'.get_query_var("year").'" href="'.$year.'" rel="v:url" property="v:title" class="bc"><span>'.get_query_var("year").'</span></a>'.$dataend;
					$final .= $data.'<span>Archives pour '.single_month_title(' ',false).'</span>'.$dataend;
				} elseif ( is_year() )
					$final .= $data.'<span>Archives pour '.get_query_var('year').'</span>'.$dataend;
			}
			// 404 page
			if ( is_404())
				$final .= $data.'<span>404 Page non trouvée</span>'.$dataend;
			// Pagination
			if ( $paged >= 1 )
				$final .= $data.'<span>Page '.$paged.'</span>'.$dataend;
			// The End
			echo $final;
	?>  </nav>
		<nav class="navbar">
			<div class="tag"><span class="iconic">r</span>
				<div id="feed">
					<ul class="feed-menu">
						<li><a title="Articles récents" href="#tab1"><span class="iconic">c</span></a></li>
						<li><a title="Articles populaires" href="#tab2"><span class="iconic">h</span></a></li>
						<li><a title="Articles plus commentés" href="#tab3"><span class="iconic">J</span></a></li>
					</ul>
					<div class="feed-contenu">
						<div id="tab1" class="feed_content">
							<ul id="content_1" class="fdcontent">
								<?php if ($blog_id == 1){ ?>
									<?php
										$blogs = blogs_list();
										if (isset($blogs) && is_array($blogs)) {      
										foreach ($blogs as $blog) {
										switch_to_blog( $blog->blog_id );
										$nombrearticle = 'showposts=2';
										if ( $blog->blog_id == 27) $nombrearticle = '';
										$recentPosts = new WP_Query('' . $nombrearticle . '');
									?>
									<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
										<li>
											<a href="<?php the_permalink() ?>">
												<span class="date">Le <?php the_time('j F à H:i'); ?></span>
												<p class="title"><?php the_title(); ?></p>
											</a>
										</li>
									<?php endwhile; restore_current_blog(); }}?>
								<?php } else { ?>
									<?php
										$recentPosts = new WP_Query('showposts=5');
									?>
									<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
										<li>
											<a href="<?php the_permalink() ?>">
												<span class="date">Le <?php the_time('j F à H:i'); ?></span>
												<p class="title"><?php the_title(); ?></p>
											</a>
										</li>
									<?php endwhile; wp_reset_query(); ?>
								<?php } ?>
							</ul>
						</div>
						<div id="tab2" class="feed_content">
							<ul id="content_2" class="fdcontent">
								<?php if ($blog_id == 1){ ?>
									<?php
										$blogs = blogs_list();
										if (isset($blogs) && is_array($blogs)) {      
										foreach ($blogs as $blog) {
										switch_to_blog( $blog->blog_id );
										$nombrearticle = 'showposts=2&orderby=comment_count&order=DESC';
										if ( $blog->blog_id == 27) $nombrearticle = '';
										$popular_posts = new WP_Query('' . $nombrearticle . '');
										if($popular_posts->have_posts()): 
									?>
									<?php while($popular_posts->have_posts()): $popular_posts->the_post(); ?>
										<li>
											<a href="<?php the_permalink() ?>">
												<span class="date">Le <?php the_time('j F Y'); ?></span>
												<p class="title"><?php the_title(); ?></p>
											</a>
										</li>
									<?php endwhile; endif; restore_current_blog(); }}?>
								<?php } else { ?>
									<?php
									$popular_posts = new WP_Query('showposts=5&orderby=comment_count&order=DESC');
									if($popular_posts->have_posts()): 
									?>
									<?php while($popular_posts->have_posts()): $popular_posts->the_post(); ?>
										<li>
											<a href="<?php the_permalink() ?>">
												<span class="date">Le <?php the_time('j F Y'); ?></span>
												<p class="title"><?php the_title(); ?></p>
											</a>
										</li>
									<?php endwhile; ?>
									<?php endif; wp_reset_query(); ?>
								<?php } ?>
							</ul>
						</div>
						<div id="tab3" class="feed_content">
							<ul id="content_3" class="fdcontent">
								<?php if ($blog_id == 1){ ?>
									<?php
										$blogs = blogs_list();
										if (isset($blogs) && is_array($blogs)) {      
										foreach ($blogs as $blog) {
										switch_to_blog( $blog->blog_id );
										$nombrearticle = 'orderby=comment_count&posts_per_page=2&ignore_sticky_posts=1';
										if ( $blog->blog_id == 27) $nombrearticle = '';
										$popular = new WP_Query('' . $nombrearticle . '');
									?>
									<?php $count = 1; ?>
									<?php while ($popular->have_posts()) : $popular->the_post(); ?>
									<li>
										<a href="<?php the_permalink() ?>">
											<span class="date">Le <?php the_time('j F Y'); ?></span>
											<p class="title"><?php the_title(); ?></p>
											<span class="commentaire"><?php comments_number('0 commentaire','1 commentaire','% commentaires'); ?></span>
										</a>
									</li>
									<?php endwhile; restore_current_blog(); }}?>
								<?php } else { ?>
									<?php $popular = new WP_Query('orderby=comment_count&posts_per_page=5&ignore_sticky_posts=1'); ?>
									<?php $count = 1; ?>
									<?php while ($popular->have_posts()) : $popular->the_post(); ?>
									<li>
										<a href="<?php the_permalink() ?>">
											<span class="date">Le <?php the_time('j F Y'); ?></span>
											<p class="title"><?php the_title(); ?></p>
											<span class="commentaire"><?php comments_number('0 commentaire','1 commentaire','% commentaires'); ?></span>
										</a>
									</li>
									<?php endwhile; wp_reset_query(); ?>
								<?php } ?>	
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<?php if($blog_id==2||($blog_id==3||($blog_id==4))){if(is_single()){?>
				<?php next_post_link('%link', '<span class="iconic">6</span> <span class="tip">Article suivant</span>', TRUE); ?>
				<?php previous_post_link('%link', '<span class="iconic">4</span> <span class="tip">Article précédent</span>', TRUE); ?>
			<?php } else { ?>
				<div class="tag"><span class="iconic">g</span> TAGS
					<p class="tag_cloud">
						<?php wp_tag_cloud(); ?>
					</p>
				</div>
				<div id="filtre" class="tag"><span class="iconic">a</span> Archives
					<ul class="tag-content">
						<?php wp_get_archives("type=monthly&show_post_count=1"); ?>
					</ul>
				</div>
			<?php }} ?>
		</nav>
		
	
	
	
	</div></section>
<?php } ?>
