<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-ui/concise-ui.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/CSS/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/CSS/vote.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<title>Vote</title>
</head>
<script>

$(document).ready(function(){

	$('input:radio').on('click', function(){

		$('input:radio').each(function(){

			var li = $(this).parent('li');
			if($(this).prop('checked')) $(li).css('background', '#99f932');
			else $(li).css('background', 'white');
		})
	})
})

</script>
<body>
<article>
	<?php
	//affichage d'un resume du stropole
	echo '<ul>
			<center><li><span>Créateur du stropole</span> : '.$stropole->login.'</li></center>
			<center><li><span>Résumé du stropole</span> : '.$stropole->summary.'</li></center>
			<center><li><span>Stropole numéro '.$stropole->idStropole.'</span></li></center>
			<center><li><span>Question du stropole</span> : '.$stropole->ask.'</li></center> 
		 </ul>'
	?>

	<?php //message d'erreur si le login existe deja
	
		if(isset($message)){

			echo '<h3 class="error">'.$message.'</h3>';
		}
	?>		
	<div grid class="corps">
		<div column="8 +2">
			<?php echo '<h5 class="error">'.validation_errors().'</h5>';?>
			<?php echo form_open('vote/vote/'.$hash)?>
			<fieldset> 
				<legend>Propositions disponibles</legend>
					<?php

					//Affichage des propositions
					echo '<ul class="propositions">';
					foreach($propositions as $proposition){
						$input = '<li>'.$proposition->content.'<input type="radio" value="'.$proposition->idProposition.'" name="choice" class="'.$proposition->idProposition.'"></li>';
						echo $input;
					}

					echo '</ul>';
					?>

					<label>Nom
						<input type="text" name="lastname" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ \s-]+" placeholder="Nom*"  <?php if(isset($this->session->lastname)) echo 'value="'.$this->session->lastname.'" readonly';?>>
					</label>

					<label>Prénom
						<input type="text" name="firstname" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ \s-]+" placeholder="Prénom*" <?php if(isset($this->session->firstname)) echo 'value="'.$this->session->firstname.'" readonly';?>>
					</label><br/>

					<i>L'email permettra au créateur du stropole de pouvoir vous envoyer les résultats de son stropole. Vous n'êtes donc pas obligé de la mensionner.</i>
					<label>Email
						<input type="email" name="vote_email" <?php if(isset($this->session->email)) echo 'value="'.$this->session->email.'" readonly';?>>
					</label>
					<button class="-bordered -error">Voter</button>
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