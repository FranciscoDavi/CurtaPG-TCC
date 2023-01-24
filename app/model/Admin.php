<?php
namespace App\Model;
use App\Model\ClassConexao;
use App\Model\Evento;
use App\Model\ClientePJ;


class Admin{
		private $usuario;
		private $senha;
		private $con;
		public $evento;
		private $clientepj;
		
		function __construct()
		{
			$this->con = new ClassConexao();
            $this->evento = new Evento();
            $this->clientepj = new ClientePJ();
		}

		function logarAdm(){
			$login = $this->con->conectar()->prepare("");
		}

		//retorna todos os eventos
		function exibeEventos(){
			try{
		        $this->con->conectar()->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		        $ec = $this->con->conectar()->prepare("CALL exibe_eventos_adm();");
		        $ec->execute();
		        $eventos = [];
		        while ($e = $ec->fetchObject('App\Model\Evento')){
		            $eventos[] = $e;
		        }
		        
		    return $eventos;
		    }
	        catch(PDOException $ex){
	            echo "Erro ao exibir os eventos".$ex->getMessage();
	        }
		}



		//exibe todos os eventos pendentes
		function exibirEventosPendentes($status){
			try{
		        $this->con->conectar()->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		        $ec = $this->con->conectar()->prepare(
		        	"CALL exibe_eventos_pendentes($status);");
		        $ec->execute();

		        $eventos = [];
		    
		        while ($e = $ec->fetchObject('App\Model\Evento')){
		            $eventos[] = $e;
		        }
		        
		        return $eventos;
		    }
	        catch(PDOException $ex){
	            echo "Erro ao exibir os eventos".$ex->getMessage();
	        }
		}
		//aprova as atividade relacionadas aos eventos
		function aprovaEvento($id, $status){
			try{
				$alt = $this->con->conectar()->prepare('UPDATE tb_evento SET estatus_evento = :status WHERE cd_evento = :id');
				$alt->bindParam(':status', $status, \PDO::PARAM_INT);
				$alt->bindParam(':id', $id, \PDO::PARAM_INT);
				$alt->execute();
			}
			catch(PDOException $ex){
				echo "Erro ao fazer alteração".$ex->getMessage();
			}
		}

	}




?>