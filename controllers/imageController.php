<?php

namespace Controllers;

use Controllers\EventController as EventController;
use DAO\ShowDAO as ShowDAO;


class ImageController
{


    public function index()
    {
        require_once(VIEWS_PATH."uploadImage.php");
    }

    public function nextFile($file)
    {
        $path_info = pathinfo($file);
        $extension = $path_info['extension'];

        $next = 1;

        $files = scandir("./images", SCANDIR_SORT_DESCENDING);
        
        if ( count($files) > 0)
        {
            $path_info = pathinfo($files[0]);
            $name = $path_info['basename'];

            // cuenta la cantidad de archivos y no el ultimo por que el 10 no es secuencial del 9 y cuenta mal
            $name = count($files);

            $next = intval($name) + 1;
            
        }
        
        return $next.".".$extension;
    }

    public function save($id, $fileToUpload)
    {
        $error = "";

        $imageDirectory = 'images/';

        if(!file_exists($imageDirectory))
            mkdir($imageDirectory);

        if($_FILES)
        {
            if((isset($_FILES['fileToUpload'])) && ($_FILES['fileToUpload']['name'] != ''))
            {
                $name = $this->nextFile($_FILES['fileToUpload']['name']);

                $file = $imageDirectory . $name;			

                //Obtenemos la extensión del archivo. No sirve para comprobar el veradero tipo del archivo
                $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

                //Genera un array a partir de una verdera imagen. Retorna false si no es una archivo de imagen			
                $imageInfo = getimagesize($_FILES['fileToUpload']['tmp_name']);
                //var_dump($imageInfo);
                if($imageInfo !== false)
                {
                    //echo $imageInfo['mime'];

                    if(!file_exists($file))
                    {
                        //echo $_FILES['fileToUpload']['size'];
                        if($_FILES['fileToUpload']['size'] < 5000000) //Menor a 5 MB
                        {
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file))
                            {
                                $showDAO = new ShowDAO();
                                $showDAO->setImageToShow($id, $name);

                                $eventController = new EventController();
                                $eventController->showDetail($id);

                            }
                            else
                                $error = 'No se pudo subir el archivo.';
                        }
                        else
                            $error = 'el archivo es demasiado grande.';
                    }
                    else
                        $error = 'el archivo ya existe.';
                }
                else
                    $error = 'no es imagen.';
            }		
        }

        return $error;
    }


}

?>