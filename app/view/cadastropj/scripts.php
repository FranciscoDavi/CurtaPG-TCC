<script src="<?php echo DIRJS.'jquery.mask.min.js';?>"></script>
<script src="<?php echo DIRJS.'mascaras.js';?>"></script>
<script src="<?php echo DIRJS.'validacoes.js';?>"></script>


<script>
    function validaSenha(){
        var senha = document.getElementById("isenha").value;
        var senha_confirm = document.getElementById("c_senha").value;

        if(senha != senha_confirm){
            document.getElementById('erro-senha').innerHTML = "Senhas não coincidem";
            document.getElementById("c_senha").focus();
            document.getElementById('cadastrar').disabled = true;
        }else{
            document.getElementById('cadastrar').disabled = false;
            document.getElementById('erro-senha').innerHTML = "";
        }
    }
</script>
