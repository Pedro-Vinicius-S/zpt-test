<?php
namespace Department;

require_once './User.php';

class Department {
	private $user;
	//Resposta 10: Injeção de Dependência.
    public function __construct(User\User $user) {
        $this->user = $user;
	}

		//Resposta 04
		//Método para obter o departamento com mais funcionários de cada usuário executando uma consulta SQL.
	public function getMaxDepartmentForUsers() {
		$query = "
			SELECT u.id AS user_id, u.username, d.id AS department_id, d.name AS department_name
			FROM user u
			LEFT JOIN (
				SELECT department_id, COUNT(*) AS num_employees
				FROM user
				GROUP BY department_id
			) AS ue ON u.department_id = ue.department_id
			JOIN department d ON u.department_id = d.id
			WHERE u.department_id IN (
				SELECT department_id
				FROM (
					SELECT department_id, ROW_NUMBER() OVER(PARTITION BY department_id ORDER BY num_employees DESC) AS rn
					FROM (
						SELECT department_id, COUNT(*) AS num_employees
						FROM user
						GROUP BY department_id
					) AS t
				) AS tt
				WHERE rn = 1
			)
		";
	
		$result = $this->db->q($query);
	
		return $result;
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