<?php
namespace App\Controller;
use Src\classes\ClassRender;
use App\Model\ClientePJ;
 
class ControllerLoginPJ{
    private $cliente;
    private $render;
     
    function __construct(){
        $this->cliente = new ClientePJ();
        $this->render = new ClassRender();

        $this->render->setDir('loginpj/');
        $this->render->renderLayout();

    }

    public function dadosPost(){
        if(array_key_exists('email_cliente', $_POST))
            $this->cliente->setEmail_cliente($_POST['email_cliente']);
        
        if(array_key_exists('senha_cliente', $_POST))
            $this->cliente->setSenha_cliente($_POST['senha_cliente']);
    }

    public function logar(){

        $this->dadosPost();

        $this->cliente->logarCliente();
    }

    public function deslogar(){
        session_destroy();
    }
}

?>