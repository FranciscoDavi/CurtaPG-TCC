<?php

namespace Src\classes;
use Src\Traits\TraitFormatString;
class ClassRender{
    
    use TraitFormatString;
    //atributos
    private $dir;
    private $title;
    private $description;
    private $keywords;
    public $dados = [];

    //getters e setters
    public function getDir(){
        return $this->dir;
    }

    public function setDir($dir){
        $this->dir = $dir;
    }
    
    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
         $this->description = $description;
    }

    public function getKeywords(){
        return $this->keywords;
    }

    public function setKeywords($keywords){
        $this->keywords = $keywords;
    }


    //renderiza todo o layout
    public function renderLayout(){
        include_once(DIRREQ."app/view/layout.php");
    }
    //adiciona caracteristicas especificas no head
    public function addHead(){
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/head.php")){
            include_once(DIRREQ."app/view/{$this->getDir()}/head.php");
        }
    }

    //adiciona caracteristicas especificas no header
    public function addHeader(){
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/header.php")){
            include_once(DIRREQ."app/view/{$this->getDir()}/header.php");
        }
    }
    //adiciona caracteristicas especificas no main
    public function addMain(){
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/main.php")){
            include_once(DIRREQ."app/view/{$this->getDir()}/main.php");
        }
    }
    //adiciona caracteristicas especificas no footer
    public function addFooter(){
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/footer.php")){
            include_once(DIRREQ."app/view/{$this->getDir()}/footer.php");
        }
    }

    public function addScript(){
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/scripts.php")){
            include_once(DIRREQ."app/view/{$this->getDir()}/scripts.php");
        }
    }
    
}


?>