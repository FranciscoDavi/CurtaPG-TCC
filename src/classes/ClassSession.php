<?php

namespace Src\Classes;


class ClassSession{

    protected $id;
    protected $nome;
    protected $email;
    protected $nv_acesso;

    public function setSession($id, $nome, $email, $nv_acesso){

        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['nv_acesso'] = $nv_acesso;
        return $_SESSION;
    }

    public function verifySession($nv_acesso){
        if(empty($_SESSION) and $_SESSION['nv_acesso'] <> $nv_acesso){
            return false;
            header('location: http://localhost/curtapg');
        }
        else{
            return true;
        }
    }

    public function dropSession(){
        session_destroy();
    }


}








?>