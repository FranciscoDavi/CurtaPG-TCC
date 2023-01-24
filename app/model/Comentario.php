<?php
	
    namespace App\Model;
    use App\Model\ClassConexao;

	class Comentario{

		private $id_comentario;
		private $comentario;
		private $dt_comentario;
		private $hr_comentario;
		private $nm_social;
		private $evento;
		private $usuario;
		private $con;

		function __construct(){
			$this->con = new ClassConexao();
		}

		public function getId_comentario(){
			return $this->id_comentario;
		}

		public function setId_comentario($id_comentario){
			$this->id_comentario = $id_comentario;
		}

		public function getComentario(){
			return $this->comentario;
		}

		public function setComentario($comentario){
			$this->comentario = $comentario;
		}

		public function getDt_comentario(){
			return $this->dt_comentario;
		}

		public function setDt_comentario($dt_comentario){
			$this->dt_comentario = $dt_comentario;
		}

		public function getHr_comentario(){
			return $this->hr_comentario;
		}

		public function setHr_comentario($hr_comentario){
			$this->hr_comentario = $hr_comentario;
		}

		public function getNm_social(){
			return $this->nm_social;
		}

		public function setNm_social($nm_social){
			$this->nm_social = $nm_social;
		}

		// Métodos
		public function buscarComentarios($id_evento){

			try{
				$this->con->conectar()->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				$sql = "SELECT ec.id_comentario, ec.comentario, ec.dt_comentario, ec.hr_comentario, pf.nm_social FROM evento_comentarios as ec join tb_clientePF as pf on ec.usuario = pf.cd_clientePF WHERE ec.evento = $id_evento order by ec.dt_comentario DESC";

				$com = $this->con->conectar()->prepare($sql);
				$com->execute();

				$comentarios = [];

				while ($comentario = $com->fetchObject('App\Model\Comentario')){
               		$comentarios[] = $comentario;
               	}

               return $comentarios;

            }
           catch(PDOException $ex){
           	echo "Erro ao retornar os comentarios do evento: ".$ex->message();
           }
		}

		public function inserirComentario($id_evento, $id_user){
			try{
				$this->con->conectar()->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO evento_comentarios(id_comentario, comentario, dt_comentario, hr_comentario, usuario, evento)
						SELECT MAX(id_comentario) + 1, :comentario, :dt_comentario, :hr_comentario, :usuario, :evento FROM evento_comentarios;";

				$com = $this->con->conectar()->prepare($sql);
				$com->bindParam(':comentario', $this->comentario, \PDO::PARAM_STR);
				$com->bindParam(':dt_comentario', $this->dt_comentario, \PDO::PARAM_STR);
				$com->bindParam(':hr_comentario', $this->hr_comentario, \PDO::PARAM_STR);
				$com->bindParam(':usuario', $id_user, \PDO::PARAM_INT);
				$com->bindParam(':evento', $id_evento, \PDO::PARAM_INT);
				$com->execute();

				header("location:?r=exibir_evento&id=$id_evento");
			}
			catch(PDOException $ex){
				echo "Erro ao inserir comentário! ".$ex->getMessage();
			}
		}

		public function excluirComentario($id_comentario, $id_evento){

			try{
				$this->con->conectar()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql = "DELETE FROM evento_comentarios WHERE id_comentario = :id";
				$com = $this->con->conectar()->prepare($sql);
				$com->bindParam(':id', $id_comentario, PDO::PARAM_INT);
				$com->execute();

				header("location:?r=exibir_evento&id=$id_evento");
			}
			catch(PDOException $ex){
				echo "Erro ao excluir evento: ".$ex->getMessage();
			}
		}
	}

	
?>