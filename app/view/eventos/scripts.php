<script type="text/javascript">

$(document).ready(function(){
    $('.carousel').carousel({
        fullWidth:true,
        duration: 200,
    });
});

function moverProximo(){
    $('.carousel').carousel('next',4);
}

 function moverAnterior(){
    $('.carousel').carousel('prev',4);
}

$(document).ready(function(){
    $('.slider').slider({
        indicators:false
    });
});

</script>