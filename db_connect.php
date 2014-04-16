<?php
//Antonio Ricardo (MoSH)
// Classe de conexao com MySQL with PHP



/**
* 
*/
class DB_CONNECT 
{
	//construtor
	function __construct()
	{
		# connecting com o database
		$this->connect();
	}

	//destrutor

	function __destruct(){
		//fechando conexão com o database
		$this->close();
	}

    //método para conectar ao db
	function connect(){
		//importar variaveis de conexao
		require_once __DIR__ . '/db_config.php';

		//conectando ao mysql

		$con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die (mysql_error());

		//selecionando o database

		$db = mysql_select_db(DB_DATABASE) or die (mysql_error());


		//retornando o cursos da conexão

		return $con;
	}// fim do metodo connect


	function close(){
		//fechando conexao com o banco 

		mysql_close();
	}

}// fim da classe




?>