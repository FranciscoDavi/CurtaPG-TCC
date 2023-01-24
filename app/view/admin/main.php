<?php
    $eventos = $this->dados;
?>

<div class="body-dash">
	<nav class="nav-extended  z-depth-0">
		<div class="nav-content ">
			<ul class="tabs tabs-transparent white nav-adm ">
				<a href="#" data-target="slide-out" class="sidenav-trigger left"><i class="material-icons large">menu</i></a>
				<li class="tab"><a class="black-text" href="<?php echo DIRPAGE.'admin/eventos'; ?>">Todos</a></li>
				<li class="tab"><a class="black-text" href="<?php echo DIRPAGE.'admin/pendentesAprovacao'; ?>">Pendentes de Aprovação</a></li>
				<li class="tab"><a class="black-text" href="<?php echo DIRPAGE.'admin/pendentesAlteracao'; ?>">Pendentes de Alteração</a></li>
				<li class="tab"><a class="black-text" href="<?php echo DIRPAGE.'admin/pendentesCancelamento'; ?>">Pendentes de Cancelamento</a></li>
			</ul>
		</div>
	</nav>
        <div class="row">    
        	<div class="col s10 offset-s1">
        		<div class="row pesquisa">
        			<form>
        				<div class="col s8 input-field">
        					<input type="search" name="pesquisa">
        				</div>
        				<div class="col s3 input-field">
        					<select name="" class=" pesquisa-select">
        						<option disabled>Estado</option>
        						<option>Divulgado</option>
        						<option>Reprovado</option>
        						<option>Cancelado</option>
        						<option>Pendente de Aprovação</option>
        						<option>Pendente de Alteração</option>
        						<option>Pendente de Cancelamento</option>
        					</select>
        				</div>
        				<div class="col s1 input-field">
                            <button class="btn waves-effect z-depth-0 btn-pesquisa light-blue accent-4"><i class="material-icons">search</i></button>
        				</div>
        			</form>
        		</div>
        	</div>
            <div class="col s12">
            	<table class="responsive-table highlight">
            		<th>Código<i class="material-icons right">arrow_drop_down</i></th>
            		<th>Nome<i class="material-icons right">arrow_drop_down</i></th>
            		<th>Organizador<i class="material-icons right">arrow_drop_down</i></th>
            		<th>Estado<i class="material-icons right">arrow_drop_down</i></th>
            		<th>Opções</th>
                    <?php foreach($eventos as $evento) : ?>
						<tr class="center">	
							<td><?php echo $evento->getCd_evento();?></td>	
							<td><?php echo $evento->getNm_evento();?></td>	
							<td><?php echo $evento->getNm_razaosocial();?></td>	
							<td><?php echo $this->formatDateDB($evento->getEstatus_evento());?></td>
                            <td>
								<a class='dropdown-trigger btn white z-depth-0' href='#' data-target='dropdown1'><i class="material-icons black-text">more_vert</i></a>                       
                            </td>
							<ul id='dropdown1' class='dropdown-content'>
								<li><a href="view/<?php echo $evento->getCd_evento();?>"><i class="material-icons">visibility</i>Ver detalhes</a></li>
                            </ul>                     
						</tr>
					<?php endforeach;?>
				</table>
            </div>
        </div>