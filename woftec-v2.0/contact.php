<?php
/*
Template Name: Contact
*/
require_once("/homez.520/woftec/www/totoprotect/include/cppf.php");

if($_POST[sent]){
	if($_POST['sujet'] == '3'){
		$message_send = "Bonjour , ".trim($_POST[your_name])." veut travailler pour vous !
		Elle voudrai utiliser se pseudo : ".trim($_POST[pseudo1]).".
		Tranche d'âge : ".trim($_POST[age]).".
		Elle vient de ".trim($_POST[pays]).".
		Cette personne voudrai devenir ".trim($_POST[travail])." dans la section ".trim($_POST[section]).".
		Message personnel:
		".stripslashes(trim($_POST[message]))."";
	}elseif($_POST['sujet'] == '4'){
		$message_send = "Bonjour, ".trim($_POST[your_name])." veut devenir membre de la Team WOFTEC !
		Cette personne voudrai utiliser se pseudo : ".trim($_POST[pseudo2]).".
		Tranche d'âge: ".trim($_POST[age]).".
		Elle vient de ".trim($_POST[pays]).".
		Cette personne possède une ".trim($_POST[console])."
		Message personnel:
		".stripslashes(trim($_POST[message]))."";
	}elseif($_POST['sujet'] == '5'){
		$message_send = "Bonjour, ".trim($_POST[your_name])." à envoyer un message.
		Sujet : ".trim($_POST[autre_sujet])."
		Message personnel: 
		".stripslashes(trim($_POST[message]))."";
	}else{
		$message_send = "Bonjour, ".trim($_POST[your_name])." à envoyer un message.
		Sujet : ".$_POST[sujet]."
		Message personnel: 
		".stripslashes(trim($_POST[message]))."";
	}
	$error = "";
	if(!trim($_POST[your_name])){
		$error .= "<p>S'il vous plaît entrez un nom.</p>";
	}
	if(!filter_var(trim($_POST[email]),FILTER_VALIDATE_EMAIL)){
		$error .= "<p>S'il vous plaît entrer une adresse email valide.</p>";
	}                        
	if(!trim($_POST[message])){
		$error .= "<p>S'il vous plaît entrer un message.</p>";
	}
	if(!$error){
		$email = mail("tttoto18@gmail.com","Page contact de ".get_option("blogname"),$message_send,"From: ".trim($_POST[your_name])." <".trim($_POST[email]).">\r\nReply-To:".trim($_POST[email]));
	}
}
?>
<?php get_header(); ?>
<div id="site-content">
	<?php breadcrumb(); ?>
	<div class="shadow"></div>
	<div id="wrapper">
		<section id="c" class="center">
			<div id="main" class="pages">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="post-heading page"><h1><?php the_title(); ?></h1></div>
				<div class="post-entry"><?php the_content(); ?></div>
					<?php if($email){ ?>
						<p>E-mail envoyé !</p>
					<?php } else { if($error) { ?>
						<p>Votre message n'a pas été envoyé<p>
						<?php echo $error; ?>
					<?php } else { the_content(); } ?>
						<form action="<?php the_permalink(); ?>" id="contact" method="post">
							<input type="hidden" name="sent" id="sent" value="1" />
								<div class="section">
									<label for="name" class="title">Votre identité :</label>
									<input type="text" name="your_name" id="your_name" placeholder="Ex : Aloisio Alessandro" value="<?php echo $_POST[your_name];?>"/>
								</div>
								<div class="section">
									<label for="email" class="title">Votre email :</label>
									<input type="email" name="email" id="email" value="<?php echo $_POST[email];?>"/>
								</div>
								<div class="section">
								   <label for="sujet" class="title">À quel sujet voulez vous nous contactez ?</label>
								   <select name="sujet" id="sujet" onchange="admSelectCheck(this);">
									   <option value="Demande de partenariat">Demande de partenariat</option>
									   <option value="Signaler un problème sur le site">Signaler un problème sur le site</option>
									   <option value="3">Devenir collaborateurs (Rédacteur, modo...)</option>
									   <option value="4">Faire partie de la team WOFTEC</option>
									   <option value="5">Autre demande</option>
								   </select>
							    </div>
								<div id="collaborateurs" style="display:none;">
									<div class="section"><label for="pseudo1" class="title">Pseudo <span>(obligatoire)</span></label><input type="text" name="pseudo1" class="form-input"/></div>
									<div class="section">
										<label for="age"class="title">Veuillez indiquer la tranche d’âge dans laquelle vous vous situez : *</label>
										<input type="radio" value="18-25 ans" name="age" id="18-25"/><label for="15-25">18-25 ans</label><input type="radio" value="25-40 ans" name="age" id="25-40"/><label for="25-40">25-40 ans</label><input type="radio" value="Encore plus vieux que ça ?!" name="age" id="++"/><label for="++">Encore plus vieux que ça ?!</label>
									</div>
									<div class="section">
										<label for="select" class="title">Dans quel pays habitez-vous ?</label>
										<select class="select" name="pays">
											<option value="Belgique">Belgique</option>
											<option value="France">France</option>
											<option value="Suisse">Suisse</option>
											<option value="Canada">Canada</option>
											<option value="Allemagne">Allemagne</option>
											<option value="Pays-Bas">Pays-Bas</option>
											<option value="Italie">Italie</option>
											<option value="Espagne">Espagne</option>
										</select>
									</div>
									<div class="section">
										<label for="select" class="title">Que voulez vous faire ? *</label>
										<select class="select" name="travail">
											<option value="Rédacteur">Rédacteur</option>
											<option value="Correcteur">Correcteur</option>
											<option value="Modérateur">Modérateur</option>
										</select>
									</div>
									<div class="section">
										<label for="section" class="title">Dans quel section ? *</label>
										<input type="radio" value="Smartphone" name="section" id="smartphone"/><label for="smartphone">Smartphone</label><input type="radio" value="Jeux Vidéo" name="section" id="jeux"/><label for="jeux">Jeux Vidéo</label><input type="radio" value="PC/MAC" name="section" id="pcmac"/><label for="pcmac">PC/MAC</label><input type="radio" value="Forum" name="section" id="forum"/><label for="forum">Forum</label>
									</div>
								</div>
								<div id="team" style="display:none;">
									<div class="section"><label for="pseudo2" class="title">Pseudo <span>(obligatoire)</span></label><input type="text" name="pseudo2" class="form-input"/></div>
									<div class="section">
										<label for="age2" class="title">Veuillez indiquer la tranche d’âge dans laquelle vous vous situez : *</label>
										<input type="radio" value="Moins de 15 ans" name="age2" id="-15"/><label for="-15">Moins de 15 ans</label><input type="radio" value="15-25 ans" name="age2" id="15-25"/><label for="15-25">15-25 ans</label><input type="radio" value="25-40 ans" name="age2" id="25-40"/><label for="25-40">25-40 ans</label><input type="radio" value="Encore plus vieux que ça ?!" name="age2" id="++"/><label for="++">Encore plus vieux que ça ?!</label>
									</div>
									<div class="section">
										<label for="select" class="title">Dans quel pays habitez-vous ?</label>
										<select class="select" name="pays">
											<option value="Belgique">Belgique</option>
											<option value="France">France</option>
											<option value="Suisse">Suisse</option>
											<option value="Canada">Canada</option>
											<option value="Allemagne">Allemagne</option>
											<option value="Pays-Bas">Pays-Bas</option>
											<option value="Italie">Italie</option>
											<option value="Espagne">Espagne</option>
										</select>
									</div>
									<div class="section">
										<label for="select" class="title">Quel console possédez vous? ? *</label>
										<select class="select" name="console">
											<option value="PS3">PS3</option>
											<option value="XBOX">XBOX 360</option>
											<option value="PC">PC</option>
										</select>
									</div>
								</div>
								<div id="autre_sujet" style="display:none;">
									<div class="section">
										<label for="autre_sujet" class="title">Sujet :</label>
										<input type="text" name="autre_sujet" id="autre_sujet"/>
									</div>
								</div>
								<div class="area">
									<label for="message" class="title">Votre message :</label>
									<textarea name="message" id="message" rows="10" cols="50"><?php echo stripslashes($_POST[message]); ?></textarea>   
							    </div>
								<?php
								  require_once('class/recaptchalib.php');
								  $publickey = "6LdWvucSAAAAAO89JroSsMjh60YaAkrUyZdnfAH1 ";
								  echo recaptcha_get_html($publickey);
								?>

							<input type="submit" name="send" class="submit" value="Envoyer" />
						</form>
						<script>
							function admSelectCheck(nameSelect)
							{
								if(nameSelect){
									admOptionValue = nameSelect.value;
									if(admOptionValue == 3){
										document.getElementById("collaborateurs").style.display = "block";
										document.getElementById("team").style.display = "none";
										document.getElementById("autre_sujet").style.display = "none";
									}
									else if(admOptionValue == 4){
										document.getElementById("team").style.display = "block";
										document.getElementById("collaborateurs").style.display = "none";
										document.getElementById("autre_sujet").style.display = "none";
									}
									else if(admOptionValue == 5){	
										document.getElementById("team").style.display = "none";
										document.getElementById("collaborateurs").style.display = "none";
										document.getElementById("autre_sujet").style.display = "block";
									}
									else{
										document.getElementById("collaborateurs").style.display = "none";
										document.getElementById("team").style.display = "none";
										document.getElementById("autre_sujet").style.display = "none";
									}
								}
								else{
									nameSelect.style.display = "none";
								}
							}
						</script>
					<?php } ?>
				<?php endwhile; ?>
			</div>
		</section>
	</div>
</div>
<?php get_footer(); ?>
