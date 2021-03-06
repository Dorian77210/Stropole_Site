<?php

class Stropole_Model extends CI_Model{

	public function __construct(){

		parent::__construct();
	}

	###############################################################
	#fonction qui permets de recuperer les stropoles d'un 
	#utilisateur 
	#@Param : login -> login de l'utilisateur
	#		  archiving -> si le sondage est archive ou pas 
	public function get_stropoles_by_login($login, $archived = false){

		$this->db->select('*')
				 ->from('ST_Stropole')
				 ->where('login', $login);
		if($archived) $this->db->where('archiving = ', 1);
		else $this->db->where('archiving = ', 0);
		$query = $this->db->get();

		if($this->db->affected_rows() == 0) return NULL;
		return $query->result();
	}

	############################################
	#fonction qui permets de clore un stropole
	#@Param : idStropoloe -> identifiant stropole
	public function close_stropole($idStropole){

		$this->db->where('idStropole', $idStropole);
		$this->db->update('ST_Stropole', array('archiving' => 1));

		if($this->db->affected_rows() > 0) return true;
		return false;
	}

	################################################
	#fonction qui permets de recuperer un stropole
	#en fonction de son id
	#@Param : idStropole -> id du stropole
	public function get_stropole_by_id($idStropole){

		$this->db->select('*')
				 ->from('ST_Stropole')
				 ->where('idStropole', $idStropole)
				 ->limit(1);
		$query = $this->db->get();

		if($this->db->affected_rows() == 0) return false;

		return $query->row();
	}
	###########################################
	#fonction qui permets de creer un stropole
	#@Param : stropole -> tableau contenant 
	#toutes les informations du stropole a inserer
	public function create_stropole($stropole){

		if(!$this->db->insert('ST_Stropole', $stropole)) return false;

		return $this->db->insert_id();
	}

	#############################################
	#fonction qui permet d'ajouter des propositions
	#pour un stropole
	#@Param : proposition -> proposition a inserer
	public function add_proposition($proposition){

		return $this->db->insert('ST_Proposition', $proposition);
	}

	############################################
	#fonction qui permets de recuperer un
	#stropole selon son url
	#@Param : hash -> url du stropole
	public function get_stropole_by_hash($hash){

		$this->db->select("*")
				 ->from('ST_Stropole')
				 ->where('urlHash', $hash)
				 ->where('archiving = ', 0)
				 ->limit(1);

		$query = $this->db->get();
		if($this->db->affected_rows() == 0) return false;

		return $query->row();
	}

	###############################################
	#fonction qui permets de recuperer les propositions
	#d'un stropole
	#@Param : idStrople -> identifiant stropole
	public function get_propositions_by_stropole($idStropole){

		$this->db->select('*')
				 ->from('ST_Proposition')
				 ->join('ST_Stropole', 'ST_Proposition.idStropole = ST_Stropole.idStropole')
				 ->where('ST_Proposition.idStropole', $idStropole);
		$query = $this->db->get();

		if($this->db->affected_rows() == 0) return false;
		return $query->result();

	}

	#####################################
	#fonction qui permet d'ajouter un 
	#choix pour un stropole
	#@Param : choice -> choix du votant
	public function add_choice($choice){

		return $this->db->insert('ST_Choice', $choice);
	}

	#####################################################
	#fonction qui permets de récuperer les choix pour un
	#stropole
	#@Param : idProposition -> proposition
	public function get_choices_by_proposition($idProposition){

		$this->db->select('*')
				 ->from('ST_Choice')
				 ->where('ST_Choice.idProposition', $idProposition);
		$query = $this->db->get();

		if($this->db->affected_rows() == 0) return false;
		return $query->result();
	}

	#####################################################
	#fonction qui permets de recuperer tous les participants
	#d'un stropole
	#@Param : idStropole -> identifiant du stropole
	public function get_choices_by_stropole($idStropole){

		$this->db->select('*')
				 ->from('ST_Choice')
				 ->join('ST_Proposition', 'ST_Choice.idProposition = ST_Proposition.idProposition')
				 ->where('ST_Proposition.idStropole', $idStropole)
				 ->where('ST_Choice.email != ', NULL);

		$query = $this->db->get();
		if($this->db->affected_rows() == 0) return false;
		return $query->result();
	}

	#########################################################
	#ffonction qui donne un compte de choix selon une 
	#proposition
	#@Param ! idProposition -> identifiant proposition
	public function get_count_by_proposition($idProposition){

		$this->db->select('COUNT(*) as total')
				 ->from('ST_Choice')
				 ->where('ST_Choice.idProposition', $idProposition)
				 ->limit(1);

		$query = $this->db->get();
		return $query->row()->total;
	}
}

?>
