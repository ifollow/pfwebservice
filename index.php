<?php

require_once __DIR__ . '/db_connect.php';

echo "Bem vindo ao webservice com Android! \n";
echo "<br />";
echo "Testando o php";

echo "<br />";
echo "By: Antonio Ricardo (MoSh)";


//testando conexao com a classe criada

$db = new DB_CONNECT();

if ($db->connect()) {
	
	echo "<br /><span style='color:red;' >Conectei ao banco com sucesso!</span>";
}

?>