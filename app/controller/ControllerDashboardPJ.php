<?php

namespace App\Controller;
use App\Model\ClientePJ;
use Src\Classes\ClassRender;
use Src\Classes\ClassSession;
use Src\Traits\TraitUrlParser;
use Src\Traits\TraitFormatString;


class ControllerDashboardPJ{

    use TraitUrlParser;
    use TraitFormatString;
     
    protected $cliente;
    protected $render;
    protected $erros = false;

    function __construct(){
                
        $this->cliente = new ClientePJ();
        $this->render = new ClassRender();

        $contUrl = count($this->parseUrl());

        session_start();

        if(array_key_exists('login', $_SESSION) && $_SESSION['nv_acesso'] == "PJ"){
            if($contUrl == 1){
                header("Location:http://localhost/curtapg/dashboard/home");
            }
        }else{
            if($contUrl == 1){
                header("Location:http://localhost/curtapg/dashboard/logar");
            }
        }

        
    
    }


    public function home(){
        $this->render->setDir('menupj/');
        $this->render->renderLayout();
    }


    public function logar(){
        $this->postLoginCliente();
       
        if(!$this->erros){
            $this->cliente->logarCliente();
        }
        $this->render->setDir('loginpj/');
        $this->render->renderLayout();
    }

    public function deslogar(){
        session_destroy();
    }

    //cadastra o cliente
    public function cadastroCliente(){
        $this->postCadastroCliente();
        $rescnpj = $this->cliente->validarCnpj();
        $resemail = $this->cliente->validarEmail();
        if($rescnpj == 1){
            $this->erros = true;
            echo "<script>document.getElementById('erro-cnpj').innerHTML = 'Cnpj ja consta cadastrado no sistema';</script>";
        }
        if($resemail == 1){
            $this->erros = true;
            echo "<script>document.getElementById('erro-email').innerHTML = 'Email ja consta cadastrado no sistema';</script>";
        }
        if($this->erros == false){
            $this->cliente->inserirCliente();
        }

        $this->render->setDir('cadastropj/');
        $this->render->renderLayout();
}

    //cadastra o evento
    public function cadastroEvento(){
        $this->postCadastroEvento();
        if(!$this->erros){
            $this->cliente->criarEvento();
        }
        $this->render->setDir('cadastro-evento/');
        $this->render->renderLayout();

    }

    //alterar evento
    public function alterar($id = null){
        $this->postAlterarEvento();
     
        $evento = $this->cliente->evento->exibirEvento($id);
        $this->render->dados = $evento;

        if(!$this->erros){
            $this->cliente->evento->alterarEvento($id);
        }
       
        $this->render->setDir('alterar-evento/');
        $this->render->renderLayout();
    }

    //exibe os eventos do cliente
    public function meusEventos(){
        $eventos = $this->cliente->exibir_eventos_cliente(1);
        $this->render->dados = $eventos;
        
        $this->render->setDir('eventos-cliente/');
        $this->render->renderLayout();
    }

    /*
        Métodos auxiliares
    */


    //verifica se os dados foram preenchidos incluido a validação do anexo de imagem
    public function postLoginCliente(){

        if(count($_POST) > 0){
            if(array_key_exists('email_cliente', $_POST))
            $this->cliente->setEmail_cliente($_POST['email_cliente']);
        
        if(array_key_exists('senha_cliente', $_POST))
            $this->cliente->setSenha_cliente($_POST['senha_cliente']);
        }
        else{
            $this->erros = true;
        }
       
    }

