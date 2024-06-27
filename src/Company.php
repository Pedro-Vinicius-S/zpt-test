<?php
namespace Company;

class Company {
	private int $id;

	public function greetings() {
		return "Greetings. Your ID is $this->id";
	}
	//Resposta 06
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