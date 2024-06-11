<?php    
    //ENV
    require_once "env.php";

    //SESSION
    require_once "session.php";

    require_once "route.class.php";

    //Evitar warning
    $msg_erro = array();

    
    //Fazer o carregamento das classes de forma automatica!!!
    spl_autoload_register(
        function ($class_name){
            if(file_exists("controllers/".$class_name.".class.php")){
                require_once  "controllers/" . $class_name . '.class.php';
            } else {
                require_once  "models/" . $class_name . '.class.php';
            }
        }
    );

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $uri = substr($uri, strpos($uri,'/', 1));
    $router->instancia_rota($_SERVER['REQUEST_METHOD'], $uri);


    /*
    if($_GET){
        if($_GET['controller'] && $_GET['method']){
            
            $controller = lcfirst($_GET['controller']);
            $method = lcfirst($_GET['method']);
    
            //require_once "controllers/{$controller}Controller.class.php";
            $class_controller = str_replace("", "", $controller."Controller");
    
            $controller = new $class_controller();
            $controller->$method();
        }
    }else{
        //require_once "controllers/indexController.class.php";
        $controller = new indexController();
        $controller->index();
    }*/
?>