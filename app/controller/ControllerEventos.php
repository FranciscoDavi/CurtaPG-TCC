<?php

namespace App\Controller;

use Src\classes\ClassRender;
use App\model\Evento;


class ControllerEventos{
      
    protected $evento;
    protected $render;

    function __construct(){
        
        $this->evento = new Evento();
        $this->render = new ClassRender();
       
        $this->render->dados['eventos'] = $this->divulgaEventos();
        $this->render->setDir("eventos/");
        $this->render->renderLayout();
    }

    public function divulgaEventos(){
        $eventos = $this->evento->exibirEventos();
        return $eventos;
    }

    public function pesquisa($pesquisa){
        $search = $this->evento->pesquisaEvento($pesquisa);
        $this->render->setDados($search);
        echo $pesquisa;
    
    }
}







?>