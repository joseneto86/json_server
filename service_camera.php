
<?php
 
if($_SERVER['REQUEST_METHOD'] == "POST"){

 $data = json_decode(file_get_contents('php://input'), true);
 if(isset($data["img"])){
	
	$json = array("status" => 1, "msg" => salvarFoto($data["img"]));
 }else{
	$json = array("status" => 0, "msg" => "Dados inválidos");
 }

}else{
// Insert data into data base
 $json = array("status" => 0, "msg" => "Metodo nao post!");
}



header('Content-type: application/json');
echo json_encode($json);

function salvarFoto($img){
	define('UPLOAD_DIR', 'img/');
	
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = UPLOAD_DIR . uniqid() . '.png';
	$success = file_put_contents($file, $data);
	return $success ? "Foto salva com sucesso!" : 'Unable to save the file.';
}

 ?>