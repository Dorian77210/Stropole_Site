<?php

class Vote_Controller extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Stropole_Model');
	}

	public function vote($hash){


		//on verifie tout d'abords que la personne n'a pas deja vote
		if($this->input->cookie($hash, TRUE) !== NULL){

			$this->load->view('Error_View', array('message' => 'Vous avez deja participe a ce sondage !'));
			return;
		}
		//recuperation du stropole
		$stropole = $this->Stropole_Model->get_stropole_by_hash($hash);
		if(!$stropole){

			$this->load->view('Error_View', array('message' => 'Le stropole que vous recherchez n\'est plus disponible ou n\'existe pas.'));
			return;
		}

		//recuperation des propositions
		$propositions = $this->Stropole_Model->get_propositions_by_stropole($stropole->idStropole);
		if(!$propositions){

			$this->load->view('Error_View', array('message' => 'Erreur lors de la récuperation des propositions du stropole. Veuillez réeassayer ultérieurement.'));
			return;
		}

		//Regles pour le vote
		$this->form_validation->set_rules('choice', 'Choix proposition', 'trim|required', array(
			'required'		=>		'Vous n\'avez spécifié aucun choix.'
			)
		);

		//Regles pour le nom
		$this->form_validation->set_rules('lastname', 'Nom', 'trim|required', array(
			'required'		=>		'Vous n\'avez pas spécifié votre nom de famille.'
			)
		);

		//Regles pour le prenom
		$this->form_validation->set_rules('firstname', 'Prénom', 'trim|required', array(
			'required'		=>		'Vous n\'avez pas spécifié votre prénom.'
			)
		);

		//Regles pour l'email
		$this->form_validation->set_rules('vote_email', 'Email', 'trim|valid_email', array(
			'valid_email'	=>		'Vous avez spécifié un email non valide.'
			)
		);

		if(!$this->form_validation->run()) $this->load->view('Vote_View', array(
			'stropole'		=>		$stropole,
			'propositions'	=>		$propositions,
			'hash'			=>		$hash
			)
		);
		else{

			//on recupere la proposition ainsi que les differentes informations concernant la personne qui vote
			$proposition = $this->input->post('choice');
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$email = null;
			if(isset($_POST['vote_email'])) $email = $this->input->post('vote_email');

			//on ajoute le choix dans la base de donnees
			if(!$this->Stropole_Model->add_choice(array(
					'idProposition'		=>		$proposition,
					'lastname'			=>		$lastname,
					'firstname'			=>		$firstname,
					'email'				=>		$email
					)
				)
			){
				$this->load->viw('Error_View', array('message' => 'Erreur lors de la création de votre choix.'));
				return;
			}
			
			$this->input->set_cookie($hash, $hash, time() + 2629743); //1 mois
			if($this->session->has_userdata('login'))
				redirect('user/home');
			else
				redirect('home');
		}
	}


}

?>