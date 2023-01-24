<?php
    $eventos = $this->dados;
?>

<body>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <div class="body-dash">
    	<div class="row">
            <div class="col s12">
                <table>
                    <th>Nome do evento</th>
                    <th>Estado do evento</th>
                    <th>Opções</th>
                    <?php foreach($eventos as $evento) :?>
                        <tr>
                            <td><?php echo $evento->getNm_evento();?></td>
                            <td><?php echo $evento->getEstatus_evento();?></td>
                            <td><a class='dropdown-trigger btn white z-depth-0' href='#' data-target='dropdown1'><i class="material-icons black-text">more_vert</i></a></td>                        
                            <ul id='dropdown1' class='dropdown-content'>
                                <li><a href="<?php echo DIRPAGE.'dashboard/visualizar/'.$evento->getCd_evento();?>"><i class="material-icons">visibility</i>Ver detalhes</a></li>
                                <li><a href="<?php echo DIRPAGE.'dashboard/alterar/'.$evento->getCd_evento();?>"><i class="material-icons">edit</i>Solicitar Ateração</a></li>
                                <li><a href="<?php echo DIRPAGE.'dashboard/cancelar/'.$evento->getCd_evento();?>"><i class="material-icons">close</i>Solicitar Cancelamento</a></li>
                            </ul>
                        </tr>
                    <?php endforeach;?>
                </table>
            </div>
    	</div>
    </div>
</body>