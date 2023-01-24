<div>
        <ul id="slide-out" class=" sidenav sidenav-fixed white">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img class="responsive-img"src="<?php echo DIRIMG.'img-layout/background-curta.png';?>">
                    </div>
                   <img class="circle" src="<?php echo DIRIMG.'img-layout/default-user-img.jpg';?>">
                    <a href="#name"><span class="white-text name"><?php if(array_key_exists('nome', $_SESSION)) echo $_SESSION['nome'];?></span></a>
                    <a href="#email"><span class="white-text email "><?php if(array_key_exists('email',$_SESSION)) echo $_SESSION['email'];?></span></a>
                </div>
            </li>
            <ul class="collapsible expandable">
                <li>
                  <div class="collapsible-header center" ><i class="material-icons">home</i>Inicio</div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">event</i> Eventos <i class="material-icons tiny">arrow_drop_down</i></div>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="http://localhost/curtapg/dashboard/cadastroEvento">Novo evento</a></li>
                            <li><a href="http://localhost/curtapg/dashboard/meusEventos">Seus Eventos</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">trending_up</i>Estatísticas</div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">people</i>Clientes</div>
                </li>
                <li><div class="divider"></div></li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">settings_applications</i>Configurações</div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">meeting_room</i>Sair</div>
                </li>
            </ul>
            
        </ul>
    </div>