<?php
require_once __DIR__ . '/db_connect.php';

$db = new DB_CONNECT();

$sql = "SELECT * FROM funcionarios WHERE nome = 'Patrick Rigonatto' AND codigo = '123456'";

$result = mysql_query($sql) or die (mysql_error());

while ($row = mysql_fetch_array($result)) {
	
	echo $row["id"];
}

?>