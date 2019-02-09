<?php

class Home_Controller extends CI_Controller{

	private $messages;
	public function __construct(){

		parent::__construct();
		$this->load->library('form_validation');
		$this->messages = array(
								'Votre compte a été créé avec succés !',
								'Vous vous êtes deconnecté avec succés !',
								'Votre compte a été clos avec succés !'
								);	
	}

	########################################
	#fonction qui permets de rediriger sur 
	#la page d'accueil du site
	#@Param : idMessage -> message a afficher
	public function home($idMessage = null){

		$message = null;
		if(isset($idMessage)) $message = $this->messages[$idMessage];
		$this->load->view('Home_View', array('message' => $message));
	}

	######################
	#fonction qui permets
	#d'afficher l'accees a un stropole
	public function url(){

		//Regles pour l'url
		$this->form_validation->set_rules('url', 'Url d\'accés', 'trim|required', array(
			'required'		=>		'Vous n\'avez pas spécifié d\'url.'
			)
		);

		if(!$this->form_validation->run()) $this->load->view('Url_Access_View');
		else{

			$url = $this->input->post('url');
			redirect($url);
		}
	}
}

?>