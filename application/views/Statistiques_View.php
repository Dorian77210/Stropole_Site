<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/CSS/style.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-ui/concise-ui.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/JS/menu.js"></script>
	<title>Statistiques</title>
</head>

<body>
<nav>
<span class="menu-mobile">Menu</span>
	<ul>	
			<li><a href="<?php echo base_url('stats/home');?>" class="active"> ✏ Statistiques</a></li>
			<li><a href="<?php echo base_url('url');?>"> 🔑 Accéder à un stropole</a></li>
			<li><a href="<?php echo base_url('home');?>"> 🏠 Accueil</a></li>
			<li><a href="<?php echo base_url('connect/inscription');?>"> 🔓 Inscription</a></li>
			<li><a href="<?php echo base_url('connect/connection') ;?>"> 🔒 Connexion</a></li>
	</ul>
</nav>


<article>
	<center><h5>Quelques statistiques sur notre site</h5></center>
	<center><h3>Stropole, c'est : </h3></center>
	<ul style="list-style: none;">
		<center><li><?php echo $nbr_user;?> personnes inscrites sur le site,</li></center>
		<center><li><?php echo $nbr_stropole;?> stropoles créés,</li></center>
		<center><li><?php echo $nbr_participants;?> participants,</li></center>
		<center><li><?php echo $nbr_propositions;?> propositions proposées pour des stropoles</li></center>
	</ul>
</article>
	<?php echo create_br(4);?>
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