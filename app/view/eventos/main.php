<?php
    $eventos = $this->dados['eventos'];
    $destaques = $this->dados['eventos'];
?>
<div class="dark-curta-gradiant">
    <div class="slider hide-on-med-and-down">
            <ul class="slides banners">
                <li>
                    <img src="<?php echo DIRIMG.'img-layout/01.png';?>"> 
                    <div class="caption left-align">
                        <div class="row ">
                            <div class="col s6">
                                <h4>Fique por dentro dos eventos com o Curt'a PG</h4>
                                <h5 class="light grey-text text-lighten-3">Nossa plataforma preza por trazer todos os eventos regionais de forma simples e detalhada .</h5>
                                <a href="#eventos" class="btn waves-effect waves-light blue  indigo accent-2">Ver Eventos</a>
                            </div> 
                        </div>
                    </div>
                </li>
                <li>
                    <img src="<?php echo DIRIMG.'img-layout/02.png';?>"> 
                    <div class="caption left-align">
                    <div class="row ">
                            <div class="col s6">
                                <h4>Tenha todo o suporte necessário para se tornar um Organizador</h4>
                                <a href="?r=cadastro_clientepj" class="btn waves-effect waves-light blue  indigo accent-2">Divulgue seu evento</a>
                            </div> 
                        </div>
                    </div>
                </li>
            </ul>
    </div>
        
        <div class="row">
            <div class="col s10">
                <h5 class="white-text">Em destaque</h5>
            </div>
            <div class="col s1">
                <span class="btn-slide right show-on-large"  onclick="moverAnterior()"><a onclick="moverProximo()" class="material-icons blue-text large">arrow_back_ios</a></span>
            </div>
            <div class="col s1 ">
                <span class="btn-slide left show-on-large" onclick="moverProximo()"><a class="material-icons blue-text large">arrow_forward_ios</a></span>
            </div>
        </div>
        <div class="row carousel destaques dark-curta1">
            <?php foreach ($destaques as $destaque):?>
                <div class="carousel-item col s12 m6 l3">
                    <div class="card small evento dark-card">
                        <div class="card-image waves-effect waves-block waves-light evento">
                            <a > <img class="responsive-img" src="<?php echo DIRIMG.$destaque->getDiretorio();?>" alt="<?php echo DIRIMG.$destaque->getDiretorio();?>"></a>
                        </div>
                        <div class="card-content evento-desc">
                            <div class="row">
                                <div class="col s11">
                                    <span class="card-title truncate"><?php echo $destaque->getNm_Evento();?></span>
                                </div>
                                <div class="col s1 ">
                                    <span class="card-title activator "><i class="material-icons right blue-text">more_vert</i></span>
                                </div>
                                <div class="col s12">
                                    <p class="text-fluid white-text"><?php echo $destaque->getNm_local().": ".$destaque->getNm_loc_rua()."-".$destaque->getNm_loc_bairro();?></p>
                                </div>
                            </div>  
                        </div>
                        <div class="card-reveal dark-card">
                            <span class="card-title blue-text "><?php echo $destaque->getNm_Evento();?><i class="material-icons right blue-text">close</i></span>
                            <p class="white-text"><?php echo $destaque->getDesc_evento();?>.</p>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    
        <div class="row form-search">
            <form>
                <div class="col s2 l2">
                    <h5 id="eventos" class="white-text  scrollspy">Eventos</h5>
                </div>
                <div class="col m9 l6">
                    <div class="nav-wrapper">
                        <div class="input-field">
                            <input id="search" type="search" name="search" placeholder="Pesquise por seu evento aqui!" required>
                            <label class="label-icon" for="search" ><i class="material-icons small">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </div>
                </div>
                <div class="col l2 input-field">
                    <select class="browser-default hide-on-med-and-down">
                        <option>Cultural</option>
                        <option>Shows</option>
                        <option>Festivais</option>
                        <option>Esportes</option>
                        <option>Teatro</option>
                        <option>Comédia</option>
                        <option>Gastronomia</option>
                    </select>
                </div>
                <div class="col l2 input-field">
                    <select class="browser-default hide-on-med-and-down">
                        <option>Livre</option>
                        <option>+10</option>
                        <option>+12</option>
                        <option>+14</option>
                        <option>+16</option>
                        <option>+18</option>
                    </select>
                </div>
            </form>
        </div>

        <!-- exibe os blocos de eventos -->
        <div class="row dark-curta1">
            <div class="col l12">
                <div class="row">    
                    <?php if(array_key_exists('search', $_GET)) : ?>
                        <div class="col s12">
                            <a href="" class="white-text">Voltar</a>
                        </div>
                    <?php endif; ?>

                    <?php foreach ($eventos as $evento):?>
                        <div class="col s12 m6 l3">
                            <div class="card small evento dark-card">
                                <div class="card-image waves-effect waves-block waves-light evento">
                                    <a href="<?php echo DIRPAGE.'evento/detalhes/'.$evento->getCd_evento();?>"><img class="responsive-img" src="<?php echo DIRIMG.$evento->getDiretorio();?>" alt="<?php echo DIRIMG.$evento->getDiretorio();?>"></a>
                                </div>
                                <div class="card-content evento-desc">
                                    <div class="row">
                                        <div class="col s11">
                                            <span class="card-title truncate"><?php echo $evento->getNm_Evento();?></span>
                                        </div>
                                        <div class="col s1 ">
                                            <span class="card-title activator "><i class="material-icons right blue-text">more_vert</i></span>
                                        </div>
                                        <div class="col s12">
                                            <p class="text-fluid white-text"><?php echo $evento->getNm_local().": ".$evento->getNm_loc_rua()."-".$evento->getNm_loc_bairro();?></p>
                                        </div>
                                    </div>  
                                </div>
                                <div class="card-reveal dark-card">
                                    <span class="card-title blue-text "><?php echo $evento->getNm_Evento();?><i class="material-icons right blue-text">close</i></span>
                                    <p class="white-text"><?php echo $evento->getDesc_evento();?>.</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <!-- Paginação -->
        <div class="row">
        <div class="col s12 center">
                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active light-blue accent-4"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
</div>
