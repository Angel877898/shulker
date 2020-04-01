<?php
include_once 'api/vendor/autoload.php';

function subirCarpeta($nombrecarpeta)
{
    putenv('GOOGLE_APPLICATION_CREDENTIALS=credenciales.json');

    $client = new Google_Client();
    $client->useApplicationDefaultCredentials();
    $client->setScopes(['https://www.googleapis.com/auth/drive.file']);
    try{
    //instanciamos el servicio
    $service = new Google_Service_Drive($client);
    
    //ruta al archivo
    $file_path = $nombrecarpeta;
    
    //instacia de archivo
    $file = new Google_Service_Drive_DriveFile();
    $file->setName($nombrecarpeta);
    
    //obtenemos el mime type
    $finfo = finfo_open(FILEINFO_MIME_TYPE); 
    $mime_type=finfo_file($finfo, $file_path);
    
    //id de la carpeta donde hemos dado el permiso a la cuenta de servicio 
    $file->setParents(array("1XxtGDi5TjLgZL4J27xRELabPMNEEx09M"));
    $file->setDescription('archivo subido desde php');
    $file->setMimeType($mime_type);
    
    $result = $service->files->create(
      $file,
      array(
        'data' => file_get_contents($file_path),
        'mimeType' => $mime_type,
        'uploadType' => 'media',
      )
    );
    
    echo '<a href="https://drive.google.com/open?id='.$result->id.'" target="_blank">'.$result->name.'</a>';
    
    }catch(Google_Service_Exception $gs){
     
      $m=json_decode($gs->getMessage());
      echo $m->error->message;
    
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
      
?>