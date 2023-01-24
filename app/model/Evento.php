<?php

namespace App\Model;
use App\model\ClassConexao;
use App\model\Comentario;



class Evento{
    
    private $cd_evento;
    private $nm_evento;
    private $estatus_evento;
    private $preco_evento;
    private $class_evento;
    private $data_inicio;
    private $data_final;
    private $hora_inicio;
    private $hora_final;
    private $tipo_evento;
    private $nm_local;
    private $nm_loc_rua;
    private $nr_loc_cep;
    private $numero;
    private $nm_loc_bairro;
    private $nm_cidade;
    private $desc_evento;
    private $nm_razaosocial;
    private $diretorio;
    protected $comentarios;
    private $con;

    function __construct(){
        $this->con = new ClassConexao();
        $this->comentarios = new Comentario();
    }

    function getCd_evento() {return $this->cd_evento;}
    function getNm_evento() {return $this->nm_evento;}
    function getEstatus_evento(){return $this->estatus_evento;}
    function getPreco_evento(){return $this->preco_evento;}
    function getClass_evento(){return $this->class_evento;}
    function getData_inicio(){return $this->data_inicio;}
    function getData_final(){return $this->data_final;}
    function getHora_inicio(){return $this->hora_inicio;}
    function getHora_final(){return $this->hora_final;}
    function getTipo_evento() {return $this->tipo_evento;}
    function getNm_local() {return $this->nm_local;}
    function getNm_loc_rua(){return $this->nm_loc_rua;}
    function getNr_loc_cep(){return $this->nr_loc_cep;}
    function getNumero(){return $this->numero;}
    function getNm_loc_bairro(){return $this->nm_loc_bairro;}
    function getNm_cidade(){return $this->nm_cidade;}
    function getDesc_evento() {return $this->desc_evento;}
    function getNm_razaosocial(){return $this->nm_razaosocial;}
    function getDiretorio(){return $this->diretorio;}

    function setCd_evento($cd_evento){$this->cd_evento = $cd_evento;}
    function setNm_evento($nm_evento){$this->nm_evento = $nm_evento;}
    function setEstatus_evento($estatus_evento){$this->estatus_evento = $estatus_evento;}
    function setPreco_evento($preco_evento){ $this->preco_evento = $preco_evento;}
    function setClass_evento($class_evento){$this->class_evento = $class_evento;}
    function setData_inicio($data_inicio){ $this->data_inicio = $data_inicio;}
    function setData_final($data_final) {$this->data_final = $data_final;}
    function setHora_inicio($hora_inicio) {$this->hora_inicio = $hora_inicio;}
    function setHora_final($hora_final) {$this->hora_final = $hora_final;}
    function setTipo_evento($tipo_evento) { $this->tipo_evento = $tipo_evento;}
    function setNm_local($nm_local) { $this->nm_local = $nm_local;}
    function setNm_loc_rua($nm_loc_rua) {$this->nm_loc_rua = $nm_loc_rua;}
    function setNr_loc_cep($nr_loc_cep) {$this->nr_loc_cep = $nr_loc_cep;}
    function setNumero($numero){$this->numero = $numero;}
    function setNm_loc_bairro($nm_loc_bairro) { $this->nm_loc_bairro = $nm_loc_bairro;}
    function setNm_cidade($nm_cidade) {$this->nm_cidade = $nm_cidade;}
    function setDesc_evento($desc_evento) {$this->desc_evento = $desc_evento;}
    function setNm_razaosocial($nm_razaosocial){$this->organizador = $organizador;}
    function setDiretorio($diretorio){$this->diretorio = $diretorio;}
    


 
   //Métodos
    
    public function exibirEventos(){  
        try{
        $this->con->conectar()->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
           $res = $this->con->conectar()->prepare("call read_eventos();");
           $res->execute();
           
           $eventos = [];
           while($evento = $res->fetchObject('App\Model\Evento')){
               $eventos[] = $evento;
           }
       
          return $eventos;
        }
        catch (PDOException $ex){
            echo "ERRO ao retornar os valores de evento".$ex->getMessage();
        }
        
    }
       
