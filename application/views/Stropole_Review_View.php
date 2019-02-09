<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-ui/concise-ui.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/CSS/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/CSS/user.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/CSS/vote.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/JS/menu.js"></script>
	<title>Revue de votre stropole</title>
</head>
<script>

$(document).ready(function(){

	$('.copy_url').on('click', function(){

		var $textarea = $( '<textarea>' );
		$( 'body' ).append( $textarea );
		$textarea.val( $( '.url' ).text() ).select();
		document.execCommand( 'copy' );
		$textarea.remove();
		$( this ).replaceWith( '<span class="clipboard">Copié</span>' );
	});
});

</script>
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

	<center><h3>Résumé de votre stropole</h3></center>
	<?php
		$count_total = 0; //nombre total de vote
		$url = "";
		echo '<ul style="list-style: none;">
				<center><li>Question de votre stropole : '.$stropole->ask.'</li></center>
				<center><li>Résumé de votre stropole : '.$stropole->summary.'</li></center>
				<center><li>Date limite de votre stropole : '.$stropole->dateLimit.'</li></center>
			</ul>';

			echo '<table><caption>Résultats de votre stropole</caption><tr><th><br/><br/></th>';
			
			//affichage des participants
			foreach($choices as $choice){

				foreach($choice as $row){
					$count_total++;
					echo '<td>Prénom : '.$row->firstname.'<br/>Nom : '.$row->lastname.'<br/>';
					if(isset($row->email)) echo 'Email : '.$row->email;
					else echo 'Email : non définie';
				}
			}			

			echo '</tr>';


			//affichage des propositions
			foreach($propositions as $proposition){

				echo '<tr><td>'.$proposition->content.'</td>';
				foreach($choices as $choice){

					$class = "";
					//participant
					foreach($choice as $row){

						if($row->idProposition == $proposition->idProposition) $class = "good";
						else $class = "not_good";
						echo '<td class="'.$class.'"><br/></td>';
					}
				}
				echo '</tr>';
			}
			echo '</table';

	?>
	<br/><br/>

	<h3>Statistiques de votre stropole</h3>
	<?php
		$count_proposition = 1;
		//affichage des statistiques
		foreach($counts as $count){

			$percent = 0;
			if($count_total > 0) $percent = ''.(($count['count'] / $count_total) * 100).'%';
			echo '<center><span>Proposition '.$count_proposition.' : '.$count['proposition'].' ➡️ '.$percent.' des votes'.'</span>
					<div class="progress-bar -small" style="width: 35%; margin-top: 1%;">
  					<span class="progress" style="width: '.$percent.';"></span>
					</div></center>
				';
			$count_proposition++;
		}	
	?>

	<br/><br/><i><a href="<?php echo base_url('user/send_mail_participants/'.$stropole->idStropole);?>"><center>Envoyer un mail aux participants</center></i></a>

	<?php

	//on gere le cas où on peut archiver le sondage
	if(intval($stropole->archiving) === 0){
		$url = base_url('vote/vote/'.$stropole->urlHash);
		echo '
		<center><p>Url d\'accés à votre stropole : </p></center><center><label class="url">'.$url.'</label></center>
		<center><button class="copy_url">Copier dans le presse-papier</button></center> 
		';
		$url = base_url('stropole/close_stropole/'.$stropole->idStropole);
		echo '
		<center><i>Vous pouvez clore votre stropole en cliquant <a href="'.$url.'">ici</a></i></center>';

	}

	?>
</article>
<br><br>
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