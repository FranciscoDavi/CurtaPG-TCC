<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

<div class="body-dash">
    <form action="" method="POST"  enctype="multipart/form-data">
        <div class="row cadastro_evento">
            <div class="col s12">
                 <blockquote><h6>Alterar Informações Gerais</h6></blockquote>
           </div>
            <?php foreach ($this->dados as $evento) : ?>
            <div class="col s4 input-field">
                <label for="titulo">Titulo</label><input type="text" id="titulo" name="nm_evento" value="<?php echo $evento->getNm_evento();?>">
                <span class="helper-text">
                    <?php if(!empty($erros['nm_evento'])){ echo $erros['nm_evento'];}?> 
                </span>
            </div>

            <div class="col s3 input-field">
                <select id="categoria" name="categoria">
                    <option  value="Cultural">Cultural</option> 
                    <option value="Show">Show</option>  
                    <option  value="Festival">Festival</option> 
                    <option  value="Esportes">Esportes</option> 
                    <option  value="Gastronomia">Gastronomia</option>   
                    <option  value="Geek">Geek</option> 
                    <option  value="Palestra">Palestra</option> 
                    <option  value="Inauguracao">Inauguração</option>   
                    <option  value="Outro">Outro</option>   
                </select>
            </div>

            <div class="col s3 input-field"> 
                <select name="class_evento">
                    <option  value="0">+Livre</option>
                    <option  value="10">+10</option>
                    <option  value="12">+12</option>
                    <option  value="14">+14</option>
                    <option  value="16">+16</option>
                    <option  value="18">+18</option>
                </select>
            </div>

            <div class="col s2 input-field">
                <label>Preço</label>
                <input type="text" name="preco_evento" value="<?php echo $evento->getPreco_evento();?>">
                <span class="helper-text"></span>       
            </div>
            <div class="col s3 input-field">
                <label>Data de Inicio</label>
                <input id="dt" type="text" name="dt_inicio" value="<?php echo $this->formatDateView($evento->getData_inicio(), 2);?>">
                <span class="helper-text"></span>
            </div>
            <div class="col s3 input-field">
                <label id="dt">Data de Término</label>
                <input id="dt2" type="text" name="dt_final" value="<?php echo $this->formatDateView($evento->getData_final(), 2);?>">
                <span class="helper-text"></span>
            </div>
            <div class="col s3 input-field">
                <label>Horário de Inicio</label>
                <input id="hr" type="text" name="hr_inicio" value="<?php echo $this->formatTimeView($evento->getHora_inicio());?>">
                <span class="helper-text"></span>
            </div>
            <div class="col s3 input-field">
                <label>Horário de Término</label>
                <input id="hr2" type="text" name="hr_final" value="<?php echo $this->formatTimeView($evento->getHora_final());?>">
                <span class="helper-text"> </span>
            </div>
            <div class="col s12 input-field">
                <label for="desc">Descrição</label>
                <textarea id="desc" class="materialize-textarea" name="desc_evento" data-length="1000" maxlength="1000"><?php echo $evento->getDesc_evento();?></textarea>
                <span class="helper-text"></span>
            </div>  
            <div class="col s12">
                 <blockquote><h6>Alterar Localização</h6></blockquote>
           </div>
            <div class="col s5 input-field">
                <label for="local">Nome do Local</label>
                <input id="local" type="text" name="local" value="<?php echo $evento->getNm_local();?>">
                <span class="helper-text"></span>
            </div>
            <div class="col s3 input-field">
                <label for="cep">CEP</label>
                <input id="cep" type="text" name="cep" onchange="pesquisacep(this.value)" value="<?php echo $evento->getNr_loc_cep();?>">
                <span class="helper-text"></span>
            </div>
            <div class="col s4 input-field">
                <label for="endereco">Endereço</label>
                <input id="rua" type="text" name="endereco" value="<?php echo $evento->getNm_loc_rua();?>">
                <span class="helper-text"></span>
            </div>
            <div class="col s3 input-field">
                <label for="num">N°</label>
                <input id="num" type="text" name="numero" value="<?php echo $evento->getNumero();?>">
                <span class="helper-text"></span>
            </div>
            <div class="col s3 input-field">
                <label for="bairro">Bairro</label>
                <input id="bairro" type="text" name="bairro" value="<?php echo $evento->getNm_loc_bairro();?>">
                <span class="helper-text"></span>
            </div>
            <div class="col s3 input-field">
                <label for="cidade">Cidade</label>
                <input id="cidade" type="text" name="cidade" value="<?php echo $evento->getNm_cidade();?>">
                <span class="helper-text"></span>
            </div>
            <div class="col s3 input-field">
                <label>Complemento</label>
                <input type="text" name="complemento">
                <span class="helper-text"></span>
            </div>
            
            <div class="col s12">
                 <blockquote><h6>Alterar Anexo de Imagem</h6></blockquote>
           </div>

           <div class="col s12">
                <div class="row">
                    <div class="col s12 file-field input-field">
                        <div class="btn">
                            <span><i class="material-icons large">wallpaper</i></span>
                            <input id="uploadImage" name="arquivo" type="file" onchange="PreviewImage()">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Selecione uma imagem para a exibição do evento">
                        </div>
                    </div>
                </div>
                    <div class="col 12">
                        <div class="row">
                            <div class="col s5">
                                <ul class="collection with-header">
                                    <li class="collection-header"><h6>A imagem deve ter as seguintes especificações para ser publicada:</h6></li>
                                    <li class="collection-item">Tamanho: Max. 1Mb</li>
                                    <li class="collection-item">Formatos: PNG ou JPEG/JPG</li>
                                    <li class="collection-item">Dimenções Min: Largura: 800px, Altura: 600px </li>
                                    <li class="collection-item">Dimenções Max: Largura: 1900px, Altura: 1080px </li>
                                </ul>
                            </div>
                            <div class="col s7">
                                <img id="uploadPreview"  class="responsive-img" src="<?php echo DIRIMG.$evento->getDiretorio();?>">
                            </div>
                        </div>
                    </div>
                    <div class="col s12">
                        <span class="helper-text">
                            
                        </span>
                    </div>
                <div>
           </div>
            <!-- Divulgar -->
            <div class="col s12 input-field center">
                <button type="submit" class="btn waves-effect light-blue accent-4">Alterar</button>
            </div>
        </div>
         <?php endforeach ?>
    </form>  
</div>