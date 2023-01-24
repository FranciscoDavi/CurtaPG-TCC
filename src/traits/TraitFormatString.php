<?php

namespace Src\Traits;
use DateTime;

    trait TraitFormatString{
        
        //formata a data para a inserção no banco de dados
        function formatDateDB($data){

            if($data == ""){
                $data  = "";
            }
            else{
                $dados = explode("/", $data);
                if (count($dados) != 3)
                    return $data;
                else
                $data = $dados[2].$dados[1].$dados[0]; 

            }
            return $data;
        }

        //Formata a data para exibição, fornecendo a data e o modo de visualizacao (1 para d/m ou 2 para d/m/Y).
        function formatDateView($data, $op){
            if($data == ""){
                return "";
            }
            switch($op){
                case 1: $objeto_data = DateTime::createFromFormat('Y-m-d', $data);
                         return $objeto_data->format('d/m');break;
                case 2:
                        $objeto_data = DateTime::createFromFormat('Y-m-d', $data);
                        return $objeto_data->format('d/m/Y');break;
            }
    
        }

        //Formata a hora para inserção no banco de dados
        function formatTimeDB($hora){
            if($hora == ""){
                return "";
            }

            $h = explode(":", $hora);
            $aux = '00';
            $hora_banco = $h[0].$h[1].$aux;
            return $hora_banco;
        }

        //formata a hora para exibição
        function formatTimeView($hora){
            if($hora == ""){
                return "";
            }

            $hr = explode(":", $hora);
            $aux = ":";
            $hr = $hr[0].$aux.$hr[1];
            return $hr;
        }

        //formata campos de moeda para visualização
        function formatMoneyView($valor){
            if($valor == 0){
                return "Gratuito";
            }
        
            $aux = "R$";
            $aux2 = ",";
            $v = explode('.', $valor);
            $v = $aux.$v[0].$aux2.$v[1];
        
            return $v;
    
        }

        //formata estado do evento para exibição
        function formatStatusView($status){
            switch($status){
                case 0: $s = "Reprovado";break;
                case 2: $s = "Divulgado";break;
                case 3: $s = "Cancelado";break;
                case 4: $s = "Pendente de Aprovação";break;
                case 5: $s = "Pendente de Alteração";break;
                case 6: $s = "Pendente de Cancelamento";break;
            }
            return $s;
        }

        //referencia a classificação indicativa para exibição por suas respectivas imagens
        function formatParentalRatingView($classificacao){
            switch ($classificacao) {
                case 10: $dir_imagem = DIRIMG.'icons-class/10.png';break;
                case 12: $dir_imagem = DIRIMG.'icons-class/12.png';break;
                case 14: $dir_imagem = DIRIMG.'icons-class/14.png';break;
                case 16: $dir_imagem = DIRIMG.'icons-class/16.png';break;
                case 18: $dir_imagem = DIRIMG.'icons-class/18.png';break;
                default: $dir_imagem = DIRIMG.'icons-class/livre.png';break;
            }
            return $dir_imagem;
        }

    }








?>