<?php
//Antonio Ricardo (MoSH)
//logando
require_once __DIR__ . '/db_connect.php';

$db = new DB_CONNECT();

if (isset($_POST["numero"])) {

$response = array();
$numero = $_POST["numero"];


$sql = "SELECT * FROM mesas WHERE numero LIKE '$numero'";

$result = mysql_query($sql) or die (mysql_error());

if ($result) {
	
	while ($row = mysql_fetch_array($result)) {
	
	
	$response["id"] = $row["id"];
	}
	
}else {
        $response["status"] = false;
        $response["message"] = "Usuario nao encontrado!";
    }
echo json_encode($response);
}

?>