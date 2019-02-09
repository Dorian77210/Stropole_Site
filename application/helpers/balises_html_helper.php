<?php

######################################
#fonction qui permets de creer un lien
#@Param : href -> lien
#		: attributes -> attributs complementaires
function create_link($href, $content, $attributes = null){

	if(isset($attributes)) return '<a href="'.$href.'" class="'.$attributes['class'].'" id="'.$attributes['id'].'">'.$content.'</a>';
	return '<a href="'.$href.'">'.$content.'</a>';
}

########################################
#fonction qui permets de creer une balise
#article
#@param : close -> balise fermée ou pas
function create_article($close = false){

	if($close) return '</article>';
	return '<article>';
}

######################################
#fonction qui creer une balise aside
#@Param : $close -> balise fermée ou pas 
function create_aside($close = false){

	if($close) return '</aside>';
	return '<aside>';
}

######################################
#fonction qui retourne un texte gras
#@Param : content -> contenu du texte
function create_bold($content){

	return '<b>'.$content.'</b>';
}

#####################################
#fonction qui cree un body
#@Param : close -> balie fermée ou pas
function create_body($close = false){

	if($close) return '</body>';
	return '<body>';
}

#####################################
#fonction qui creer des balises br
#@param : nbr -> nombre de balises
function create_br($nbr){

	$str = "";
	for($i = 0; $i < $nbr; $i++){

		$str .= '<br/>';
	}

	return $str;
}

######################################
#fonction qui creer le titre d'un tableau
#@param : content -> titre du tableau
function create_caption($content){

	return '<caption>'.$content.'</content>';
}

######################################
#fonction qui creer une div
#@Param : close -> balise fermee ou pas
function create_div($close = false){

	if($close) return '</div>';
	return '<div>';
}

#######################################
#fonction qui creer un footer
#@Param : close -> balise fermee ou pas
function create_footer($close = false){

	if($close) return '</footer>';
	return '<footer>';
}

#######################################
#fonction qui cree un titre
#@Param : nbr -> taille du titre
function create_title($nbr, $content){

	if($nbr <= 0 or $nbr > 6) return null;
	return '<h'.$nbr.'>'.$content.'</h'.$nbr.'>';
}

####################################
#fonction qui creer un head avec une
#balise titre
#@Param : title -> titre
#		: $links -> liens 
function create_head($title, $links){

	$head = '<head><title>'.$title.'</title><meta charset="utf-8">';
	foreach($links as $link){

		$head .= '<link rel="'.$link['rel'].'" href="'.$link['href'].'">';
	}

	$head .= '</head>';
	return $head;
}

########################################
#fonction qui creer un header
#@Param : close -> balise fermee ou pas
function create_header($close = false){

	if($close) return '</header>';
	return '<header>';
}

###################################################
#fonction qui creer une balise html
#@Param : lang -> langue
#		: $close -> balise fermee ou pas
function create_html($lang = "fr", $close = false){

	if($close) return '</html>';
	return '<html lang="'.$lang.'">';
}

############################################
#fonction qui creer une balise img
#@Param : attributes -> attributs de la balise
function create_img($attributes){

	return '<img src="'.$attributes['src'].'" alt="'.$attributes['alt'].'">';
}

##########################################
#fonction qui creer une balise li
#@Param : content -> contenu
#		: attributes -> attributs de la balise
function create_li($content, $attributes){

	return '<li class="'.$attributes['class'].'" id="'.$attributes['id'].'">'.$content.'"</li>';
}
?>