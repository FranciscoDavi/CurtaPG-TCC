<?php

 namespace App\Controller;
 use App\Model\Evento;
 use Src\classes\ClassRender;
 use Src\Traits\TraitUrlParser;

 class ControllerEvento extends Evento{

    use TraitUrlParser;

    protected $evento;
    protected $comentarSio;
    protected $render;

    function __construct(){

        $this->evento = new Evento();
        $this->render = new ClassRender();

        $url = $this->parseUrl();
        
        $this->render->dados['evento'] = $this->detalhes($url[2]);
        $this->render->dados['comentarios'] = $this->comentarios($url[2]);
        $this->render->setDir("evento/");
        $this->render->renderLayout();

    }

    public function detalhes($id){
        $evento = $this->evento->exibirEvento($id);
        return $evento;
    }

    public function comentarios($id){
       $comentarios = $this->evento->comentarios->buscarComentarios($id);
       return $comentarios;
    }

  
   
 }




?>