    public function postCadastroEvento(){
        
        if(empty($_POST)){
            $this->erros = true;
        }
        else{
            $this->cliente->evento->setEstatus_evento(3);
            $this->cliente->setCd_clientePJ(1);

            if(array_key_exists('nm_evento', $_POST) and strlen($_POST['nm_evento'])>0){
                $this->cliente->evento->setNm_evento($_POST['nm_evento']);}
            else{
                $this->erros = true;
            }

            if(array_key_exists('categoria', $_POST) and strlen($_POST['categoria']) > 0){
                $this->cliente->evento->setTipo_evento($_POST['categoria']);
            }
            else{
                $this->erros = true;
            }

            if(array_key_exists('class_evento', $_POST) and strlen($_POST['class_evento']) > 0){
                $this->cliente->evento->setClass_evento($_POST['class_evento']);
            }		
            else{
                $this->erros = true;
            }

            if(array_key_exists('preco_evento', $_POST) and strlen($_POST['preco_evento']) > 0){
                $this->cliente->evento->setPreco_evento($_POST['preco_evento']);
            }
            else{
                $this->erros = true;
            }

            if(array_key_exists('hr_inicio', $_POST) and strlen($_POST['hr_inicio']) > 0){
                $this->cliente->evento->setHora_inicio($this->formatTimeDB($_POST['hr_inicio']));
            }
            else{
                $this->erros = true;
            }

            if(array_key_exists('hr_final', $_POST) and strlen($_POST['hr_final']) > 0){
                $this->cliente->evento->setHora_final($this->formatTimeDB($_POST['hr_final']));
            }
            else{
                $this->erros = true;
            }
            
            if(array_key_exists('dt_inicio', $_POST) and strlen($_POST['dt_inicio']) > 0){
                $this->cliente->evento->setData_inicio($this->formatDateDB($_POST['dt_inicio']));
            }
            else{
                $this->erros = true;
            }

            if(array_key_exists('dt_final', $_POST) and strlen($_POST['dt_final'] ) > 0){
                $this->cliente->evento->setData_final($this->formatDateDB($_POST['dt_final']));			
            }else{
                $this->erros = true;
            }

            if(array_key_exists('cep', $_POST) and strlen($_POST['cep']) > 0){
                $this->cliente->evento->setNr_loc_cep($_POST['cep']);
            }
            else{
                $this->erros= true;
            }

            if(array_key_exists('numero', $_POST) and strlen($_POST['numero']) > 0){
                $this->cliente->evento->setNumero($_POST['numero']);
            }
    
            if(array_key_exists('local', $_POST) and strlen($_POST['local']) > 0){
                $this->cliente->evento->setNm_local($_POST['local']);
            }
            else{
                $this->erros= true;
            }

            if(array_key_exists('endereco', $_POST) and strlen($_POST['endereco']) > 0){
                $this->cliente->evento->setNm_loc_rua($_POST['endereco']);
            }
            else{
                $this->erros= true;
            }

            if(array_key_exists('bairro', $_POST) and strlen($_POST['bairro']) > 0){
                $this->cliente->evento->setNm_loc_bairro($_POST['bairro']);
            }
            else{
                $this->erros= true;
            }

            if(array_key_exists('cidade', $_POST) and strlen($_POST['cidade']) > 0){
                $this->cliente->evento->setNm_cidade($_POST['cidade']);
            }
            else{
                $this->erros= true;
            }

            if(array_key_exists('desc_evento', $_POST) and strlen($_POST['desc_evento']) > 0){
                $this->cliente->evento->setDesc_evento($_POST['desc_evento']);
            }
            else{
                $this->erros= true;
            }

            //verifica arquivo de imagem
            if(array_key_exists('arquivo', $_FILES)){
                $this->cliente->imagem->setArquivo($_FILES['arquivo']);
                $erros = $this->cliente->imagem->validarImagem();

                if(empty($erros)){
                    $this->render->dados = $erros;
                    $this->erros = true;
                }
            }

        }
    }

