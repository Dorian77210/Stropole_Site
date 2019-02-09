<?php

class Statistiques_Model extends CI_Model{

	public function __construct(){

		parent::__construct();
	}

	######################################
	#fonction qui permets de savoir le 
	#le nombre de stropoles crees 
	public function get_count_stropoles(){

		$this->db->select('COUNT(*) as total')
				 ->from('ST_Stropole');

		$query = $this->db->get();
		return $query->row();
	}

	#########################################
	#fonction qui permets de savoir le nombre
	#de participants au total
	public function get_count_participants(){

		$this->db->select('COUNT(*) as total')
				 ->from('ST_Choice');

		$query = $this->db->get();
		return $query->row();
	}

	#########################################
	#fonction qui permets de savoir le nombre
	#de propositions au total
	public function get_count_propositions(){

		$this->db->select('COUNT(*) as total')
				 ->from('ST_Proposition');

		$query = $this->db->get();
		return $query->row();
	}

	#################################
	#fonction qui permets de savoir le 
	#nombre d'utilisateurs inscrits
	public function get_count_user(){

		$this->db->select('COUNT(*) as total')
				 ->from('ST_User');

		$query = $this->db->get();
		return $query->row();
	}
}

?>