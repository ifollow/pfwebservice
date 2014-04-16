<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */

function get_Datetime_Now() {
    $tz_object = new DateTimeZone('America/Campo_Grande');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s');
}
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['idproduto']) && isset($_POST['idmesa']) && isset($_POST['idestabelecimento']) && isset($_POST['idfuncionario']) && isset($_POST['quantidade']) && isset($_POST['observacao'])) {
 
    $produto = $_POST['idproduto'];
    $estabelecimento = $_POST['idestabelecimento'];
    $funcionario = $_POST['idfuncionario'];
    $mesa = $_POST['idmesa'];
    $quantidade = $_POST['quantidade'];
    $observacao = $_POST['observacao'];
    $created_at =  get_Datetime_Now();
    $datapedido = get_Datetime_Now();
    $flag = 0;
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO pedidos(produto_id, mesa_id, observacao, created_at, updated_at, estabelecimento_id, quantidade, funcionario_id, datapedido, flag) VALUES('$produto','$mesa', '$observacao', '$created_at', '$created_at', '$estabelecimento', '$quantidade', '$funcionario', '$datapedido', '$flag')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = true;
        $response["message"] = "Pedido criado.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = false;
        $response["message"] = "Oops! erro. '$datapedido', '$created_at', '$estabelecimento', '$produto', '$funcionario', '$mesa', '$quantidade', '$observacao', '$flag' ";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = false;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>