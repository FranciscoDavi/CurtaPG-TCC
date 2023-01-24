<div class="navbar-fixed">
  <nav class=" dark-nav">
      <div class="nav-wrapper">
          <a href="" class="brand-logo img-logo"></a>   
          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>        
          <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href="?">Eventos</a></li>
              <li><a>Sobre o Curt'a</a></li>

              <?php if (isset($_SESSION['login'])) : ?>
                <li><a class="center align white-text dropdown-trigger" href="#!" data-target="dropdown2"><i class="material-icons right">arrow_drop_down</i><?php echo $_SESSION['nome'];?></a></li>
              <?php else: ?>
                <li><a href="?r=loginpf">Entrar</a></li>
                <li><a href="?r=cadastro_clientepf">Cadastre-se</a></li>
                <li><a href="?r=cadastro_clientepj">Divulgue seu Evento</li>
              <?php endif;?>

          </ul>
          <ul id="dropdown2" class="dropdown-content dark-card">
              <li><a class="center align white-text" href="?r=meus_eventos">Meus Eventos</a></li>
              <li><a class="center align white-text"href="#!">Opções</a></li>
              <li><a class="center align white-text"href="?exit=true">Sair</a></li>
          </ul>
      </div>
  </nav>
</div>
<!-- Navbar Mobile -->
<ul id="slide-out" class="sidenav dark-nav">
  <li>
      <div class="user-view">
          <div class="background">
              <img class="responsive-img"src="<?php echo DIRIMG.'img-layout/background-curta.png';?>">
          </div>
   
            <img class="responsive-img" src="<?php echo DIRIMG.'img-layout/curta2.png';?>">
            <a href="#name"><span class="white-text name"><?php echo isset($_SESSION['nome']);?></span></a>
            <a href="#email"><span class="white-text email "><?php echo isset($_SESSION['email']);?></span></a>
    
      </div> 
  </li>
  <li><a class="center align white-text" href="?exibir_eventos">Eventos</a></li>
  <li><a class="center align white-text" href="?projeto">Sobre o Curt'a</a></li>
  <?php if (isset($_SESSION['login'])) : ?>
      <li><a class="center align white-text dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons white-text right">arrow_drop_down</i>Opções</a></li>
  <?php else: ?>
      <li><a class="center align white-text" href="?r=loginpj">Entrar</a></li>
      <li><a class="center align white-text" href="?r=cadastro_clientepf">Cadastre-se</a></li>
      <li><a class="center align white-text" href="?r=cadastro_clientepj">Divulgue seu Evento</li>
  <?php endif;?>
  <ul id="dropdown1" class="dropdown-content dark-card">
    <li><a class="center align white-text" href="?r=meus_eventos">Meus Eventos</a></li>
    <li><a class="center align white-text"href="#!">Opções</a></li>
    <li><a class="center align white-text"href="?exit=true">Sair</a></li>
  </ul>
</ul>