    function postAlterarEvento(){
        if(count($_POST) > 0){

            $this->cliente->evento->setEstatus_evento(4);
            if(array_key_exists('nm_evento', $_POST) and strlen($_POST['nm_evento']) > 0){
                $this->cliente->evento->setNm_evento($_POST['nm_evento']);
            }
            if(array_key_exists('categoria', $_POST) and strlen($_POST['categoria']) > 0){
                $this->cliente->evento->setTipo_evento($_POST['categoria']);
            }
            if(array_key_exists('class_evento', $_POST) and strlen($_POST['class_evento']) > 0){
                $this->cliente->evento->setClass_evento($_POST['class_evento']);
            }		
            if(array_key_exists('preco_evento', $_POST) and strlen($_POST['preco_evento']) > 0){
                $this->cliente->evento->setPreco_evento($_POST['preco_evento']);
            }
            if(array_key_exists('hr_inicio', $_POST) and strlen($_POST['hr_inicio']) > 0){
                $this->cliente->evento->setHora_inicio($this->formatTimeDB($_POST['hr_inicio']));
            }
            if(array_key_exists('hr_final', $_POST) and strlen($_POST['hr_final']) > 0){
                $this->cliente->evento->setHora_final($this->formatTimeDB($_POST['hr_final']));
            }
            if(array_key_exists('dt_inicio', $_POST) and strlen($_POST['dt_inicio']) > 0){
                $this->cliente->evento->setData_inicio($this->formatDateDB($_POST['dt_inicio']));
            }
            if(array_key_exists('dt_final', $_POST) and strlen($_POST['dt_final'] ) > 0){
                $this->cliente->evento->setData_final($this->formatDateDB($_POST['dt_final']));
            }
            if(array_key_exists('cep', $_POST) and strlen($_POST['cep']) > 0){
                $this->cliente->evento->setNr_loc_cep($_POST['cep']);
            }
            if(array_key_exists('numero', $_POST) and strlen($_POST['numero']) > 0){
                $this->cliente->evento->setNumero($_POST['numero']);
            }
            if(array_key_exists('local', $_POST) and strlen($_POST['local']) > 0){
                $this->cliente->evento->setNm_local($_POST['local']);
            }
            if(array_key_exists('endereco', $_POST) and strlen($_POST['endereco']) > 0){
                $this->cliente->evento->setNm_loc_rua($_POST['endereco']);
            }
            if(array_key_exists('bairro', $_POST) and strlen($_POST['bairro']) > 0){
                $this->cliente->evento->setNm_loc_bairro($_POST['bairro']);
            }
            if(array_key_exists('cidade', $_POST) and strlen($_POST['cidade']) > 0){
                $this->cliente->evento->setNm_cidade($_POST['cidade']);
            }
            if(array_key_exists('desc_evento', $_POST) and strlen($_POST['desc_evento']) > 0){
                $this->cliente->evento->setDesc_evento($_POST['desc_evento']);
            }
    
            // if(array_key_exists('arquivo', $_FILES)){
            //     $this->cliente->imagem->setArquivo($_FILES['arquivo']);
            //     $erros = $this->cliente->imagem->validarImagem();

            //     if(empty($erros)){
            //         $this->render->dados = $erros;
            //         $this->erros = true;
            //     }
            // }

    
        }
        else{
            $this->erros = true;
        }
    }
    
    function postCadastroCliente(){
        if(count($_POST) > 0){
            if(array_key_exists('nm_razaosocial', $_POST) && strlen($_POST['nm_razaosocial']) > 0){
                $this->cliente->setNm_razaosocial($_POST['nm_razaosocial']);
            }
            else{
                $this->erros = true;
            }

            if(array_key_exists('cd_cnpj', $_POST) && $this->cliente->validarCnpj($_POST['cd_cnpj']) == 2){
                $this->cliente->setCd_cnpj($_POST['cd_cnpj']);
            }
            elseif($this->cliente->validarCnpj($_POST['cd_cnpj']) == 1){
                header("Location: /cadastropj");
            }
            
            if(array_key_exists('tel_cliente', $_POST) && strlen($_POST['tel_cliente']) > 0){
                $this->cliente->setTel_cliente($_POST['tel_cliente']);
            }
            else{
                $this->erros = true;
            }
            if(array_key_exists('email_cliente', $_POST) && strlen($_POST['email_cliente']) > 0){
                $this->cliente->setEmail_cliente($_POST['email_cliente']);
            }
            else{
                $this->erros = true;
            }
            if(array_key_exists('nm_rua', $_POST) && strlen($_POST['nm_rua']) > 0){
                $this->cliente->setNm_rua($_POST['nm_rua']);
            }
            else{
                $this->erros = true;
            }
            if(array_key_exists('nr_cep', $_POST) && strlen($_POST['nr_cep']) > 0){
                $this->cliente->setNr_cep($_POST['nr_cep']);
            }
            else{
                $this->erros = true;
            }
            if(array_key_exists('numero', $_POST) && strlen($_POST['numero']) > 0){
                $this->cliente->setNumero($_POST['numero']);
            }
            else{
                $this->erros = true;
            }
            if(array_key_exists('nm_bairro', $_POST) && strlen($_POST['nm_bairro']) > 0){
                $this->cliente->setNm_bairro($_POST['nm_bairro']);
            }
            else{
                $this->erros = true;
            }
            if(array_key_exists('nm_cidade', $_POST) && strlen($_POST['nm_cidade']) > 0){
                $this->cliente->setNm_cidade($_POST['nm_cidade']);
            }
            else{
                $this->erros = true;
            }

            if(array_key_exists('senha',$_POST)){
                if(strlen($_POST['senha']) < 8){
                    $this->erros = true;
                }
                else{
                    $this->cliente->setSenha_cliente($_POST['senha']);
                }
            }
            if(array_key_exists('senha_confirma',$_POST)){
                if($_POST['senha'] <> $_POST['senha_confirma']){
                    $this->erros = true;
                }
            } 
        }
        else{
            $this->erros = true;
        }
      
    }
}







?>