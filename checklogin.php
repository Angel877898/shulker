<?php

/*
Comun para los dos botones. Inicio
*/
date_default_timezone_set("Europe/London");
require_once 'api/vendor/autoload.php';
$username = $_POST['username'];
$password = $_POST['password'];
putenv('GOOGLE_APPLICATION_CREDENTIALS=credenciales.json');
$client = new Google_Client();
$client->addScope(Google_Service_Drive::DRIVE);
$client->useApplicationDefaultCredentials();
$service = new Google_Service_Drive($client);
$fileId = "1lTlXOj93fjXPxxcBHUt_FLlyXJY0jiZ5"; // Google File ID
$content = $service->files->get($fileId, array("alt" => "media"));
$outHandle = fopen("prueba.xml", "w+");
while (!$content->getBody()->eof()) {
        fwrite($outHandle, $content->getBody()->read(1024));
}
fclose($outHandle);

/*
Comun para los dos botones. Fin
*/
if (isset($_POST['register'])) {
    $usuarios = simplexml_load_file("prueba.xml");
    $registrado=false;
    foreach($usuarios as $usuario)
    {
        if((strcmp($usuario->username, $username)===0)){
            $registrado=true;
        }
    }
    if($registrado==true){
        echo 'error';
        //unlink('prueba.xml');
        //header('Location: login.php');
    }else{
        $sxe = new SimpleXMLElement($usuarios);
        $nuevo = $sxe->addChild('usuario');
        $nuevo->addChild('username', $username);
        $nuevo->addChild('password', $password);
        echo 'hola';
    }
}
elseif (isset($_POST['login'])) {
    $usuarios = simplexml_load_file("prueba.xml");
    $registrado=false;
    foreach($usuarios as $usuario)
    {
        if( (strcmp($usuario->username, $username) === 0) && (strcmp($usuario->password, $password) === 0)){
            $registrado=true;     
        }
    }
    if($registrado==true){
        unlink('prueba.xml');
        header('Location: index.php');
    }else{
        unlink('prueba.xml');
        header('Location: login.php');
    }
}
?>