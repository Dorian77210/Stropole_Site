<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-ui/concise-ui.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/CSS/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/CSS/user.css">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/JS/menu.js"></script>
	<title>Accueil</title>
</head>
<body>
<nav>
<span class="menu-mobile">Menu</span>
	<ul class="user">
			<li><a href="<?php echo base_url('user/info');?>"> 👤 Mon profil</a></li>
			<li><a href="<?php echo base_url('user/home');?>" class="active"> 📑 Mes stropoles</a></li>
			<li><a href="<?php echo base_url('user/logout') ;?>"> 🔓 Deconnection</a></li>
	</ul>
</nav>
<article>
	<?php echo '<h3>Bienvenue '.$this->session->firstname.' '.$this->session->lastname.'. Nous sommes le '.mdate('%d-%m-%Y').' et il est actuellement '.mdate('%h:%i %a').'</h3>';?>

	<div class="user_page">
		<div class="stropoles">
		<h3>Liste de vos stropoles actifs</h3>
		<?php
		
		//affichage des stropoles existants s'ils existent
		echo '<ul>';
		if(isset($stropoles)){

			foreach($stropoles as $stropole){

				$url = base_url("stropole/show_stropole/".$stropole->idStropole);
				echo '<center><li><a href="'.$url.'">'.$stropole->ask.'</a></li></center>';
			}
			echo '</ul>';
		}
		?>
		<a href="<?php echo base_url('stropole/create_base');?>">Créer un nouveau stropole</a>
		</div>
		<div class="stropoles_archived">
		<h3>Liste de vos stropoles archivés</h3>
		<?php
		//affichage des stropoles archives s'ils existent
		echo '<ul>';
		if(isset($stropoles_archived)){

			foreach($stropoles_archived as $stropole){

				$url = base_url("stropole/show_stropole/".$stropole->idStropole);
				echo '<center><li><a href="'.$url.'">'.$stropole->ask.'</a></li></center>';
			}

			echo '</ul>';
		}
		?>
		</div>
	</div>
</article><br/><br/><br/><br/><br/><br/>
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