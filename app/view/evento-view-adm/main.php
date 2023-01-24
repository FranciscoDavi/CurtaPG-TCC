<?php 

    $eventos = $this->dados;
?>


<div class="body-dash">
		<nav class="nav-extended  z-depth-1 white">
			<div class="nav-content ">
				<ul class="tabs tabs-transparent ">
					<a href="#" data-target="slide-out" class="sidenav-trigger left"><i class="material-icons large">menu</i></a>
					<li class="tab"><a href="r=eventos_adm&all">Todos</a></li>
					<li><a href="?r=eventos_adm&pd" class="black-text">Pendentes de Aprovação</a></li>
					<li><a href="?r=eventos_adm&pa" class="black-text">Pendentes de Alteração</a></li>
					<li><a href="?r=eventos_adm&pc" class="black-text">Pendentes de Cancelamento</a></li>
				</ul>
			</div>
		</nav>
		<div class="row white">
			<?php foreach($eventos as $evento):?>
				<div class="col s12 titulo">
					<div class="row">
						<div class="col s1">
							<a class="btn  waves-effect  blue z-depth-0" href="eventos_adm.php?pd"> <i class="material-icons">keyboard_return</i></a>
						</div>
					</div>
				</div>
				<!-- Informações do evento-->
				<div class="col  s12 m12 l5">
					<ul class="collection">
						<li class="collection-item"><strong><?php echo $evento->getNm_evento();?> </strong></li>
						<li class="collection-item"><?php echo $evento->getPreco_evento();?></li>
						<li class="collection-item"><?php echo $evento->getTipo_evento();?></li>
						<li class="collection-item"><?php echo $evento->getClass_evento();?></li>
						<li class="collection-item"><?php echo $evento->getData_inicio()." a ".$evento->getData_final();?></li>
						<li class="collection-item"><?php echo $evento->getHora_inicio(). " a ". $evento->getHora_final();?></li>
						<li class="collection-item"><?php echo $evento->getNm_local();?></li>
						<li class="collection-item"><?php echo $evento->getNm_loc_rua().', '.$evento->getNumero() .' - '.$evento->getNr_loc_cep().', '.$evento->getNm_loc_bairro();?></li>
					</ul>
				</div>
				<!-- Imagem do evento -->
				<div class="col s12 m12 l7 img">
					<div class="row">
						<div class="col s12">
							<img class="responsive-img" src="<?php echo DIRIMG.$evento->getDiretorio();?>">
						</div>
					</div>
				</div>
				<div class="col s12 m12">
					<ul class="collection">
						<li class="collection-item desc">Descrição:
							<p><?php echo $evento->getDesc_evento();?></p>
						</li>
					</ul>
				</div>
			<?php endforeach;?>

		</div>
				
					
		</div>
	</div>