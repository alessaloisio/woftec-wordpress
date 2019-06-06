<?php global $blog_id; require_once'class/Image.php';?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" href="http://www.woftec.com/feeds.php" title="WOFTEC - World of Technology" />
	<link rel="shortcut icon" href="http://www.woftec.com/favicon.ico" type="image/x-icon" />
	<link rel="author" href="https://plus.google.com/b/101941248715923612703/101941248715923612703/posts" />
	<?php wp_head(); ?>
	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body <?php body_class(); ?>>
	<div id="root">
		<nav id="respmenu">
			<h4>Navigation</h4>
			<ul class="mmain">
				<li <?php if($blog_id == 1){echo 'class="Selected no-border"';}?>><a href="http://www.woftec.com"><i class="icon-home"></i>ACCUEIL</a></li>
				<li <?php if($blog_id == 2){echo 'class="Selected no-border"';}?>><a href="http://smartphone.woftec.com/"><i class="icon-mobile"></i>Smartphone</a></li>
				<li <?php if($blog_id == 3){echo 'class="Selected no-border"';}?>><a href="http://games.woftec.com/"><i class="icon-gamepad"></i>JEUX VIDÉO</a></li>
				<li <?php if($blog_id == 4){echo 'class="Selected no-border"';}?>><a href="http://pcmac.woftec.com/"><i class="icon-desktop"></i>PC/MAC</a></li>
				<li class="msub"><span><i class="icon-box"></i>ESPACE</span></li>
				<li><a href="http://demo.woftec.com/woftec_v2.0/"><i class="icon-videocam"></i>VIDÉOTHÈQUE</a></li>
				<li><a href="http://demo.woftec.com/woftec_v2.0/"><i class="icon-basket"></i>BOUTIQUE</a></li>
				<li><a href="http://demo.woftec.com/woftec_v2.0/"><i class="icon-chat"></i>FORUM</a></li>
			</ul>
			<ul class="mespace">
				<li class="mback"><span><i class="icon-undo"></i>Retour</span></li>
				<li><a href="http://samsung.woftec.com">Samsung</a></li>
				<li><a href="http://apple.woftec.com">Apple</a></li>
				<li><a href="http://sony.woftec.com">Sony</a></li>
				<li><a href="http://asus.woftec.com">Asus</a></li>
				<li><a href="http://google.woftec.com">Google</a></li>
				<li><a href="http://lg.woftec.com">LG</a></li>
				<li><a href="http://acer.woftec.com">Acer</a></li>
				<li><a href="http://microsoft.woftec.com">Microsoft</a></li>
			</ul>
		</nav>
		<div id="respsearch">
			<form method="get" action="" id="searchform" class="">
				<input type="text" id="searchform-text" placeholder="Rechercher" name="s">
				<a id="a-close"></a>
			</form>
		</div>
		<div id="content-wrapper">
			<header>
    			<div class="center">
					<a href="http://www.woftec.com" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="animated fadeInLeft" alt="WOFTEC" width="200px" height="67px"/></a>
    				<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="animated fadeInLeft respon" alt="WOFTEC" width="200px" height="67px"/>
					<a id="a-menu"><i class="icon-content-43"></i></a>
					<a id="a-search"><i class="icon-search"></i></a>
					<nav id="p-menu" class="animated fadeIn">
						<ul class="principale">
							<li class="onglet">
								<a class="od home <?php if($blog_id == 1){echo 'selected';}?>" href="http://www.woftec.com"><p>!</p></a>
								<ul class="dd">
									<li><a href="http://www.woftec.com/partenaire/" class="g">Nos partenaires</a></li>
									<li><a href="http://www.woftec.com/a-propos/" class="g">À propos</a></li>
									<li><a href="http://www.woftec.com/contact/" class="g">Contactez-nous</a></li>
								</ul>
							</li>
							<li class="onglet">
								<a class="od <?php if($blog_id == 2){echo 'selected';}?>" href="http://smartphone.woftec.com">Smartphone</a>
								<div class="mega-dd">
									<div class="nc">
										<h3><a href="http://smartphone.woftec.com/category/android/"><span>Android</span></a></h3>
										<ul class="ncd">
											<li><a href="http://smartphone.woftec.com/category/android/actuandroid/"><span class="menu-ic news2"></span><span>Actualité</span></a></li>
											<li><a href="http://smartphone.woftec.com/category/android/testandroid/"><span class="menu-ic labs2"></span><span>Test</span></a></li>
											<li><a href="http://smartphone.woftec.com/category/android/appandroid/"><span class="menu-ic apps2"></span><span>Application</span></a></li>
											<li><a href="http://smartphone.woftec.com/category/android/jeuxandroid/"><span class="menu-ic games2"></span><span>Jeux</span></a></li>
										</ul>
									</div>
									<div class="nc">
										<h3><a href="http://smartphone.woftec.com/category/ios/"><span>Apple</span></a></h3>
										<ul class="ncd">
											<li><a href="http://smartphone.woftec.com/category/ios/iphone/"><span class="menu-ic iphone"></span><span>iPhone</span></a></li>
											<li><a href="http://smartphone.woftec.com/category/ios/ipad/"><span class="menu-ic ipad"></span><span>iPad</span></a></li>
											<li><a href="http://smartphone.woftec.com/category/ios/ipod/"><span class="menu-ic ipod"></span><span>iPod</span></a></li>
											<li><a href="http://smartphone.woftec.com/category/ios/jeuxios/"><span class="menu-ic games2"></span><span>Jeux</span></a></li>
										</ul>
									</div>
									<div class="nc">
										<h3><a href="http://smartphone.woftec.com/category/windowsphone/"><span>Windows Phone</span></a></h3>
										<ul class="ncd">
											<li><a href="http://smartphone.woftec.com/category/windowsphone/winphonactu/"><span class="menu-ic news2"></span><span>Actualité</span></a></li>
											<li><a href="http://smartphone.woftec.com/category/windowsphone/winphontest/"><span class="menu-ic labs2"></span><span>Test</span></a></li>
											<li><a href="http://smartphone.woftec.com/category/windowsphone/winphonapp/"><span class="menu-ic apps2"></span><span>Application</span></a></li>
										</ul>
									</div>
									<div class="nc">
										<h3><a href="http://smartphone.woftec.com/category/tablette/"><span class="menu-link-title btn">Tablette</span></a></h3>
										<ul class="ncd">
											<li><a href="http://smartphone.woftec.com/category/tablette/androidtab/"><span class="menu-ic android"></span><span>AndroTab</span></a></li>
											<li><a href="http://smartphone.woftec.com/category/tablette/windowstab/"><span class="menu-ic windows"></span><span>WindowsTab</span></a></li>
											<li><a href="http://smartphone.woftec.com/category/tablette/blacktab/"><span class="menu-ic bb"></span><span>BBTab</span></a></li>
										</ul>
									</div>
									<div class="nc">
										<h3><a href="#"><span class="menu-link-title btn">Autres</span></a></h3>
										<ul>
											<li><a href="http://smartphone.woftec.com/category/symbian/"><span class="menu-ic nokia2"></span><span>Symbian</span></a></li>
											<li><a href="http://smartphone.woftec.com/category/blackberry/"><span class="menu-ic bb"></span><span>BlackBerry</span></a></li>
											<li><a href="http://smartphone.woftec.com/category/accessoire/"><span class="menu-ic accs"></span><span>Accessoires</span></a></li>
										</ul>
									</div>
								</div>
							</li>
							<li class="onglet">
								<a class="od <?php if($blog_id == 3){echo 'selected';}?>" href="http://games.woftec.com/">Jeux Vidéo</a>
								<div class="mega-dd">
									<div class="nc">
										<h3><a href="http://games.woftec.com/category/jeux/"><span class="menu-link-title btn">Jeux</span></a></h3>
										<ul class="ncd">
											<li><a href="http://games.woftec.com/category/jeux/fps/"><span class="menu-ic fps"></span><span class="menu-link-title">FPS</span></a></li>
											<li><a href="http://games.woftec.com/category/jeux/rpg/"><span class="menu-ic rpg"></span><span class="menu-link-title">RPG</span></a></li>
											<li><a href="http://games.woftec.com/category/jeux/course/"><span class="menu-ic course"></span><span class="menu-link-title">Course</span></a></li>
											<li><a href="http://games.woftec.com/category/jeux/aventure/"><span class="menu-ic aventure"></span><span class="menu-link-title">Aventure</span></a></li>
										</ul>
									</div>
									<div class="nc">
										<h3><a href="http://games.woftec.com/category/playstation/"><span class="menu-link-title">Playstation</span></a></h3>
										<ul class="ncd">
											<li><a href="http://games.woftec.com/category/playstation/ps3/"><span class="menu-ic ps3"></span><span class="menu-link-title">PS3</span></a></li>
											<li><a href="http://games.woftec.com/category/playstation/ps4/"><span class="menu-ic ps3"></span><span class="menu-link-title">PS4</span></a></li>
											<li><a href="http://games.woftec.com/category/playstation/psvita/"><span class="menu-ic vita"></span><span class="menu-link-title">PS Vita</span></a></li>
										</ul>
									</div>
									<div class="nc">
										<h3><a href="http://games.woftec.com/category/microsoft/"><span class="menu-link-title">Microsoft</span></a></h3>
										<ul class="ncd">
											<li><a href="http://games.woftec.com/category/microsoft/xbox360/"><span class="menu-ic xbox"></span><span class="menu-link-title">XBOX 360</span></a></li>
											<li><a href="http://games.woftec.com/category/microsoft/xboxone/"><span class="menu-ic xbox"></span><span class="menu-link-title">XBOX ONE</span></a></li>
											<li><a href="http://games.woftec.com/category/microsoft/xbox720/"><span class="menu-ic xbox"></span><span class="menu-link-title">XBOX 720</span></a></li>
										</ul>
									</div>
									<div class="nc">
										<h3><a href="http://games.woftec.com/category/nitendo/"><span class="menu-link-title btn">Nitendo</span></a></h3>
										<ul class="ncd">
											<li><a href="http://games.woftec.com/category/nitendo/ds/"><span class="menu-ic nitendo"></span><span class="menu-link-title">Nitendo DS</span></a></li>
											<li><a href="http://games.woftec.com/category/nitendo/wii/"><span class="menu-ic wii"></span><span class="menu-link-title">Wii</span></a></li>
											<li><a href="http://games.woftec.com/category/nitendo/wiiu/"><span class="menu-ic wiiu"></span><span class="menu-link-title">Wii U</span></a></li>
										</ul>
									</div>
									<div class="nc">
										<h3><a href="#"><span class="menu-link-title btn">Autres</span></a></h3>
										<ul>
											<li><a href="http://games.woftec.com/category/pc/"><span class="menu-ic pc"></span><span class="menu-link-title">PC</span></a></li>
											<li><a href="http://games.woftec.com/category/bandeannonce/"><span class="menu-ic video"></span><span class="menu-link-title">Bande annonce</span></a></li>
											<li><a href="http://games.woftec.com/category/accessoiresconsole/"><span class="menu-ic accs"></span><span class="menu-link-title">Accessoires</span></a></li>
										</ul>
									</div>
								</div>
							</li>
							<li class="onglet">
								<a class="od <?php if($blog_id == 4){echo 'selected';}?>" href="http://pcmac.woftec.com/">PC/MAC</a>
								<div class="mega-dd">
									<div class="nc ncb">
										<h3><a href="http://pcmac.woftec.com/category/windows/"><span class="menu-link-title btn">Windows</span></a></h3>
										<ul class="ncd">
											<li><a href="http://http//pcmac.woftec.com/category/windows/system/"><span class="menu-ic system"></span><span class="menu-link-title">System</span></a></li>
											<li><a href="http://pcmac.woftec.com/category/windows/astuces/"><span class="menu-ic more"></span><span class="menu-link-title">Astuces</span></a></li>
											<li><a href="http://pcmac.woftec.com/category/windows/optimisation/"><span class="menu-ic best"></span><span class="menu-link-title">Optimisation</span></a></li>
											<li><a href="http://pcmac.woftec.com/category/windows/personnalisation/"><span class="menu-ic theme"></span><span class="menu-link-title">Personnalisation</span></a></li>
										</ul>
									</div>
									<div class="nc ncb">
										<h3><a href="http://pcmac.woftec.com/category/mac/"><span class="menu-link-title btn">Macintosh</span></a></h3>
										<ul class="ncd">
											<li><a href="http://pcmac.woftec.com/category/mac/systemosx/"><span class="menu-ic system"></span><span class="menu-link-title">System</span></a></li>
											<li><a href="http://pcmac.woftec.com/category/mac/accessoiresmac/"><span class="menu-ic accs"></span><span class="menu-link-title">Accessoires</span></a></li>
											<li><a href="http://pcmac.woftec.com/category/mac/trucsastuces/"><span class="menu-ic more"></span><span class="menu-link-title">Trucs et Astuces</span></a></li>
										</ul>
									</div>
									<div class="nc ncb">
										<h3><a href="http://pcmac.woftec.com/category/linux/"><span class="menu-link-title btn">Linux</span></a></h3>
										<ul class="ncd">
											<li><a href="http://pcmac.woftec.com/category/linux/systemlinux/"><span class="menu-ic system"></span><span class="menu-link-title">System</span></a></li>
											<li><a href="http://pcmac.woftec.com/category/linux/trucsastuceslinux/"><span class="menu-ic more"></span><span class="menu-link-title">Trucs et Astuces</span></a></li>
											<li><a href="http://pcmac.woftec.com/category/linux/personnalisationlinux/"><span class="menu-ic theme"></span><span class="menu-link-title">Personnalisation</span></a></li>
										</ul>
									</div>
									<div class="nc ncb">
										<h3><a href="#"><span class="menu-link-title btn">Autres</span></a></h3>
										<ul>
											<li><a href="http://pcmac.woftec.com/category/actupcmac/"><span class="menu-ic news2"></span><span class="menu-link-title">Actualité</span></a></li>
											<li><a href="http://pcmac.woftec.com/category/software/"><span class="menu-ic apps2"></span><span class="menu-link-title">Software</span></a></li>
											<li><a href="http://pcmac.woftec.com/category/compopc/"><span class="menu-ic accspc"></span><span class="menu-link-title">Composants PC</span></a></li>
										</ul>
									</div>
								</div>
							</li>
							<li class="onglet"><a class="od" href="">Vidéothèque</a></li>
							<li class="onglet"><a class="od" href="">Boutique</a></li>
							<li class="onglet"><a class="od" href="http://forum.woftec.com">Forum</a>
								<ul class="dd">
									<li><a href="http://forum.woftec.com/ucp.php?mode=login" class="g">Connexion</a></li>
									<li><a href="http://forum.woftec.com/ucp.php?mode=register" class="g">Inscripion</a></li>
								</ul>
							</li>
							<li class="search">
								<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
									<input class="search-form" name="s" value="" type="text" placeholder="Rechercher...">
									<input class="search-form-submit" type="submit" value="OK">
								</form>
							</li>
						</ul>
    				</nav>
    			</div>
      		</header>
			<div id="core" class="animated fadeInLeftBig">
				<div class="separated"></div>
				<?php global $blog_id; if ($blog_id == 2){ ?>
					<?php if (is_home()){ ?>
						<?php if ( $paged >= 1 ){ ?>
							<div class="coreimg" style="background: url('http://smartphone.woftec.com/wp-content/blogs.dir/2/files/mosaic.jpg') repeat scroll center center;">
						<?php }if ( $paged <= 1 ){ ?>
							<div class="coreimg" style="background: url('<?= Image::mosaic('wp-content/blogs.dir/2/files',3 ,130, 82); ?>') repeat scroll center center;">
					<?php }}else{ ?>
						<div class="coreimg" style="background: url('http://smartphone.woftec.com/wp-content/blogs.dir/2/files/mosaic.jpg') repeat scroll center center;">
					<?php } ?>
				<?php } elseif ($blog_id == 3){ ?>
					<?php if (is_home()){ ?>
						<?php if ( $paged >= 1 ){ ?>
							<div class="coreimg" style="background: url('http://games.woftec.com/wp-content/blogs.dir/3/files/mosaic.jpg') repeat scroll center center;">
						<?php }if ( $paged <= 1 ){ ?>
							<div class="coreimg" style="background: url('<?= Image::mosaic('wp-content/blogs.dir/3/files',3 ,130, 82); ?>') repeat scroll center center;">
					<?php }}else{ ?>
						<div class="coreimg" style="background: url('http://games.woftec.com/wp-content/blogs.dir/3/files/mosaic.jpg') repeat scroll center center;">
					<?php } ?>
				<?php } elseif ($blog_id == 4){ ?>
					<?php if (is_home()){ ?>
						<?php if ( $paged >= 1 ){ ?>
							<div class="coreimg" style="background: url('http://pcmac.woftec.com/wp-content/blogs.dir/4/files/mosaic.jpg') repeat scroll center center;">
						<?php }if ( $paged <= 1 ){ ?>
							<div class="coreimg" style="background: url('<?= Image::mosaic('wp-content/blogs.dir/4/files',3 ,130, 82); ?>') repeat scroll center center;">
					<?php }}else{ ?>
						<div class="coreimg" style="background: url('http://pcmac.woftec.com/wp-content/blogs.dir/4/files/mosaic.jpg') repeat scroll center center;">
					<?php } ?>
				<?php }else{ ?>
					<div class="coreimg" style='background: url("http://www.woftec.com/wp-content/themes/woftec-v2.0/images/core1.png") no-repeat scroll center center, url("http://www.woftec.com/wp-content/themes/woftec-v2.0/images/banner_pattern.png") repeat scroll 0 0 transparent'>
				<?php } ?>
						<div class="overlay">
							<div class="center">
								<div class="preface">
									<div class="intro">
										<?php if ($blog_id == 2){ ?>
											<?php if (is_single()){ ?>
												<span class="title-p"><?php the_title();?></span>
												<p class="txt-p"><?php echo limite_mots(get_the_excerpt(), 20);?> ...</p>
											<?php }else{ ?>
												<span class="title-p">Smartphone</span>
												<p class="txt-p">Les toutes dernières actualités mobile du moment, des tests, mode d'emploi... N'oubliez pas de nous suivre sur les réseaux sociaux.</p>
											<?php } ?>
										<?php } elseif ($blog_id == 3){ ?>
											<?php if (is_single()){ ?>
												<span class="title-p"><?php the_title();?></span>
												<p class="txt-p"><?php echo limite_mots(get_the_excerpt(), 20);?> ...</p>
											<?php }else{ ?>
												<span class="title-p">Jeux Vidéo</span>
												<p class="txt-p">Les dernières actualités jeux video, console, accessoires... N'oubliez pas de nous suivre sur les réseaux sociaux.</p>
											<?php } ?>
										<?php } elseif ($blog_id == 4){ ?>
											<?php if (is_single()){ ?>
												<span class="title-p"><?php the_title();?></span>
												<p class="txt-p"><?php echo limite_mots(get_the_excerpt(), 20);?> ...</p>
											<?php }else{ ?>
												<span class="title-p">PC/MAC</span>
											<p class="txt-p">Actualités PC, Mac, hardware et tests, tutoriels... N'oubliez pas de nous suivre sur les réseaux sociaux.</p>
											<?php } ?>
										<?php }else{ ?>
											<span class="title-p">Smartphone, Jeux Vidéo, PC/MAC</span>
											<p class="txt-p">Découvrez toute l'actualité high-tech en toute simplicité. Et n'oubliez pas de nous suivre sur les réseaux sociaux.</p>
										<?php } ?>
									</div>
									<div class="newsletter">
										<form id="newsletter" method="post" action="http://woftec.us4.list-manage.com/subscribe/post?u=3c40c100b63af260dbe07ba2c&amp;id=f2a8c34fef" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
											<fieldset>
												<legend>S'inscrire à la newsletter</legend>
												<label for="mce-EMAIL">Email</label>
												<input type="email" name="EMAIL" placeholder="Votre adresse e-mail" id="mce-EMAIL">
												<input type="submit" value="OK" name="sub-news" id="sub-news">
											</fieldset>
										</form>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
