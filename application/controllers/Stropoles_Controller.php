<?php

class Stropoles_Controller extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->load->model('Stropole_Model');
	}

	##############################
	#fonction qui permets au user
	#de creer la base de son
	#stropoles
	#@Param : aucun
	public function create_base(){

		//regles pour la question
		$this->form_validation->set_rules('ask', 'Question', 'trim|required|max_length[1000]', array(
			'required'		=>		'Vous n\'avez pas spécifié de question pour votre stropole.',
			'max_length'	=>		'Vous avez dépassé la taille maximum pour votre question qui s\'élève à 1000 caractères.'
			)
		);

		//regles pour la date limite
		$this->form_validation->set_rules('dateLimit', 'Date limite', 'trim|required', array(
			'required'		=>		'Vous n\'avez pas spécifié de date limite pour votre stropole.'
			)
		);

		//regles pour le resume
		$this->form_validation->set_rules('summary', 'Résumé du stropole', 'trim|required', array(
			'required'		=>		'Vous n\'avez pas spécifié de résumé pour votre stropole.'
			)
		);

		if(!$this->form_validation->run()) $this->load->view('Stropole_Base_View');
		else{

			//on recupere les informations du stropoles
			$date = $this->input->post('dateLimit');
			$ask = $this->input->post('ask');
			$summary = $this->input->post('summary');
			//url qui va etre hasher, pour etre unsique, elle va etre constituer du login, de la date d'aujourd'hui ainsi que du temps
			$url = hash('md5', $this->session->login.mdate('%Y-%m-%d').time());
			$id = $this->Stropole_Model->create_stropole(array(
						'login'		=>		$this->session->login,
						'summary'	=>		$summary,
						'dateLimit'	=>		$date,
						'ask'		=>		$ask,
						'urlHash'	=>		$url
						)
				);
			if(!$id){
				$this->load->view('Error_View', array('message' => 'Erreur lors de la création de votre stropole. Veuillez réeassayer ultérieurement.'));
				return;
			}

			//stockage du stropole dans la session
			$this->session->set_userdata('stropole', array(
				'login'			=>		$this->session->login,
				'summary'		=>		$summary,
				'dateLimit'		=>		$date,
				'ask'			=>		$ask,
				'urlHash'		=>		$url,
				'idStropole'	=>		$id
				)
			);
			//redirection pur creer les differentes propositions
			redirect('Stropoles_Controller/add_propositions');
		}
	}

	##################################
	#fonction pour rajouter des
	#propositions au stropole deja 
	#cree auparavant
	#@Param : aucun
	public function add_propositions(){

		//regles pour le contenu de la proposition
		$this->form_validation->set_rules('propositions[]', 'Proposition', 'trim|required', array(
			'required'		=>		'Veuillez donner au moins une proposition pour votre stropole.'
			)
		);

		if(!$this->form_validation->run()) $this->load->view('Stropole_Proposition_View');
		else{

			//insertion des propositions
			foreach($this->input->post('propositions[]') as $key => $proposition){

				if(!$this->Stropole_Model->add_proposition(array(
						'idStropole'		=>		$this->session->stropole['idStropole'],
						'content'			=>		$proposition
						)
					)
				){

					$this->load->view('Error_View', array('message' => 'Erreur lors de l\'insertion de vos propositions. Veuillez réeassayer ultérieurement.'));
					return;
				}
			}
			$id = $this->session->stropole['idStropole'];
			//suppression du stropole de la session
			unset($this->session->stropole);
			redirect('Stropoles_Controller/show_stropole/'.$id);
		}
	}

	###########################################
	#fonction qui permets a l'utilisateur de voir
	#une review de son stropole
	#@Param : idStropole -> stropole
	public function show_stropole($idStropole){

		$stropole = $this->Stropole_Model->get_stropole_by_id($idStropole);
		if(!$stropole){

			$this->load->view('Error_View', array('message' => 'Erreur lors de la recuperation de votre stropole. Veuillez réeassayer ultérieurement.'));
			return;
		}

		//recuperation des propositions
		$propositions = $this->Stropole_Model->get_propositions_by_stropole($idStropole);
		if(!$propositions){

			$this->load->view('Error_View', array('message' => 'Erreur lors de la recuperation des propositions. Veuillez réeassayer ultérieurement.'));
			return;
		}

		$choices = array();
		$counts = array();
		$count_total = 0;
		//remplissage des comptes de propositions
		foreach($propositions as $proposition){

			$counts[$proposition->idProposition] = array(
														'count'			=>		$this->Stropole_Model->get_count_by_proposition($proposition->idProposition),
														'proposition'	=>		$proposition->content
														);
			$count_total += $counts[$proposition->idProposition]['count'];
		}
		//on recupere les choix selon les propositions
		foreach($propositions as $proposition){

			$choice = $this->Stropole_Model->get_choices_by_proposition($proposition->idProposition);
			if($choice != false){
				$choices[$proposition->idProposition] = $choice;
			}
		}
		//chargement de la vue
		$this->load->view('Stropole_Review_View', array('stropole' => $stropole, 'choices' => $choices, 'propositions' => $propositions, 'counts' => $counts, 'total' => $count_total));
	}

	public function close_stropole($idStropole){

		if(!$this->Stropole_Model->close_stropole($idStropole)){

			$this->load->view('Error_View', array('message' => 'Erreur lors de l\'archivage de votre stropole. Veuillez réeassayer ultérieurement.'));
			return;
		}

		//redirection sur le menu d'accueil de l'utlisateur
		redirect('user/home');
	}

}

?>