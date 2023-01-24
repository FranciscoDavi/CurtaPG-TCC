<?php
namespace App\Model;
use App\Model\Evento;
use App\Model\UploadImage;
use App\Model\ClassConexao;




class ClientePJ{
    
    //Atributos
    private $cd_clientePJ;
    private $nm_razaosocial;
    private $cd_cnpj;
    private $tel_cliente;
    private $email_cliente;
    private $senha_cliente;
    private $nm_rua;
    private $nr_cep;
    private $numero;
    private $nm_bairro;
    private $nm_cidade;
    protected $con;
    public $evento;
    public $imagem;

    //construtor
    function __construct(){
        $this->con = new ClassConexao();
        $this->evento = new Evento();
        $this->imagem = new UploadImage();

    }

    //Getters e Setters
    function getCd_clientePJ(){return $this->cd_clientePJ;}
    function getNm_razaosocial() {return $this->nm_razaosocial;}
    function getCd_cnpj() {return $this->cd_cnpj;}
    function getTel_cliente() {return $this->tel_cliente;}
    function getEmail_cliente() {return $this->email_cliente;}
    function getSenha_cliente(){return $this->senha_cliente;}
    function getNm_rua() {return $this->nm_rua;}
    function getNr_cep() {return $this->nr_cep;}
    function getNumero(){return $this->numero;}
    function getNm_bairro() {return $this->nm_bairro;}
    function getNm_cidade() {return $this->nm_cidade;}
    function setNm_razaosocial($nm_razaosocial){$this->nm_razaosocial = $nm_razaosocial;}
    function setCd_clientePJ($cd_clientePJ){$this->cd_clientePJ = $cd_clientePJ;}
    function setCd_cnpj($cd_cnpj) {$this->cd_cnpj = $cd_cnpj;}
    function setTel_cliente($tel_cliente) {$this->tel_cliente = $tel_cliente;}
    function setEmail_cliente($email_cliente) {$this->email_cliente = $email_cliente;}
    function setSenha_cliente($senha){$this->senha_cliente = sha1($senha);}
    function setNm_rua($nm_rua) {$this->nm_rua = $nm_rua;}
    function setNr_cep($nr_cep) {$this->nr_cep = $nr_cep;}
    function setNumero($numero){$this->numero = $numero;}
    function setNm_bairro($nm_bairro) {$this->nm_bairro = $nm_bairro;}
    function setNm_cidade($nm_cidade) {$this->nm_cidade = $nm_cidade;}
    function setEvento(Evento $evento){$this->evento = $evento;}


    /*
        Metodos    
    */
    // cadastra o usuario
    public function inserirCliente() {
        try{
            $this->con->conectar()->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO cliente_cidade (cd_end_cidade, nm_cidade)
                        SELECT max(cd_end_cidade) + 1, :nm_cidade FROM cliente_cidade;
                    INSERT INTO cliente_bairro (cd_end_bairro, nm_bairro, fk_cd_cidade)
                        SELECT MAX(cd_end_bairro) + 1, :nm_bairro, (SELECT MAX(cd_end_cidade) FROM cliente_cidade) FROM cliente_bairro;
                    INSERT INTO tb_clientepj (cd_clientePJ, nm_razaosocial, cd_cnpj)
                        SELECT MAX(cd_clientePJ) + 1, :nm_razaosocial, :cd_cnpj FROM tb_clientepj;
                    INSERT INTO cliente_endereco (cd_end, nm_rua, nr_cep, fk_cd_bairro, fk_clientepj_end, numero)
                        SELECT MAX(cd_end) + 1, :nm_rua, :nr_cep, (SELECT MAX(cd_end_bairro) FROM cliente_bairro), (SELECT MAX(cd_clientePJ) FROM tb_clientepj), :numero FROM cliente_endereco;
                    INSERT INTO cliente_infos(cd_infocliente, tel_cliente, email_cliente, senha_cliente, fk_cd_cliente_PF, fk_cd_cliente_PJ, permissao)
                        SELECT MAX(cd_infocliente) + 1, :tel_cliente, :email_cliente, :senha_cliente, null, (SELECT MAX(cd_clientePJ) FROM tb_clientepj), 'PJ' FROM cliente_infos;";

            $ins = $this->con->conectar()->prepare($sql);
            $ins->bindParam(':nm_razaosocial', $this->nm_razaosocial, \PDO::PARAM_STR);
            $ins->bindParam(':cd_cnpj', $this->cd_cnpj, \PDO::PARAM_STR);
            $ins->bindParam(':tel_cliente', $this->tel_cliente, \PDO::PARAM_STR);
            $ins->bindParam(':email_cliente', $this->email_cliente, \PDO::PARAM_STR);
            $ins->bindParam(':senha_cliente', $this->senha_cliente, \PDO::PARAM_STR);
            $ins->bindParam(':nm_rua', $this->nm_rua, \PDO::PARAM_STR);
            $ins->bindParam(':nr_cep', $this->nr_cep, \PDO::PARAM_STR);
            $ins->bindParam(':numero', $this->numero, \PDO::PARAM_INT);
            $ins->bindParam(':nm_bairro', $this->nm_bairro, \PDO::PARAM_STR);
            $ins->bindParam(':nm_cidade', $this->nm_cidade, \PDO::PARAM_STR);
            $ins->execute();

            unset($_POST['']);
            header('Location:http://localhost/curtapg/dashboard/logar?cadastrado');
            
        }
        catch (PDOException $ex) {
            echo "Erro ao cadastrar".$ex->getMessage();
        }
        
    }

