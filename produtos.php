<?php
//Antonio Ricardo (MoSH)
//requisitando todos os produtos cadastrados no banco

// array para o json
$response = array();

require_once __DIR__ . '/db_connect.php';

$db = new DB_CONNECT();

$query = "select * from produtos where estabelecimento_id = 1";

$result = mysql_query($query) or die(mysql_error());

if (mysql_num_rows($result) > 0) {
	
	$response['produtos']  = array();

	while ($row = mysql_fetch_array($result)) {
		
		$produto = array();
		$produto['id'] = $row['id'];
		$produto['nome'] = $row['nome'];
		

		array_push($response['produtos'], $produto);
	}

	

	echo json_encode($response);

}else{
	$response['sucess'] = 0;
	$response['message'] = "Nao existe Mesa Cadastrada!";

	echo json_encode($response);
}

?>