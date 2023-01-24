<?php

//constante que define diretorio de url padão da aplicação
    $PastaInterna = "curtapg/";
    define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}");
    
    //constante que define diretorio fisico padão da aplicação
    //Verifica se existe a barra no final do diretorio, pois em alguns casos o servidor pode não colocala automaticamente
    if(substr($_SERVER['DOCUMENT_ROOT'], -1) == '/'){
        define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$PastaInterna}");
    }
    else{
        define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}/{$PastaInterna}");
    }

    //Diretorios específicos
    define('DIRIMG', DIRPAGE."public/img/");
    define('DIRCSS', DIRPAGE."public/css/");
    define('DIRJS', DIRPAGE."public/js/");
 



    //acesso ao banco de dados
    define('HOST', "localhost");
    define('DB',"curtapg");
    define('USER', "root");
    define('PASS',"");


?>