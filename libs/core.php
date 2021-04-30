<?php
class Core
{
    public function __construct()
    {
        //capturamos los elementos de la peticion
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        //para quitar las "/"|Quitamos el ultimo
        $url = rtrim($url, '/');
        //convertimos el array los elementos de la URL (peticion)
        $url = explode('/', $url);
            //solo para pruebas 

        //echo "<pre>", print_r($url), "</pre>";

        //Si el usuario no proporciona un controlador 
        if (empty($url[0])) {
            //Llamamos al controlador predeterminado
            require_once '../app/controllers/homecontroller.php';
            (new HomeController())->index();
            return false;
        }

        //Cuando el usuaio especifique un  controlador
        //formamos la ruta de ese controlador
        $path_controller = '../app/controllers/' . $url[0] . 'Controller.php';
        //Verificamos si el controlador especificado existe
        if (file_exists($path_controller)) {
            //Creamos una instancia de dicho controlador
            require_once $path_controller;
            $controller_name = $url[0] . 'Controller';
            $controller = new $controller_name();

            $size = count($url);
                //Si la cantidad de elemento del array es>=2
                //entonces se ha especificaciones un controlador y una accion
            if ($size >= 2) {
                //Verificamos que la accio especificada porel usuario existe en el controlador
                if (method_exists($controller, $url[1])) {
                    //Al menos el usuario a especificado un parametro
                    if ($size >= 3) {
                        //Al menos el usuario a especificado un parametro
                        //capturamos los parametros ingresados en un array "param"

                    $param=[];
                    for ($i=2; $i <$size ; $i++) { 
                        array_push($param,$url[$i]);
                    }
                    //Llamamos al contralador, su accion y le especificamos los parametros
                    $controller->{$url[1]}($param);
                    //echo "<pre>", print_r($param), "</pre>";
                    }else{
                        //En caso de que el usuario no especifique parametros
                        //entonces llamamos a la accion sin parametros
                        $controller->{$url[1]}();
                    }
                } else {
                    echo "El metodo de accion {$url[1]} NO existe";
                }
            } else {
                //Cuando el usuario no especifique ninguna accion llamamos dee
                //manera predeterminada a la accion index
                $controller->index();
            }
        } else {
            echo "El controlador {$url[0]} no existe";
        }
    }
}