    public function exibirEvento($id){
        try{  
           $this->con->conectar()->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
           $res = $this->con->conectar()->prepare("CAll read_evento($id);");
           $res->execute();
        
            $eventos = [];

            while($evento = $res->fetchObject('App\Model\Evento')){
                $eventos[] = $evento;
            }

            return $eventos;
        }
        
        catch (PDOException $ex){
            echo "ERRO ao retornar os valores de evento".$ex->getMessage();
        }
    }

    public function alterarEvento($id){
        try
        {
            $this->con->conectar()->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $up = $this->con->conectar()->prepare("UPDATE tb_evento SET nm_evento = :nm_evento, class_evento = :class_evento, preco_evento = :preco_evento, estatus_evento = :estatus_evento WHERE cd_evento = :id_evento;
            UPDATE tb_data_evento SET data_inicio = :data_inicio, data_final = :data_final WHERE cd_data_evento = :id_evento;
            UPDATE tb_horario_evento SET hora_inicio = :hora_inicio, hora_final = :hora_final WHERE cd_horario_evento = :id_evento;
            UPDATE evento_descricao SET tipo_evento = :tipo_evento, desc_evento = :desc_evento WHERE cd_desc = :id_evento;
            UPDATE evento_localizacao SET nm_local = :nm_local WHERE cd_localizacao = :id_evento;
            UPDATE localizacao_endereco SET nm_loc_rua = :nm_loc_rua, nr_loc_cep = :nr_loc_cep, numero = :numero WHERE cd_loc_end =:id_evento;
            UPDATE localizacao_bairro SET nm_loc_bairro = :nm_loc_bairro WHERE cd_loc_bairro = :id_evento;
            UPDATE localizacao_cidade SET nm_cidade = :nm_cidade WHERE cd_loc_cidade = :id_evento;
            COMMIT
            ");
           
            $up->bindParam(':id_evento', $id, \PDO::PARAM_INT); 
            $up->bindParam(':nm_evento', $this->nm_evento, \PDO::PARAM_STR);
            $up->bindParam(':class_evento', $this->class_evento, \PDO::PARAM_STR);
            $up->bindParam(':preco_evento', $this->preco_evento, \PDO::PARAM_STR);
            $up->bindParam(':estatus_evento', $this->estatus_evento, \PDO::PARAM_INT);
            $up->bindParam(':data_inicio', $this->data_inicio, \PDO::PARAM_STR);
            $up->bindParam(':data_final', $this->data_final, \PDO::PARAM_STR);
            $up->bindParam(':hora_inicio', $this->hora_inicio, \PDO::PARAM_STR);
            $up->bindParam(':hora_final', $this->hora_final, \PDO::PARAM_STR);
            $up->bindParam(':tipo_evento', $this->tipo_evento, \PDO::PARAM_STR);
            $up->bindParam(':desc_evento', $this->desc_evento, \PDO::PARAM_STR);
            $up->bindParam(':nm_local', $this->nm_local, \PDO::PARAM_STR);
            $up->bindParam(':nm_loc_rua', $this->nm_loc_rua, \PDO::PARAM_STR);
            $up->bindParam(':nr_loc_cep', $this->nr_loc_cep, \PDO::PARAM_STR);
            $up->bindParam(':numero', $this->numero, \PDO::PARAM_INT);
            $up->bindParam(':nm_loc_bairro', $this->nm_loc_bairro, \PDO::PARAM_STR);
            $up->bindParam(':nm_cidade', $this->nm_cidade, \PDO::PARAM_STR);
           
            $up->execute();
            header("location:?alterado");
        }
        catch(PDOException $ex){
            echo "Erro ao atualizar o evento ".$ex->getMessage();
        }
    }


    public function pesquisaEvento($pesquisa){
        try{
            $this->con->conectar()->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $sql = "CALL pesquisaEvento(:pesquisa)";
            $search = $this->con->conectar()->prepare($sql);
            $search->bindParam(':pesquisa', $pesquisa, \PDO::PARAM_STR);
            $search->execute();
            $rows = $search->rowCount();
            
            $eventos = [];

            while ($e = $search->fetchObject('App\Model\Evento')){
                $eventos[] = $e;
            }
           
            return $eventos;
        }
        catch(PDOException $ex){
            echo "Erro ao retornar os registros de pesquisa".$ex->getMessage();
        }
    }
}


?>