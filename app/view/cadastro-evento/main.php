<div> 
    <div class="body-dash">
        <form action="<?php echo DIRPAGE.'menu/cadastroEvento';?>" method="POST"  enctype="multipart/form-data">
            <div class="row cadastro_evento">
                <div class="col s12">
                     <blockquote><h6>Informações Gerais</h6></blockquote>
               </div>
                <div class="col s4 input-field">
                    <label for="titulo">Titulo</label><input type="text" id="titulo" name="nm_evento" value="<?php if(array_key_exists('nm_evento', $_POST)) { echo $_POST['nm_evento'];}?>" required>
                    <span class="helper-text"></span>
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
                    <input type="text" name="preco_evento" value="<?php if(array_key_exists('preco_evento', $_POST)) { echo $_POST['preco_evento'];}?>" required>
                    <span class="helper-text"></span>       
                </div>
                <div class="col s3 input-field">
                    <label>Data de Inicio</label>
                    <input id="dt" type="text" name="dt_inicio" class="datepicker" value="<?php if(array_key_exists('dt_inicio', $_POST)) { echo $_POST['dt_inicio'];}?>" required readonly>
                    <span class="helper-text"></span>
                </div>
                <div class="col s3 input-field">
                    <label id="dt">Data de Término</label>
                    <input id="dt2" type="text" name="dt_final" class="datepicker" value="<?php if(array_key_exists('dt_final', $_POST)) { echo $_POST['dt_final'];}?>" required readonly>
                    <span class="helper-text"></span>
                </div>
                <div class="col s3 input-field">
                    <label>Horário de Inicio</label>
                    <input id="hr" type="text" name="hr_inicio" class="timepicker" value="<?php if(array_key_exists('hr_inicio', $_POST)) { echo $_POST['hr_inicio'];}?>" required readonly>
                    <span class="helper-text"></span>
                </div>
                <div class="col s3 input-field">
                    <label>Horário de Término</label>
                    <input id="hr2" type="text" name="hr_final" class="timepicker" value="<?php if(array_key_exists('hr_final', $_POST)) { echo $_POST['hr_final'];}?>" required readonly>
                    <span class="helper-text"></span>
                </div>
                <div class="col s12 input-field">
                    <label for="desc">Descrição</label>
                    <textarea id="desc" class="materialize-textarea" name="desc_evento" data-length="1000" maxlength="1000" required><?php if(array_key_exists('desc_evento', $_POST)) { echo $_POST['desc_evento'];}?></textarea>
                    <span class="helper-text"></span>
                </div>
               <div class="col s12">
                     <blockquote><h6>Localização</h6></blockquote>
               </div>
                <div class="col s5 input-field">
                    <label for="local">Nome do Local</label>
                    <input id="local" type="text" name="local" value="<?php if(array_key_exists('local', $_POST)) { echo $_POST['local'];}?>" required>
                    <span class="helper-text"></span>
                </div>
                <div class="col s3 input-field">
                    <label for="cep">CEP</label>
                    <input id="cep" type="text" name="cep" onchange="pesquisacep(this.value)" value="<?php if(array_key_exists('cep', $_POST)) { echo $_POST['cep'];}?>" required>
                    <span class="helper-text"></span>
                </div>
                <div class="col s4 input-field">
                    <label for="endereco">Endereço</label>
                    <input id="rua" type="text" name="endereco" value="<?php if(array_key_exists('endereco', $_POST)) { echo $_POST['endereco'];}?>" required>
                    <span class="helper-text"></span>
                </div>
                <div class="col s3 input-field">
                    <label for="num">N°</label>
                    <input id="num" type="text" name="numero" value="<?php if(array_key_exists('numero', $_POST)) { echo $_POST['numero'];}?>" required>
                    <span class="helper-text"></span>
                </div>
                <div class="col s3 input-field">
                    <label for="bairro">Bairro</label>
                    <input id="bairro" type="text" name="bairro" value="<?php if(array_key_exists('bairro', $_POST)) { echo $_POST['bairro'];}?>" required>
                    <span class="helper-text"></span>
                </div>
                <div class="col s3 input-field">
                    <label for="cidade">Cidade</label>
                    <input id="cidade" type="text" name="cidade" value="<?php if(array_key_exists('cidade', $_POST)) { echo $_POST['cidade'];}?>" required>
                    <span class="helper-text"></span>
                </div>
                <div class="col s3 input-field">
                    <label>Complemento</label>
                    <input type="text" name="complemento">
                    <span class="helper-text"></span>
                </div>
                <div class="col s12">
                     <blockquote><h6>Anexo de Imagem</h6></blockquote>
               </div>
               <div class="col s12">
                    <div class="row">
                        <div class="col s12 file-field input-field">
                            <div class="btn light-blue accent-4">
                                <span><i class="material-icons large ">wallpaper</i></span>
                                <input id="uploadImage" name="arquivo" type="file" onchange="PreviewImage()">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Selecione uma imagem para a exibição do evento">
                            </div>
                        </div>
                    </div>
                        <div class="col s12">
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
                                    <img id="uploadPreview"  class="responsive-img">
                                </div>
                            </div>
                        </div>
                        <div class="col s12">
                            <span class="helper-text"></span>
                        </div>
                    <div>
               </div>
                <!-- Divulgar -->
                <div class="col s12 input-field center">
                    <button type="submit" class="btn waves-effect light-blue accent-3 white-text">Confirmar</button>
                </div>
            </div>
            <?php if(array_key_exists('cadastrado', $_GET)) : ?>
             <div id="modal1" class="modal modal-fixed-footer">
                    <div class="modal-content">
                    <ul class="collection with-header">
                        <li class="collection-header"><h4></h4></li>
                        <li class="collection-item"></li>
                        <li class="collection-item">Alvin</li>
                        <li class="collection-item">Alvin</li>
                        <li class="collection-item">Alvin</li>
                    </ul>
                    </div>
                    <div class="modal-footer">
                        <button class="modal-close waves-effect waves-red btn-flat">Cancelar</a>
                        <button type="submit" class="modal-close waves-effect waves-green btn-flat">Confirmar</a>
                    </div>
                </div>
            <?php endif;?>
        </form>  
    </div>
</div>