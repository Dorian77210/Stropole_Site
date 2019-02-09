<?php

class User_Model extends CI_Model{

	public function __construct(){

		parent::__construct();
	}

	########################################
	#fonction pour savoir si le login fourni
	#exise ou non
	#@Param : login -> login du nouvek utilisateur
	public function is_login_unique($login){

		$this->db->select('login')
				 ->from('ST_User')
				 ->where('login', $login);

		$query = $this->db->get();

		//si le login existe deja
		if($this->db->affected_rows() == 1) return false;

		return true;
	}

	###################################
	#fonction pour creer un nouvel 
	#utilisateur
	#@Param : user -> informations sur 
	#le nouvel utilisateur
	public function create_user($user){

		return $this->db->insert('ST_User', $user);
	}

	##########################################
	#fonction pour recuperer un utilisateur 
	#selon son login
	#@Param : login -> login de l'utilisateur
	public function get_user_by_login($login){

		$this->db->select('*')
				 ->from('ST_User')
				 ->where('login', $login)
				 ->limit(1);

		$query = $this->db->get();
		if($this->db->affected_rows() == 1) return $query->first_row();

		return false;
	}

	####################################
	#fonction pour supprimer un utilisateur
	#en fonction de son login
	#@Param : login -> login du user
	public function delete_user($login){

		$this->db->where('login', $login)
			     ->delete('ST_User');
		if($this->db->affected_rows() == 1) return true;

		return false;
	}
	###############################################
	#fonction pour modifier un champs dans le compte
	#de l'utilisateur
	#@Param : field -> champ a modifier
	#		: value -> nouvelle valeur pour le champs
	#		: login -> login utilisateur
	public function update_account($field, $value, $login){

		$this->db->where('login', $login);
		$this->db->update('ST_User', array($field => $value));

		if($this->db->affected_rows() > 0) return true;

		return false;
	}

	#######################################################
	#fonction pour verifier que le mot de passe est correct
	#@Param : login -> login de l'utilisateur qui veut se 
	#connecter
	#		  password -> mot de passe que l'utilisateur 
	#donne
	public function is_password_correct($login, $password){

		$this->db->select('password')
				 ->from('ST_User')
				 ->where('login', $login)
				 ->limit(1);
		$query = $this->db->get();
		if($this->db->affected_rows() == 1) return password_verify($password, $query->row()->password);

		return false;
	}
}

?>
