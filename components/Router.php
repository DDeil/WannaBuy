<?php
/**
 * Created by PhpStorm.
 * User: Deil
 * Date: 01.06.2019
 * Time: 16:20
 */

class Router
{
    /**
     * Class members
     */
    private $routes;

    /**
     * Router constructor..
     */
    public function __construct(){

        $this->routes = include (ROOT.'/config/routes.php');

        DB::connectDB();
    }

    /**
     * Return request URI
     */

    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        return false;
    }

    /**
     * Run route function
     */

    public function run(){

        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path){


            if(preg_match("-$uriPattern-",$uri)){

                /**
                 * get inner address
                 */

                $internalRout = preg_replace("-$uriPattern-", $path,  $uri);
                $segment = explode('/', $internalRout);

                /**
                 * we get controller and action name
                 */
                $controllerName = ucfirst(array_shift($segment).'Controller');
                $controllerFile = ROOT."\controlers\\" . $controllerName . '.php';

                $actionName = 'action' . ucfirst( array_shift($segment));


                /**
                 * include controller
                 */

                if(file_exists($controllerFile)){
                    require_once ($controllerFile);
                }else die('Wrong controller!!');

                /**
                 * create controller
                 */

                $controllerObject = new $controllerName;

                if(call_user_func_array(array($controllerObject, $actionName), $segment)){
                    break;
                }

            }
        }
    }
}