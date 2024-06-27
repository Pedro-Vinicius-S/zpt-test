<?php
require_once './User.php';

function setDb(User\User $user, $db) {
	$user->setDb($db);
}

	//Resposta 07: Refatoração da função setDb para que ela também possa receber instâncias de Company e Department.
function setInstances(User\User $user, $db, $company, $department) {
    $user->setDb($db);
    $user->setCompany($company);
    $user->setDepartment($department);
}


?>