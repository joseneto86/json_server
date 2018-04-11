
<?php
 
if($_SERVER['REQUEST_METHOD'] == "POST"){

 $data = json_decode(file_get_contents('php://input'), true);
 if(isset($data["name"]) && isset($data['email'])){
	 
	$json = array("status" => 1, "msg" => "O usuario ".$data['name'] ." e  ". $data['email']. " !");
 }else{
	$json = array("status" => 0, "msg" => "Dados inválidos");
 }

}else{
// Insert data into data base
 $json = array("status" => 0, "msg" => "Metodo nao post!");
}

header('Content-type: application/json');
echo json_encode($json);
 ?>