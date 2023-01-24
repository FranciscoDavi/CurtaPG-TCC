<div class="container">
    <div class="row">
        <div class="col s12 m6 l6 offset-l3 login z-depth-2 white">
            <!-- seleção de usuarios -->
            <div class="row nav-content">
                <ul class="tabs tabs-transparent login-escolha">
                    <div class="col s6 offset-s6 user center">
                        <li><a href="<?php echo DIRPAGE.'cadastropj'?>">Cadastre-se</a></li>
                    </div>
                </ul>
            </div>
            <div class="row">
                <div class="col s12 titulo-login">
                    <div class="center">
                        <h3>Login</h3>
                        <div><h6 class="red-text"><?php if(array_key_exists('error', $_GET)) echo "Email ou senha incorretos!";?></h6></div>
                    <h6>
                </div>
            </div>
                <!-- formulario de login -->
            <form method="POST" action="<?php echo DIRPAGE.'menu/logar';?>">
                <div class="row">
                    <div class="input-field col s10 m8 offset-s1 offset-m2 form-login">
                        <input id="email" type="email" name="email_cliente">
                        <label for="email">E-mail</label>
                        <span class="helper-text"></span>
                    </div>
                    <div class="input-field col s10 m8 offset-m2 offset-s1 form-login">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="senha_cliente">
                        <span class="helper-text"></span>
                    </div>
                    <div class="col s8 offset-s2 center">
                        <button type="submit" class="waves-effect waves-light btn btn-login light-blue accent-3 z-depth-0 btn-entrar ">Entrar</button>      
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col s6 center">
                    <a href="cadastropj.html" class="">Cadastre-se ja!</a>
                </div>
                <div class="col s6 center">
                    <a href="#" class="">Esqueceu sua senha?</a>
                </div>
            </div>
        </div>
    </div>
</div>