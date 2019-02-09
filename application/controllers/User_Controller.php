<?php

class User_Controller extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('User_Model');
		$this->load->model('Stropole_Model');
		$this->load->helper('date');
		$this->load->library('form_validation');
	}
	#######################
	#fonction qui dirige 
	#l'utilisateur sur sa 
	#page d'accueil
	#@Param : aucun
	public function home(){

		$stropoles = $this->Stropole_Model->get_stropoles_by_login($this->session->login);
		$stropoles_archived = $this->Stropole_Model->get_stropoles_by_login($this->session->login, true);
		$this->load->view('User_Home', array('stropoles' => $stropoles, 'stropoles_archived' => $stropoles_archived));
	}

	#########################
	#fonction qui permet a 
	#l'utilisateur de se 
	#deconnecter
	#@Param :  aucun
	public function logout(){

		$this->session->sess_destroy();
		redirect('home/1');
	}

	#######################
	#fonotion qui charge les 
	#informations de 
	#l'utilisateur
	#@Param : aucun
	public function info(){

		$this->load->view('User_Info');
	}

	################################
	#fonction qui permets au user de 
	#clore son compte
	#@Param : aucun
	public function close_account(){

		if(!$this->User_Model->delete_user($this->session->login)){

			$this->load->view('Error_View', array('message' => 'Erreur lors de la suppression de votre compte. Veuillez reessayer plus tard.'));
			return;
		}
		//destruction de la session
		$this->session->sess_destroy();

		//redirection a l'accueil
		redirect('home/2');
	}

	#################################
	#fonction qui permet de modifier 
	#le compte du user
	#@Param : aucun
	public function modify_account(){

		//regles pour le nouveau nom
		$this->form_validation->set_rules('lastname', 'Nouveau nom', 'trim|max_length[50]', array(
			'max_length'		=>		'Vous avez dépassé la taille maximale pour votre nouveau nom qui s\'élève à 50 caractères.'
			)
		);

		//regles pour le nouveau prenom
		$this->form_validation->set_rules('firstname', 'Nouveau prénom', 'trim|max_length[50]', array(
			'max_length'		=>		'Vous avez depassé la taille maximale pour votre nouveau prénom qui s\'élève à 50 caractères'
			)
		);

		//regles pour le nouveau login
		$this->form_validation->set_rules('login', 'Nouveau login', 'trim|max_length[50]', array(
			'max_length'		=>		'Vous avez dépassé la taille maximale pour votre nouveau login qui s\'élève à 50 caractères.'
			)
		);

		//regles pour la nouvelle email
		$this->form_validation->set_rules('email', 'Nouvelle email', 'trim|valid_email', array(
			'valid_email'	=>		'Votre email ne respecte pas la forme conventionnelle.'
			)
		);

		//Regles pour le nouveau mot de passe
		$this->form_validation->set_rules('password', 'Nouveau mdp', 'trim');

		if(!$this->form_validation->run()) $this->load->view('User_Modification');
		else{

			//login
			if(!empty($_POST['login'])){

				if(!$this->User_Model->update_account('login', $this->input->post('login'), $this->session->login)){

					$this->load->view('Error_View', array('message' => 'Erreur lors de la mise à jour de votre login. Veuillez réeassayer ultérieurement.'));
					return;
				}

				//mise a jour de la session
				unset($this->session->login);
				$this->session->set_userdata('login', $this->input->post('login'));
			}

			//nom
			if(!empty($_POST['lastname'])){

				if(!$this->User_Model->update_account('lastname', $this->input->post('lastname'), $this->session->login)){

					$this->load->view('Error_View', array('message' => 'Erreur lors de la mise à jour de votre nom. Veuillez réeassayer ultérieurement.'));
					return;
				}

				//mise a jour de la session
				unset($this->session->lastname);
				$this->session->set_userdata('lastname', $this->input->post('lastname'));
			}

			//prenom
			if(!empty($_POST['firstname'])){

				if(!$this->User_Model->update_account('firstname', $this->input->post('firstname'), $this->session->login)){

					$this->load->view('Error_View', array('message' => 'Erreur lors de la mise à jour de votre prénom. Veuillez réessayer ultérieurement.'));
					return;
				}

				//mise a jour de la session
				unset($this->session->firstname);
				$this->session->set_userdata('firstname', $this->input->post('firstname'));
			}

			//email
			if(!empty($_POST['email'])){

				if(!$this->User_Model->update_account('email', $this->input->post('email'), $this->session->login)){

					$this->load->view('Error_View', array('message' => 'Erreur lors de la mise à jour de votre email. Veuillez réeassayer ultérieurement.'));
					return;
				}

				//mise a jour de la session
				unset($this->session->email);
				$this->session->set_userdata('email', $this->input->post('email'));

			}

			//password
			if(!empty($_POST['old_password']) and !empty($_POST['password'])){

				$old_password = $this->input->post('old_password');
				$password = $this->input->post('password');
				if(!$this->User_Model->is_password_correct($this->session->login, $old_password)){

					$this->load->view('User_Modification', array('message' => 'Votre mot de passe est invalide.'));
					return;
				}

				//modification du mot de passe
				if(!$this->User_Model->update_account('password', password_hash($password, PASSWORD_DEFAULT), $this->session->login)){

					$this->load->view('Error_View', array('message' => 'Erreur lors de la mise à jour de votre mot de passe. Veuillez réeassayer ultérieurement.'));
					return;					
				}
			}
			$this->load->view('User_Modification', array('message' => 'Vos informations ont été correctement modifiées.'));
		}
	}

	public function send_mail_participants($idStropole){

		//regles pour le message
		$this->form_validation->set_rules('message', 'Message', 'trim|required', array(
			'required'		=>		'Vous n\'avez pas spécifié de message pour votre mail.'
			)
		);

		//regles pour les participants
		$this->form_validation->set_rules('participants[]', 'Participants', 'trim|required', array(
			'required'		=>		'Vous devez spécifier au moins un participant.'
			)
		);

		//regles pour le sujet
		$this->form_validation->set_rules('sujet', 'Sujet', 'trim|required', array(
			'required'		=>		'Vous n\'avez pas spécifié de sujet pour votre mail.'
			)
		);

		//on recupere seulement les personnes qui ont mis leur email
		$participants = $this->Stropole_Model->get_choices_by_stropole($idStropole);
		if(!$participants){

			$this->load->view('Error_View', array('message' => 'Aucune personne n\'a participé à votre stropole.'));
			return;
		}

		if(!$this->form_validation->run()) $this->load->view('Send_Mail_View', array('participants' => $participants, 'stropole' => $idStropole));
		else{

			ini_set( 'display_errors', 1 );
 			error_reporting( E_ALL );

 			//configuration de l'email
 			$from = $this->session->email;
 			$subject = $this->input->post('sujet');
 			$message = $this->input->post('message');
 			$headers = "From:" . $from;

 			foreach($this->input->post('participants[]') as $to){

 				if(!mail($to, $subject, $message, $headers)){

 				$this->load->view('Error_View', array('message' => 'Erreur lors de l\'envoi de votre email. Veuillez réeassayer ultérieurement'));
 				return;
 				}
			}

			$this->load->view('Send_Mail_View', array('message' => 'Votre mail a été envoyé avec succés !', 'stropole' => $idStropole, 'participants' => $participants));
		}	
	}
}

?>