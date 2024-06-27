<?php
namespace User;

class User {
	private $db;

	public function g($ids) {
		$users = [];

		foreach ($ids as $id) {
			$users[] = $this->db->q('SELECT username FROM user WHERE id = ' . $id);
		}

		return $users;
	}
		//Resposta 02
		//A função foi refatorada e agora chama-se User, ela vefirica se $ids não está vazio, então asegura que $ids sejam inteiros então faz uma consulta SQL
		//com a cláusula IN para obter todos os usernames de uma vez e assim retornar os usernames obtidos na consulta. 
		//Resposta 03 
		//public function getUsersById
	
	public function getUsersById($ids) {
		if (empty($ids)) {
			return [];
		}
	
		$ids = array_map('intval', $ids);
		
		$query = 'SELECT username FROM user WHERE id IN (' . implode(',', $ids) . ')';
	
		$result = $this->db->q($query);
	
		return $result;
	}
	

	public function setDb($db) {
		if (!$db || $db->isClosed()) {
			return false;
		}

		if ($db->debug) {
			$db->setGeneralLog('on');
			error_log($db);
		}

		if ($db->profiling) {
			$db->setSlowLog('on');
		}

		$this->db = $db;
	}
}

?>