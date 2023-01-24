<?php

namespace App;
use Src\classes\ClassRoutes;

class Dispatch extends ClassRoutes{
    //atributos
    private $method;
    private $param = [];
    private $obj;

    //getters e setters
    protected function getMethod(){
        return $this->method;
    }

    public function setMethod($method){
        $this->method = $method;
    }

    public function getParam(){
        return $this->param;
    }

    public function setParam($param){
        $this->param = $param;
    }

    //metodo construtor ao adicionar a classe 'Dispatch' seu primeiro paço é adicionar o controller
    public function __construct(){
        self::addController();
    }

    //metodo de adição de controller
    private function addController(){
        $RotaController = $this->getRota();
        $NameS = "App\\Controller\\{$RotaController}";
        $this->obj = new $NameS;# ex :obj = new App\Controller\ControllerSiteMap

        if(isset($this->parseUrl()[1])){
            self::addMethod();
        }

    }

    //metodo de adição de método do controller
    private function addMethod(){
        if(method_exists($this->obj, $this->parseUrl()[1])){
            $this->setMethod("{$this->parseUrl()[1]}");
            self::addParam();
            call_user_func_array([$this->obj, $this->getMethod()], $this->getParam());
        }
    }


    //metodo de adição de parâmetros do controller
    private function addParam(){
       $contArray= count($this->parseUrl());

       if($contArray > 2){
           foreach($this->parseUrl() as $key => $Value){
               if($key > 1){
                   $this->setParam($this->param += [$key => $Value]);
               }
           }
       }
    }

}


?>