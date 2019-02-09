<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-ui/concise-ui.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/JS/menu.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/CSS/style.css">
	<title>Connexion</title>
</head>
<body>
<nav>
<span class="menu-mobile">Menu</span>
	<ul>	
			<li><a href="<?php echo base_url('stats/home');?>">Statistiques</a></li>
			<li><a href="<?php echo base_url('url');?>"> 🔑 Accéder à un stropole</a></li>
			<li><a href="<?php echo base_url('home');?>"> 🏠 Accueil</a></li>
			<li><a href="<?php echo base_url('connect/inscription');?>"> 🔓 Inscription</a></li>
			<li><a href="<?php echo base_url('connect/connection') ;?>" class="active"> 🔒 Connexion</a></li>
	</ul>
</nav>

	<article>
	<?php //message d'erreur si le login existe deja

			if(isset($message)){
				echo '<h3 class="error">'.$message.'</h3>';
			}
		?>
	<div grid class="corps">
		
		<div column="8 +2">
			<?php echo '<h5 class="error">'.validation_errors().'</h5>';?>
			<?php echo form_open('connect/connection'); ?>
				<fieldset>
					<legend>Formulaire de connexion</legend>
						<label>Login
							<input type="text" name="login" pattern="[0-9a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ \s-]+" title="N'utilisez pas de caractères spéciaux" placeholder="Login*">
						</label><br/>

						<label>Mot de passe
					<input type="password" name="password" pattern="[0-9a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ \s-]+" title="N'utilisez pas de caractères spéciaux" placeholder="Password*">
						</label><br/>

						<button class="-bordered -error">Se connecter</button>
				</fieldset>
			<?php echo form_close();?>
		</div>
	</div>
	<center>Mot de passe oublié. Appuyez <a href="<?php echo base_url('connect/password_forgotten');?>">ici</a> pour modifier votre mot de passe !</center>
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
	<center><h5 style="color: white;">Pensé et créé par Dorian Terbah - Année 2018 - Tous droits réservés</h5></center>
</footer>
</body>
</html>