<?php

class Statistiques_Controller extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('Statistiques_Model');
	}

	public function home(){

		//recuperation du nombre de stropoles
		$nbr_stropole = $this->Statistiques_Model->get_count_stropoles();
		//recuperation du nombre de participants
		$nbr_participants = $this->Statistiques_Model->get_count_participants();
		//recuperation du nombre de propositions
		$nbr_propositions = $this->Statistiques_Model->get_count_propositions();
		//recuperation du nombre d'inscrits
		$nbr_user = $this->Statistiques_Model->get_count_user();
		$this->load->view('Statistiques_View', array(
			'nbr_stropole'		=>		$nbr_stropole->total,
			'nbr_participants'	=>		$nbr_participants->total,
			'nbr_propositions'	=>		$nbr_propositions->total,
			'nbr_user'			=>		$nbr_user->total
			)
		);
	}
}

?>