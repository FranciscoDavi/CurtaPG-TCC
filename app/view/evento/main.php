<?php
    //Carrega os dados do evento para exibir
    $eventos = $this->dados['evento']; 
    $comentarios = $this->dados['comentarios'];
    
?>


<div class="row white container">
        <?php foreach($eventos as $evento):?>
            <div class="col s12 titulo">
                <div class="row">
                    <br><br>
                    <div class="col s1">
                        <a class="btn waves-effect waves-light blue  z-depth-0" href="<?php echo DIRPAGE;?>"> <i class="material-icons">keyboard_return</i></a>
                    </div>
                </div>
            </div>
            <!-- Imagem do evento -->
            <div class="col s12 m12 l6 img">
                <img class="responsive-img" src="<?php echo DIRIMG.$evento->getDiretorio();?>">
            </div>

            <!-- Informações do evento-->
            <div class="col  s12 m12 l6">
                <div class="row">
                    <div class="col s12 truncate">
                        <h5><?php echo $evento->getNm_evento();?></h5>
                    </div>
                    <div class="col s12 truncate">
                        <span><?php echo $evento->getTipo_evento();?></span>
                    </div>
                    <div class="col s2 truncate">
                        <img class="responsive-img" src="<?php echo $this->formatParentalRatingView($evento->getClass_evento());?>">
                    </div> 
                    <div class="col s3 offset-s7">
                        <?php echo $evento->getPreco_evento();?>
                    </div>
                    <div class="col s12">
                        <h5 class="blue-text">
                            <?php 
                                echo $this->formatDateView($evento->getData_inicio(), 1);
                        
                                if ($evento->getData_final() <> null){
                                    echo " - ".$this->formatDateView($evento->getData_final(), 1);
                                }
                            ?>
                            <span class="black-text">ás</span>
                            <?php
                                echo $this->formatTimeView($evento->getHora_inicio());

                                if($evento->getHora_final() <> null){
                                    echo " - ".$this->formatTimeView($evento->getHora_final());
                                }
                            ?>
                        </h5>
                    </div>
                    <div class="col s12">
                        <span><?php echo $evento->getNm_local().':';?></span>
                    </div>
                    <div class="col s12">
                        <i class="material-icons tiny">room</i>
                        <span><?php echo $evento->getNm_loc_rua().', '.$evento->getNumero() .' - '.$evento->getNr_loc_cep().', '.$evento->getNm_loc_bairro();?></span>
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

        <div class="col s12">
            <ul class="collection">
                <?php  foreach($comentarios as $comentario) :?>
                
                        <li class="collection-item avatar">
                            <img src="images/yuna.jpg" alt="" class="circle">
                            <span class="title"><strong><?php echo $comentario->getNm_social();?></strong></span>
                            <p><?php echo $comentario->getComentario();?></p>
                            <a href="#!" class="center align dropdown-trigger excluir secondary-content"  data-target="dropdown3"><i class="material-icons">more_vert</i></a>
                        </li>
                        <!-- <?php if(isset($_SESSION) && isset($_SESSION['nv_acesso']) == 'PF' && $evento->getNm_razaosocial() == isset($_SESSION['nome'])):?>
                            <ul id="dropdown3" class="dropdown-content">
                                <li><a href="?r=exibir_evento&id=<?php echo $evento->getCd_Evento();?>&excluir=<?php echo $comentario->getId_comentario();?>">Excluir</a></span></li>
                            </ul>
                        <?php endif; ?> -->
                    </li> 
                <?php endforeach;?>
            </ul>
            <?php if(isset($_SESSION) && isset($_SESSION['nv_acesso']) == 'PF'):?>
                <ul>
                    <form method="POST">
                        <li>
                            <div class="row">
                                <div class="col s1">
                                    <img class="responsive-img circle" src="assets/_img/default-user-img.jpg">
                                </div>
                                <div class="col s10">
                                    <textarea  class="materialize-textarea" name="comentario"></textarea>
                                </div>
                                <div class="col s1">
                                    <button type="submit" class="btn z-depth-0"><i class="material-icons">send</i></button>
                                </div>
                            </div>
                        </li>
                    </form>
                </ul>
            
            <?php endif;?>
        </div>
    </div>					
</div>