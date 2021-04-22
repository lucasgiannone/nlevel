<nav class="app-header fixed-top">	   	            
    <div class="app-header-inner">  
    <div class="container-fluid py-2">
    <div class="app-header-content"> 
    <div class="row justify-content-between align-items-center">
    <!-- Botão Menu Mobile -->
        <div class="col-auto">
            <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
            </a>
        </div>
    <!-- // -->
    <!-- Botões TopNav Direita -->
    <div class="app-utilities col-auto">
        <!-- Botão com Imagem de Usuário -->
        <div class="app-utility-item app-user-dropdown dropdown">
            <a id="user-dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" onMouseOver="this.style.fill='dimgray'" onMouseOut="this.style.fill='gray'" fill="gray" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            </a>
            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                <li><a class="dropdown-item" href="/dash/perfil.php">Perfil</a></li>
                <li><a class="dropdown-item" href="/pages/config.php">Configurações</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/dash/logout">Sair</a></li>
            </ul>
        </div>
        <!-- // -->
    </div>
    <!-- // -->
    </div>
    </div>
    </div>
    </div>
    <!-- // -->

    <!-- Estrutura Navegação de canto -->
    <div id="app-sidepanel" class="app-sidepanel"> 
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
    <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <!-- Logo Portal -->
        <div class="app-branding">
        <a class="app-logo" href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="mx-3 bi bi-pencil" viewBox="0 0 16 16">
        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
        </svg>
        <!--<img class="logo-icon mr-2" src="/dashboard/assets/images/app-logo.svg" alt="logo">-->
        <span class="logo-text">PORTAL</span>
        </a>
        </div>  
        <!-- // -->
        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">              
                <!-- Botão home -->
                <li class="nav-item">
                    <a class="nav-link <?= $home ?>" href="/dash/">
                    <span class="nav-icon">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
                        <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        </svg>
                    </span>
                    <span class="nav-link-text">Home</span>
                    </a>
                </li>
                <!-- Botão conteudo -->
                <li class="nav-item" >
                    <a class="nav-link <?=$conteudo?>" href="/dash/conteudo">
                        <span class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
                            <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
                            </svg>
                        </span>
                        <span class="nav-link-text">Conteúdo</span>
                    </a>
                </li>

                <?php
                    if($_SESSION['perfil'] == 1 || $_SESSION['perfil'] == 4){
                ?>


                <!-- CAMPO DO ALUNO -->
                <li class=" nav-item has-submenu">
                    <a class="nav-link submenu-toggle" href="#" data-toggle="collapse" data-target="#submenu-4" aria-expanded="false" aria-controls="submenu-2">
                        <span class="nav-icon">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"></path>
                        </svg>
                        </span>
                        <span class="nav-link-text">Aluno</span>
                        <span class="submenu-arrow">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                        </svg>
                        </span>
                    </a>
                    <div id="submenu-4" class="collapse submenu submenu-4" data-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link <?= $uconteudo ?>" href="#">Seu Conteúdo</a></li>
                            <li class="submenu-item"><a class="submenu-link <?= $certificados ?>" href="#">Certificados</a></li>
                        </ul>
                    </div>
                </li>
                <?php 
                    } if($_SESSION['perfil'] == 2 || $_SESSION['perfil'] == 4){
                ?>
                <!-- CAMPO DO PALESTRANTE -->
                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle" href="#" data-toggle="collapse" data-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
                        <span class="nav-icon">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"></path>
                        </svg>
                        </span>
                        <span class="nav-link-text">Palestrante</span>
                        <span class="submenu-arrow">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                        </svg>
                        </span>
                    </a>
                    <div id="submenu-2" class="collapse submenu submenu-2" data-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link" href="#">Novo Conteúdo</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="#">Programado</a></li>
                        </ul>
                    </div>
                </li>
                <?php 
                } if($_SESSION['perfil'] == 3 || $_SESSION['perfil'] == 4){
                ?>
                <!-- CAMPO DO ADMIN -->
                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle" href="#" data-toggle="collapse" data-target="#submenu-3" aria-expanded="false" aria-controls="submenu-2">
                        <span class="nav-icon">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"></path>
                        </svg>
                        </span>
                        <span class="nav-link-text">Administrador</span>
                        <span class="submenu-arrow">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                        </svg>
                        </span>
                    </a>
                    <div id="submenu-3" class="collapse submenu submenu-3" data-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link" href="#">Editar Usuários</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="#">Editar Conteúdo</a></li>
                        </ul>
                    </div>
                </li>
                <?php 
                }
                ?>

            </ul>
        </nav>
        <div class="app-sidepanel-footer">
            <nav class="app-nav app-nav-footer">
                <ul class="app-menu footer-menu list-unstyled">
                    <li class="nav-item">
                    <a class="nav-link" href="./ajuda.php">
                            <span class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-question-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                            </svg>
                            </span>
                            <span class="nav-link-text">Ajuda</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    </div>
</nav>