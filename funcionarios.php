<?php
//Antonio Ricardo (MoSH)
//requisitando todos os funcionarios cadastrados no banco

// array para o json
$response = array();

require_once __DIR__ . '/db_connect.php';

$db = new DB_CONNECT();

$query = "select * from funcionarios";

$result = mysql_query($query) or die(mysql_error());

if (mysql_num_rows($result) > 0) {
	
	$response['funcionarios']  = array();

	while ($row = mysql_fetch_array($result)) {
		
		$funcionario = array();
		$funcionario['id'] = $row['id'];
		$funcionario['nome'] = $row['nome'];
		$funcionario['codigo'] = $row['codigo'];

		array_push($response['funcionarios'], $funcionario);
	}

	

	echo json_encode($response);

}else{
	$response['sucess'] = 0;
	$response['message'] = "Nao existe funcionario cadastrado!";

	echo json_encode($response);
}

?>