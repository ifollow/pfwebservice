<?php
//Antonio Ricardo (MoSH)
//logando
require_once __DIR__ . '/db_connect.php';

$db = new DB_CONNECT();

if (isset($_POST["nome"]) && $_POST["codigo"] != "") {

$response = array();
$nome = $_POST["nome"];
$codigo = $_POST["codigo"];

$sql = "SELECT * FROM funcionarios WHERE nome LIKE '$nome' AND codigo = '$codigo'";

$result = mysql_query($sql) or die (mysql_error());

if ($result) {
	
	while ($row = mysql_fetch_array($result)) {
	
	$response["status"] = true;
	$response["id"] = $row["id"];
	}
	
}else {
        $response["status"] = false;
        $response["message"] = "Usuario nao encontrado!";
    }
echo json_encode($response);
}

?>