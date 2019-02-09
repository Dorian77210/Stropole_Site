<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-ui/concise-ui.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/CSS/style.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/JS/menu.js"></script>
	<title>Modification de votre compte</title>
</head>
<script>

$(document).ready(function(){

	$('.password').on('keyup', function(e){

		//on recupere les attributs 
		var span = $('.confirmation');
		var progress = $('.progress');
		var length = $(this).val().length;
		if(length == 0){
			span.text('');
			progress.css({
				'width'		: 		'0%',
				'background': 		'white'
			});
		}
		else if(length <= 4){

			span.text('Mot de passe faible').css('color', '#fb1809');
			progress.css({
				'width' 	: 		'33%',
				'background': 		'#fb1809'
				}

			);
		} 
		else if(length > 4 && length <= 8){

			span.text('Mot de passe moyen').css('color', '#faed14');
			progress.css({
				'width'		: 		'66%',
				'background': 		'#faed14'
			});
		} 
		else if(length > 8){

			span.text('Mot de passe fort').css('color', '#82fa14');
			progress.css({
				'width'		: 		'100%',
				'background': 		'#82fa14'
			});
		}
	});		
});

</script>
<body>
<nav>
	<span class="menu-mobile">Menu</span>
	<ul class="user">
		<li><a href="<?php echo base_url('user/info');?>" class="active"> 👤 Mon profil</a></li>
		<li><a href="<?php echo base_url('user/home');?>"> 📑 Mes stropoles</a></li>
		<li><a href="<?php echo base_url('user/logout') ;?>"> 🔓 Deconnection</a></li>
	</ul>
</nav>
<article>
	<?php if(isset($message)) echo'<center><h3>'.$message.'</h3></center>';?>
	<center><i>Ici, vous pouvez modifier toutes les informations de votre compte comme bon vous semble ! </i></center>
	<div class="corps">
			<div column="8 +2">
			<?php echo '<h5 class="error">'.validation_errors().'</h5>';?>
			<?php echo form_open('User_Controller/modify_account')?>
			<fieldset> 
				<legend>Modification de votre compte</legend>
					<label>Nom actuel
						<input type="text" name="actual_lastname" readonly value="<?php echo $this->session->lastname;?>">
					</label>

					<label>Nouveau nom
						<input type="text" name="lastname" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ \s-]+" title="N'utilisez pas de caractères spéciaux" placeholder="Nom">
					</label><br/>

					<label>Prénom actuel
						<input type="text" name="actual_firstname" readonly value="<?php echo $this->session->firstname;?>">
					</label>

					<label>Nouveau prénom
						<input type="text" name="firstname" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ \s-]+" title="N'utilisez pas de caractères spéciaux">
					</label><br/>

					<label>Login actuel
						<input type="text" name="actual_login" readonly value="<?php echo $this->session->login;?>">
					</label>

					<label>Nouveau login
						<input type="text" name="login" pattern="[0-9a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ' \s-]+" title="N'utilisez pas de caractères spéciaux">
					</label><br/>

					<label>Email actuelle
						<input type="text" name="actual_email" readonly value="<?php echo $this->session->email;?>">
					</label>

					<label>Nouvelle email
						<input type="email" name="email">
					</label><br/>

					<label>Mot de passe actuel
						<input type="password" name="old_password" placeholder="motdepasse">
					</label>

					<label>Nouveau mot de passe
						<input type="password" name="password" placeholder="nouveaumotdepasse" class="password">
					</label>

					<span class="confirmation"></span>
					<div class="progress-bar -small" style="width: 35%; margin-top: 1%;">
  					<span class="progress" style="width: 0%;"></span>
					</div>
				<button class="-bordered -error">Modifier</button>
			</fieldset>
			<?php echo form_close();?>
		</div>
	</div>
</article>
<footer>

	<div id="under_footer">

		<div id="contact">
			<h6>Me retrouver sur : </h6>
			<ul>
				<li><a href="https://www.instagram.com/">Sur instagram</a></li>
				<li><a href="https://www.facebook.com/" >Sur facebook</a></li>
				<li><a href="http://dwarves.iut-fbleau.fr/~terbah/">Mon site personnel</a></li>
			</ul>
		</div>

		<div id="me_contacter">

			<h6>Un avis ? Un conseil ? Une recommendation ? <br/>Un problème ? Contactez-moi ! </h6>
			<ul>
				<li><a href="mailto:dorian.terb@gmail.com">Par mail</a></li>
				<li><a href="http://dwarves.iut-fbleau.fr/~terbah/contact.html">Depuis mon site</a></li>
			</ul>
		</div>
	</div>

</footer>
</body>
</html>