    public function validarCnpj(){
        try{
           $v = $this->con->conectar()->prepare("CALL verificaCnpj(:cnpj);");
           $v->bindParam(':cnpj', $this->cd_cnpj, \PDO::PARAM_STR);
           $v->execute();
           $dados = $v->fetchAll();
            
           return $dados[0][2];
    
        }
        catch(PDOExeception $ex){

        }
    }

    public function validarEmail(){
        try{
           $v = $this->con->conectar()->prepare("CALL verificaEmail(:email);");
           $v->bindParam(':email', $this->email_cliente, \PDO::PARAM_STR);
           $v->execute();
           $dados = $v->fetchAll();
            
           return $dados[0][2];
           
        }
        catch(PDOExeception $ex){

        }
    }
   
    //Cadastra Evento
    public function criarEvento(){
        try{

            $ins = $this->con->conectar()->prepare(
                "INSERT INTO localizacao_cidade  (cd_loc_cidade, nm_cidade)
                    SELECT MAX(cd_loc_cidade) +1, '{$this->evento->getNm_cidade()}' FROM localizacao_cidade;
                INSERT INTO localizacao_bairro (cd_loc_bairro, nm_loc_bairro, fk_cd_loc_cidade)
                    SELECT MAX(cd_loc_bairro) + 1, '{$this->evento->getNm_loc_bairro()}', (SELECT MAX(cd_loc_cidade) FROM localizacao_cidade) FROM localizacao_bairro;
                INSERT INTO evento_localizacao (cd_localizacao, nm_local, status_local)
                    SELECT MAX(cd_localizacao) + 1, '{$this->evento->getNm_local()}', null FROM evento_localizacao;
                INSERT INTO localizacao_endereco (cd_loc_end, nm_loc_rua, nr_loc_cep, fk_cd_loc_bairro, fk_cd_loc_localizacao, numero)
                    SELECT MAX(cd_loc_end) + 1, '{$this->evento->getNm_loc_rua()}', '{$this->evento->getNr_loc_cep()}', (SELECT MAX(cd_loc_bairro) FROM localizacao_bairro), (SELECT MAX(cd_localizacao)  FROM evento_localizacao), {$this->evento->getNumero()} FROM localizacao_endereco;
                INSERT INTO evento_descricao (cd_desc, desc_evento, tipo_evento) 
                    SELECT MAX(cd_desc) +1, '{$this->evento->getDesc_evento()}', '{$this->evento->getTipo_evento()}' FROM evento_descricao;
                INSERT INTO tb_evento (cd_evento, nm_evento, estatus_evento, preco_evento, class_evento, fk_cd_desc)
                    SELECT MAX(cd_evento) + 1, '{$this->evento->getNm_evento()}', '{$this->evento->getEstatus_evento()}', '{$this->evento->getPreco_evento()}', '{$this->evento->getClass_evento()}', (SELECT MAX(cd_desc) FROM evento_descricao) FROM tb_evento;
                INSERT INTO data_evento (cd_data, fk_cd_evento, fk_cd_localizacao)
                    SELECT MAX(cd_data) + 1, (SELECT MAX(cd_evento)  FROM tb_evento), (SELECT MAX(cd_localizacao) FROM evento_localizacao) FROM data_evento;
                INSERT INTO tb_data_evento (cd_data_evento, data_inicio, data_final, fk_data_evento)
                    SELECT MAX(cd_data_evento) + 1, {$this->evento->getData_inicio()}, {$this->evento->getData_final()} , (SELECT MAX(cd_evento) FROM tb_evento) FROM tb_data_evento; 
                INSERT INTO tb_horario_evento (cd_horario_evento, hora_inicio, hora_final, fk_hora_evento)
                    SELECT MAX(cd_horario_evento) +1, {$this->evento->getHora_inicio()}, '{$this->evento->getHora_final()}',(SELECT MAX(cd_evento) FROM tb_evento) FROM tb_horario_evento;
                INSERT INTO evento_cliente (cd_evento_cliente, organizador, evento)
                    SELECT MAX(cd_evento_cliente) + 1, {$this->getCd_clientePJ()}, (SELECT MAX(cd_evento) FROM tb_evento) FROM evento_cliente;
                COMMIT
            ");
            $ins->execute();
            
            $this->inserir_imagem_evento();

            unset($_POST['']);
            header("Location:http://localhost/curtapg/dashboard/cadastroEvento?cadastrado");
    
        }
        catch(PDOException $ex){
            echo "Erro ao cadastrar evento: ".$ex->getMessage();
        }
    }
    //insere a imagem do evento
    public function inserir_imagem_evento(){
        try{
            $id_evento = $this->con->conectar()->prepare("SELECT MAX(cd_evento) from tb_evento;");
            $id_evento->execute();
            $id = $id_evento->fetch();
            $this->imagem->inserirImagem($id[0]);
        }
        catch(PDOException $ex){
            echo "Erro ao cadastrar dados da imagem: ".$ex->getMessage();
        }
    }

    // exibir eventos do cliente
    public function exibir_eventos_cliente($id){
        try{
            $this->con->conectar()->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $ec = $this->con->conectar()->prepare("CALL exibir_eventos_cliente($id)");
            $ec->execute();

            $evento = [];
        
            while ($e = $ec->fetchObject('App\Model\Evento')){
                $evento[] = $e;
            } 
            return $evento;
        }
        catch(PDOException $ex){
            echo "Erro ao exibir os eventos do cliente".$ex->getMessage();
        }
    }
    
    //loga o cliente
    public function logarCliente(){
        try{
            $this->con->conectar()->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $login = $this->con->conectar()->prepare("SELECT pj.cd_clientePJ, pj.nm_razaosocial, info.senha_cliente, info.email_cliente, info.permissao from tb_clientepj as pj join cliente_infos as info on info.fk_cd_cliente_PJ = pj.cd_clientePJ where info.email_cliente = :email and info.senha_cliente = :senha;");
            $login->bindParam(':email', $this->email_cliente, \PDO::PARAM_STR);
            $login->bindParam(':senha', $this->senha_cliente, \PDO::PARAM_STR);
            $login->execute();

            if($login->rowCount() == 0){
                \header("Location:http://localhost/curtapg/dashboard/logar?error");
            }
            else{
                session_start();
                $res = $login->fetchAll();
                $_SESSION['login']= true;
                $_SESSION['id'] = $res['cd_clientePJ'];
                $_SESSION['nome']= $res['nm_razaosocial'];
                $_SESSION['email'] = $res['email_cliente'];
                $_SESSION['nv_acesso'] = $res['permissao'];
                \header("Location:http://localhost/curtapg/dashboard/home");
            }
        }catch(PDOException $e){
            return 'Error:'.$e->getMessage();
        }

    }

    }
?>