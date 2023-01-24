<?php

namespace App\Controller;
use App\Model\Admin;
use App\Model\Evento;
use App\Model\ClintePJ;
use Src\Classes\ClassRender;
use Src\Traits\TraitUrlParser;


class ControllerAdmin{

    use TraitUrlParser;

    protected $admin;
    protected $evento;
    protected $cliente;
    protected $render;

    function __construct(){
        $this->admin = new Admin();
        $this->render = new ClassRender();

        $countUrl = count($this->parseUrl());

        if($countUrl == 1){
            header("Location:http://localhost/curtapg/admin/eventos");
        }
    
        
    }

    public function eventos(){
        $eventos = $this->admin->exibeEventos();
        $this->render->dados = $eventos;

        $this->render->setDir('admin/');
        $this->render->renderLayout();

    }

    public function pendentesAprovacao(){
        $eventos = $this->admin->exibirEventosPendentes(3);
        $this->render->dados = $eventos;

        $this->render->setDir('admin/');
        $this->render->renderLayout();
    }

    public function pendentesAlteracao(){
        $eventos = $this->admin->exibirEventosPendentes(4);
        $this->render->dados = $eventos;
        
        $this->render->setDir('admin/');
        $this->render->renderLayout();
    }

    public function pendentesCancelamento(){
        $eventos = $this->admin->exibirEventosPendentes(5);
        $this->render->dados = $eventos;

        $this->render->setDir('admin/');
        $this->render->renderLayout();
    }

    public function view($id){
        
        $eventos = $this->admin->evento->exibirEvento($id);
        $this->render->dados = $eventos;

        $this->render->setDir('evento-view-adm/');
        $this->render->renderLayout();
    }

}





?>