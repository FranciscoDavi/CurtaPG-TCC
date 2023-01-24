<div>
        <ul id="slide-out" class=" sidenav sidenav-fixed white">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img class="responsive-img"src="assets/_img/background-curta.png">
                    </div>
                   <img class="circle" src="assets/_img/default-user-img.jpg">
                    <a href="#name"><span class="white-text name">Administrador</span></a>
                    <a href="#email"><span class="white-text email "></span></a>
                </div>
            </li>
            <ul class="collapsible expandable">
                <li>
                  <div class="collapsible-header center" onclick="redirecionamento(1)"><i class="material-icons">home</i>Inicio</div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">event</i> Eventos <i class="material-icons tiny">arrow_drop_down</i></div>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="<?php echo DIRPAGE.'admin/eventos';?>">Todos</a></li>
                            <li><a href="<?php echo DIRPAGE.'admin/pendentesAprovacao';?>">Pendentes de Aprovação</a></li>
                            <li><a href="<?php echo DIRPAGE.'admin/pendentesAlteracao';?>">Pendentes de Alteração</a></li>
                            <li><a href="<?php echo DIRPAGE.'admin/pendentesCancelamento';?>">Pendentes de Cancelamento</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header" onclick="redirecionamento(4)"><i class="material-icons">trending_up</i>Estatísticas</div>
                </li>
                <li>
                    <div class="collapsible-header" onclick="redirecionamento(5)"><i class="material-icons">people</i>Usuários</div>
                </li>
                <li><div class="divider"></div></li>
                <li>
                    <div class="collapsible-header" onclick="redirecionamento(6)"><i class="material-icons">settings_applications</i>Configurações</div>
                </li>
                <li>
                    <div class="collapsible-header" onclick="redirecionamento(7)"><i class="material-icons">meeting_room</i>Sair</div>
                </li>
            </ul>
            
        </ul>
    </div>