

<div class="row">
    <div class="col s12 l8 offset-l2 white">
        <form method="POST" action="<?php echo DIRPAGE.'dashboard/cadastroCliente';?>">
            <div class="row">
                <div class="col s12 center">
                    <h4>Bem vindo ao Curt'a PG!</h4>
                    <p>Cadastre-se para divulgar seu primeiro evento</p>
                </div>
                <div class="col s12 center">
                    <?php if(array_key_exists('error', $_GET)):?>
                        
                    <?php endif;?>
                </div>
                <div class="input-field col s6 l6">
                    <input id="nome" name="nm_razaosocial" type="text"  value="<?php if(array_key_exists('nm_razaosocial', $_POST)) { echo $_POST['nm_razaosocial'];}?>" required>
                    <label for="nome">Nome de Usuario</label>
                    <span class="helper-text"></span>
                </div>

                <div class="input-field col s6 l6">
                    <input id="cnpj" name="cd_cnpj" type="text" class="validate" value="<?php if(array_key_exists('cd_cnpj', $_POST)) { echo $_POST['cd_cnpj'];}?>" required>
                    <label for="cnpj">CNPJ</label>
                    <span class="helper-text red-text" id="erro-cnpj"></span>
                </div>

                <div class="input-field col  s7 l6">
                    <input id="email" name="email_cliente" type="email" class="validate" value="<?php if(array_key_exists('email_cliente', $_POST)) { echo $_POST['email_cliente'];}?>" required>
                    <label for="email">Email</label>
                    <span  class="helper-text red-text" id="erro-email"></span>
                </div>

                <div class="input-field col s5 l3">
                    <input id="tel" name="tel_cliente" type="text" value="<?php if(array_key_exists('tel_cliente', $_POST)){ echo $_POST['tel_cliente'];}?>" required>
                    <label for="tel">Telefone</label>
                    <span class="helper-text"></span>
                </div>

                <div class="input-field col s5 l3">
                    <input id="cep" name="nr_cep" type="text"  onchange="pesquisacep(cep.value);" value="<?php if(array_key_exists('nr_cep', $_POST)) { echo $_POST['nr_cep'];}?>" required>
                    <label for="cep">CEP</label>
                    <span class="helper-text"></span>
                </div>

                <div class="input-field col s7 l4">
                    <input id="rua" name="nm_rua" type="text"  value="<?php if(array_key_exists('nm_rua', $_POST)) { echo $_POST['nm_rua'];}?>" required>
                    <label for="rua" class="active">Endereço</label>
                    <span class="helper-text"></span>
                </div>

                <div class="input-field col s4 l2">
                    <input id="num" name="numero" type="number"  value="<?php if(array_key_exists('numero', $_POST)) { echo $_POST['numero'];}?>" required>
                    <label for="num">N°</label>
                    <span class="helper-text"></span>
                </div>
        
                <div class="input-field col s4 l3">
                    <input id="bairro" name="nm_bairro" type="text"  value="<?php if(array_key_exists('nm_bairro', $_POST)) { echo $_POST['nm_bairro'];}?>" required>
                    <label for="bairro" class="active">Bairro</label>
                    <span class="helper-text"></span>
                </div>

                <div class="input-field col s4 l3">
                    <input id="cidade" name="nm_cidade"type="text"  value="<?php if(array_key_exists('nm_cidade', $_POST)) { echo $_POST['nm_cidade'];}?>" required>
                    <label for="cidade" class="active">Cidade</label>
                    <span class="helper-text"></span>
                </div>
                <div class="input-field col s6 l6">
                    <input id="isenha" name="senha"type="password"  onchange="validaSenha()" required>
                    <label for="isenha">Senha</label>
                    <span class="helper-text"></span>
                </div>
                <div class="input-field col s6 l6">
                    <input id="c_senha" name="senha_confirma" type="password"   onchange="validaSenha()" required>
                    <label for="c_senha">Confirmar Senha</label>
                    <span class="helper-text" id="erro-senha"></span>
                </div>
                <div class="input-field col s12 center">
                    <button type="submit" id="cadastrar" class="btn waves-effect light-blue accent-4">Cadastrar</button>
                </div>

            </div> 
        </form>
    </div>
</div>