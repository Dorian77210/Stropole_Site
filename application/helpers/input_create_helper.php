<?php

################################
#fonction qui permets de creer un
#label
#@Param : content -> contenu du 
#				     label
#       : center  -> pour center 
#					 le label
function create_label($content, $center = false){

	if($center) return '<center><label>'.$content.'</label></center>';
	return '<label>'.$content.'</label>';
	
}

##############################
#fonction pour creer un input
#@Param : input -> 
#			array(
#				'type' => $type
#				'name' => $name
#				'readonly' => $readonly
#				'placeholder' => $placeholder
#				...
#				 )
function create_input($input){

	return '<input type="'.$input['type'].'" name="'.$input['name'].'" placeholder="'.$input['placeholder'].'" value="'.$input['value'].'">';
}

####################################
#fonction qui permet de creer un 
#textarea
#@Param : textarea -> array()
function create_textarea($textarea){

	return '<textarea name="'.$textarea['name'].'" rows="'.$textarea['rows'].'" cols="'.$textarea['cols']."></textarea>";
}

####################################
#fonction qui permets de creer une
#checkbox
#@Param : $checkbox -> array()
function create_checkbox($checkbox, $checked = false){

	if($checked) return '<input type="checkbox" name="'.$checkbox['name'].'" value="'.$checkbox['value'].'" checked>'.$checkbox['content'];
	return '<input type="checkbox" name="'.$checkbox['name'].'" value="'.$checkbox['value'].'">'.$checkbox['content'];
}

############################################
#fonction qui permets de creer un bouton radio
#@Param : radio -> array();
function create_radio($radio, $checked = false){

	if($checked) return '<input type="radio" name="'.$radio['name'].'" value="'.$radio['value'].'" checked>'.$radio['content'];
	return '<input type="radio" name="'.$radio['name'].'" value="'.$radio['value'].'">'.$radio['content'];
}

#############################################
#fonction qui permets de creer un bouton d'envoi
#de formulaire
#@Param : value -> valeur du bouton
function create_submit($value){

	return '<input type="submit" value="'.$value.'">';
}

###########################################
#fonction qui permets de creer un bouton
#d'annulation de formulaire
#@Param : value -> valeur du bouton
function create_reset($value){

	return '<input type="reset" value="'.$value.'">';
}

##########################################
#fonction qui permet de creer un bouton
#@Param : value -> valeur du bouton
function create_button($value){

	return '<button>'.$value.'</button>';
}

#####################################################
#foncton qui permets de creer une liste deroulante
#@Param : name_selection -> nom du select
#		: options -> options de la liste deroulante
function create_selection($name_selection, $options){

	$result = '<select name="'.$name_selection.'">';
	foreach($options as $option){

		$result .= '<option value="'.$option['value'].'">'.$option['content'].'</option>';
	}

	$result .= '</select>';
	return $result;
}

#######################################
#fonction qui cree une legende
#@Param : content -> contenu du texte
function create_legend($content){

	return '<legend>'.$content.'</legende>';
}

function create_fieldset($close = false){

	if($close) return '</fieldset>';
	return '<fieldset>';
}

######################################
#fonction qui ouvre un formulaire
#@Param : attributes -> attributs
function create_form($attributes){

	return '<form method="'.$attributes['method'].'" action="'.$attributes['action'].'">';
}
?>