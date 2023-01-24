<?php

namespace Src\classes;

use Src\Traits\TraitUrlParser;

class ClassRoutes{

    use TraitUrlParser;

    private $rota;

    //Método de retorno da rota
    public function getRota(){
        $url = $this->parseUrl();
        $i = $url[0]; //cria um indice para se utilizar a url amigavel

        $this->rota = array(""=>"ControllerEventos", 
                                "home" => "ControllerEventos",
                                "eventos"=>"ControllerEventos",
                                "evento"=>"ControllerEvento",
                                "detalhes"=>"ControllerEvento",
                                "cadastropj"=>"ControllerCadastroPJ",
                                "divulgar"=>"ControllerCadastroPJ",
                                "divulgarevento"=>"ControllerCadastroPJ",
                                "loginpj"=>"ControllerLoginPJ",
                                "menu"=>"ControllerDashboardPJ",
                                "dashboard"=>"ControllerDashboardPJ",
                                "adm"=>"ControllerAdmin",
                                "admin"=>"ControllerAdmin",
                                "administrador"=>"ControllerAdmin"
                        
                            );

        /* se o indice na url existir e o arquivo também, o usuario é redirecionado para a pagina desejada, 
        caso contrário retorna a pagina inicial*/
        if(array_key_exists($i, $this->rota)){
            if(file_exists(DIRREQ."app/controller/{$this->rota[$i]}.php")){
                return $this->rota[$i];
            }
            else{
                return "ControllerEvento";
            }
        }else{  
            return "Controller404";
        }
        return  $url;
    }
}



?>