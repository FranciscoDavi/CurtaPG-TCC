<?php

namespace App\Controller;
use Src\classes\ClassRender;
use App\Model\ClientePJ;

    class ControllerCadastroPj{

        protected $cliente;
        protected $render;
        private $erros = false;

        function __construct(){
            $this->cliente = new ClientePJ();
            $this->render = new ClassRender();

            $this->render->setDir('cadastropj/');
            $this->render->renderLayout();
    
        }

        /*
            Faz a verificação se o array de post foi iniciado além de verificar cada atributo obrigatorio se ele existe 
            ou está vazio,atribuindo valos a classe ClientePJ e diminuindo a chance de um cadastro acidental
        
        */ 

        function dadosPost(){
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

        /*
            Cadastro do cliente       
        */
        public function cadastro(){

            $this->dadosPost();

            $rescnpj = $this->cliente->validarCnpj();
            $resemail = $this->cliente->validarEmail();
            var_dump($resemail);
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
                
        }
    }

        /*
           Exibe a mensagem de confirmação de cadastro      
        */
        
        
    
    


?>