<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-ui/concise-ui.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/CSS/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/CSS/user.css">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/JS/menu.js"></script>
	<title>Informations</title>
</head>
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

	<h3>Votre profil</h3>
	<?php //affichage des informations

	echo '<ul class="informations" style="list-style: none;"><li><span>Login</span> : '.$this->session->login.'</li>
		 	  <li><span>Prénom</span> : '.$this->session->firstname.'</li>
		 	  <li><span>Nom</span> : '.$this->session->lastname.'</li>
		 	  <li><span>Email</span> : '.$this->session->email.'</li>
		 </ul>';


	?>
	<center><a href="<?php echo base_url('user/close_account');?>">Clore mon compte</a></center>
	<center><a href="<?php echo base_url('user/modify_account');?>">Modifier mon compte</a></center>
	<center><i>Ici, vous retrouverez toutes vos informations concernant votre compte ! </i></center>
</article>
<br/><br/><br/><br/>
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