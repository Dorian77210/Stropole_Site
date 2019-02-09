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
	<title>Ajouter des propositions</title>

	<script>
	$(document).ready(function(){
		var nbr = 2;
		$('.add_proposition_button').click(function(e){

			e.preventDefault();
			$('.all_propositions').append('<div><label>Proposition ' + nbr + '</label><input type="text" name="propositions[]"><a href="#" class="remove_field">Supprimer</a></div>');
			nbr++;
		});

	});
	$(document).ready(function(){

		$('.all_propositions').on("click", ".remove_field", function(e){

			e.preventDefault();
			$(this).parent('div').remove();
		});
	});

	</script>
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

	<?php

	//Affichage du résumé du sondage ainsi que des propositions deja existantes
		echo '<center><h3>Résume de votre sondage</h3></center>
				<ul>
					<center><li><span>Question de votre stropole</span> : '.$this->session->stropole['ask'].'</li></center>
					<center><li><span>Date limite de votre stropole</span> : '.$this->session->stropole['dateLimit'].'</li></center>
					<center><li><span>Résume de votre stropole</span> : '.$this->session->stropole['summary'].'</li></center>
					<center><li><span>Stropole numero '.$this->session->stropole['idStropole'].'</li></center>
				</ul>
		';

	?>		
<center><button class="add_proposition_button">Ajouter une proposition</button></center>
</div>
	<div grid class="corps">
		<div column="8 +2">

			<?php echo '<h5 class="error">'.validation_errors().'</h5>';?>
			<?php echo form_open('stropole/add_propositions')?>
			<fieldset> 
				<legend>Ajouter une proposition</legend>
					<label>Liste des propositions</label>
					<div class="all_propositions">
					<label>Proposition 1</label>
						<div><input type="text" name="propositions[]"></div>	
					</div>
					<button class="-bordered -error">Finaliser votre stropole</button>
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
	<center><h5 style="color: white;">Pensé et créé par Dorian Terbah - Année 2018 - Tous droits réservés</h5></center>
</footer>
</body>
</html>