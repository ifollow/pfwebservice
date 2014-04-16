<?php
//Antonio Ricardo (MoSH)
//requisitando todos as mesas cadastrados no banco

// array para o json
$response = array();

require_once __DIR__ . '/db_connect.php';

$db = new DB_CONNECT();

$query = "select * from mesas";

$result = mysql_query($query) or die(mysql_error());

if (mysql_num_rows($result) > 0) {
	
	$response['mesas']  = array();

	while ($row = mysql_fetch_array($result)) {
		
		$mesa = array();
		$mesa['id'] = $row['id'];
		$mesa['numero'] = $row['numero'];
		

		array_push($response['mesas'], $mesa);
	}

	

	echo json_encode($response);

}else{
	$response['sucess'] = 0;
	$response['message'] = "Nao existe Mesa Cadastrada!";

	echo json_encode($response);
}

?>