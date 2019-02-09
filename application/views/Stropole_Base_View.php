<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-ui/concise-ui.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/CSS/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/CSS/stropoles.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/JS/menu.js"></script>
	<title>Création de votre stropole</title>
</head>
<body>
<nav>
<span class="menu-mobile">Menu</span>
	<ul>
			<li><a href="<?php echo base_url('user/info');?>">Mon profil</a></li>
			<li><a href="<?php echo base_url('user/home');?>" class="active">Mes stropoles</a></li>
			<li><a href="<?php echo base_url('user/logout') ;?>">Deconnection</a></li>
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
			<?php echo form_open('stropole/create_base')?>
			<fieldset> 
				<legend>Création de votre stropole</legend>
					<label>Date limite de votre stropole
						<input type="date" name="dateLimit" min="<?php echo mdate('%Y-%m-%d');?>">
					</label>

					<label>Question
						<input type="text" name="ask">
					</label>

					<label>Résumé du stropole
						<textarea cols="50" rows="4" name="summary"></textarea>
					</label>
					<button class="-bordered -error">Créer votre stropole</button>
				</fieldset>
				<?php echo form_close();?>
		</div>
	</div>
	</article><br/><br/>
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