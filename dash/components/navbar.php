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
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/dash/logout.php">Sair</a></li>
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
        <a class="app-logo" href="/dash/">
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
                    <a class="nav-link <?=$conteudo?>" href="/dash/conteudo/">
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
                    if($_SESSION['perfil'] == 1 || ($_SESSION['perfil'] ==4)){
                ?>


                <!-- CAMPO DO ALUNO -->
                <li class=" nav-item has-submenu">
                    <a class="nav-link submenu-toggle <?=$uconteudo?>" href="#" data-toggle="collapse" data-target="#submenu-4" aria-expanded="<?=$utoggle[0]?>" aria-controls="submenu-2">
                        <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                        </svg>
                        </span>
                        <span class="nav-link-text">Aluno</span>
                        <span class="submenu-arrow">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                        </svg>
                        </span>
                    </a>
                    <div id="submenu-4" class="submenu submenu-4 <?=$utoggle[1]?> collapse" data-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link <?= $ulink[0]?>" href="/dash/usuario/">Seu Conteúdo</a></li>
                        </ul>
                    </div>
                </li>
                <?php 
                    } if($_SESSION['perfil'] == 2 || $_SESSION['perfil'] == 4){
                        
                ?>
                <!-- CAMPO DO PALESTRANTE -->
                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle <?=$palestrante?>" href="#" data-toggle="collapse" data-target="#submenu-2" aria-expanded="<?=$paltoggle[0]?>" aria-controls="submenu-2">
                        <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-reels" viewBox="0 0 16 16">
                        <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0z"/>
                        <path d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7zm6 8.73V7.27l-3.5 1.555v4.35l3.5 1.556zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z"/>
                        <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                        </svg>
                        </span>
                        <span class="nav-link-text">Palestrante</span>
                        <span class="submenu-arrow">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                        </svg>
                        </span>
                    </a>
                    <div id="submenu-2" class="collapse submenu submenu-2 <?=$paltoggle[1]?> collapse" data-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link <?=$pallink[0]?>" href="/dash/palestrante/cadastrar.php">Solicitar Conteúdo</a></li>
                            <li class="submenu-item"><a class="submenu-link <?= $pallink[1]?>" href="/dash/palestrante/">Seu Conteúdo</a></li>

                        </ul>
                    </div>
                </li>
                <?php 
                } if($_SESSION['perfil'] == 3 || $_SESSION['perfil'] == 4){
                ?>
                <!-- CAMPO DO ADMIN -->
                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle <?=$administrador?>" href="#" data-toggle="collapse" data-target="#submenu-3" aria-expanded="<?=$admtoggle[0]?>" aria-controls="submenu-2">
                        <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cpu" viewBox="0 0 16 16">
                        <path d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                        </svg>
                        </span>
                        <span class="nav-link-text">Administrador</span>
                        <span class="submenu-arrow">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                        </svg>
                        </span>
                    </a>
                    <div id="submenu-3" class="collapse submenu submenu-3 <?=$admtoggle[1]?>" data-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                        <li class="submenu-item"><a class="submenu-link     <?=$admlink[0]?>" href="/dash/admin/cadastraradm.php">Solicitar Conteúdo</a></li>
                            <li class="submenu-item"><a class="submenu-link <?=$admlink[1]?>" href="/dash/admin/alterarconta.php">Alterar Tipo de Conta</a></li>
                            <li class="submenu-item"><a class="submenu-link <?=$admlink[3]?>" href="/dash/admin/solicitacao.php">Solicitações de Contéudo</a></li>
                            <li class="submenu-item"><a class="submenu-link <?=$admlink[4]?>" href="/dash/admin/">Seu Contéudo</a></li>
                        </ul>
                    </div>
                </li>
                <?php 
                }
                ?>

            </ul>
        </nav>
    </div>
    </div>
</nav>