<script src="<?php echo DIRJS.'jquery.mask.min.js';?>"></script>
<script src="<?php echo DIRJS.'mascaras.js';?>"></script>
<script src="<?php echo DIRJS.'validacoes.js';?>"></script>
<script type="text/javascript">
    //preview da imagem
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
    //abrir modal
    $(document).ready(function(){
        $('#modal1').modal();
        $('#modal1').modal('open'); 
        });

    //sidenav
    $(document).ready(function(){
            $('.sidenav').sidenav();
    });

    //colapse

    $(document).ready(function(){
        $('.collapsible').collapsible();
    });

</script>