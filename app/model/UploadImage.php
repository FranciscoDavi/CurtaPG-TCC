<?php

namespace App\Model;
use App\Model\ClassConexao;


class UploadImage{

        private $con;
		private $arquivo;
        private $nm_imagem;
        private $diretorio;
        private $erros = [];

		function __construct(){
			$this->con = new ClassConexao();
			if(array_key_exists('arquivo', $_FILES))
            	$this->arquivo = $_FILES['arquivo'];
        }
        
        public function getArquivo(){
            return $this->arquivo;
        }

        public function setArquivo($arquivo){
            $this->arquivo = $arquivo;
        }

        public function getNm_imagem(){
            return $this->nm_imagem;
        }

        public function setNm_imagem($nm_imagem){
            $this->nm_imagem = $nm_imagem;
        }

        public function getDiretorio(){
            return $this->diretorio;
        }

        public function setDiretorio($diretorio){
            $this->diretorio = $diretorio;
        }

		public function inserirImagem($id){
			try{
				if(!empty($this->arquivo['name'])){

					$ext = pathinfo($this->arquivo['name']);
					$this->nm_imagem = $id.".".$ext['extension'];
                    $diretorio = DIRREQ.'public/img/img-eventos/'.$this->nm_imagem;
                    
					move_uploaded_file($this->arquivo['tmp_name'], $diretorio);

					$caminho_img = 'img-eventos/'.$this->nm_imagem;
					$ins = $this->con->conectar()->prepare("INSERT INTO img_evento (idImg, nm_arquivo, diretorio, id_evento) SELECT MAX(idImg) + 1, :nm_arquivo, :diretorio, :id FROM img_evento;");
					$ins->bindParam(':nm_arquivo', $this->nm_imagem, \PDO::PARAM_STR);
					$ins->bindParam(':diretorio', $caminho_img, \PDO::PARAM_STR);
					$ins->bindParam(':id', $id, \PDO::PARAM_INT);
					$ins->execute();

				}
				return $this->erros;
			}
			catch(PDOException $ex){
				echo "Erro ao inserir a Imagem".$ex->getMessage();
			}
		}

		public function validarImagem(){
			if(!empty($this->arquivo['tmp_name'])){
				$this->erros = ['type' => '', 'size' => '', 'erro' => false];

				//valida o tipo do arquivo.
				if(!preg_match('/^(image)\/(jpeg|png)$/', $this->arquivo["type"])){
					$this->erros['type'] = "A imagem deve esta em formato jpeg ou png";
					$this->erros['erro'] = true;
				}

				//valida o tamanho do arquivo.
				if($this->arquivo['size'] > 1000000){
					$this->erros['size'] = "O tamanho da imagem deve ter no maximo 1mb";
					$this->erros['erro'] = true;
				}
				
				$dimensoes = getimagesize($this->arquivo['tmp_name']);
				if($dimensoes[0] < 800 || $dimensoes[1] < 500){
					$this->erros['dimension'] = "A dimensão da imagem deve ser no minimo 600x800";
					$this->erros['erro'] = true;
				}
			}

			return $this->erros;
		}


    
}
?>