			<div id="bottom-shadow"></div>
			<footer id="f" class="footer">
				<div class="center w">
					<div class="g1">
						<?php
							$cache = '/homez.520/woftec/www/wp-content/themes/woftec-v2.0/cache/tweets.tmp';
							if(time() - filemtime($cache) > 60){
								require '/homez.520/woftec/www/wp-content/themes/woftec-v2.0/class/twitteroauth.php';	
								$connection = new TwitterOAuth('r4hyGiR7E1dmp4eHIxUg','MI5r5bUH9RsIo1QzJwNcTousuZ7lg1HAD73fFIEXNM','430875141-GLyT7jAs19nULowEmokkcGogaFIItM0sPrAt0Hiw','QA8AlQjrSnC9APRGNgXFL5P6juBFYqV7SdybVSEJk');
								$tweets = $connection->get('statuses/user_timeline', array('count' => 3));
								file_put_contents($cache, serialize($tweets));
							}else{
								$tweets = unserialize(file_get_contents($cache));
							}
						?>
						<div class="title">Dernier tweets</div>
						<?php foreach ($tweets as $k => $tweet): ?>
							<div class="tweet"><?= $tweet->text; ?></div>
						<?php endforeach ?>			
					</div>
					<div class="g2">
						<div class="title">Social</div>
						<div class="sfoot">
							<a href="https://www.facebook.com/Woftec">f<span class="tip">Facebook</span></a>
							<a href="https://twitter.com/#!/officialwoftec">t<span class="tip">Twitter</span></a>
							<a rel="publisher external" href="https://plus.google.com/101941248715923612703">g<span class="tip">Google+</span></a>
							<a href="http://www.woftec.com/feeds.php">r<span class="tip">RSS</span></a>
							<a href="http://www.youtube.com/user/officialwoftec">y<span class="tip">Youtube</span></a>
							<a href="http://www.apple.com">q<span class="tip">Apple</span></a>
							<a href="http://fr.wordpress.org/">w<span class="tip">Wordpress</span></a>
						</div>
						<div class="title">Liens</div>
						<a href="http://slytee.com/sites/sc/h/woftec.com"><img width="80" height="15" alt="ameliorer la e-reputation" style="border:0" src="<?php echo get_template_directory_uri(); ?>/images/slytee.png"></a>
					</div>
					<div class="g2">
						<p><img src="<?php echo get_template_directory_uri(); ?>/images/logo3.png" style="width: 139px; margin: 0px auto 12px; display: block;" alt="WOFTEC" width="139px" height="40px"/></p>
						<p>Woftec est un magazine web pour toutes les personnes intéressées des nouvelles technologies, ce site fait en sorte de vous donner toutes les nouveautés dans les plus brefs délais et les meilleurs renseignements possible.</p>
					</div>
				</div>
				<div class="footer-credits-wrapper">	
					<div class="footer-credits">
						<p class="footer-copyright">Copyright &copy; 2013 - WOFTEC. All rights reserved.</p>
					</div>	
				</div>
			</footer>
		</div>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/default.js"></script>
		<?php if (is_single()){ ?>
			<script type="text/javascript">
			/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
			var disqus_shortname = 'woftec'; // required: replace example with your forum shortname

			/* * * DON'T EDIT BELOW THIS LINE * * */
			(function () {
			var s = document.createElement('script'); s.async = true;
			s.type = 'text/javascript';
			s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
			(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
			}());
			</script>
		<?php } ?> 
		<?php wp_footer(); ?>
	</div>
</body>
</html>